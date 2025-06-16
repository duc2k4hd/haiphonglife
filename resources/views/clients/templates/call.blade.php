<!-- Call to action -->
<section>
    <div class="shop__haiphonglife_main_newsletter_banner">
        <div class="shop__haiphonglife_main_newsletter_banner_content">
            <h2 class="shop__haiphonglife_main_newsletter_banner_content_title">Đăng ký nhận bản tin</h2>
            <p class="shop__haiphonglife_main_newsletter_banner_content_desc">Nhận thông tin mới nhất về
                sản phẩm và ưu đãi từ chúng tôi.</p>
            <form class="shop__haiphonglife_main_newsletter_banner_content_form">
                <input type="email" placeholder="Nhập email của bạn" required>
                <button type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="shop__haiphonglife_main_newsletter_banner_img">
            <img loading="lazy" src="{{ asset('/clients/assets/img/banners/'. $bannerNewsLetter->image) }}" alt="{{ $bannerNewsLetter->title }}">
        </div>
    </div>
</section>
