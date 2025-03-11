<?php
/**
 * Navigation Menu
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Customise Navigation Menu widget.
 *
 * @param array   $nav_menu_args An array of arguments passed to wp_nav_menu() to retrieve a navigation menu.
 * @param WP_Term $nav_menu Nav menu object for the current menu.
 * @param array   $args Display arguments for the current widget.
 * @param array   $instance Array of settings for the current widget.
 */
function wskt_customise_widget_nav_menu_args( $nav_menu_args, $nav_menu, $args, $instance ) {
	// Add custom class to the menu list.
	$nav_menu_args['menu_class'] = 'list-unstyled';

	// Add custom class to the link elements.
	$nav_menu_args['menu_item_link_classes'] = array( 'link-muted' );

	return $nav_menu_args;
}
add_filter( 'widget_nav_menu_args', 'wskt_customise_widget_nav_menu_args', 1, 4 );

/**
 * Customise Navigation Menu widget item link element.
 *
 * @param array    $attrs The HTML attributes applied to the menu item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function wskt_add_widget_nav_menu_link_class( $attrs, $item, $args, $depth ) {
	if ( ! empty( $args->menu_item_link_classes ) ) {
		$attrs['class'] = implode( ' ', $args->menu_item_link_classes );
	}

	return $attrs;
}
add_filter( 'nav_menu_link_attributes', 'wskt_add_widget_nav_menu_link_class', 1, 4 );
