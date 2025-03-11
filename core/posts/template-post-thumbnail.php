<?php
/**
 * Template Function - Post Thumbnail
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Post Thumbnail HTML.
 *
 * @param WP_Post $post The post to retrieve the thumbnail for.
 * @param array   $attrs Thumbnail attributes.
 */
function wskt_get_post_thumbnail( $post, $attrs = array() ) {
	$default_attrs = array(
		'fallback' => false,
		'ratio'    => 'ratio-4x3',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Bail if the post has no thumbnail and the fallback is disabled.
	if ( ! has_post_thumbnail( $post ) && false === $attrs['fallback'] ) {
		return;
	}

	// Return the fallback image if the post does not have a thumbnail
	if ( ! has_post_thumbnail( $post ) ) {
		$classes[] = 'media';

		// Add ratio classes.
		$classes[] = 'ratio';
		$classes[] = $attrs['ratio'];

		// TODO: Move to theme setting then we can get a file ID and avoid the additional templating below.
		$fallback_url = get_template_directory_uri() . '/dist/img/thumbnail-fallback.svg';

		return sprintf(
			'<div class="%1$s"><div class="media-inner"><img src="%2$s" /></div></div>',
			esc_attr( implode( ' ', $classes ) ),
			esc_url( $fallback_url )
		);
	}

	return wskt_get_media(
		array(
			'type'  => 'image',
			'image' => get_post_thumbnail_id( $post ),
			'ratio' => $attrs['ratio'],
		),
	);
}

/**
 * Output the Post Thumbnail HTML.
 *
 * @param mixed ...$args Post Thumbnail arguments, @see wskt_get_post_thumbnail() for a description.
 */
function wskt_post_thumbnail( ...$args ) {
	echo wskt_get_post_thumbnail( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
