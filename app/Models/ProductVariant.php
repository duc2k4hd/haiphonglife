<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'stock',
        'in_stock',
        'color',
        'size',
        'material',
        'product_image_id',
        'weight_unit',
        'weight_value',
        'dimensions',
        'is_active',
    ];

    protected $casts = [
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
        'weight_value' => 'decimal:2',
        'dimensions' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Biến thể có thể liên kết với 1 ảnh chính
    public function image()
    {
        return $this->belongsTo(ProductImage::class, 'product_image_id');
    }

    // Scope lọc biến thể đang hoạt động
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Tự động gán slug (nếu cần), ví dụ dựa trên color và size
    // protected static function booted()
    // {
    //     static::creating(function ($variant) {
    //         if (empty($variant->slug) && $variant->color && $variant->size) {
    //             $variant->slug = Str::slug($variant->color . '-' . $variant->size);
    //         }
    //     });
    // }

    // Accessor tính tổng trọng lượng dạng chuỗi
    public function getWeightAttribute()
    {
        if ($this->weight_value && $this->weight_unit) {
            return $this->weight_value . ' ' . $this->weight_unit;
        }
        return null;
    }

    // Accessor hiển thị kích thước dạng chuỗi
    public function getDimensionsTextAttribute()
    {
        if (!$this->dimensions) {
            return null;
        }
        $dims = $this->dimensions;
        return ($dims['length'] ?? '?') . ' x ' . ($dims['width'] ?? '?') . ' x ' . ($dims['height'] ?? '?') . ' ' . ($dims['unit'] ?? '');
    }
}
