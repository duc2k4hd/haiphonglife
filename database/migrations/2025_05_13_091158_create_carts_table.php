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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // Nếu người dùng đã đăng nhập, liên kết đến bảng users
            $table->foreignId('account_id')->nullable()->constrained('accounts')->nullOnDelete();

            // Nếu người dùng chưa đăng nhập, dùng session id để lưu trữ giỏ hàng
            $table->string('session_id')->nullable()->index();

            // Trạng thái của giỏ hàng
            $table->enum('status', ['active', 'ordered', 'cancel'])->default('active');

            // Tổng giá trị đơn hàng (có thể tính tự động hoặc cập nhật khi có thay đổi)
            $table->double('total_price')->default(0);

            // Tổng số lượng sản phẩm trong giỏ
            $table->unsignedInteger('total_quantity')->default(0);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
