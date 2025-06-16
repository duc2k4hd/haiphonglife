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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products') // Ràng buộc khóa ngoại với bảng 'products'
                ->onDelete('cascade'); // Nếu sản phẩm cha bị xóa, các biến thể cũng bị xóa theo
            $table->integer('stock')->default(0); 
            $table->boolean('in_stock')->default(false);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('material')->nullable();
            $table->foreignId('product_image_id')->constrained('product_images')->onDelete('set null')->nullable();
            $table->string('weight_unit', 10)->nullable(); // Đơn vị trọng lượng (ví dụ: 'kg', 'g', 'lbs')
            $table->decimal('weight_value', 10, 2)->nullable(); // Giá trị trọng lượng của biến thể
            $table->json('dimensions')->nullable(); // Kích thước (ví dụ: "LxWxH" hoặc lưu dạng JSON)
            // {
            //     "length": 10,
            //     "width": 5,
            //     "height": 2,
            //     "unit": "cm"
            // }

            $table->boolean('is_active')->default(true); // Trạng thái hoạt động của biến thể (có thể ẩn/hiện)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
