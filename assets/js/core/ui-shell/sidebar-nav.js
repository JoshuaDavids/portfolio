/**
 * Close the Sub Menu.
 */
const closeSubMenu = (e) => {
  e.preventDefault();

  const $toggle = $(e.currentTarget);

  // Update toggle attributes
  const $subMenu = $toggle.closest('.sidebar-nav__sub-menu');
  const $subMenuToggle = $subMenu.prev('[data-wsk-toggle="sidebar-nav-sub-menu"]');
  $subMenuToggle.attr('aria-expanded', 'false');

  // Remove sidebar nav active state
  const $sidebarNav = $toggle.closest('.sidebar-nav');
  $sidebarNav.removeClass('sidebar-nav--sub-menu-active');
};

/**
 * Open the Sub Menu.
 */
const openSubMenu = (e) => {
  e.preventDefault();

  const $toggle = $(e.currentTarget);

  // Update toggle attributes
  $toggle.attr('aria-expanded', 'true');

  // Add sidebar nav active state
  const $sidebarNav = $toggle.closest('.sidebar-nav');
  $sidebarNav.addClass('sidebar-nav--sub-menu-active');
};

/**
 * Toggle the Sub Menu.
 */
const toggleSubMenu = (e) => {
  e.preventDefault();

  const $toggle = $(e.currentTarget);

  const expanded = $toggle.attr('aria-expanded');

  if (expanded === 'true') {
    closeSubMenu(e);
  } else {
    openSubMenu(e);
  }
};

/**
 * Initialise the Sidebar Nav functionality.
 */
const init = () => {
  // Attach event handler
  $('[data-wsk-toggle="sidebar-nav-sub-menu"]').on('click', toggleSubMenu);
  $('[data-wsk-toggle="close-sidebar-nav-sub-menu"]').on('click', closeSubMenu);
};

jQuery(init);
