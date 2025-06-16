<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $banners = Banner::active()->position('homepage')->ordered()->get();

        $bannerBestSelling = Banner::active()->position('product_best_seller')->inRandomOrder()->first();

        $bannerNewsLetter = Banner::active()->position('product_news_letter')->inRandomOrder()->first();

        $coupons = Coupon::active();

        $productsFeatured = Product::inRandomOrder()->featured()->limit(24)->get();

        $productsBestSeller = Product::inRandomOrder()->bestSeller()->limit(10)->get();

        $productsTodayOrdered = OrderItem::whereHas('order', function ($query) {
            $query->whereDate('created_at', today())
                ->where('status', '!=', 'cancelled');
        })
        ->with('product')
        ->limit(3)
        ->get()
        ->pluck('product')
        ->unique('id')
        ->take(3);
        if ($productsTodayOrdered->isEmpty()) {
            $productsTodayOrdered = Product::inRandomOrder()->limit(3)->get();
        }

        $products = Product::query()->active()->inRandomOrder();
        
        // dd($bannerNewsLetter); 
        return view('clients.pages.home.index', compact(
            'banners',
            'bannerNewsLetter',
            'bannerBestSelling',
            'coupons',
            'products',
            'productsFeatured',
            'productsBestSeller',
            'productsTodayOrdered'
        ));
    }
}
