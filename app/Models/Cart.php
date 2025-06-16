<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $with = ['items'];
    protected $fillable = ['account_id', 'session_id', 'status', 'total_price'];

    public function account() {
        return $this->belongsTo(related: Account::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalAttribute()
    {
        return $this->cartItems->sum(fn($item) => $item->price * $item->quantity);
    }

    public function addItem($productId, $quantity = 1)
    {
        return $this->cartItems()->updateOrCreate(
            ['product_id' => $productId],
            ['quantity' => DB::raw("quantity + $quantity")]
        );
    }

    public function removeItem($productId)
    {
        return $this->cartItems()->where('product_id', $productId)->delete();
    }

    public function updateQuantity($productId, $quantity)
    {
        return $this->cartItems()->where('product_id', $productId)->update(['quantity' => $quantity]);
    }

    public function clear()
    {
        return $this->cartItems()->delete();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOfUser($query, $userId)
    {
        return $query->where('account_id', $userId);
    }

    // Cấu trúc thêm vào giỏ hàng khhi chưa đăng nhập
    // session()->put('cart', [
    //     'items' => [
    //         12 => [ // product_id
    //             'name' => 'Omron E3Z',
    //             'price' => 120000,
    //             'quantity' => 2,
    //             'image' => '/uploads/e3z.jpg',
    //         ],
    //         34 => [ ... ],
    //     ]
    // ]);
}
