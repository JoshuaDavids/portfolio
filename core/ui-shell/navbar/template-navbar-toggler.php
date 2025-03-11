<?php
/**
 * Template Function - Navbar Toggler
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Navbar Toggler HTML.
 */
function wskt_get_navbar_toggler() {
	$toggle_attrs = array(
		'class'           => 'navbar-toggler',
		'aria-controls'   => 'navbar-menu-overlay',
		'aria-expanded'   => 'false',
		'aria-label'      => esc_attr__( 'Toggle navigation', 'wsk-theme' ),
		'data-wsk-toggle' => 'overlay',
		'data-wsk-target' => '#navbar-menu-overlay',
		'type'            => 'button',
	);

	$toggle_attributes_string = wskt_implode_html_attributes( $toggle_attrs );

	$html  = '';
	$html .= '<button ' . $toggle_attributes_string . '>';
	$html .= '<span class="navbar-toggler__icon"></span>';
	$html .= '</button>';

	return $html;
}

/**
 * Output the Navbar Toggler HTML.
 */
function wskt_navbar_toggler() {
	echo wskt_get_navbar_toggler(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
