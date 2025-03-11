<?php
/**
 * Template Function - Next Layout Toggle
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Next Layout Toggle HTML.
 */
function wskt_get_next_layout_toggle() {
	$button = array(
		'icon'       => wskt_get_icon(
			'arrow-down-s-line',
			'remix/system',
			array(
				'height' => 24,
				'width'  => 24,
				'class'  => 'btn__icon',
			)
		),
		'attributes' => array(
			'data-wsk-toggle' => 'scroll-to-next-layout',
		),
		'classes'    => array( 'layout__scroll-to-next animation animation--fade-in animation--delay-6' ),
	);

	return wskt_get_icon_button( $button );
}

/**
 * Output the Next Layout Toggle HTML.
 */
function wskt_next_layout_toggle() {
	echo wskt_get_next_layout_toggle(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
