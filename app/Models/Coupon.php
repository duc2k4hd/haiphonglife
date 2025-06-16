<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'value',
        'usage_limit',
        'used_count',
        'per_user_limit',
        'min_order_amount',
        'is_active',
        'starts_at',
        'expires_at',
        'applicable_products',
        'applicable_categories',
        'excluded_products',
        'excluded_categories',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'applicable_products' => 'array',
        'applicable_categories' => 'array',
        'excluded_products' => 'array',
        'excluded_categories' => 'array',
    ];

    // ✅ Scope: chỉ lấy coupon còn hiệu lực
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where(function ($q) {
                         $now = Carbon::now();
                         $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                     })
                     ->where(function ($q) {
                         $now = Carbon::now();
                         $q->whereNull('expires_at')->orWhere('expires_at', '>=', $now);
                     });
    }

    // // Kiểm tra coupon đã dùng bởi người dùng
    // public function isUsedBy($user): bool
    // {
    //     return $this->usages()->where('account_id', $user->id)->exists();
    // }

    // ✅ Kiểm tra còn lượt sử dụng hay không
    public function hasUsageRemaining(): bool
    {
        if (is_null($this->usage_limit)) return true;
        return $this->used_count < $this->usage_limit;
    }

    // ✅ Kiểm tra còn hạn không
    public function isCurrentlyValid(): bool
    {
        $now = now();
        return $this->is_active &&
            (is_null($this->starts_at) || $this->starts_at <= $now) &&
            (is_null($this->expires_at) || $this->expires_at >= $now);
    }

    public static function eligibleItems($cartItems, $coupon)
    {
        return $cartItems->filter(function ($item) use ($coupon) {
            $productId = $item->productVariant->product_id;
            $categoryIds = $item->productVariant->product->category_ids ?? [];

            if (in_array($productId, $coupon->excluded_products ?? [])) {
                return false;
            }

            if (array_intersect($categoryIds, $coupon->excluded_categories ?? [])) {
                return false;
            }

            if (!empty($coupon->applicable_products) && !in_array($productId, $coupon->applicable_products)) {
                return false;
            }

            if (!empty($coupon->applicable_categories) && empty(array_intersect($categoryIds, $coupon->applicable_categories))) {
                return false;
            }

            return true;
        });
    }

    public function eligibleItem($cartItems)
    {
        return self::eligibleItems($cartItems, $this);
    }

    public function scopeExpired($query)
    {
        $now = now();
        return $query->where('expires_at', '<', $now)
                    ->orWhere(function ($q) use ($now) {
                        $q->where('is_active', false);
                    });
    }


    // Cách tính:
    // $eligibleTotal = $eligibleItems->sum(function ($item) {
    //     return $item->price * $item->quantity;
    // });

    // // Tính discount tương ứng
    // if ($coupon->type === 'percentage') {
    //     $discount = $eligibleTotal * ($coupon->value / 100);
    // } elseif ($coupon->type === 'fixed_amount') {
    //     $discount = min($coupon->value, $eligibleTotal);
    // }

}
