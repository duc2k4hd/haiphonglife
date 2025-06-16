<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductTag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'desc',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // === Boot để tự tạo slug từ name nếu chưa có ===
    protected static function booted()
    {
        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    // === Scope lọc tag đang dùng ===
    public function scopeUsed($query)
    {
        return $query->has('products');
    }

    // === Accessor URL nếu bạn muốn dùng route ===
    public function getUrlAttribute()
    {
        return route('product.tag', $this->slug);
    }
}
