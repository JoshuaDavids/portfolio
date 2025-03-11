import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

// eslint-disable-next-line no-new
new Swiper('.image-carousel-swiper', {
  modules: [Navigation, Pagination, Autoplay],
  slidesPerView: 'auto',
  autoplay: true,
  spaceBetween: 30,
  centeredSlides: true,
  effect: 'coverflow',
  autoHeight: true,
  loop: true,
  scrollbar: {
    el: '.swiper-scrollbar',
    hide: false,
    draggable: true,
    dragSize: 'auto',
    snapOnRelease: true,
  },

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
