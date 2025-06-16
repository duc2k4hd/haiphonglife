@extends('clients.layouts.master')

@section('title', 'Shop Hải Phòng LIFE – Đồ đẹp, đồ xịn, đồ chuẩn người Hải Phòng')

@section('head')
    <link rel="stylesheet" href="{{ asset('clients/assets/css/shop.css') }}">
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
    <link rel="canonical" href="{{ $settings['site_url'] }}/san-pham/{{ $product->slug }}">
    <link rel="alternate" hreflang="vi" href="{{ $settings['site_url'] }}/san-pham/{{ $product->slug }}">
    <link rel="alternate" hreflang="x-default" href="{{ $settings['site_url'] }}/san-pham/{{ $product->slug }}">

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
    <script src="{{ asset('clients/assets/js/shop.js') }}"></script>
@endsection

@section('schema')
    @include('clients.templates.schemaHome')
@endsection

@section('content')
    <main class="shop_haiphonglife_shop">
        <!-- Breadcrumb -->
        <section>
            <div class="shop_haiphonglife_shop_breadcrumb">
                <a href="#">Trang chủ</a>
                <span class="separator">>></span>
                <a href="#">Sản phẩm</a>
                <span class="separator">>></span>
                <span>Sản phẩm</span>
            </div>
        </section>

        <!-- Banner -->
        <section>
            <div class="shop_haiphonglife_shop_banner">
                <img class="shop_haiphonglife_shop_banner_image"
                    src="/assets/img/banners/banner-shop-1024x240.png" alt="">
            </div>
        </section>

        <!-- Bộ lọc -->
        <section>
            <div class="shop_haiphonglife_shop_products">
                <div class="shop_haiphonglife_shop_products_filter">
                    <div class="shop_haiphonglife_shop_products_filter_categories">
                        <div class="shop_haiphonglife_shop_products_filter_categories_title">
                            <h3 class="shop_haiphonglife_shop_products_filter_categories_title_name">Danh mục</h3>
                        </div>
                        <div class="shop_haiphonglife_shop_products_filter_categories_content">
                            <div class="shop_haiphonglife_shop_products_filter_categories_content_category">
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_image">
                                    <img width="30px" height="30px"
                                        class="shop_haiphonglife_shop_products_filter_categories_content_category_image_img"
                                        src="" alt="">
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_text">
                                    <p>Quần</p>
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_quantity">
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="shop_haiphonglife_shop_products_filter_categories_content_category">
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_image">
                                    <img width="30px" height="30px"
                                        class="shop_haiphonglife_shop_products_filter_categories_content_category_image_img"
                                        src="" alt="">
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_text">
                                    <p>Quần</p>
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_quantity">
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="shop_haiphonglife_shop_products_filter_categories_content_category">
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_image">
                                    <img width="30px" height="30px"
                                        class="shop_haiphonglife_shop_products_filter_categories_content_category_image_img"
                                        src="" alt="">
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_text">
                                    <p>Quần</p>
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_quantity">
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="shop_haiphonglife_shop_products_filter_categories_content_category">
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_image">
                                    <img width="30px" height="30px"
                                        class="shop_haiphonglife_shop_products_filter_categories_content_category_image_img"
                                        src="" alt="">
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_text">
                                    <p>Quần</p>
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_quantity">
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="shop_haiphonglife_shop_products_filter_categories_content_category">
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_image">
                                    <img width="30px" height="30px"
                                        class="shop_haiphonglife_shop_products_filter_categories_content_category_image_img"
                                        src="" alt="">
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_text">
                                    <p>Quần</p>
                                </div>
                                <div
                                    class="shop_haiphonglife_shop_products_filter_categories_content_category_quantity">
                                    <span>10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="shop_haiphonglife_shop_products_filter_categories_form" action=""
                        method="post">
                        <!-- Bộ lọc giá -->
                        <div class="shop_haiphonglife_shop_products_filter_price">
                            <h4 class="shop_haiphonglife_shop_products_filter_price_title">Lọc theo giá</h4>
                            <div class="shop_haiphonglife_shop_products_filter_price_content">
                                <label>
                                    <input type="checkbox" name="price" value="0-500" />
                                    Dưới 500.000 VNĐ
                                </label>
                                <label>
                                    <input type="checkbox" name="price" value="500-1000" />
                                    500.000 VNĐ - 1.000.000 VNĐ
                                </label>
                                <label>
                                    <input type="checkbox" name="price" value="1000-2000" />
                                    1.000.000 VNĐ - 2.000.000 VNĐ
                                </label>
                                <label>
                                    <input type="checkbox" name="price" value="2000+" />
                                    Trên 2.000.000 VNĐ
                                </label>
                            </div>
                        </div>

                        <!-- Bộ lọc màu sắc -->
                        <div class="shop_haiphonglife_shop_products_filter_color">
                            <h4 class="shop_haiphonglife_shop_products_filter_color_title">Lọc theo màu sắc
                            </h4>
                            <div class="shop_haiphonglife_shop_products_filter_color_content">
                                <label>
                                    <input type="checkbox" name="color" value="black" />
                                    Đen
                                </label>
                                <label>
                                    <input type="checkbox" name="color" value="white" />
                                    Trắng
                                </label>
                                <label>
                                    <input type="checkbox" name="color" value="blue" />
                                    Xanh
                                </label>
                                <label>
                                    <input type="checkbox" name="color" value="red" />
                                    Đỏ
                                </label>
                                <label>
                                    <input type="checkbox" name="color" value="yellow" />
                                    Vàng
                                </label>
                            </div>
                        </div>

                        <!-- Bộ lọc size -->
                        <div class="shop_haiphonglife_shop_products_filter_size">
                            <h4 class="shop_haiphonglife_shop_products_filter_size_title">Lọc theo kích cỡ
                            </h4>
                            <div class="shop_haiphonglife_shop_products_filter_size_content">
                                <label>
                                    <input type="checkbox" name="size" value="S" />
                                    Size S
                                </label>
                                <label>
                                    <input type="checkbox" name="size" value="M" />
                                    Size M
                                </label>
                                <label>
                                    <input type="checkbox" name="size" value="L" />
                                    Size L
                                </label>
                                <label>
                                    <input type="checkbox" name="size" value="XL" />
                                    Size XL
                                </label>
                                <label>
                                    <input type="checkbox" name="size" value="XXL" />
                                    Size XXL
                                </label>
                            </div>
                        </div>
                    </form>
                    <div class="shop_haiphonglife_shop_products_filter_new_products">
                        <div class="shop_haiphonglife_shop_products_filter_new_products_item">
                            <div class="shop_haiphonglife_shop_products_filter_new_products_item_image">
                                <img class="shop_haiphonglife_shop_products_filter_new_products_item_image_img"
                                    src="" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_filter_new_products_item_info">
                                <h4 class="shop_haiphonglife_shop_products_filter_new_products_item_info_title">ÁO
                                    SƠ MI NAM TAY DÀI VÂN ĐÔI MÀU TRẮNG/ĐEN CO GIÃN, THẤM HÚT TỐT, XXL, STYLE HÀN
                                    QUỐC</h4>
                                <p class="shop_haiphonglife_shop_products_filter_new_products_item_info_price">
                                    99.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shop_haiphonglife_shop_products_content">
                    <div class="shop_haiphonglife_shop_products_content_filter">
                        <div class="shop_haiphonglife_shop_products_content_filter_total">
                            Tổng <span>200</span> sản phẩm
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_filter_select">
                            <div class="shop_haiphonglife_shop_products_content_filter_select_sort">
                                <label for="sort">Sắp xếp theo:</label>
                                <select name="sort" id="sort">
                                    <option value="default">Mặc định</option>
                                    <option value="popularity">Phổ biến</option>
                                    <option value="rating">Đánh giá cao</option>
                                    <option value="price-asc">Giá: Thấp đến Cao</option>
                                    <option value="price-desc">Giá: Cao đến Thấp</option>
                                    <option value="newest">Mới nhất</option>
                                </select>
                            </div>

                            <div class="shop_haiphonglife_shop_products_content_filter_select_show">
                                <label for="show">Hiển thị:</label>
                                <select name="show" id="show">
                                    <option value="12">12 sản phẩm</option>
                                    <option value="24">24 sản phẩm</option>
                                    <option value="36">36 sản phẩm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="shop_haiphonglife_shop_products_content_list">
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_shop_products_content_list_item">
                            <div class="shop_haiphonglife_shop_products_content_list_item_label">
                                Bán chạy
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_image">
                                <img class="shop_haiphonglife_shop_products_content_list_item_image_img"
                                    src="/assets/img/clothers/demo-1.webp" alt="">
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_category">
                                <h5 class="shop_haiphonglife_shop_products_content_list_item_category_name">
                                    Áo sơ mi
                                </h5>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_title">
                                <h4 class="shop_haiphonglife_shop_products_content_list_item_title_name">
                                    Áo sơ mi nam ngắn tay màu trắng
                                </h4>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_star">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_price">
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_new">
                                    999.000đ
                                </span>
                                <span class="shop_haiphonglife_shop_products_content_list_item_price_old">
                                    1.300.000đ
                                </span>
                            </div>
                            <div class="shop_haiphonglife_shop_products_content_list_item_addtocart">
                                <button><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                                    </svg> Thêm</button>
                            </div>
                        </div>
                    </div>

                    <div class="shop_haiphonglife_shop_products_content_pagination">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M493.6 445c-11.2 5.3-24.5 3.6-34.1-4.4L288 297.7 288 416c0 12.4-7.2 23.7-18.4 29s-24.5 3.6-34.1-4.4L64 297.7 64 416c0 17.7-14.3 32-32 32s-32-14.3-32-32L0 96C0 78.3 14.3 64 32 64s32 14.3 32 32l0 118.3L235.5 71.4c9.5-7.9 22.8-9.7 34.1-4.4S288 83.6 288 96l0 118.3L459.5 71.4c9.5-7.9 22.8-9.7 34.1-4.4S512 83.6 512 96l0 320c0 12.4-7.2 23.7-18.4 29z" />
                                    </svg></a></li>
                            <li class="page-item"><a href="#" class="page-link"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                    </svg></a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                    </svg></a></li>
                            <li class="page-item"><a href="#" class="page-link"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M18.4 445c11.2 5.3 24.5 3.6 34.1-4.4L224 297.7 224 416c0 12.4 7.2 23.7 18.4 29s24.5 3.6 34.1-4.4L448 297.7 448 416c0 17.7 14.3 32 32 32s32-14.3 32-32l0-320c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 118.3L276.5 71.4c-9.5-7.9-22.8-9.7-34.1-4.4S224 83.6 224 96l0 118.3L52.5 71.4c-9.5-7.9-22.8-9.7-34.1-4.4S0 83.6 0 96L0 416c0 12.4 7.2 23.7 18.4 29z" />
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="shop__haiphonglife_chat">

                <!-- Nút cuộn lên đầu trang -->
                <div class="shop__haiphonglife_back_to_top">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M270.7 9.7C268.2 3.8 262.4 0 256 0s-12.2 3.8-14.7 9.7L197.2 112.6c-3.4 8-5.2 16.5-5.2 25.2l0 77-144 84L48 280c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 56 0 32 0 24c0 13.3 10.7 24 24 24s24-10.7 24-24l0-8 144 0 0 32.7L133.5 468c-3.5 3-5.5 7.4-5.5 12l0 16c0 8.8 7.2 16 16 16l96 0 0-64c0-8.8 7.2-16 16-16s16 7.2 16 16l0 64 96 0c8.8 0 16-7.2 16-16l0-16c0-4.6-2-9-5.5-12L320 416.7l0-32.7 144 0 0 8c0 13.3 10.7 24 24 24s24-10.7 24-24l0-24 0-32 0-56c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 18.8-144-84 0-77c0-8.7-1.8-17.2-5.2-25.2L270.7 9.7z" />
                    </svg>
                </div>

                <!-- Zalo -->
                <a href="https://zalo.me/0123456789" target="_blank" class="shop__haiphonglife_chat_zalo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                    </svg>
                </a>

                <!-- Gọi điện -->
                <a href="tel:0123456789" class="shop__haiphonglife_chat_phone">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M256.6 8C116.5 8 8 110.3 8 248.6c0 72.3 29.7 134.8 78.1 177.9 8.4 7.5 6.6 11.9 8.1 58.2A19.9 19.9 0 0 0 122 502.3c52.9-23.3 53.6-25.1 62.6-22.7C337.9 521.8 504 423.7 504 248.6 504 110.3 396.6 8 256.6 8zm149.2 185.1l-73 115.6a37.4 37.4 0 0 1 -53.9 9.9l-58.1-43.5a15 15 0 0 0 -18 0l-78.4 59.4c-10.5 7.9-24.2-4.6-17.1-15.7l73-115.6a37.4 37.4 0 0 1 53.9-9.9l58.1 43.5a15 15 0 0 0 18 0l78.4-59.4c10.4-8 24.1 4.5 17.1 15.6z" />
                    </svg>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/haiphonglife" target="_blank"
                    class="shop__haiphonglife_chat_facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M320 0c17.7 0 32 14.3 32 32l0 64 120 0c39.8 0 72 32.2 72 72l0 272c0 39.8-32.2 72-72 72l-304 0c-39.8 0-72-32.2-72-72l0-272c0-39.8 32.2-72 72-72l120 0 0-64c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224l16 0 0 192-16 0c-26.5 0-48-21.5-48-48l0-96c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-16 0 0-192 16 0z" />
                    </svg>
                </a>
            </div>
        </section>
    </main>
@endsection