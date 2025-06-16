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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // ID tự tăng

            $table->string('title'); // Tiêu đề bài viết (thường là H1)
            $table->string('slug')->unique(); // Slug thân thiện URL

            // --- Các cột bổ sung cho SEO & Tối ưu hiển thị ---

            $table->string('meta_title')->nullable(); // Tiêu đề hiển thị trên trình duyệt/SERP (<title> tag)
            $table->text('meta_description')->nullable(); // Mô tả hiển thị trên trình duyệt/SERP (<meta name="description"> tag)
            $table->json('seo_keywords')->nullable(); // Các từ khóa liên quan (dạng JSON array, ít quan trọng hơn cho SEO nhưng vẫn hữu ích cho nội bộ)

            $table->text('excerpt')->nullable(); // Đoạn trích ngắn của bài viết
            $table->longText('content'); // Nội dung chính của bài viết

            $table->string('thumbnail')->nullable(); // Đường dẫn ảnh đại diện
            $table->string('thumbnail_alt_text')->nullable(); // Thuộc tính 'alt' cho ảnh đại diện (cực kỳ quan trọng cho SEO hình ảnh và trợ năng)

            $table->string('canonical_url')->unique(); // URL chính thức của bài viết (tránh trùng lặp nội dung)

            // --- Các cột hiện có, giữ nguyên ---

            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // Trạng thái bài viết
            $table->boolean('is_featured')->default(false); // Bài viết nổi bật
            $table->unsignedBigInteger('views')->default(0); // Lượt xem bài viết

            $table->foreignId('account_id')
                ->constrained('accounts') // Liên kết đến tài khoản người dùng/tác giả
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories') // Danh mục bài viết
                ->onDelete('set null');

            $table->timestamp('published_at')->nullable(); // Thời gian đăng bài viết (khi status là 'published')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
