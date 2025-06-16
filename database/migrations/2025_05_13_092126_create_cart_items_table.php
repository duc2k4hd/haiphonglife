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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            // Liên kết tới giỏ hàng (cart)
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();

            // Liên kết tới sản phẩm (product)
            $table->foreignId('product_variant_id')->constrained('product_variants')->cascadeOnDelete();

            // Số lượng sản phẩm trong giỏ
            $table->unsignedInteger('quantity')->default(1);

            // Giá sản phẩm tại thời điểm thêm vào giỏ, để giữ giá cố định khi giá sản phẩm thay đổi
            $table->double('price')->nullable();

            // Tổng tiền = price * quantity (có thể tính tự động hoặc lưu lại để truy vấn nhanh)
            $table->double('total_price')->nullable();

            $table->timestamps();
            $table->json('options')->nullable();

            // Đảm bảo mỗi cart chỉ có 1 dòng cho 1 product (không trùng)
            $table->unique(['cart_id', 'product_variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
