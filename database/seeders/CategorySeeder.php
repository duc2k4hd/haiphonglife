<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Trang chủ',
            'Thời trang' => [
                'Nam' => ['Áo thun nam', 'Áo sơ mi nam', 'Quần nam', 'Bộ đồ nam', 'Phụ kiện nam'],
                'Nữ' => ['Váy đầm', 'Áo kiểu nữ', 'Quần nữ', 'Bộ đồ nữ', 'Phụ kiện nữ'],
                'Unisex' => ['Bộ đồ nam nữ'],
            ],
            'Đồ gia dụng' => [
                'Nhà bếp' => ['Dụng cụ nấu ăn', 'Hộp đựng thực phẩm', 'Dao kéo – thớt'],
                'Phòng khách' => ['Đồ trang trí', 'Khay – lọ đựng'],
                'Phòng ngủ' => ['Chăn ga gối', 'Đèn ngủ'],
                'Nhà tắm' => ['Kệ – móc treo', 'Hộp đựng – dụng cụ tắm'],
            ],
            'Đồ điện – Phụ kiện' => ['Đèn led – đèn sạc', 'Ổ cắm – dây điện', 'Phụ kiện điện thoại', 'Quạt mini – máy làm mát'],
            'Phụ kiện sống chất' => ['Bình nước – ly cốc', 'Túi đeo – túi vải', 'Sổ tay – văn phòng phẩm', 'Đồ du lịch tiện ích', 'Đồ học tập'],
            'Khác' => ['Sản phẩm giảm giá', 'Hàng mới về', 'Gợi ý cho bạn'],
            'Liên hệ',
            'Giới thiệu',
            'Tin tức',
        ];

        foreach ($data as $key => $value) {
            if (is_string($key)) {
                // Danh mục có cấp con
                $mainCat = Category::create([
                    'name' => $key,
                    'slug' => Str::slug($key),
                    'is_active' => true,
                ]);

                if (is_array($value)) {
                    foreach ($value as $sub => $childs) {
                        if (is_array($childs)) {
                            // Danh mục cấp 2 có cấp 3
                            $subCat = Category::create([
                                'name' => $sub,
                                'slug' => Str::slug($sub),
                                'parent_id' => $mainCat->id,
                                'is_active' => true,
                            ]);

                            foreach ($childs as $child) {
                                Category::create([
                                    'name' => $child,
                                    'slug' => Str::slug($child),
                                    'parent_id' => $subCat->id,
                                    'is_active' => true,
                                ]);
                            }
                        } else {
                            // Danh mục cấp 2 không có cấp 3
                            Category::create([
                                'name' => $childs,
                                'slug' => Str::slug($childs),
                                'parent_id' => $mainCat->id,
                                'is_active' => true,
                            ]);
                        }
                    }
                }
            } else {
                // Danh mục cấp 1 không có con
                Category::create([
                    'name' => $value,
                    'slug' => Str::slug($value),
                    'is_active' => true,
                ]);
            }
        }
    }
}
