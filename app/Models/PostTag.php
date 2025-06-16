<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostTag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'desc',
    ];

    protected $casts = [
        'desc' => 'string',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Tự động tạo slug nếu chưa có
    protected static function booted()
    {
        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    // Scope: tìm tag theo tên gần đúng
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%$term%");
    }

    // Scope: chỉ hiển thị tag được gắn cho ít nhất 1 bài viết
    public function scopeHasPosts($query)
    {
        return $query->whereHas('posts');
    }

    // Đường dẫn tag
    public function getUrlAttribute()
    {
        return route('tag.show', $this->slug);
    }
}
