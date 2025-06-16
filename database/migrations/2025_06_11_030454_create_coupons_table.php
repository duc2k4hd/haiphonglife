<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Khóa chính

            $table->string('code')->unique(); // Mã giảm giá (ví dụ: 'SALE2024', 'FREESHIP')
            $table->string('name'); // Tên mã giảm giá (ví dụ: 'Giảm giá 10% cho đơn hàng đầu tiên')
            $table->text('description')->nullable(); // Mô tả chi tiết về mã giảm giá

            $table->enum('type', ['percentage', 'fixed_amount', 'free_shipping'])->default('fixed_amount');
            // Loại giảm giá:
            // 'percentage': Giảm theo phần trăm (ví dụ: 10%)
            // 'fixed_amount': Giảm giá cố định (ví dụ: 50.000 VNĐ)
            // 'free_shipping': Miễn phí vận chuyển

            $table->double('value'); // Giá trị giảm giá (ví dụ: 10 cho 10%, 50000 cho 50.000 VNĐ)

            $table->integer('usage_limit')->nullable(); // Tổng số lần mã có thể được sử dụng (null = không giới hạn)
            $table->integer('used_count')->default(0); // Số lần mã đã được sử dụng
            $table->integer('per_user_limit')->nullable(); // Số lần mỗi người dùng có thể sử dụng (null = không giới hạn)

            $table->double('min_order_amount')->nullable(); // Giá trị đơn hàng tối thiểu để áp dụng mã

            $table->boolean('is_active')->default(true); // Trạng thái hoạt động của mã
            $table->timestamp('starts_at')->nullable(); // Thời gian bắt đầu có hiệu lực
            $table->timestamp('expires_at')->nullable(); // Thời gian hết hạn

            // Các ràng buộc khác (tùy chọn)
            $table->json('applicable_products')->nullable(); // ID sản phẩm áp dụng (dạng JSON array)
            $table->json('applicable_categories')->nullable(); // ID danh mục áp dụng (dạng JSON array)
            $table->json('excluded_products')->nullable(); // ID sản phẩm không áp dụng
            $table->json('excluded_categories')->nullable(); // ID danh mục không áp dụng

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
