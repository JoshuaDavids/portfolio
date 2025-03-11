<?php
/**
 * Navbar Menu
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Navbar Menu.
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
register_nav_menus(
	array(
		'navbar_menu' => esc_html__( 'Navbar Menu', 'wsk-theme' ),
	)
);

/**
 * Output the Navbar Menu HTML.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function wskt_get_navbar_menu() {
	$defaults = array(
		'menu'           => esc_html__( 'The navbar menu', 'wsk-theme' ),
		'theme_location' => 'navbar_menu',
		'depth'          => 3,
		'container'      => '',
		'menu_class'     => 'navbar-nav',
		'walker'         => new Walker_Bootstrap_Nav_Menu(),
		'fallback_cb'    => false,
		'echo'           => false,
	);

	$args = apply_filters( 'wskt_navbar_menu_args', $defaults );

	return wp_nav_menu( $args );
}

/**
 * Output the Navbar Menu HTML.
 */
function wskt_navbar_menu() {
	echo wskt_get_navbar_menu(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
