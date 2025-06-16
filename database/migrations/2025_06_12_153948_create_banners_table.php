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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            // 🎯 Cột quan trọng nhất
            $table->string('title')->nullable();                      // Tiêu đề banner
            $table->string('image')->nullable();                      // Ảnh desktop
            $table->string('image_mobile')->nullable();               // Ảnh mobile (tuỳ chọn)
            $table->string('link')->nullable();                       // URL khi click
            $table->text('description')->nullable();                  // Mô tả ngắn (nếu dùng)

            // 🧭 Cấu hình hiển thị
            $table->boolean('is_active')->default(true);              // Hiển thị hay ẩn
            $table->string('position')->default('homepage');          // Vị trí hiển thị (homepage, sidebar, product_top...)
            $table->integer('order')->default(0);                     // Ưu tiên sắp xếp (thấp hơn lên trước)
            $table->string('target')->default('_blank');               // _blank hoặc _self

            // 📅 Tùy chọn thời gian
            $table->timestamp('starts_at')->nullable();               // Thời gian bắt đầu hiển thị
            $table->timestamp('ends_at')->nullable();                 // Thời gian kết thúc

            // 📝 Quản trị
            $table->string('type')->nullable();                       // Loại banner: slider, popup, flashsale...
            $table->unsignedBigInteger('created_by')->nullable();     // ID người tạo (nếu có quản trị user)
            $table->unsignedBigInteger('updated_by')->nullable();     // ID người sửa

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
