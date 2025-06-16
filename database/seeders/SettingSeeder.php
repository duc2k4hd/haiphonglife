<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        $settings = [
            ['key' => 'site_name', 'value' => 'Công ty TNHH Hải Phòng LIFE'],
            ['key' => 'site_description', 'value' => 'Khám phá Hải Phòng LIFE – chuyên trang mua sắm và review sản phẩm đáng tin cậy tại Hải Phòng. Cập nhật ưu đãi mới nhất, đánh giá khách quan, hỗ trợ bạn chọn đúng sản phẩm chất lượng.'],
            ['key' => 'site_logo', 'value' => ''],
            ['key' => 'site_announcement', 'value' => 'MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG'],
            ['key' => 'site_favicon', 'value' => 'favicon.png'],
            ['key' => 'contact_email', 'value' => 'support@haiphonglife.com'],
            ['key' => 'contact_phone', 'value' => '0827786999'],
            ['key' => 'contact_address', 'value' => 'chợ Đôn, Hải Phòng, Việt Nam'],
            ['key' => 'seo_keywords', 'value' => 'Hải Phòng Life, siêu thị mini Hải Phòng, HPLife, Cửa hàng HPLife, quần áo Hải Phòng, đồ gia dụng Hải Phòng, phụ kiện tiện ích, shop thời trang Hải Phòng, cửa hàng đồ gia dụng, mua sắm Hải Phòng, siêu thị mini giá rẻ, quần áo nam nữ Hải Phòng, đồ dùng gia đình'],
            ['key' => 'seo_author', 'value' => 'HPLife'],
            ['key' => 'facebook_link', 'value' => 'https://www.facebook.com/ducnobi2004'],
            ['key' => 'twitter_link', 'value' => 'https://twitter.com/'],
            ['key' => 'google_analytics', 'value' => ''],
            ['key' => 'enable_registration', 'value' => 'true'],
            ['key' => 'enable_comments', 'value' => 'true'],
            ['key' => 'enable_newsletter', 'value' => 'true'],
            ['key' => 'site_timezone', 'value' => 'Asia/Ho_Chi_Minh'],
            ['key' => 'site_language', 'value' => 'vi'],
            ['key' => 'enable_ssl', 'value' => 'true'],
            ['key' => 'maintenance_mode', 'value' => 'false'],
            ['key' => 'copyright', 'value' => '<p>Copyright &copy; {{ ((2025 != now()->year & 2025 < now()->year) ? \'2025 - \' : \'\'). now()->year }} <a style="color: #FF3366;" href="{{ $settings[\'site_url\'] }}">Hải Phòng Life</a>. All Rights Reserved.</p>'],
            ['key' => 'contact_form_recipient', 'value' => 'support@haiphonglife.com'],
            ['key' => 'allow_file_uploads', 'value' => 'true'],
            ['key' => 'site_url', 'value' => 'https://shop.haiphonglife.com'],
            ['key' => 'site_slug', 'value' => '/'],
            ['key' => 'site_title', 'value' => 'Hải Phòng LIFE – Cửa hàng mini thời trang & gia dụng tiện ích tại Hải Phòng'],
            ['key' => 'google_search_console', 'value' => ''],
            ['key' => 'instagram_link', 'value' => 'https://www.facebook.com/ducnobi2004'],
            ['key' => 'dmca', 'value' => ''],
            ['key' => 'dmca_logo', 'value' => ''],
            ['key' => 'bo_cong_thuong', 'value' => 'bo-cong-thuong.png'],
            ['key' => 'contact_zalo', 'value' => '0398951396'],
            ['key' => 'telegram_link', 'value' => '1'],
            ['key' => 'discord_link', 'value' => '1'],
            ['key' => 'site_image', 'value' => ''],
            ['key' => 'google_tag_header', 'value' => '<!-- Google Tag Manager -->...'],
            ['key' => 'google_tag_body', 'value' => '<!-- Google Tag Manager (noscript) -->...'],
            ['key' => 'site_pinterest', 'value' => ''],
            ['key' => 'site_banner', 'value' => 'banner.webp'],
            ['key' => 'url_banner', 'value' => ''],
            ['key' => 'bing_tag_header', 'value' => ''],
        ];

        foreach ($settings as &$setting) {
            $setting['created_at'] = $now;
            $setting['updated_at'] = $now;
        }

        DB::table('settings')->insert($settings);
    }
}

