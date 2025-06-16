// Show ảnh sản phẩm
const boxIMG = document.querySelector('.shop_haiphonglife_single_info_images_main');
const mainIMG = document.querySelector('.shop_haiphonglife_single_info_images_main_image');

boxIMG.addEventListener('click', function() {
    boxIMG.classList.toggle('shop_haiphonglife_single_info_images_main_overlay');
    mainIMG.classList.toggle('shop_haiphonglife_single_info_images_main_image_show');
})

// Tabs mô tả

const shop_haiphonglife_single_desc_button = document.querySelectorAll('.shop_haiphonglife_single_desc_button button');
const shop_haiphonglife_single_desc_tabs = document.querySelectorAll('.shop_haiphonglife_single_desc_tabs > div');

shop_haiphonglife_single_desc_button.forEach((item, index) => {
  item.addEventListener('click', () => {
    // Xóa class active khỏi tất cả button và tab
    shop_haiphonglife_single_desc_button.forEach(btn => btn.classList.remove('shop_haiphonglife_single_desc_button_active'));
    shop_haiphonglife_single_desc_tabs.forEach(tab => tab.classList.remove('shop_haiphonglife_single_desc_tabs_active'));

    // Thêm class active cho button và tab đang click
    item.classList.add('shop_haiphonglife_single_desc_button_active');
    shop_haiphonglife_single_desc_tabs[index].classList.add('shop_haiphonglife_single_desc_tabs_active');
  });
});

// Kích hoạt tab đầu tiên mặc định
shop_haiphonglife_single_desc_button[0].click();