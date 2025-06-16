<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_variant_id', 'quantity', 'price', 'total_price', 'options'];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'float',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function productVariants() {
        return $this->belongsTo(ProductVariant::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function increaseQuantity($amount = 1)
    {
        $this->quantity += $amount;
        $this->save();
    }

    public function updateQuantity($amount)
    {
        $this->quantity = max(1, $amount);
        $this->save();
    }

    public function scopeOfProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    public function scopeOfVariant($query, $variantId)
    {
        return $query->where('product_variant_id', $variantId);
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            if (empty($item->price) && $item->product) {
                $item->price = $item->product->price;
            }
        });
    }

}
