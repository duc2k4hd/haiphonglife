<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID tự tăng

            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique(); // Slug thân thiện URL (quan trọng cho SEO)

            // --- Thông tin giá cả ---
            $table->double('price'); // Giá bán của sản phẩm (decimal tốt hơn double cho tiền tệ)
            $table->double('old_price')->nullable(); // Giá gốc/giá so sánh (dùng cho khuyến mãi, gạch bỏ giá cũ)
            $table->double('cost_price')->nullable(); // Giá vốn của sản phẩm (nội bộ, cho tính lợi nhuận)

            // --- Mô tả ---
            $table->text('short_desc')->nullable(); // Mô tả ngắn gọn (trước đây là 'short_desc')
            $table->longText('desc')->nullable(); // Mô tả chi tiết (trước đây là 'desc')

            // --- Tồn kho (quan trọng) ---
            // Cần phải có một logic rõ ràng nếu bạn có product_variants
            // Nếu mỗi biến thể có stock riêng, cột này trong products có thể là tổng stock hoặc không cần thiết.
            // Nếu không có biến thể, cột này là stock của sản phẩm chính.
            $table->integer('stock')->default(0); // Số lượng tồn kho (đổi tên từ 'stock' cho rõ ràng hơn)
            $table->string('sku')->nullable()->unique(); // Mã SKU (Stock Keeping Unit) cho sản phẩm chính (nếu không có biến thể)

            // --- Hình ảnh (sử dụng Product Images table) ---
            // Đây là cách liên kết N-N thông qua bảng trung gian product_product_images
            // Nếu bạn muốn 1 ảnh chính ở đây:
            $table->foreignId('product_image_id') // ID của ảnh chính từ bảng product_images
                ->nullable()
                ->constrained('product_images')
                ->onDelete('set null'); // Nếu ảnh bị xóa, đặt ID về null

            // --- SEO ---
            $table->string('meta_title')->nullable(); // Tiêu đề hiển thị trên trình duyệt/SERP (<title> tag)
            $table->text('meta_desc')->nullable(); // Mô tả hiển thị trên trình duyệt/SERP (<meta name="description"> tag)
            $table->json('seo_keywords')->nullable(); // Các từ khóa liên quan (dạng JSON array)
            $table->string('canonical_url')->nullable(); // URL chính thức của sản phẩm (tránh trùng lặp nội dung)

            // --- Thuộc tính & Phân loại ---
            $table->foreignId('brand_id')
                ->nullable()
                ->constrained('brands')
                ->onDelete('set null');
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null');

            // --- Các cờ trạng thái ---
            $table->boolean('is_active')->default(true); // Trạng thái hoạt động (hiển thị trên website)
            $table->boolean('is_featured')->default(false); // Sản phẩm nổi bật
            $table->boolean('is_new')->default(false); // Sản phẩm mới
            $table->boolean('is_on_sale')->default(false); // Đang giảm giá (có thể được tính toán dựa trên `compare_at_price`)
            $table->boolean('is_best_seller')->default(false); // Sản phẩm bán chạy nhất (thường được cập nhật định kỳ)

            // --- Thống kê ---
            $table->bigInteger('sold_count')->default(0); // Số lượng đã bán

            $table->timestamps(); // `created_at`, `updated_at`
            $table->softDeletes(); // Thêm Soft Deletes để dễ dàng phục hồi sản phẩm đã xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
