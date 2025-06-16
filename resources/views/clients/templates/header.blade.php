{{-- @php
    $products = \App\Models\Product::withAnyCategory($categories[0]->category_ids)->get();
    dd($products);
@endphp --}}
<header class="shop__haiphonglife_header">
    <div class="shop__haiphonglife_header_topbar">
        <div class="shop__haiphonglife_header_topbar_links">
            <a href="/">Giới thiệu</a>
            <a href="/">Tài khoản</a>
            <a href="/">Yêu thích</a>
            <a href="/">Theo dõi đơn hàng</a>
        </div>
        <div class="shop__haiphonglife_header_topbar_supports">
            <div class="shop__haiphonglife_header_topbar_supports_support">
                <a href="tel:123456789">Hỗ trợ: {{ preg_replace('/^(\d{4})(\d{3})(\d{3})$/', '$1.$2.$3', preg_replace('/\D/', '', $settings['contact_phone'])) }}</a>
            </div>
            <div class="shop__haiphonglife_header_topbar_supports_language">
                <select name="language" id="language">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="shop__haiphonglife_header_topbar_supports_currency">
                <select name="currency" id="currency">
                    <option value="vnd">VND</option>
                    <option value="usd">USD</option>
                </select>
            </div>
        </div>
    </div>

    <div class="shop__haiphonglife_header_main">
        <div class="shop__haiphonglife_header_main_logo">
            <a href="/">
                <img width="180px" height="55px" src="{{ asset('/clients/assets/img/business/'. $settings['site_logo']) }}" alt="Shop Hải Phòng Life" title="Shop Hải Phòng Life">
            </a>
        </div>
        <div class="shop__haiphonglife_header_main_search">
            <form class="shop__haiphonglife_header_main_search_form" action="" method="post">
                <select class="shop__haiphonglife_header_main_search_select" name="" id="">
                    <option value="">Tất cả danh mục</option>
                    @foreach ($categories as $category)
                        <option value="">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input class="shop__haiphonglife_header_main_search_input" type="text"
                    placeholder="Tìm kiếm sản phẩm...">
                <button class="shop__haiphonglife_header_main_search_btn" type="submit"><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg></button>
            </form>
        </div>
        <div class="shop__haiphonglife_header_main_icons">
            <div class="shop__haiphonglife_header_main_icon shop__haiphonglife_header_main_icons_compare">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M320 488c0 9.5-5.6 18.1-14.2 21.9s-18.8 2.3-25.8-4.1l-80-72c-5.1-4.6-7.9-11-7.9-17.8s2.9-13.3 7.9-17.8l80-72c7-6.3 17.2-7.9 25.8-4.1s14.2 12.4 14.2 21.9l0 40 16 0c35.3 0 64-28.7 64-64l0-166.7C371.7 141 352 112.8 352 80c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3L464 320c0 70.7-57.3 128-128 128l-16 0 0 40zM456 80a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM192 24c0-9.5 5.6-18.1 14.2-21.9s18.8-2.3 25.8 4.1l80 72c5.1 4.6 7.9 11 7.9 17.8s-2.9 13.3-7.9 17.8l-80 72c-7 6.3-17.2 7.9-25.8 4.1s-14.2-12.4-14.2-21.9l0-40-16 0c-35.3 0-64 28.7-64 64l0 166.7c28.3 12.3 48 40.5 48 73.3c0 44.2-35.8 80-80 80s-80-35.8-80-80c0-32.8 19.7-61 48-73.3L48 192c0-70.7 57.3-128 128-128l16 0 0-40zM56 432a24 24 0 1 0 48 0 24 24 0 1 0 -48 0z" />
                    </svg>
                    <span
                        class="shop__haiphonglife_header_main_icon_count shop__haiphonglife_header_main_icon_compre__count">0</span>
                    <span class="shop__haiphonglife_header_main_icon_name">So sánh</span>
                </a>
            </div>
            <div class="shop__haiphonglife_header_main_icon shop__haiphonglife_header_main_icons_wishlist">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                    </svg>
                    <span
                        class="shop__haiphonglife_header_main_icon_count shop__haiphonglife_header_main_icon_wishlist_count">0</span>
                    <span class="shop__haiphonglife_header_main_icon_name">Yêu thích</span>
                </a>
            </div>
            <div class="shop__haiphonglife_header_main_icon shop__haiphonglife_header_main_icons_cart">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                    <span
                        class="shop__haiphonglife_header_main_icon_count shop__haiphonglife_header_main_icon_cart_count">0</span>
                    <span class="shop__haiphonglife_header_main_icon_name">Giỏ hàng</span>
                </a>
            </div>
            <div class="shop__haiphonglife_header_main_icon shop__haiphonglife_header_main_icons_account">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z" />
                    </svg>
                    <span class="shop__haiphonglife_header_main_icon_name">Tài khoản</span>
                </a>
            </div>
        </div>
        <div class="shop__haiphonglife_header_main_mobile_bars">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
            </svg>
        </div>
    </div>

    <div class="shop__haiphonglife_header_main_nav">
        <div class="shop__haiphonglife_header_main_nav_category">
            <div class="shop__haiphonglife_header_main_nav_category_title">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path
                        d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                </svg>
                <span class="shop__haiphonglife_header_main_nav_category_title_name">Tất cả danh mục</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path
                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                </svg>
            </div>
            <div class="shop__haiphonglife_header_main_nav_category_lists">
                @foreach ($categories as $category)
                    <div class="shop__haiphonglife_header_main_nav_category_lists_items">
                        <div class="shop__haiphonglife_header_main_nav_category_lists_items_item">
                            <h3 class="shop__haiphonglife_header_main_nav_category_lists_items_item_title">{{ $category->name }}</h3>
                            <ul class="shop__haiphonglife_header_main_nav_category_lists_items_item_list">
                                @foreach ($category->children as $children)
                                    <li><a href="/{{ $category->slug }}/{{ $children->slug }}">{{ $children->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="shop__haiphonglife_header_main_nav_deals">
            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">

                <defs>

                    <style>
                        .cls-1 {
                            fill: #FF3366;
                        }

                        .cls-2 {
                            fill: #FF3366;
                        }

                        .cls-3 {
                            fill: #ffffff;
                        }

                        .cls-4 {
                            fill: #ffffff;
                        }
                    </style>

                </defs>

                <title />

                <g id="hot-deal">

                    <path class="cls-1"
                        d="M58,35c0,14.82-11.18,26-26,26C16.45,61,6,50.55,6,35A53,53,0,0,1,8.08,19.45,2,2,0,0,1,10,18h0a2,2,0,0,1,1.9,1.37C12,19.6,12.65,21,15,21c4.84,0,5-9.9,5-10a2,2,0,0,1,2.89-1.79A9,9,0,0,0,27,10c2.44,0,4.06-2.39,5-4.46a18.58,18.58,0,0,0,1-3A2,2,0,0,1,35,1h0A2,2,0,0,1,37,2.67C37.68,6.91,40.86,19,46,19c4.12,0,5-3.9,5-4.34A2,2,0,0,1,52.82,13a2,2,0,0,1,2,1.28C58,22.64,58,31.94,58,35Z" />

                    <path class="cls-2"
                        d="M58,35c0,14.82-11.18,26-26,26V5.54a18.58,18.58,0,0,0,1-3A2,2,0,0,1,35,1h0A2,2,0,0,1,37,2.67C37.68,6.91,40.86,19,46,19c4.12,0,5-3.9,5-4.34A2,2,0,0,1,52.82,13a2,2,0,0,1,2,1.28C58,22.64,58,31.94,58,35Z" />

                    <path class="cls-3"
                        d="M42.41,30.41,32,40.82l-8.59,8.59a2,2,0,0,1-2.82-2.82L32,35.18l7.59-7.59a2,2,0,0,1,2.82,2.82Z" />

                    <path class="cls-3"
                        d="M24.5,37A5.5,5.5,0,1,0,19,31.5,5.51,5.51,0,0,0,24.5,37Zm0-7A1.5,1.5,0,1,1,23,31.5,1.5,1.5,0,0,1,24.5,30Z" />

                    <path class="cls-3"
                        d="M38.5,40A5.5,5.5,0,1,0,44,45.5,5.51,5.51,0,0,0,38.5,40Zm0,7A1.5,1.5,0,1,1,40,45.5,1.5,1.5,0,0,1,38.5,47Z" />

                    <path class="cls-4"
                        d="M42.41,27.59a2,2,0,0,0-2.82,0L32,35.18v5.64L42.41,30.41A2,2,0,0,0,42.41,27.59Z" />

                    <path class="cls-4"
                        d="M38.5,40A5.5,5.5,0,1,0,44,45.5,5.51,5.51,0,0,0,38.5,40Zm0,7A1.5,1.5,0,1,1,40,45.5,1.5,1.5,0,0,1,38.5,47Z" />

                </g>

            </svg>
            <a class="shop__haiphonglife_header_main_nav_deals_name" href="/">DEALS HOT</a>
            <img width="100px" height="100px" class="shop__haiphonglife_header_main_nav_deals_img"
                src="{{ asset('/clients/assets/img/icon/firework.gif') }}" alt="Hot Deals">
        </div>
        <div class="shop__haiphonglife_header_main_nav_links">
            @foreach ($categories as $category)
                @php
                    $productsCategories = \App\Models\Product::active()->withAnyCategory($category->category_ids)->inRandomOrder()->limit(5);
                @endphp
                
                <div class="shop__haiphonglife_header_main_nav_links_item">
                    <h3 class="shop__haiphonglife_header_main_nav_links_item_title"><a href="/{{ $category->slug }}">{{ $category->name }}</a><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                    </h3>
                    <div class="shop__haiphonglife_header_main_nav_links_item_list">
                        @foreach ($productsCategories->get() as $product)
                            <div class="shop__haiphonglife_header_main_nav_links_item_list_product">
                                <div class="shop__haiphonglife_header_main_nav_links_item_list_product_label">
                                    <span class="shop__haiphonglife_header_main_nav_links_item_list_product_label_text">{{ $product->label }}</span>
                                </div>
                                <div class="shop__haiphonglife_header_main_nav_links_item_list_product_img">
                                    <img class="shop__haiphonglife_header_main_nav_links_item_list_product_img_image"
                                        src="{{ asset('/clients/assets/img/clothers/'. $product->primary_image->url) }}" alt="{{ $product->primary_image->alt }}" title="{{ $product->primary_image->title }}">

                                    <!-- Cái này là khung ảnh đừng xóa -->
                                    <a href="/san-pham/{{ $product->slug }}">
                                        <img class="shop__haiphonglife_header_main_nav_links_item_list_product_img_khung"
                                            src="{{ asset('/clients/assets/img/frame/'. $product->frame) }}" alt="Khung ảnh sản phẩm">
                                    </a>
                                </div>
                                <div class="shop__haiphonglife_header_main_nav_links_item_list_product_info">
                                    <h3 class="shop__haiphonglife_header_main_nav_links_item_list_product_info_title">
                                        <a href="/san-pham/{{ $product->slug }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="shop__haiphonglife_header_main_nav_links_item_list_product_info_rating">
                                        <span class="shop__haiphonglife_header_main_nav_links_item_list_product_info_rating_star">
                                            @php
                                                $avgRating = $product->averageRating();
                                            @endphp

                                            @if ($avgRating === null)
                                                <span class="text-muted">Chưa có đánh giá</span>
                                            @else
                                                @for ($i = 1; $i <= round($avgRating); $i++)
                                                    ⭐
                                                @endfor
                                                {{-- <span class="rating-number">({{ number_format($avgRating, 1) }}/5)</span> --}}
                                            @endif
                                        </span>
                                        <span class="shop__haiphonglife_header_main_nav_links_item_list_product_info_rating_count"><a style="color: #FF3366; text-decoration: underline;" href="/san-pham/{{ $product->slug }}">({{ count($product->productReviews) }} review)</a></span>
                                    </div>
                                    <div class="shop__haiphonglife_header_main_nav_links_item_list_product_info_price">
                                        <span
                                            class="shop__haiphonglife_header_main_nav_links_item_list_product_info_price_new">{{ number_format($product->price, 0, '.', ',') }}đ</span>
                                        <span
                                            class="shop__haiphonglife_header_main_nav_links_item_list_product_info_price_old">{{ number_format($product->old_price, 0, '.', ',') }}đ</span>
                                    </div>
                                    <div class="shop__haiphonglife_header_main_nav_links_item_list_product_info_actions">
                                        <button
                                            class="shop__haiphonglife_header_main_nav_links_item_list_product_info_actions_add_to_cart">Thêm
                                            vào giỏ hàng</button>
                                        <button
                                            class="shop__haiphonglife_header_main_nav_links_item_list_product_info_actions_wishlist">Yêu
                                            thích</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            @endforeach
        </div>
        <div class="shop__haiphonglife_header_main_nav_support">
            <div class="shop__haiphonglife_header_main_nav_support_icon">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path
                        d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48l0 128c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80l0-16 0-48 0-48C0 146.6 114.6 32 256 32s256 114.6 256 256l0 48 0 48 0 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48l0-128c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z" />
                </svg>
            </div>
            <div class="shop__haiphonglife_header_main_nav_support_content">
                <div class="shop__haiphonglife_header_main_nav_support_content_phone">
                    {{ preg_replace('/^(\d{4})(\d{3})(\d{3})$/', '$1.$2.$3', preg_replace('/\D/', '', $settings['contact_phone'])) }}
                </div>
                <div class="shop__haiphonglife_header_main_nav_support_content_text">
                    Hỗ trợ 24/7
                </div>
            </div>
        </div>
    </div>

    <div class="shop__haiphonglife_header_mobile_main_nav">
        <!-- <div class="shop__haiphonglife_header_mobile_main_nav_overlay"></div> -->

        <div class="shop__haiphonglife_header_mobile_main_nav_close">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
            </svg>
        </div>

        <div class="shop__haiphonglife_header_mobile_main_nav_search">
            <select class="shop__haiphonglife_header_mobile_main_nav_search_select" name="" id="">
                <option value="">Tất cả danh mục</option>
                @foreach ($categories as $category)
                    <option value="">{{ $category->name }}</option>
                @endforeach
            </select>
            <input class="shop__haiphonglife_header_mobile_main_nav_search_input" type="text"
                placeholder="Tìm kiếm sản phẩm...">
            <button class="shop__haiphonglife_header_mobile_main_nav_search_btn" type="submit"><svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg></button>
        </div>

        <div class="shop__haiphonglife_header_mobile_main_nav_links">
            @foreach ($categories as $category)
                <div class="shop__haiphonglife_header_mobile_main_nav_links_item">
                    <h3 class="shop__haiphonglife_header_mobile_main_nav_links_item_title"><a href="/{{ $category->slug }}">{{ $category->name }}</a><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                    </h3>
                    <div class="shop__haiphonglife_header_mobile_main_nav_links_item_list">
                        @foreach ($category->children as $children)
                            <a href="/{{ $category->slug }}/{{ $children->slug }}">{{ $children->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</header>