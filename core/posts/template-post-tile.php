<?php
/**
 * Template Function - Post Tile
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Post Tile HTML.
 *
 * @param WP_Post|int $post The Post to prepare a tile for.
 */
function wskt_get_post_tile( $post ) {
	if ( ! $post ) {
		return;
	}

	$output = '';

	$output .= '<div class="post-tile__body">';
	$output .= sprintf(
		'<div class="post-tile__meta"><small>%1$s</small></div>',
		wskt_get_posted_on( $post )
	);
	$output .= sprintf(
		'<h4 class="post-tile__title"><a href="%1$s" class="link-muted">%2$s</a></h4>',
		get_the_permalink( $post ),
		get_the_title( $post ),
	);
	$output .= sprintf(
		'<div class="post-tile__excerpt">%1$s</div>',
		wp_trim_words( get_the_excerpt( $post ), 60 )
	);
	$output .= '</div>';

	return sprintf( '<div class="post-tile">%1$s</div>', $output );
}

/**
 * Output the Post Tile HTML.
 *
 * @param mixed ...$args Post Tile arguments, @see wskt_get_post_tile() for a description.
 */
function wskt_post_tile( ...$args ) {
	echo wskt_get_post_tile( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
