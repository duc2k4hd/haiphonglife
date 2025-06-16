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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Khóa chính

            // Liên kết với người dùng (user) hoặc bất kỳ thực thể nào khác cần địa chỉ
            // Đây là cách phổ biến nhất để liên kết địa chỉ với người dùng
            $table->foreignId('account_id') // Liên kết với bảng 'accounts' (người dùng)
                ->constrained('accounts')
                ->onDelete('cascade'); // Nếu tài khoản bị xóa, các địa chỉ của họ cũng bị xóa

            // Loại địa chỉ (để phân biệt địa chỉ giao hàng, địa chỉ thanh toán, địa chỉ nhà, v.v.)
            $table->enum('type', ['shipping', 'billing', 'home', 'work', 'other'])->default('shipping');

            // Thông tin người nhận/liên hệ
            $table->string('full_name')->nullable(); // Tên đầy đủ người nhận (nếu khác với tên tài khoản)
            $table->string('phone_number')->nullable(); // Số điện thoại liên hệ

            // Các thành phần địa chỉ
            $table->string('address_line_1'); // Địa chỉ chi tiết (số nhà, tên đường, thôn/xóm, v.v.)
            $table->string('address_line_2')->nullable(); // Địa chỉ chi tiết bổ sung (nếu có)
            $table->string('ward')->nullable(); // Phường/Xã
            $table->string('district'); // Quận/Huyện
            $table->string('province'); // Tỉnh/Thành phố
            $table->string('postal_code')->nullable(); // Mã bưu chính (ZIP/Postal Code)
            $table->string('country')->default('Viet Nam'); // Quốc gia

            $table->decimal('latitude', 10, 7)->nullable(); // Vĩ độ (cho tích hợp bản đồ)
            $table->decimal('longitude', 10, 7)->nullable(); // Kinh độ (cho tích hợp bản đồ)

            $table->boolean('is_default')->default(false); // Đánh dấu địa chỉ mặc định của người dùng
            $table->text('notes')->nullable(); // Ghi chú thêm về địa chỉ

            $table->timestamps();

            // Đảm bảo mỗi người dùng chỉ có một địa chỉ mặc định của một loại
            // $table->unique(['account_id', 'type', 'is_default']); // Cần logic phức tạp hơn cho điều kiện này trong code
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
