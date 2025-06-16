<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'price', 'old_price', 'cost_price', 'short_desc', 'desc', 'stock', 'sku', 'product_image_id', 'meta_title', 'meta_desc', 'seo_keywords', 'product_tag_id', 'canonical_url', 'brand_id', 'category_id', 'is_active', 'is_featured', 'is_new', 'is_on_sale', 'is_best_seller', 'sold_count'];

    protected $casts = [
        'price' => 'double',
        'old_price' => 'double',
        'cost_price' => 'double',
        'seo_keywords' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_new' => 'boolean',
        'is_on_sale' => 'boolean',
        'is_best_seller' => 'boolean',
        'sold_count' => 'integer',
        'category_id' => 'array',
    ];

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function getPrimaryImageAttribute()
    {
        return $this->getRelationValue('primaryImage') ?? $this->primaryImage()->first();
    }

    // Liên kết thương hiệu
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Liên kết danh mục
    public function getCategoriesAttribute()
    {
        return Category::whereIn('id', $this->category_id ?? [])->get();
    }

    public function scopeWithAnyCategory($query, array $categoryIds)
    {
        return $query->where(function ($q) use ($categoryIds) {
            foreach ($categoryIds as $id) {
                $q->orWhereJsonContains('category_id', $id);
            }
        });
    }

    // Nếu bạn có bảng trung gian product_images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Nếu sản phẩm có nhiều biến thể (tùy chọn thêm)
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function productHasVariants()
    {
        return $this->productVariants()->exists();
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function averageRating()
    {
        return $this->productReviews()->avg('rating');
    }

    public function getTagsAttribute()
    {
        $tagIds = is_string($this->tag_id) ? json_decode($this->tag_id, true) : $this->tag_id;
        return ProductTag::whereIn('id', $tagIds ?? [])->get();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // === Auto-generate slug ===
    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    // === Accessors ===
    public function getUrlAttribute()
    {
        return route('product.show', $this->slug);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%")->orWhere('sku', 'like', "%{$term}%");
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOnSale($query)
    {
        return $query->where('is_on_sale', true);
    }

    public function scopeBestSeller($query)
    {
        return $query->where('is_best_seller', true);
    }

    public function getFrameAttribute()
    {
        if ($this->is_featured) {
            return 'frame-featured.png';
        } elseif ($this->is_new) {
            return 'frame-new.png';
        } elseif ($this->is_on_sale) {
            return 'frame-big-sale.png';
        } elseif ($this->is_best_seller) {
            return 'frame-sale-50%.png';
        }
        return null;
    }

    public function getLabelAttribute()
    {
        if ($this->is_featured) {
            return '⭐ Sản phẩm nổi bật';
        } elseif ($this->is_new) {
            return '🔥 Sản phẩm mới';
        } elseif ($this->is_on_sale) {
            return '🔥 Giảm giá cực sốc';
        } elseif ($this->is_best_seller) {
            return '🛒 Sản phẩm bán chạy';
        }
        return null;
    }

    public function availableCoupons()
    {
        return DB::table('coupons')
            ->where('is_active', 1)
            ->where(function ($query) {
                $now = Carbon::now();
                $query->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($query) {
                $now = Carbon::now();
                $query->whereNull('expires_at')->orWhere('expires_at', '>=', $now);
            })
            ->where(function ($query) {
                $query->whereNull('applicable_products')->orWhereJsonContains('applicable_products', (string) $this->id);
            })
            ->where(function ($query) {
                $query->whereNull('excluded_products')->orWhere(DB::raw('JSON_CONTAINS(excluded_products, ' . DB::getPdo()->quote(json_encode((string) $this->id)) . ')'), '=', 0);
            })
            ->where(function ($query) {
                $query->whereNull('applicable_categories')->orWhereJsonContains('applicable_categories', (string) $this->category_id);
            })
            ->where(function ($query) {
                $query->whereNull('excluded_categories')->orWhere(DB::raw('JSON_CONTAINS(excluded_categories, ' . DB::getPdo()->quote(json_encode((string) $this->category_id)) . ')'), '=', 0);
            })
            ->get();
    }

    public function isCouponApplicable($coupon): bool
    {
        // 1. Coupon phải còn hiệu lực
        $now = now();
        if (
            !$coupon->is_active ||
            ($coupon->starts_at && $coupon->starts_at > $now) ||
            ($coupon->expires_at && $coupon->expires_at < $now)
        ) {
            return false;
        }

        // 2. Kiểm tra excluded_products -> Kiểm tra danh sách sản phẩm không được dùng Coupon
        if ($coupon->excluded_products && in_array($this->id, json_decode($coupon->excluded_products, true))) {
            return false;
        }

        // 3. Kiểm tra excluded_categories -> Kiểm tra danh sách danh mục không được dùng Coupon
        if ($coupon->excluded_categories && in_array($this->category_id, json_decode($coupon->excluded_categories, true))) {
            return false;
        }

        // 4. Nếu có applicable_products → Kiêm tra danh sách sản phẩm được dùng Coupon
        if ($coupon->applicable_products) {
            $ids = json_decode($coupon->applicable_products, true);
            if (!in_array($this->id, $ids)) return false;
        }

        // 5. Nếu có applicable_categories → Kiem tra danh sách danh mục được dùng Coupon
        if ($coupon->applicable_categories) {
            $ids = json_decode($coupon->applicable_categories, true);
            if (!in_array($this->category_id, $ids)) return false;
        }

        return true;
    }
}
