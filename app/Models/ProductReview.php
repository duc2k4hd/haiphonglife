<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'account_id',
        'rating',
        'comment',
        'gallery'
    ];

    protected $casts = [
        'rating' => 'integer',
        'gallery' => 'array'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id')->withDefault([
            'name' => 'Khách ẩn danh'
        ]);
    }

    // === Accessors ===
    public function getStarsAttribute()
    {
        return str_repeat('⭐', $this->rating);
    }

    // === Scopes ===
    public function scopeRecent($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeOfProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    // (Optional) Scope để tính trung bình rating của 1 sản phẩm
    public static function averageRatingForProduct($productId)
    {
        return self::where('product_id', $productId)->avg('rating');
    }

    // Ví dụ sử dụng scope
    // // Lấy danh sách đánh giá mới nhất
    // ProductReview::recent()->get();

    // // Đếm đánh giá sản phẩm
    // $product->productReviews()->count();

    // // Trung bình điểm đánh giá
    // ProductReview::averageRatingForProduct($product->id);
}
