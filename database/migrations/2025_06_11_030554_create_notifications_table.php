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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Sử dụng UUID làm khóa chính (theo chuẩn Laravel Notifications)
            $table->string('type'); // Loại thông báo (ví dụ: 'App\Notifications\OrderShipped')

            // Liên kết đa hình với thực thể nhận thông báo (người dùng, nhóm, v.v.)
            $table->morphs('notifiable'); // Thêm các cột notifiable_type (string) và notifiable_id (big integer)

            $table->text('data')->nullable(); // Dữ liệu thông báo (thường là JSON)
            $table->timestamp('read_at')->nullable(); // Thời gian người dùng đã đọc thông báo
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
