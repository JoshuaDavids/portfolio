<?php
/**
 * Footer Sub Menu
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Footer Sub Menu.
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
register_nav_menus(
	array(
		'footer_sub_menu' => esc_html__( 'Footer Sub Menu', 'wsk-theme' ),
	)
);

/**
 * Output the Footer Sub Menu HTML.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function wskt_get_footer_sub_menu() {
	$defaults = array(
		'menu'           => esc_html__( 'The footer sub menu', 'wsk-theme' ),
		'theme_location' => 'footer_sub_menu',
		'depth'          => 1,
		'container'      => '',
		'menu_class'     => 'list-inline',
		'fallback_cb'    => false,
		'echo'           => false,
	);

	$args = apply_filters( 'wskt_footer_sub_menu_args', $defaults );

	return wp_nav_menu( $args );
}

/**
 * Output the Footer Sub Menu HTML.
 */
function wskt_footer_sub_menu() {
	echo wskt_get_footer_sub_menu(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Customise menu item’s anchor element.
 *
 * @param array    $attrs The HTML attributes applied to the menu item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function wskt_add_footer_sub_menu_link_class( $attrs, $item, $args, $depth ) {
	// Add muted link class to all menus except the main_menu.
	if ( 'footer_sub_menu' === $args->theme_location ) {
		$attrs['class'] = 'link-muted';
	}

	return $attrs;
}
add_filter( 'nav_menu_link_attributes', 'wskt_add_footer_sub_menu_link_class', 1, 4 );
