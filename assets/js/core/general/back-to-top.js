function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
}

function init() {
  $('[data-wsk-toggle="back-to-top"]').on('click', scrollToTop);
}

jQuery(init);
