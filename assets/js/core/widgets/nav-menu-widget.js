let resizeTimer;

const $widget = $('.widget_nav_menu');
const $toggle = $widget.find('.widget-title');

/**
 * Toggles the menu between opened and closed
 */
function toggle() {
  const $parentWidget = $(this).closest('.widget_nav_menu');
  const $widgetMenu = $parentWidget.find('ul');
  $widgetMenu.slideToggle();
}

/**
 * Remove inline styles that are applied from toggling the menu
 */
function resetToggledMenus() {
  $widget.find('ul').removeAttr('style');
}

/**
 * Register event handler for toggling the menu for mobile only
 */
function registerEventHandlers() {
  if ($(window).width() <= 992) {
    $toggle.on('click', toggle);
  } else {
    $toggle.off('click', toggle);
    resetToggledMenus();
  }
}

/**
 * Register event handlers when resize event completes
 */
function handleResize() {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(registerEventHandlers, 500);
}

/**
 * Initialise menu widget functionality
 */
function init() {
  registerEventHandlers();
  $(window).on('resize', handleResize);
}

jQuery(init);
