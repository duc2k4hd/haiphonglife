// XỬ LÝ ĐỊNH VỊ VỊ TRÍ MENU
document.querySelectorAll('.shop__haiphonglife_header_main_nav_links_item_title').forEach((item, index) => {
  const percent = (item.getBoundingClientRect().left / window.innerWidth) * 100;
  document.querySelectorAll('.shop__haiphonglife_header_main_nav_links_item_list')[index].style.transform = `translateX(-${percent}%)`;
});

// MENU CỐ ĐỊNH KHI CUỘN
const mainMenu = document.querySelector('.shop__haiphonglife_header_main_nav');
window.addEventListener('scroll', () => {
  mainMenu.classList.toggle('shop__haiphonglife_header_main_nav_fixed', window.scrollY > 240);
});

document.querySelectorAll('.shop__haiphonglife_header_mobile_main_nav_links_item_title').forEach(title => {
  title.addEventListener('click', () => {
    const subMenu = title.nextElementSibling;
    if (subMenu) {
      const isVisible = subMenu.style.display === 'flex';
      subMenu.style.display = isVisible ? 'none' : 'flex';
      // Xoay icon nếu có SVG
      const svg = title.querySelector('svg');
      if (svg) {
        svg.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(180deg)';
      }
    }
  });
});

const openMenuMobile = document.querySelector('.shop__haiphonglife_header_main_mobile_bars')
const closeMenuMobile = document.querySelector('.shop__haiphonglife_header_mobile_main_nav_close')
const menuMobile = document.querySelector('.shop__haiphonglife_header_mobile_main_nav')
openMenuMobile.addEventListener('click', function() {
  menuMobile.classList.add('display_flex');
  menuMobile.classList.remove('display_none');
})

closeMenuMobile.addEventListener('click', function() {
  menuMobile.classList.add('display_none');
  menuMobile.classList.remove('display_flex');
})

const backToTopBtn = document.querySelector(".shop__haiphonglife_back_to_top");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    backToTopBtn.style.display = "flex";
  } else {
    backToTopBtn.style.display = "none";
  }
});

backToTopBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});