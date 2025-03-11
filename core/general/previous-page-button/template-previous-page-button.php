<?php
/**
 * Template - Previous Page Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Previous Page Button HTML.
 */
function wskt_get_previous_page_button() {
	$referrer = wp_get_referer();
	$home_url = get_home_url();

	if ( $referrer && strpos( $referrer, $home_url ) !== false ) {
		$url = $referrer;
	} else {
		$url = $home_url;
	}

	$output = wskt_get_back_button(
		array(
			'url'        => esc_url( $url ),
			'attributes' => array(
				'data-wsk-toggle' => 'previous-page',
			),
		)
	);

	return $output;
}

/**
 * Output the Previous Page Button HTML.
 */
function wskt_previous_page_button() {
	echo wskt_get_previous_page_button(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
