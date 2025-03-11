<?php
/**
 * Template Function - Post Terms
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Post Terms HTML.
 *
 * @param WP_Post|int $post The Post to prepare the Post Terms for.
 * @param array       $attrs Post Terms attributes.
 */
function wskt_get_post_terms( $post, $attrs = array() ) {
	$default_attrs = array(
		'taxonomy'    => 'category',
		'output_type' => 'text', // Supports text | link.
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$terms = get_the_terms( $post, $attrs['taxonomy'] );

	if ( empty( $terms ) ) {
		return;
	}

	$output = '';

	foreach ( $terms as $term ) {
		if ( 'text' === $attrs['output_type'] ) {
			$output .= sprintf(
				'<span class="post-term">%1$s</span>',
				esc_attr( $term->name )
			);
		}

		if ( 'link' === $attrs['output_type'] ) {
			$output .= sprintf(
				'<a href="%1$s" class="post-term link-muted">%2$s</a>',
				esc_url( get_term_link( $term->term_id ) ),
				esc_attr( $term->name )
			);
		}
	}

	return sprintf( '<div class="post-terms">%1$s</div>', $output );
}

/**
 * Output the Post Terms HTML.
 *
 * @param mixed ...$args Post Terms arguments, @see wskt_get_post_terms() for a description.
 */
function wskt_post_terms( ...$args ) {
	echo wskt_get_post_terms( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
