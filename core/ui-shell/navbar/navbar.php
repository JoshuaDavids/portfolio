<?php
/**
 * Navbar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'layouts/navbar/layout-navbar.php';

/**
 * Menus
 */
require_once 'navbar-menu.php';

/**
 * Template Functions
 */
require_once 'template-navbar-brand.php';
require_once 'template-navbar-menu-overlay.php';
require_once 'template-navbar-toggler.php';

/**
 * Hook the Mobile Menu Overlay into the footer
 */
add_filter( 'wp_footer', 'wskt_navbar_menu_overlay' );
