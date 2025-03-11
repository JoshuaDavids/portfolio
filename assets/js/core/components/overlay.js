function showOverlay(target) {
  $(target).data('wsk-active', true);
  $(target).addClass('overlay--active');
  $('body').addClass('overlay--scroll-lock');
}

function hideOverlay(target) {
  $(target).data('wsk-active', false);
  $(target).removeClass('overlay--active');
  $('body').removeClass('overlay--scroll-lock');
}

function toggleOverlay() {
  const target = $(this).data('wsk-target');

  if (!target) {
    return;
  }

  const isActive = $(target).data('wsk-active');

  if (isActive) {
    hideOverlay(target);

    // Update the triggering element
    $(this).attr('aria-expanded', 'false');
  } else {
    showOverlay(target);

    // Update the triggering element
    $(this).attr('aria-expanded', 'true');
  }
}

function init() {
  $('[data-wsk-toggle="overlay"]').on('click', toggleOverlay);
}

jQuery(init);
