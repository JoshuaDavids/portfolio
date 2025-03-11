<?php
/**
 * Template Function - Posts Grid
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posts Grid HTML.
 *
 * @param array  $posts The posts to build a grid for.
 * @param string $post_template The function name of the card template.
 */
function wskt_get_posts_grid( $posts = array(), $post_template = 'wskt_get_post_card' ) {
	if ( empty( $posts ) ) {
		return;
	}

	$output = '';

	foreach ( $posts as $post ) {
		$output .= '<div class="g-col-12 g-col-md-4">';

		if ( is_callable( $post_template ) ) {
			$output .= $post_template( $post );
		} else {
			$output .= wskt_get_post_card( $post );
		}

		$output .= '</div>';
	}

	return sprintf( '<div class="posts-grid grid">%1$s</div>', $output );
}

/**
 * Output the Posts Grid HTML.
 *
 * @param mixed ...$args Posts Grid arguments, @see wskt_get_posts_grid() for a description.
 */
function wskt_posts_grid( ...$args ) {
	echo wskt_get_posts_grid( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
