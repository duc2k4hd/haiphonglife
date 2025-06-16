<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'image_mobile',
        'link',
        'description',
        'is_active',
        'position',
        'order',
        'target',
        'starts_at',
        'ends_at',
        'type',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    // ✅ Accessor: ảnh chính cho thiết bị hiện tại
    public function getDisplayImageAttribute(): ?string
    {
        return request()->isMobile() && $this->image_mobile
            ? $this->image_mobile
            : $this->image;
    }

    // ✅ Accessor: kiểm tra có hiển thị được không theo thời gian
    public function getIsVisibleAttribute(): bool
    {
        $now = now();
        return $this->is_active &&
            (!$this->starts_at || $this->starts_at <= $now) &&
            (!$this->ends_at || $this->ends_at >= $now);
    }

    // ✅ Scope: chỉ lấy banner đang hoạt động
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    // public function scopeActive(Builder $query): Builder
    // {
    //     return $query->where('is_active', true)
    //                  ->where(function ($q) {
    //                      $now = now();
    //                      $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
    //                  })
    //                  ->where(function ($q) {
    //                      $now = now();
    //                      $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
    //                  });
    // }

    // ✅ Scope theo vị trí (homepage, sidebar, etc)
    public function scopePosition(Builder $query, string $position): Builder
    {
        return $query->where('position', $position);
    }

    // ✅ Scope ưu tiên hiển thị (theo thứ tự order)
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderBy('id', 'desc');
    }

    // ✅ Relation với User (nếu có hệ thống admin)
    public function creator()
    {
        return $this->belongsTo(Account::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(Account::class, 'updated_by');
    }
}
