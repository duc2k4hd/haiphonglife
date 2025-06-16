<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'seo_keywords',
        'excerpt',
        'content',
        'thumbnail',
        'thumbnail_alt_text',
        'canonical_url',
        'status',
        'is_featured',
        'views',
        'account_id',
        'category_id',
        'published_at',
    ];

    protected $casts = [
        'seo_keywords' => 'array',
        'is_featured' => 'boolean',
        'views' => 'integer',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post')->where('type', 'post');
    }

    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function getUrlAttribute()
    {
        return route('post.show', $this->slug);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function incrementViews()
    {
        $key = 'post_viewed_' . $this->id;
        $ip = request()->ip();

        // Nếu IP chưa xem bài viết này trong session, thì tăng
        if (!session()->has($key) || session($key) !== $ip) {
            $this->increment('views');
            session([$key => $ip]);
        }
    }
}
