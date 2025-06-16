@extends('clients.layouts.master')

@section('title', $settings['site_title'])

@section('head')
    <link rel="stylesheet" href="{{ asset('clients/assets/css/home.css') }}">
    @if ($banners->first()->order == 0)
        <link rel="preload" as="image" href="{{ asset('/clients/assets/img/banners/' . $banners->first()->image) }}" fetchpriority="high">
    @endif
    <!-- Từ khóa SEO -->
    <meta name="keywords" content="{{ $settings['seo_keywords'] ?? 'trang chủ, haiphonglife, Hải Phòng Life, hải phòng, review, sản phẩm' }}">

    <!-- Tên tác giả -->
    <meta name="author" content="{{ $settings['seo_author'] }}">

    <!-- Thẻ robots -->
    <meta name="robots" content="index, follow">
    <meta name="robots" content="noarchive">

    <!-- Mô tả -->
    <meta name="description" content="{{ $settings['site_description'] ?? 'Shop Hải Phòng LIFE - Nơi chia sẻ thông tin, sản phẩm và dịch vụ chất lượng tại Hải Phòng' }}">

    <!-- Ngày tạo -->
    <meta http-equiv="date" content="{{ \Carbon\Carbon::parse('2025-06-11 13:10:59')->format('d/m/y') }}" />

    <!-- Charset & viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Ngôn ngữ -->
    <meta name="language" content="{{ $settings['site_language'] }}">
    <meta name="copyright" content="{{ $settings['seo_author'] }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $settings['site_title'] ?? $settings['site_name'] }}">
    <meta property="og:description" content="{{ $settings['site_description'] ?? 'Khám phá cuộc sống và sản phẩm tại Hải Phòng cùng chúng tôi' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('/clients/assets/img/business/' . ($settings['site_banner'] ?? $settings['site_logo'])) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $settings['site_title'] ?? $settings['site_name'] }}">
    <meta property="og:image:type" content="image/webp">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $settings['site_name'] }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ $settings['site_name'] }}">
    <meta name="twitter:title" content="{{ $settings['site_title'] ?? $settings['site_name'] }}">
    <meta name="twitter:description" content="{{ $settings['site_description'] ?? 'Thông tin cập nhật về sản phẩm và dịch vụ chất lượng tại Hải Phòng' }}">
    <meta name="twitter:image" content="{{ asset('/clients/assets/img/business/' . ($settings['site_banner'] ?? $settings['site_logo'])) }}">
    <meta name="twitter:creator" content="{{ $settings['site_name'] }}">

    <!-- Canonical & hreflang -->
    <link rel="canonical" href="{{ $settings['site_url'] }}">
    <link rel="alternate" hreflang="vi" href="{{ $settings['site_url'] }}">
    <link rel="alternate" hreflang="x-default" href="{{ $settings['site_url'] }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/clients/assets/img/business/' . $settings['site_favicon']) }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/clients/assets/img/business/' . $settings['site_favicon']) }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/clients/assets/img/business/' . $settings['site_favicon']) }}?v={{ time() }}">
    <link rel="mask-icon" href="{{ asset('/clients/assets/img/business/' . $settings['site_favicon']) }}?v={{ time() }}" color="#5bbad5">
    <link rel="icon" href="{{ asset('/clients/assets/img/business/' . $settings['site_favicon']) }}?v={{ time() }}" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">

    <!-- Bảo mật -->
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
@endsection

@section('foot')
    <script src="{{ asset('clients/assets/js/home.js') }}"></script>
@endsection

@section('schema')
    @include('clients.templates.schemaHome')
@endsection

@section('content')
    <main class="shop_haiphonglife_main">
        <!-- Banner - Slider -->
        <section>
            <div class="shop__haiphonglife_main_slider">
                <div class="shop__haiphonglife_main_slider_prev">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM215 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L392 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-214.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L103 273c-9.4-9.4-9.4-24.6 0-33.9L215 127z" />
                    </svg>
                </div>

                <div class="shop__haiphonglife_main_slider_main">
                    <div class="shop__haiphonglife_main_slider_track">
                        @foreach ($banners as $key => $banner)
                            <div class="shop__haiphonglife_main_slider_item">
                                <img {{ $key === 0 ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"' }} class="shop__haiphonglife_main_slider_item_img"
                                    src="{{ asset('/clients/assets/img/banners/'. $banner->image) }}" alt="{{ $banner->title }}" title="{{ $banner->title }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="shop__haiphonglife_main_slider_dots">
                        <div class="shop__haiphonglife_main_slider_dot shop__haiphonglife_main_slider_dot_active"></div>
                        <div class="shop__haiphonglife_main_slider_dot"></div>
                        <div class="shop__haiphonglife_main_slider_dot"></div>
                    </div>
                </div>

                <div class="shop__haiphonglife_main_slider_next">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM297 385c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l71-71L120 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l214.1 0-71-71c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L409 239c9.4 9.4 9.4 24.6 0 33.9L297 385z" />
                    </svg>
                </div>
            </div>
        </section>

        <hr>

        <!-- Danh mục nổi bật -->
        <section class="shop__haiphonglife_main_categories">
            <div class="shop__haiphonglife_main_categories_title">
                <h2 class="shop__haiphonglife_main_categories_title_name">Danh mục nổi bật</h2>
                <ul class="shop__haiphonglife_main_categories_title_parent">
                    @foreach ($categories as $category)
                        <li><a href="/{{ $category->slug }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <div class="shop__haiphonglife_main_categories_title_actions">
                    <div class="shop__haiphonglife_main_categories_title_actions_prev">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3l0-57.7 96 0c17.7 0 32-14.3 32-32l0-32c0-17.7-14.3-32-32-32l-96 0 0-57.7c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
                        </svg>
                    </div>
                    <div class="shop__haiphonglife_main_categories_title_actions_next">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zm395.3 11.3l-112 112c-4.6 4.6-11.5 5.9-17.4 3.5s-9.9-8.3-9.9-14.8l0-64-96 0c-17.7 0-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32l96 0 0-64c0-6.5 3.9-12.3 9.9-14.8s12.9-1.1 17.4 3.5l112 112c6.2 6.2 6.2 16.4 0 22.6z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="shop__haiphonglife_main_categories_list">
                @foreach ($categories as $category)
                    @foreach ($category->children as $children)
                        @php
                            $productsCategory = \App\Models\Product::active()->withAnyCategory($children->category_ids)->inRandomOrder()->limit(5);
                            // dd($productsCategory->get());
                        @endphp
                        <div class="shop__haiphonglife_main_categories_item">
                            <a href="/{{ $category->slug }}/{{ $children->slug }}">
                                <img class="shop__haiphonglife_main_categories_item_img"
                                    src="{{ asset('/clients/assets/img/categories/'. $children->image) }}" alt="{{ $children->name }}">
                                <h3 class="shop__haiphonglife_main_categories_item_title">{{ $children->name }}</h3>
                                <p class="shop__haiphonglife_main_categories_item_quantity">{{ count($productsCategory->get()) }} sản phẩm</p>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </section>

        <hr>

        <!-- Ảnh khuyến mãi -->
        <section>
            <div class="shop__haiphonglife_main_promotion">
                @foreach ($coupons->limit(3)->get() as $coupon)
                    <div class="shop__haiphonglife_main_promotion_item">
                        <img loading="lazy" class="shop__haiphonglife_main_promotion_item_img"
                            src="{{ asset('/clients/assets/img/banners/'. $coupon->image) }}" alt="{{ $coupon->name }}">
                        <div class="shop__haiphonglife_main_promotion_item_info">
                            <h4 class="shop__haiphonglife_main_promotion_item_info_title">{{ $coupon->name }}</h4>
                            <p class="shop__haiphonglife_main_promotion_item_info_desc">{{ $coupon->description }}</p>
                            <button class="shop__haiphonglife_main_promotion_item_info_btn">Khám phá ngay</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <hr>

        <!-- Sản phẩm phổ biến: "🔥 Đang thịnh hành", "🛒 Được tìm kiếm nhiều nhất", "⭐ Sản phẩm nổi bật" -->
        <section>
            <div class="shop__haiphonglife_main_popular_products">
                <div class="shop__haiphonglife_main_popular_products_title">
                    <h2 class="shop__haiphonglife_main_popular_products_title_name">Sản phẩm phổ biến</h2>
                    <div class="shop__haiphonglife_main_popular_products_title_view_all">
                        <a class="shop__haiphonglife_main_popular_products_title_view_all_active"
                            href="/">Xem tất cả</a>
                        @foreach ($categories as $category)
                            <a href="/{{ $category->slug }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="shop__haiphonglife_main_popular_products_list">
                    @foreach ($productsFeatured as $product)
                        <div class="shop__haiphonglife_main_popular_products_item">
                            <div class="shop__haiphonglife_main_popular_products_item_label">
                                <span class="shop__haiphonglife_main_popular_products_item_label_text">🔥 Đang thịnh
                                    hành</span>
                            </div>
                            <div class="shop__haiphonglife_main_popular_products_item_img">
                                <img loading="lazy" width="160px" height="160px"
                                    class="shop__haiphonglife_main_popular_products_item_img_img"
                                    src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" alt="{{ $product->primary_image->title }}">
                                <a class="shop__haiphonglife_main_popular_products_item_img_khung" href="/san-pham/{{ $product->slug }}">
                                    <img loading="lazy" width="160px" height="160px"
                                        src="{{ asset('/clients/assets/img/frame/'.$product->frame ) }}" alt="Khung ảnh sản phẩm" title="{{ $product->name }}">
                                </a>
                            </div>
                            <div class="shop__haiphonglife_main_popular_products_item_info">
                                <h4 class="shop__haiphonglife_main_popular_products_item_info_category">{{ $product->categories->last()->name }}</h4>
                                <a href="/san-pham/{{ $product->slug }}">
                                    <h3 class="shop__haiphonglife_main_popular_products_item_info_title">{{ $product->name }}</h3>
                                </a>
                                <!-- <p class="shop__haiphonglife_main_popular_products_item_info_desc">Mô tả sản phẩm 1</p> -->
                                <div class="shop__haiphonglife_main_popular_products_item_info_rating">
                                    <span class="shop__haiphonglife_main_popular_products_item_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                            
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_popular_products_item_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_popular_products_item_info_price">
                                    <span class="shop__haiphonglife_main_popular_products_item_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span class="shop__haiphonglife_main_popular_products_item_info_price_old">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                                </div>
                                <div class="shop__haiphonglife_main_popular_products_item_info_actions">
                                    <button
                                        class="shop__haiphonglife_main_popular_products_item_info_actions_add_to_cart">Thêm
                                        vào giỏ hàng</button>
                                    <button
                                        class="shop__haiphonglife_main_popular_products_item_info_actions_wishlist">Yêu
                                        thích</button>
                                    <button
                                        class="shop__haiphonglife_main_popular_products_item_info_actions_compare">So
                                        sánh</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <hr>

        <!-- Sản phẩm bán chạy -->
        <section>
            <div class="shop__haiphonglife_main_product_bestseller">
                <div class="shop__haiphonglife_main_product_bestseller_title">
                    <h3 class="shop__haiphonglife_main_product_bestseller_title_name">
                        Sản phẩm bán chạy
                    </h3>
                </div>
                <div class="shop__haiphonglife_main_product_bestseller_banner">
                    <img loading="lazy" class="shop__haiphonglife_main_product_bestseller_banner_img" src="{{ asset('/clients/assets/img/banners/'. $bannerBestSelling->image) }}" alt="{{ $bannerBestSelling->title }}">
                </div>

                <div class="shop__haiphonglife_main_product_bestseller_content">
                    <div class="shop__haiphonglife_main_product_bestseller_content_items">
                        @foreach ($productsBestSeller as $product)
                            <div class="shop__haiphonglife_main_product_bestseller_content_items_item">
                                <div class="shop__haiphonglife_main_product_bestseller_content_items_item_label">
                                    <span
                                        class="shop__haiphonglife_main_product_bestseller_content_items_item_label_text">🔥
                                        Đang
                                        thịnh
                                        hành</span>
                                </div>
                                <div class="shop__haiphonglife_main_product_bestseller_content_items_item_img">
                                    <img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}">
                                </div>
                                <div class="shop__haiphonglife_main_product_bestseller_content_items_item_info">
                                    <h4 class="shop__haiphonglife_main_product_bestseller_content_items_item_info_category">{{ $product->categories->last()->name }}</h4>
                                    <h3 class="shop__haiphonglife_main_product_bestseller_content_items_item_info_title">{{ $product->name }}</h3>
                                    <div
                                        class="shop__haiphonglife_main_product_bestseller_content_items_item_info_rating">
                                        <span class="shop__haiphonglife_main_product_bestseller_content_items_item_info_rating_star">
                                            @php
                                                $avgProductFeatured = $product->averageRating();
                                                if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                    for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                        echo "⭐";
                                                    }
                                                } else {
                                                    echo "⭐⭐⭐⭐⭐";
                                                }
                                                
                                            @endphp
                                        </span>
                                        <span
                                            class="shop__haiphonglife_main_product_bestseller_content_items_item_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                    </div>
                                    <div
                                        class="shop__haiphonglife_main_product_bestseller_content_items_item_info_price">
                                        <span class="shop__haiphonglife_main_product_bestseller_content_items_item_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        <span class="shop__haiphonglife_main_product_bestseller_content_items_item_info_price_old">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div
                                        class="shop__haiphonglife_main_product_bestseller_content_items_item_info_actions">
                                        <button
                                            class="shop__haiphonglife_main_product_bestseller_content_items_item_info_actions_add_to_cart">Thêm
                                            vào giỏ hàng</button>
                                        <button
                                            class="shop__haiphonglife_main_product_bestseller_content_items_item_info_actions_wishlist">Yêu
                                            thích</button>
                                        <button
                                            class="shop__haiphonglife_main_product_bestseller_content_items_item_info_actions_compare">So
                                            sánh</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="shop__haiphonglife_main_product_bestseller_content_pagination">
                        <button
                            class="shop__haiphonglife_main_product_bestseller_content_pagination_prev">Trước</button>
                        <button
                            class="shop__haiphonglife_main_product_bestseller_content_pagination_next">Sau</button>
                    </div>
                </div>
            </div>
        </section>

        <hr>

        <!-- Sản phẩm bán trong ngày -->
        <section>
            <div class="shop__haiphonglife_main_product_daily_deals">
                <div class="shop__haiphonglife_main_product_daily_deals_title">
                    <h3 class="shop__haiphonglife_main_product_daily_deals_title_name">Sản phẩm đã bán hôm nay</h3>
                </div>
                <div class="shop__haiphonglife_main_product_daily_deals_products">
                    @foreach ($productsTodayOrdered as $product)
                        <div class="shop__haiphonglife_main_product_daily_deals_items">
                            <div class="shop__haiphonglife_main_product_daily_deals_items_img">
                                <img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}">
                            </div>
                            <div class="shop__haiphonglife_main_product_daily_deals_items_info">
                                <h4 class="shop__haiphonglife_main_product_daily_deals_items_info_category">
                                    <a href="/{{ $product->categories->first()->slug }}">{{ $product->categories->first()->name }}</a>
                                </h4>
                                <h3 class="shop__haiphonglife_main_product_daily_deals_items_info_title">
                                    <a href="/san-pham/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                {{-- <p class="shop__haiphonglife_main_product_daily_deals_items_info_desc">
                                    {{ $product->meta_desc }}
                                </p> --}}
                                <div class="shop__haiphonglife_main_product_daily_deals_items_info_rating">
                                    <span class="shop__haiphonglife_main_product_daily_deals_items_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_product_daily_deals_items_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_product_daily_deals_items_info_price">
                                        <span class="shop__haiphonglife_main_product_daily_deals_items_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        <span class="shop__haiphonglife_main_product_daily_deals_items_info_price_old">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                                    </div>
                                <div class="shop__haiphonglife_main_product_daily_deals_items_info_actions">
                                    <button
                                        class="shop__haiphonglife_main_product_daily_deals_items_info_actions_add_to_cart">Thêm
                                        vào giỏ hàng</button>
                                    <button
                                        class="shop__haiphonglife_main_product_daily_deals_items_info_actions_wishlist">Yêu
                                        thích</button>
                                    <button
                                        class="shop__haiphonglife_main_product_daily_deals_items_info_actions_compare">So
                                        sánh</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <hr>

        <!-- Sản phẩm trưng bày -->
        <section>
            <div class="shop__haiphonglife_main_showcase">
                <div class="shop__haiphonglife_main_showcase_products">
                    <div class="shop__haiphonglife_main_showcase_products_title">
                        <h4 class="shop__haiphonglife_main_showcase_products_title_name">Nổi bật</h4>
                    </div>
                    @foreach ($products->where('is_featured', true)->limit(6)->get() as $product)
                        <div class="shop__haiphonglife_main_showcase_products_items">
                            <div class="shop__haiphonglife_main_showcase_products_items_img">
                                <a href="/"><img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}"></a>
                            </div>
                            <div class="shop__haiphonglife_main_showcase_products_items_info">
                                <h3 class="shop__haiphonglife_main_showcase_products_items_info_title"><a href="/">{{ $product->name }}</a></h3>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_rating">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_price">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_old">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="shop__haiphonglife_main_showcase_products">
                    <div class="shop__haiphonglife_main_showcase_products_title">
                        <h4 class="shop__haiphonglife_main_showcase_products_title_name">Bán chạy</h4>
                    </div>
                    @foreach ($products->where('is_best_seller', true)->limit(6)->get() as $product)
                        <div class="shop__haiphonglife_main_showcase_products_items">
                            <div class="shop__haiphonglife_main_showcase_products_items_img">
                                <a href="/"><img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}"></a>
                            </div>
                            <div class="shop__haiphonglife_main_showcase_products_items_info">
                                <h3 class="shop__haiphonglife_main_showcase_products_items_info_title"><a href="/">{{ $product->name }}</a></h3>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_rating">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_price">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_old">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="shop__haiphonglife_main_showcase_products">
                    <div class="shop__haiphonglife_main_showcase_products_title">
                        <h4 class="shop__haiphonglife_main_showcase_products_title_name">Giảm giá sốc</h4>
                    </div>
                    @foreach ($products->where('is_on_sale', true)->limit(6)->get() as $product)
                        <div class="shop__haiphonglife_main_showcase_products_items">
                            <div class="shop__haiphonglife_main_showcase_products_items_img">
                                <a href="/"><img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}"></a>
                            </div>
                            <div class="shop__haiphonglife_main_showcase_products_items_info">
                                <h3 class="shop__haiphonglife_main_showcase_products_items_info_title"><a href="/">{{ $product->name }}</a></h3>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_rating">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_price">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_old">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="shop__haiphonglife_main_showcase_products">
                    <div class="shop__haiphonglife_main_showcase_products_title">
                        <h4 class="shop__haiphonglife_main_showcase_products_title_name">Hàng mới về</h4>
                    </div>
                    @foreach ($products->where('is_new', true)->limit(6)->get() as $product)
                        <div class="shop__haiphonglife_main_showcase_products_items">
                            <div class="shop__haiphonglife_main_showcase_products_items_img">
                                <a href="/"><img loading="lazy" src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}"></a>
                            </div>
                            <div class="shop__haiphonglife_main_showcase_products_items_info">
                                <h3 class="shop__haiphonglife_main_showcase_products_items_info_title"><a href="/">{{ $product->name }}</a></h3>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_rating">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_star">
                                        @php
                                            $avgProductFeatured = $product->averageRating();
                                            if ($avgProductFeatured !== null && $avgProductFeatured > 0  && $avgProductFeatured <= 5  && $avgProductFeatured % 1 == 0  && $avgProductFeatured) {
                                                for ($i = 1; $i <= round($avgProductFeatured); $i++) {
                                                    echo "⭐";
                                                }
                                            } else {
                                                echo "⭐⭐⭐⭐⭐";
                                            }
                                        @endphp
                                    </span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_rating_count"><a href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                </div>
                                <div class="shop__haiphonglife_main_showcase_products_items_info_price">
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span class="shop__haiphonglife_main_showcase_products_items_info_price_old">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <hr>

        @include('clients.templates.call')

        <hr>

        <!-- Tính năng nổi bật -->
        <section>
            <div class="shop__haiphonglife_main_features_highlight">
                <div class="shop__haiphonglife_main_features_highlight_items">
                    <div class="shop__haiphonglife_main_features_highlight_items_item">
                        <img loading="lazy" src="{{ asset('/clients/assets/img/other/giao-hang-free-re8243t34.png') }}" alt="🚚 Miễn phí vận chuyển">
                        <h3 class="shop__haiphonglife_main_features_highlight_items_item_title">🚚 Miễn phí vận chuyển</h3>
                        <p class="shop__haiphonglife_main_features_highlight_items_item_desc">Tận hưởng giao hàng miễn phí cho mọi đơn hàng từ 1.000.000 VNĐ, giúp bạn tiết kiệm tối đa chi phí.</p>
                    </div>
                    <div class="shop__haiphonglife_main_features_highlight_items_item">
                        <img loading="lazy" src="{{ asset('/clients/assets/img/other/ho-tro-24-7-398fhf384hf.jpg') }}" alt="🤝 Hỗ trợ khách hàng 24/7">
                        <h3 class="shop__haiphonglife_main_features_highlight_items_item_title">🤝 Hỗ trợ khách hàng 24/7</h3>
                        <p class="shop__haiphonglife_main_features_highlight_items_item_desc">Đội ngũ hỗ trợ khách hàng luôn sẵn sàng giúp đỡ bạn.</p>
                    </div>
                    <div class="shop__haiphonglife_main_features_highlight_items_item">
                        <img loading="lazy" src="{{ asset('/clients/assets/img/other/chinh_sach_doi_tra_hang-3489yfurhf34.jpg') }}" alt="🔁 Chính sách đổi trả linh hoạt">
                        <h3 class="shop__haiphonglife_main_features_highlight_items_item_title">🔁 Chính sách đổi trả linh hoạt</h3>
                        <p class="shop__haiphonglife_main_features_highlight_items_item_desc">Dễ dàng hoàn trả sản phẩm trong vòng 30 ngày nếu có vấn đề phát sinh – không cần lý do phức tạp.</p>
                    </div>
                    <div class="shop__haiphonglife_main_features_highlight_items_item">
                        <img loading="lazy" src="{{ asset('/clients/assets/img/other/cam-ket-hang-chinh-hang-4387fy8734.png') }}" alt="🏷️ Cam kết chính hãng">
                        <h3 class="shop__haiphonglife_main_features_highlight_items_item_title">🏷️ Cam kết chính hãng</h3>
                        <p class="shop__haiphonglife_main_features_highlight_items_item_desc">Tất cả sản phẩm đều đảm bảo 100% chính hãng, có hóa đơn và nguồn gốc xuất xứ rõ ràng.</p>
                    </div>
                    <div class="shop__haiphonglife_main_features_highlight_items_item">
                        <img loading="lazy" src="{{ asset('/clients/assets/img/other/hinh-thuc-thanh-toan-an-toan-348yy82y4rf.jpg') }}" alt="💳 Thanh toán an toàn">
                        <h3 class="shop__haiphonglife_main_features_highlight_items_item_title">💳 Thanh toán an toàn</h3>
                        <p class="shop__haiphonglife_main_features_highlight_items_item_desc">Hỗ trợ nhiều phương thức thanh toán linh hoạt và bảo mật tuyệt đối thông tin khách hàng.</p>
                    </div>
                </div>
            </div>
        </section>

        @include('clients.templates.chat')
    </main>
@endsection