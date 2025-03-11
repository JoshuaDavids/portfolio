<?php
/**
 * Template Function - Posts List
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posts List HTML.
 *
 * @param array  $posts The posts to build a grid for.
 * @param string $post_template The function name of the card template.
 */
function wskt_get_posts_list( $posts = array(), $post_template = 'wskt_get_post_tile' ) {
	if ( empty( $posts ) ) {
		return;
	}

	$output = '';

	foreach ( $posts as $post ) {
		$output .= '<div class="posts-list__item">';

		if ( is_callable( $post_template ) ) {
			$output .= $post_template( $post );
		} else {
			$output .= wskt_get_post_tile( $post );
		}

		$output .= '</div>';
	}

	return sprintf( '<div class="posts-list">%1$s</div>', $output );
}

/**
 * Output the Posts List HTML.
 *
 * @param mixed ...$args Posts List arguments, @see wskt_get_posts_list() for a description.
 */
function wskt_posts_list( ...$args ) {
	echo wskt_get_posts_list( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
