<?php

namespace App\Models;

use App\Notifications\NewPostCommentNotification;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_id',
        'account_id',
        'parent_id',
        'content',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeByPost($query, $postId)
    {
        return $query->where('post_id', $postId);
    }

    public function isOwnedBy($userId)
    {
        return $this->account_id === $userId;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = strip_tags($value);
    }

    public function parent()
    {
        return $this->belongsTo(PostComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(PostComment::class, 'parent_id')->approved();
    }

    protected static function booted()
    {
        static::created(function ($comment) {
            if ($comment->post && $comment->post->account) {
                $comment->post->account->notify(new NewPostCommentNotification($comment));
            }
        });
    }
}