<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'notes',
        'alt',
        'url',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    // Accessor để lấy alt fallback nếu null
    public function getAltTextAttribute()
    {
        return $this->alt ?? $this->title ?? 'Ảnh sản phẩm';
    }

    // Accessor lấy URL đầy đủ
    public function getFullUrlAttribute()
    {
        return $this->url ? asset($this->url) : asset('images/default-product.jpg');
    }

    // Scope chỉ ảnh chính
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    // Scope ảnh phụ
    public function scopeSecondary($query)
    {
        return $query->where('is_primary', false);
    }
}
