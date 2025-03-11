<?php
/**
 * Component - Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Checks whether media is empty.
 *
 * @param array $media Media attributes.
 */
function wskt_media_is_empty( $media = array() ) {
	$is_empty = true;

	if ( empty( $media ) ) {
		return $is_empty;
	}

	switch ( $media['type'] ) {
		case 'image':
			$is_empty = empty( $media['image'] );

			break;
		case 'video':
			$is_empty = empty( $media['video'] );

			break;
	}

	return $is_empty;
}

/**
 * Return the Media HTML.
 *
 * @param array $media Media attributes.
 * @param array $classes Additional classes to apply to the wrapping element.
 */
function wskt_get_media( $media = array(), $classes = array() ) {
	$media = wskt_unwrap_attrs( 'media', $media );

	if ( wskt_media_is_empty( $media ) ) {
		return;
	}

	$classes[] = 'media';

	// Add ratio classes.
	if ( ! empty( $media['ratio'] ) ) {
		$classes[] = 'ratio';
		$classes[] = $media['ratio'];
	}

	$output = '';
	switch ( $media['type'] ) {
		case 'image':
			// TODO: add correct image size.
			$output = wp_get_attachment_image( $media['image'], 'full' );
			break;
		case 'video':
			// TODO: add correct image size.
			$video_poster = wp_get_attachment_image_url( $media['video_poster'], 'full' );
			$output       = sprintf( '<video src="%1$s" poster="%2$s?auto=compress,format" playsinline autoplay muted loop></video>', esc_url( $media['video'] ), esc_url( $video_poster ) );
			break;
	}

	return sprintf( '<div class="%1$s"><div class="media__inner">%2$s</div></div>', esc_attr( implode( ' ', $classes ) ), wp_kses( $output, 'post' ) );
}

/**
 * Output the Media HTML.
 *
 * @param mixed ...$args Media arguments, @see wskt_get_media() for a description.
 */
function wskt_media( ...$args ) {
	echo wskt_get_media( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
