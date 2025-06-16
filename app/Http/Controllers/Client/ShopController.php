<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $products = Product::query();

        return view('clients.pages.shop.index', compact('products'));
    }

    public function single($slug) {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return view('clients.pages.errors.404');
        }
        // dd($product->productVariants);
        return view('clients.pages.single.index', compact('product'));
    }
}
