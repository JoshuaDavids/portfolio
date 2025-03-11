<?php
/**
 * Template Function - Back To Top Button
 *
 * TODO: Review
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Back To Top Button HTML.
 */
function wskt_get_back_to_top_button() {
	$button = array(
		'type'       => 'icon-bordered',
		'icon'       => wskt_get_icon(
			'arrow-up-s-line'
		),
		'attributes' => array(
			'data-wsk-toggle'   => 'back-to-top',
		),
		'classes'    => array( 'back-to-top' ),
	);

	return wskt_get_icon_button( $button );
}

/**
 * Output the Back To Top Button HTML.
 */
function wskt_back_to_top_button() {
	echo wskt_get_back_to_top_button(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
