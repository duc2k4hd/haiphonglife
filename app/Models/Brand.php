<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'meta_title',
        'meta_description',
        'seo_keywords',
        'is_active',
        'is_featured'
    ];

    protected $casts = [
        'seo_keywords' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean'
    ];

    /**
     * Nếu Brand có quan hệ với Product, bạn có thể định nghĩa như sau:
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    // Slug tự động
    protected static function booted()
    {
        static::creating(function ($brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });
    }

    // Scope: chỉ thương hiệu đang hoạt động
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: thương hiệu nổi bật
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
