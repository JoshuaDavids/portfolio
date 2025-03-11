<?php
/**
 * Template Function - Navbar Menu Overlay
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Navbar Menu Overlay HTML.
 */
function wskt_get_navbar_menu_overlay() {
	$content = '';

	$content .= wskt_get_navbar_menu();

	return wskt_get_overlay(
		array(
			'id'      => 'navbar-menu-overlay',
			'content' => $content,
			'classes' => array( 'navbar-menu-overlay colour-scheme colour-scheme--dark' ),
		)
	);
}

/**
 * Output the Navbar Menu Overlay HTML.
 */
function wskt_navbar_menu_overlay() {
	echo wskt_get_navbar_menu_overlay(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
