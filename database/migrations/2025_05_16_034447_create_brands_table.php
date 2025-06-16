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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();            // Tên thương hiệu
            $table->string('slug')->unique();            // Dùng cho URL
            $table->text('desc')->nullable();            // Mô tả chi tiết
            $table->string('logo')->nullable();          // Đường dẫn ảnh logo

            // Thông tin SEO
            $table->string('meta_title')->nullable();         // <title> trên SERP
            $table->text('meta_desc')->nullable();     // <meta name="description">
            $table->json('seo_keywords')->nullable();         // Từ khóa liên quan (JSON array)

            $table->boolean('is_active')->default(true);      // Trạng thái hiển thị
            $table->timestamps();                             // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
