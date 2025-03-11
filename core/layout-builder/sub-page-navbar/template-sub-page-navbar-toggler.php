<?php
/**
 * Template Function - Sub Page Navbar Toggler
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Sub Page Navbar Toggler HTML.
 */
function wskt_get_sub_page_navbar_toggler() {
	$toggle_attrs = array(
		'class'          => 'sub-page-navbar-toggler',
		'aria-controls'  => 'subNavbarSupportedContent',
		'aria-expanded'  => 'false',
		'aria-label'     => esc_attr__( 'Toggle sub page navigation', 'wsk-theme' ),
		'data-bs-target' => '#subNavbarSupportedContent',
		'data-bs-toggle' => 'collapse',
		'type'           => 'button',
	);

	$toggle_attributes_string = wskt_implode_html_attributes( $toggle_attrs );

	$html  = '';
	$html .= '<button ' . $toggle_attributes_string . '>';
	$html .= wskt_get_icon(
		'menu-3-line',
		'remix/system',
		array(
			'height' => '20',
			'width'  => '20',
		)
	);
	$html .= '</button>';

	return $html;
}

/**
 * Output the Sub Page Navbar Toggler HTML.
 */
function wskt_sub_page_navbar_toggler() {
	echo wskt_get_sub_page_navbar_toggler(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
