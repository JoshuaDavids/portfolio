<?php
/**
 * Post Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'layout-post-content.php';

/**
 * Configure Post Sidebar Header
 *
 * @param string $header The post sidebar header.
 */
function wskt_configure_post_sidebar_header( $header ) {
	$header .= '<div class="sidebar__group">';
	$header .= wskt_get_previous_page_button();
	$header .= '</div>';

	return $header;
}
add_filter( 'wskt_post_sidebar_header', 'wskt_configure_post_sidebar_header' );

/**
 * Configure Post Sidebar Body
 *
 * @param string $body The post sidebar body.
 */
function wskt_configure_post_sidebar_body( $body ) {
	$post_type = get_post_type();

	if ( 'post' !== $post_type ) {
		return $body;
	}

	$post_id = get_the_ID();

	$post_terms = wskt_get_post_terms( $post_id, array( 'output_type' => 'text' ) );
	if ( ! empty( $post_terms ) ) {
		$body .= '<div class="sidebar__group">';
		$body .= sprintf(
			'<strong>%1$s</strong>',
			$post_terms
		);
		$body .= '</div>';
	}

	$posted_by = wskt_get_posted_by( $post_id );
	if ( ! empty( $posted_by ) ) {
		$body .= '<div class="sidebar__group">';
		$body .= $posted_by;
		$body .= '</div>';
	}

	$posted_on = wskt_get_posted_on( $post_id );
	if ( ! empty( $posted_by ) ) {
		$body .= '<div class="sidebar__group">';
		$body .= $posted_on;
		$body .= '</div>';
	}

	$sharing_buttons = wskt_get_sharing_buttons();
	if ( ! empty( $sharing_buttons ) ) {
		$body .= '<div class="sidebar__group">';
		$body .= sprintf(
			'<small>%1$s</small>',
			__( 'Share', 'wsk-theme' )
		);
		$body .= $sharing_buttons;
		$body .= '</div>';
	}

	return $body;
}
add_filter( 'wskt_post_sidebar_body', 'wskt_configure_post_sidebar_body' );
