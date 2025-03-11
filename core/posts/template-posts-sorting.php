<?php
/**
 * Template Function - Posts Sorting
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posts Sorting HTML.
 *
 * @param array $attrs Posts Sorting attributes.
 */
function wskt_get_posts_sorting( $attrs = array() ) {
	$default_attrs = array(
		'order' => 'DESC',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$output = '';

	$output .= '<div class="posts-filter__header">';
	$output .= esc_attr__( 'Sort:', 'wsk-theme' );
	$output .= '</div>';

	$output .= '<div class="posts-filter__body">';
	$output .= '<select class="posts-sorting__input form-control form-control-sm" name="order" />';
	$output .= sprintf(
		'<option value="DESC">%1$s</option %2$s>',
		esc_attr__( 'Newest First', 'wsk-theme' ),
		'DESC' === $attrs['order'] ? 'selected' : ''
	);
	$output .= sprintf(
		'<option value="ASC">%1$s</option>',
		esc_attr__( 'Oldest First', 'wsk-theme' ),
		'ASC' === $attrs['order'] ? 'selected' : ''
	);
	$output .= '</select>';
	$output .= '</div>';

	return sprintf( '<div class="posts-filter posts-sorting">%1$s</div>', $output );
}

/**
 * Output the Posts Sorting HTML.
 *
 * @param mixed ...$args Posts Sorting arguments, @see wskt_get_posts_sorting() for a description.
 */
function wskt_posts_sorting( ...$args ) {
	echo wskt_get_posts_sorting( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
