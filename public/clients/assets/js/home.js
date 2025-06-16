// SLIDER CHÍNH
const sliderList = document.querySelector('.shop__haiphonglife_main_slider_track');
const slides = document.querySelectorAll('.shop__haiphonglife_main_slider_item');
const dots = document.querySelectorAll('.shop__haiphonglife_main_slider_dot');
let currentSlide = 0;

const updateSlider = () => {
  dots.forEach(dot => dot.classList.remove('shop__haiphonglife_main_slider_dot_active'));
  dots[currentSlide].classList.add('shop__haiphonglife_main_slider_dot_active');
  sliderList.style.transform = `translateX(-${currentSlide * 100}%)`;
};

document.querySelector('.shop__haiphonglife_main_slider_prev').addEventListener('click', function() {
  currentSlide = (currentSlide - 1 + slides.length) % slides.length;
  updateSlider();
});

document.querySelector('.shop__haiphonglife_main_slider_next').addEventListener('click', () => {
  currentSlide = (currentSlide + 1) % slides.length;
  updateSlider();
});

dots.forEach((dot, idx) => {
  dot.addEventListener('click', () => {
    currentSlide = idx;
    updateSlider();
  });
});

setInterval(() => {
  currentSlide = (currentSlide + 1) % slides.length;
  updateSlider();
}, 5000);

// SLIDER DANH MỤC
const prevCat = document.querySelector('.shop__haiphonglife_main_categories_title_actions_prev');
const nextCat = document.querySelector('.shop__haiphonglife_main_categories_title_actions_next');
const categoryList = document.querySelector('.shop__haiphonglife_main_categories_list');
const catItems = document.querySelectorAll('.shop__haiphonglife_main_categories_item');
const catCount = catItems.length;
const catWidth = catItems[0].offsetWidth;
let translateX = 0;

const updateCatVisible = () => {
  const containerWidth = window.innerWidth * 0.9;
  const itemFullWidth = catWidth + 20; // 10px margin hai bên
  return Math.floor(containerWidth / itemFullWidth);
};

const visibleCat = updateCatVisible();

const moveCategory = (dir) => {
  const maxTranslate = -((catCount - visibleCat) * catWidth);
  translateX += dir * catWidth;
  if (translateX > 0) translateX = maxTranslate;
  if (translateX < maxTranslate) translateX = 0;
  categoryList.style.transform = `translateX(${translateX}px)`;
};

setInterval(() => moveCategory(-1), 5000);

prevCat.addEventListener('click', () => moveCategory(1));
nextCat.addEventListener('click', () => moveCategory(-1));

// SLIDER BÁN CHẠY
const bestsellerList = document.querySelector('.shop__haiphonglife_main_product_bestseller_content_items');
const nextBest = document.querySelector('.shop__haiphonglife_main_product_bestseller_content_pagination_next');
const prevBest = document.querySelector('.shop__haiphonglife_main_product_bestseller_content_pagination_prev');

let animating = false;
let autoSlideInterval;

const slideBestseller = (dir) => {
  if (animating) return;
  animating = true;

  if (dir === -1) {
    bestsellerList.style.transition = 'transform 0.5s ease';
    bestsellerList.style.transform = 'translateX(-290px)';
    setTimeout(() => {
      bestsellerList.style.transition = 'none';
      bestsellerList.appendChild(bestsellerList.firstElementChild);
      bestsellerList.style.transform = 'translateX(0)';
      animating = false;
    }, 500); // ⏱ animation duration
  } else {
    bestsellerList.prepend(bestsellerList.lastElementChild);
    bestsellerList.style.transition = 'transform 0.5s ease';
    bestsellerList.style.transform = 'translateX(290px)';
    setTimeout(() => {
      bestsellerList.style.transition = 'none';
      bestsellerList.style.transform = 'translateX(0)';
      animating = false;
    }, 500);
  }
};

// Điều khiển thủ công
nextBest.addEventListener('click', () => slideBestseller(-1));
prevBest.addEventListener('click', () => slideBestseller(1));

// Tự động lướt mỗi 5 giây
const startAutoSlide = () => {
  autoSlideInterval = setInterval(() => slideBestseller(-1), 2000);
};

const stopAutoSlide = () => {
  clearInterval(autoSlideInterval);
};

// Dừng khi hover, tiếp tục khi rời chuột
bestsellerList.addEventListener('mouseenter', stopAutoSlide);
bestsellerList.addEventListener('mouseleave', startAutoSlide);

// Bắt đầu tự động khi load trang
startAutoSlide();

