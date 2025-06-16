<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {
            $settings = Setting::all()->pluck('value', 'key')->toArray();
            View::share('settings', $settings);
        } else {
            View::share('settings', []);
        }

        if (Schema::hasTable('categories')) {
            // Hàm format đệ quy trả về object hoàn toàn
            $formatCategory = function ($category) use (&$formatCategory) {
                $collectIds = function ($cat) use (&$collectIds) {
                    $ids = [$cat->id];
                    foreach ($cat->children as $child) {
                        $ids = array_merge($ids, $collectIds($child));
                    }
                    return $ids;
                };

                return (object) [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image' => $category->image,
                    'slug' => $category->slug,
                    'category_ids' => $collectIds($category), // 💡 Mảng ID cấp 1, 2, 3
                    'children' => $category->children->map(fn ($child) => $formatCategory($child)),
                ];
            };

            $categories = Category::with('children.children')
                ->whereNull('parent_id')
                ->get()
                ->map(fn($cat) => $formatCategory($cat));

            View::share('categories', $categories);
        }


        View::composer('*', function ($view) {
            $items = [];

            if (app()->runningInConsole()) {
                return;
            }

            if (request()->hasSession() && Auth::check()) {
                $items = Auth::user()
                    ->cartItems()
                    ->limit(5)
                    // ->with([
                    //     'productDetails:id,product_id,price,sale_price,stock,sku,color,size',
                    //     'productDetails.product:id,name,slug,sku',
                    //     'productDetails.image:id,product_id,title,alt,notes,url',
                    //     'productDetails.product.category:id,name,slug',
                    // ])
                    ->get();
            } elseif (request()->hasSession()) {
                // Khách chưa login → lấy theo session_id trong bảng carts
                // $sessionId = session()->getId();

                // $items = CartItem::whereHas('cart', function ($q) use ($sessionId) {
                //     $q->where('session_id', $sessionId);
                // })
                //     ->with('product')
                //     ->with('product_images')

                //     ->get();
                $items = [
                    'message' => 'Vui lòng đăng nhập.',
                ];
            }

            $view->with([
                'carts' => $items,
            ]);
        });
    }
}
