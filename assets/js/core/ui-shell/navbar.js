import throttle from 'lodash.throttle';

function navbar() {
  let st = $(window).scrollTop();
  let lastScrollTop = 0;

  const $navbar = $('.site-header > .navbar');

  function handlePinning() {
    if (st > lastScrollTop) {
      // Scrolling Downwards

      if (st > 80) {
        $navbar.addClass('navbar--hide');
      }
    } else {
      // Scrolling upwards

      $navbar.removeClass('navbar--hide');
    }
  }

  function handleScroll() {
    st = $(window).scrollTop();

    const delta = Math.abs(st - lastScrollTop);

    // Desensitise.
    if (delta > 4) {
      handlePinning();
    }

    lastScrollTop = st;
  }

  function init() {
    handlePinning();

    // Register event handlers.
    $(window).on('scroll', throttle(handleScroll, 16.666, { trailing: true }));
    $(window).on('resize', throttle(handleScroll, 111, { trailing: true }));
  }

  init();
}

jQuery(navbar);
