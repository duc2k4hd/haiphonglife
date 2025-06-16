<footer class="shop__haiphonglife_footer">
    <div class="shop__haiphonglife_footer_content">
        <div class="shop__haiphonglife_footer_content_business">
            <img width="180px" height="55px" src="{{ asset('/clients/assets/img/business/'. $settings['site_logo']) }}" alt="Shop Hải Phòng Life" title="Shop Hải Phòng Life">
            <p class="shop__haiphonglife_footer_content_business_title">{{ $settings['site_name'] }}</p>
            <p class="shop__haiphonglife_footer_content_business_desc">Chúng tôi cung cấp các sản phẩm chất
                lượng với giá cả hợp lý.</p>
            <p class="shop__haiphonglife_footer_content_business_address">Địa chỉ: {{ $settings['contact_address'] }}</p>
            <p class="shop__haiphonglife_footer_content_business_phone">Điện thoại: {{ preg_replace('/^(\d{4})(\d{3})(\d{3})$/', '$1.$2.$3', preg_replace('/\D/', '', $settings['contact_phone'])) }}</p>
            <p class="shop__haiphonglife_footer_content_business_email">Email: {{ $settings['contact_email'] }}</p>
            <p class="shop__haiphonglife_footer_content_business_hours">Giờ làm việc: 8:00 - 17:00 từ thứ 2 đến thứ 7</p>
            <div class="shop__haiphonglife_footer_content_business_socials">
                @if ($settings['facebook_link'])
                    <a href="{{ $settings['facebook_link'] }}"><img loading="lazy" src="{{ asset('/clients/assets/img/icon/icon-facebook.webp') }}" alt="Facebook"></a>
                @endif
                @if ($settings['instagram_link'])
                    <a href="{{ $settings['instagram_link'] }}"><img loading="lazy" src="{{ asset('/clients/assets/img/icon/icon-Instagram.png') }}" alt="Instagram"></a>
                @endif
                @if ($settings['twitter_link'])
                    <a href="{{ $settings['twitter_link'] }}"><img loading="lazy" src="{{ asset('/clients/assets/img/icon/icon-twitter.webp') }}" alt="Twitter"></a>
                @endif
            </div>
        </div>

        <div class="shop__haiphonglife_footer_content_company">
            <p class="shop__haiphonglife_footer_content_company_title">Công ty</p>
            <div class="shop__haiphonglife_footer_content_company_links">
                <a href="/">Giới thiệu</a>
                <a href="#">Liên hệ</a>
                <a href="#">Chính sách bảo mật</a>
                <a href="#">Điều khoản sử dụng</a>
                <a href="#">Chính sách đổi trả</a>
                <a href="#">Chính sách vận chuyển</a>
                <a href="#">Chính sách bảo hành</a>
                <a href="#">Chính sách thanh toán</a>
                <a href="#">Chính sách bảo mật thông tin</a>
                <a href="#">Chính sách bảo mật dữ liệu</a>
            </div>
        </div>

        <div class="shop__haiphonglife_footer_content_accounts">
            <p class="shop__haiphonglife_footer_content_accounts_title">Tài khoản</p>
            <div class="shop__haiphonglife_footer_content_accounts_links">
                <a href="#">Đăng nhập</a>
                <a href="#">Đăng ký</a>
                <a href="#">Quên mật khẩu</a>
                <a href="#">Thông tin tài khoản</a>
                <a href="#">Lịch sử đơn hàng</a>
                <a href="#">Danh sách yêu thích</a>
                <a href="#">Địa chỉ giao hàng</a>
                <a href="#">Thông tin thanh toán</a>
                <a href="#">Thông tin bảo mật</a>
                <a href="#">Thông tin bảo mật dữ liệu</a>
            </div>
        </div>

        <div class="shop__haiphonglife_footer_content_corporate">
            <p class="shop__haiphonglife_footer_content_corporate_title">Doanh nghiệp</p>
            <div class="shop__haiphonglife_footer_content_corporate_links">
                <a href="#">Giới thiệu doanh nghiệp</a>
                <a href="#">Liên hệ doanh nghiệp</a>
                <a href="#">Chính sách bảo mật doanh nghiệp</a>
                <a href="#">Điều khoản sử dụng doanh nghiệp</a>
                <a href="#">Chính sách đổi trả doanh nghiệp</a>
                <a href="#">Chính sách vận chuyển doanh nghiệp</a>
                <a href="#">Chính sách bảo hành doanh nghiệp</a>
                <a href="#">Chính sách thanh toán doanh nghiệp</a>
                <a href="#">Chính sách bảo mật thông tin doanh nghiệp</a>
                <a href="#">Chính sách bảo mật dữ liệu doanh nghiệp</a>
            </div>
        </div>

        <div class="shop__haiphonglife_footer_content_services">
            <p class="shop__haiphonglife_footer_content_services_title">Dịch vụ</p>
            <div class="shop__haiphonglife_footer_content_services_links">
                <a href="#">Hỗ trợ khách hàng</a>
                <a href="#">Trung tâm hỗ trợ</a>
                <a href="#">Câu hỏi thường gặp</a>
                <a href="#">Hướng dẫn sử dụng</a>
                <a href="#">Hướng dẫn thanh toán</a>
                <a href="#">Hướng dẫn vận chuyển</a>
                <a href="#">Hướng dẫn đổi trả</a>
                <a href="#">Hướng dẫn bảo hành</a>
                <a href="#">Hướng dẫn bảo mật thông tin</a>
                <a href="#">Hướng dẫn bảo mật dữ liệu</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="shop__haiphonglife_footer_bottom">
        <p>{!! Blade::render($settings['copyright']) !!}</p>
        <p>Thiết kế bởi <a href="/">Đức Nobi ❤️</a></p>
    </div>
</footer>