<?php

namespace App\Services;

class CartService
{
    public static function all()
    {
        return session('cart.items', []);
    }

    public static function add($product, $qty = 1)
    {
        $cart = session('cart.items', []);
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $qty,
                'image' => $product->main_image_url ?? null,
            ];
        }

        session()->put('cart.items', $cart);
    }

    public static function remove($productId)
    {
        $cart = session('cart.items', []);
        unset($cart[$productId]);
        session()->put('cart.items', $cart);
    }

    public static function clear()
    {
        session()->forget('cart.items');
    }

    public static function total()
    {
        return collect(self::all())->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public static function count()
    {
        return collect(self::all())->sum('quantity');
    }
}
