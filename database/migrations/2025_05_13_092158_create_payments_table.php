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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->nullable() // Thanh toán có thể không liên kết trực tiếp với một đơn hàng cụ thể (ví dụ: nạp tiền vào ví)
                ->constrained('orders') // Ràng buộc khóa ngoại với bảng 'orders'
                ->onDelete('set null'); // Nếu đơn hàng bị xóa, đặt order_id thành null

            $table->foreignId('account_id')
                ->constrained('accounts') // Ràng buộc khóa ngoại với bảng 'accounts'
                ->onDelete('cascade');
            $table->enum('method', ['cash', 'bank', 'momo', 'vnpay', 'zalopay'])->default('cash');
            $table->double('amount');
            $table->string('payment_gateway')->nullable(); // Cổng thanh toán được sử dụng (ví dụ: 'Stripe', 'PayPal', 'VNPay', 'Momo')
            $table->json('gateway_response')->nullable(); // Lưu trữ phản hồi đầy đủ từ cổng thanh toán (dạng JSON)
            $table->string('card_brand')->nullable(); // Loại thẻ (ví dụ: 'Visa', 'MasterCard', 'JCB')
            $table->string('last_four')->nullable(); // 4 số cuối của thẻ (để hiển thị cho người dùng)
            $table->string('receipt_url')->nullable(); // URL biên lai từ cổng thanh toán (nếu có)

            $table->text('notes')->nullable(); // Ghi chú thêm về giao dịch
            $table->enum('status', ['pending', 'completed', 'failed', 'canceled'])->default('pending'); 
            $table->text('transaction_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
