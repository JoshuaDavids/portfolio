import Swiper, { Navigation, Pagination, Autoplay, Scrollbar } from 'swiper';

const testSlider = document.getElementsByClassName('layout--testimonials-slider');

if (testSlider.length) {
  for (var i = 0; i < testSlider.length; i++) {
    const sliderEl = testSlider[i].querySelector('.swiper');

    const controls = testSlider[i].querySelector('.swiper-controls');

    const swiperNext = controls.querySelector('.swiper-button-next');
    const swiperPrev = controls.querySelector('.swiper-button-prev');

    const swiperScrollbar = controls.querySelector('.swiper-scrollbar');

    // console.log(swiperScrollbar);

    new Swiper(sliderEl, {
      modules: [Navigation, Pagination, Autoplay, Scrollbar],
      slidesPerView: 2.5,
      autoplay: false,
      spaceBetween: 30,
      effect: 'coverflow',
      autoHeight: true,
      loop: false,
      scrollbar: {
        el: swiperScrollbar,
        hide: false,
        draggable: true,
        dragSize: 'auto',
        snapOnRelease: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1.1,
          spaceBetween: 15,
        },
        480: {
          slidesPerView: 1.1,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 2.1,
          spaceBetween: 30,
        },
      },
      // pagination: {
      //   el: swiperPagination,
      //   type: 'fraction',
      //   clickable: true,
      // },
      navigation: {
        nextEl: swiperNext,
        prevEl: swiperPrev,
      },
    });
  }
}
