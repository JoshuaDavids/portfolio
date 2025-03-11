<?php
/**
 * Template Function - Posted By
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posted By HTML.
 *
 * @param WP_Post|int $post The Post to prepare the Posted By for.
 */
function wskt_get_posted_by( $post ) {
	$author_id    = get_post_field( 'post_author', $post );
	$display_name = get_the_author_meta( 'display_name', $author_id );

	if ( empty( $display_name ) ) {
		return;
	}

	$output  = '';
	$output .= $display_name;

	return sprintf( '<div class="posted-by">%1$s</div>', $output );
}

/**
 * Output the Posted By HTML.
 *
 * @param mixed ...$args Posted By arguments, @see wskt_get_posted_by() for a description.
 */
function wskt_posted_by( ...$args ) {
	echo wskt_get_posted_by( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
