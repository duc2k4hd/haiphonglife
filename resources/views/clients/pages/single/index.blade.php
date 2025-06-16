@extends('clients.layouts.master')

@section('title', $product->name)

@section('head')
    <link rel="stylesheet" href="{{ asset('clients/assets/css/single.css') }}">
    @if ($product->primaryImage->count() > 0)
        <link rel="preload" as="image" href="{{ asset('/clients/assets/img/clothers/'. $product->primaryImage->url) }}" fetchpriority="high">
    @endif
    <!-- Từ khóa SEO -->
    <meta name="keywords" content="{{ is_array($product->seo_keywords) ? implode(', ', $product->seo_keywords) : '' }}">

    <!-- Tên tác giả -->
    <meta name="author" content="{{ $settings['seo_author'] }}">

    <!-- Thẻ robots -->
    <meta name="robots" content="index, follow">
    <meta name="robots" content="noarchive">

    <!-- Mô tả -->
    <meta name="description" content="{{ $product->meta_desc ?? $product->meta_title ?? $product->name }}">

    <!-- Ngày tạo -->
    <meta http-equiv="date" content="{{ \Carbon\Carbon::parse('2025-06-11 13:10:59')->format('d/m/y') }}" />

    <!-- Charset & viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Ngôn ngữ -->
    <meta name="language" content="{{ $settings['site_language'] }}">
    <meta name="copyright" content="{{ $settings['seo_author'] }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $product->name ?? $settings['subname'] }}">
    <meta property="og:description" content="{{ $settings['site_description'] ?? 'Khám phá cuộc sống và sản phẩm tại Hải Phòng cùng chúng tôi' }}">
    <meta property="og:url" content="{{ $product->canonical_url }}">
    <meta property="og:image" content="{{ asset('/clients/assets/img/business/' . ($settings['site_banner'] ?? $settings['site_logo'])) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $product->primaryImage->title ?? $product->name ?? $settings['site_name'] }}">
    <meta property="og:image:type" content="image/webp">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $settings['site_name'] }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ $settings['site_name'] }}">
    <meta name="twitter:title" content="{{ $product->name ?? $settings['subname'] }}">
    <meta name="twitter:description" content="{{ $product->site_desc ?? 'Thông tin cập nhật về sản phẩm và dịch vụ chất lượng tại Hải Phòng' }}">
    <meta name="twitter:image" content="{{ asset('/clients/assets/img/clothers/' . $product->primaryImage->url) }}">
    <meta name="twitter:creator" content="{{ $settings['seo_author'] }}">

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
    <script src="{{ asset('clients/assets/js/single.js') }}"></script>
@endsection

@section('schema')
    @include('clients.templates.schemaHome')
@endsection

@section('content')
    <main class="shop_haiphonglife_single">
        <!-- Breadcrumb -->
        <section>
            <div class="shop_haiphonglife_single_breadcrumb">
                <a href="{{ $settings['site_url'] }}">Trang chủ</a>
                <span class="separator">>></span>
                <a href="{{ $settings['site_url'] }}/shop">Sản phẩm</a>
                <span class="separator">>></span>
                <span>{{ $product->name }}</span>
            </div>
        </section>

        <!-- Thông tin sản phẩm -->
        <section>
            <div itemscope itemtype="https://schema.org/Product" class="shop_haiphonglife_single_info">
                <div class="shop_haiphonglife_single_info_images">
                    <div class="shop_haiphonglife_single_info_images_main">
                        <img loading="eager" fetchpriority="high" itemprop="image" width="400px" height="400px" src="{{ asset('/clients/assets/img/clothers/'. $product->primaryImage->url) }}" alt="{{ $product->primaryImage->alt }}" title="{{ $product->primaryImage->title }}" class="shop_haiphonglife_single_info_images_main_image">
                    </div>
                    <div class="shop_haiphonglife_single_info_images_gallery">
                        @foreach ($product->images as $image)
                            <img width="80px" height="80px" src="{{ asset('/clients/assets/img/clothers/'. $image->url) }}" alt="{{ $image->alt }}" title="{{ $image->title }}" class="shop_haiphonglife_single_info_images_gallery_image {{ $image->is_primary === true ? 'shop_haiphonglife_single_info_images_gallery_image_active' : '' }}">
                        @endforeach
                    </div>
                    <div class="shop_haiphonglife_single_info_images_support">
                        <form class="shop_haiphonglife_single_info_images_support_form" action="" method="post">
                            <div class="shop_haiphonglife_single_info_images_support_form_group">
                                <input type="text" name="" id="" class="shop_haiphonglife_single_info_images_support_form_group_input">
                                <button class="shop_haiphonglife_single_info_images_support_form_group_btn">Gửi yêu cầu</button>
                            </div>
                            <div class="shop_haiphonglife_single_info_images_support_form_notice">
                                <p class="shop_haiphonglife_single_info_images_support_form_notice_text">Để lại số điện thoại, chúng tôi sẽ tư vấn cho bạn</p>
                            </div>
                        </form>
                    </div>
                    <div class="shop_haiphonglife_single_info_images_tags">
                        <h6 class="shop_haiphonglife_single_info_images_tags_title">Từ khóa: </h6>
                        @foreach ($product->tags as $tag)
                            <a href="#"><span class="shop_haiphonglife_single_info_images_tags_tag">{{ $tag->name }}</span></a>
                        @endforeach
                    </div>
                </div>

                <div class="shop_haiphonglife_single_info_specifications">
                    @if ($product->price && $product->price > 0 && $product->old_price && $product->old_price > 0 && $product->price < $product->old_price)
                        <p class="shop_haiphonglife_single_info_specifications_sale">-{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }}%</p>
                    @else
                        <p class="shop_haiphonglife_single_info_specifications_sale">{{ $product->label }}</p>
                    @endif
                    <h1 itemprop="title" class="shop_haiphonglife_single_info_specifications_title">{{ $product->name }}</h1>
                    <p itemprop="sku" class="shop_haiphonglife_single_info_specifications_sku">Mã sản phẩm: {{ $product->sku }}</p>
                    <p itemprop="brand" class="shop_haiphonglife_single_info_specifications_brand">Thương hiệu: {{ $product->brand->name }}</p>
                    <p class="shop_haiphonglife_single_info_specifications_star">⭐⭐⭐⭐⭐</p>
                    <p class="shop_haiphonglife_single_info_specifications_price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                        @if ($product->price && $product->price > 0 && $product->old_price && $product->old_price > 0 && $product->price < $product->old_price)
                            <meta itemprop="priceCurrency" content="VND">
                            <span class="shop_haiphonglife_single_info_specifications_new_price" itemprop="price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            
                            <meta itemprop="priceValidUntil" content="2025-12-31" />
                            <span class="shop_haiphonglife_single_info_specifications_old_price" style="text-decoration:line-through;">{{ number_format($product->old_price, 0, ',', '.') }}₫</span>
                        @else
                            <meta itemprop="priceCurrency" content="VND">
                            <span class="shop_haiphonglife_single_info_specifications_new_price" itemprop="price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                        @endif
                    </p>
                    <hr>
                    <div itemprop="description" class="shop_haiphonglife_single_info_specifications_desc">
                        {!! $product->short_desc ?? 'Chưa có thông tin chi tiết.' !!}
                    </div>
                    <hr>
                    @php
                        $variants = $product->productVariants;
                        $sizes = $variants->pluck('size')->unique()->filter()->values();
                        $colors = $variants->pluck('color')->unique()->filter()->values();
                    @endphp

                    @if ($variants->isNotEmpty())
                        @if ($sizes->isNotEmpty())
                            <div class="shop_haiphonglife_single_info_specifications_sizes">
                                <span class="shop_haiphonglife_single_info_specifications_sizes_label">Chọn size:</span>
                                @foreach ($sizes as $size)
                                    <span class="shop_haiphonglife_single_info_specifications_size_option">{{ $size }}</span>
                                @endforeach
                            </div>
                        @endif

                        @if ($colors->isNotEmpty())
                            <div class="shop_haiphonglife_single_info_specifications_colors">
                                <span class="shop_haiphonglife_single_info_specifications_colors_label">Chọn màu:</span>
                                @foreach ($colors as $color)
                                    <span class="shop_haiphonglife_single_info_specifications_size_option">{{ $color }}</span>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <p class="shop_haiphonglife_single_info_specifications_no_variants">
                            Chưa có size và màu sản phẩm.
                        </p>
                    @endif
                    <div class="shop_haiphonglife_single_info_specifications_actions">
                        <form class="shop_haiphonglife_single_info_specifications_actions_form" action="" method="post">
                            <input value="1" type="number" min="1" max="100" name="" id="" class="shop_haiphonglife_single_info_specifications_actions_form_quantity">
                            <button class="shop_haiphonglife_single_info_specifications_actions_form_submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z"/></svg> Thêm vào giỏ
                            </button>
                            <div class="shop_haiphonglife_single_info_specifications_actions_form_wishlish">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="shop_haiphonglife_single_info_policy">
                    <div class="shop_haiphonglife_single_info_policy_return">
                        <div class="shop_haiphonglife_single_info_policy_return_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z"/></svg>
                        </div>
                        <div class="shop_haiphonglife_single_info_policy_return_desc">
                            <p>Đổi sản phẩm tùy thích trong 3 ngày đầu (kể cả không có lỗi).</p>
                        </div>
                    </div>
                    <div class="shop_haiphonglife_single_info_policy_warranty">
                        <div class="shop_haiphonglife_single_info_policy_warranty_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28zM429.5 251.9c15-9 34.4-4.3 43.6 10.5l24.4 39.1c9.4 15.1 14.4 32.4 14.6 50.2c.3 53.1-42.7 96.4-95.8 96.4L320 448l0 32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 32 96.2 0c17.6 0 31.9-14.4 31.8-32c0-5.9-1.7-11.7-4.8-16.7l-24.4-39.1c-9.5-15.2-4.7-35.2 10.7-44.4zm-364.6-31L36 204.2c-8.4-4.9-13.1-14.3-11.8-23.9s8.2-17.5 17.6-20l87.4-23.4c12.8-3.4 26 4.2 29.4 17L182 241.2c2.5 9.4-.9 19.3-8.6 25.3s-18.2 6.6-26.6 1.7l-26.5-15.3L68.8 335.3c-3.1 5-4.8 10.8-4.8 16.7c-.1 17.6 14.2 32 31.8 32l32.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32.2 0C42.7 448-.3 404.8 0 351.6c.1-17.8 5.1-35.1 14.6-50.2l50.3-80.5z"/></svg>
                        </div>
                        <div class="shop_haiphonglife_single_info_policy_warranty_desc">
                            <p>Bảo hành 13 tháng với lỗi nhà sản xuất (lỗi là đổi, không sửa chữa).</p>
                        </div>
                    </div>
                    <div class="shop_haiphonglife_single_info_policy_freeship">
                        <div class="shop_haiphonglife_single_info_policy_freeship_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M174.7 45.1C192.2 17 223 0 256 0s63.8 17 81.3 45.1l38.6 61.7 27-15.6c8.4-4.9 18.9-4.2 26.6 1.7s11.1 15.9 8.6 25.3l-23.4 87.4c-3.4 12.8-16.6 20.4-29.4 17l-87.4-23.4c-9.4-2.5-16.3-10.4-17.6-20s3.4-19.1 11.8-23.9l28.4-16.4L283 79c-5.8-9.3-16-15-27-15s-21.2 5.7-27 15l-17.5 28c-9.2 14.8-28.6 19.5-43.6 10.5c-15.3-9.2-20.2-29.2-10.7-44.4l17.5-28zM429.5 251.9c15-9 34.4-4.3 43.6 10.5l24.4 39.1c9.4 15.1 14.4 32.4 14.6 50.2c.3 53.1-42.7 96.4-95.8 96.4L320 448l0 32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2l0 32 96.2 0c17.6 0 31.9-14.4 31.8-32c0-5.9-1.7-11.7-4.8-16.7l-24.4-39.1c-9.5-15.2-4.7-35.2 10.7-44.4zm-364.6-31L36 204.2c-8.4-4.9-13.1-14.3-11.8-23.9s8.2-17.5 17.6-20l87.4-23.4c12.8-3.4 26 4.2 29.4 17L182 241.2c2.5 9.4-.9 19.3-8.6 25.3s-18.2 6.6-26.6 1.7l-26.5-15.3L68.8 335.3c-3.1 5-4.8 10.8-4.8 16.7c-.1 17.6 14.2 32 31.8 32l32.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32.2 0C42.7 448-.3 404.8 0 351.6c.1-17.8 5.1-35.1 14.6-50.2l50.3-80.5z"/></svg>
                        </div>
                        <div class="shop_haiphonglife_single_info_policy_freeship_desc">
                            <p>Miễn phí ship với đơn hàng từ 500k.</p>
                        </div>
                    </div>
                    <div class="shop_haiphonglife_single_info_policy_payment">
                        <div class="shop_haiphonglife_single_info_policy_payment_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M112 112c0 35.3-28.7 64-64 64l0 160c35.3 0 64 28.7 64 64l352 0c0-35.3 28.7-64 64-64l0-160c-35.3 0-64-28.7-64-64l-352 0zM0 128C0 92.7 28.7 64 64 64l448 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm80-48c0 8.8 7.2 16 16 16l0 64-8 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l24 0 24 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-8 0 0-80c0-8.8-7.2-16-16-16l-16 0c-8.8 0-16 7.2-16 16z"/></svg>
                        </div>
                        <div class="shop_haiphonglife_single_info_policy_payment_desc">
                            <p>Thanh toán linh hoạt (tiền mặt, chuyển khoản).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mô tả sản phẩm -->
        <section>
            <div class="shop_haiphonglife_single_desc">
                <div class="shop_haiphonglife_single_desc_button">
                    <button class="shop_haiphonglife_single_desc_button_describe shop_haiphonglife_single_desc_button_active">Mô tả</button>
                    <button class="shop_haiphonglife_single_desc_button_add_info">Thông tin bổ sung</button>
                    <button class="shop_haiphonglife_single_desc_button_reviews">Đánh giá</button>
                </div>
                <div class="shop_haiphonglife_single_desc_tabs">
                    <div class="shop_haiphonglife_single_desc_tabs_describe shop_haiphonglife_single_desc_tabs_active">
                        {!! $product->desc ?? 'Đang cập nhật thông số sản phẩm.' !!}
                    </div>

                    <div class="shop_haiphonglife_single_desc_tabs_add_info">
                        
                    </div>

                    <div class="shop_haiphonglife_single_desc_tabs_reviews">
                        <div class="shop_haiphonglife_single_desc_tabs_reviews_star">
                            <div class="shop_haiphonglife_single_desc_tabs_reviews_star">
                                <p class="shop_haiphonglife_single_desc_tabs_reviews_star_title">4.8 / 5</p>
                                <p class="shop_haiphonglife_single_desc_tabs_reviews_stars">⭐⭐⭐⭐⭐</p>
                            </div>
                            <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar">
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_all shop_haiphonglife_single_desc_tabs_reviews_toolbar_active">Tất cả</div>
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_5_star">5 ⭐</div>
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_4_star">4 ⭐</div>
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_3_star">3 ⭐</div>
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_2_star">2 ⭐</div>
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_toolbar_1_star">1 ⭐</div>
                            </div>
                        </div>
                        <div class="shop_haiphonglife_single_desc_tabs_reviews_comments">
                            @foreach ($product->productReviews as $review)
                                <div class="shop_haiphonglife_single_desc_tabs_reviews_comment">
                                    <div class="shop_haiphonglife_single_desc_tabs_reviews_comment_avatar">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" alt="">
                                    </div>
                                    <div class="shop_haiphonglife_single_desc_tabs_reviews_comment_content">
                                        <h5 class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_name">{{ $review->account->name }}</h5>
                                        <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_star">
                                            @for ($x = 1; $x <= $review->rating; $x++)
                                                ⭐
                                            @endfor
                                        </p>
                                        <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_time">
                                            {{ \Carbon\Carbon::parse($review->created)->format('d/m/y') }}
                                        </p>
                                        <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_material">
                                            <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_material_title">Chất liệu: </span> <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_material_desc">{{ $product->productVariants->first()->material }}</span>
                                        </p>
                                        {{-- <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_color">
                                            <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_color_title">Màu sắc: </span> <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_color_desc">{{ $product->productVariants->first()->color }}</span>
                                        </p>
                                        <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_size">
                                            <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_size_title">Size: </span> <span class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_size_desc">{{ $product->productVariants->first()->size }}</span>
                                        </p> --}}
                                        <p class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_desc">
                                            {{ $review->comment }}
                                        </p>
                                        <div class="shop_haiphonglife_single_desc_tabs_reviews_comment_content_gallery">
                                            @foreach ($review->gallery as $img)
                                                <img width="50px" src="{{ asset('/clients/assets/img/clothers/'. $img) }}" alt="{{ $review->comment }}" title="Đánh giá của {{ $review->account->name }}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="shop_haiphonglife_single_desc_tabs_reviews_pagination">
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                            <button>4</button>
                            <button>»</button>
                        </div>
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