<?php
/**
 * Template Function - Posts Pagination
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posts Pagination HTML.
 *
 * @param array $attrs Posts Pagination attributes.
 */
function wskt_get_posts_pagination( $attrs = array() ) {
	$attrs = array(
		'current_page' => max( 1, $attrs['current_page'] ),
		'max_pages'    => max( 0, $attrs['max_pages'] ),
	);

	if ( intval( $attrs['max_pages'] ) <= 1 ) {
		return;
	}

	$output = '';

	// Add previous page button
	$previous_button_attributes = array();
	if ( 1 === intval( $attrs['current_page'] ) ) {
		$previous_button_attributes['disabled'] = 'true';
	} else {
		$previous_button_attributes['data-page'] = $attrs['current_page'] - 1;
	}
	$output .= wskt_get_icon_button(
		array(
			'icon'       => wskt_get_icon(
				'arrow-left-line',
				'remix/arrows'
			),
			'attributes' => $previous_button_attributes,
		)
	);

	$output .= sprintf( '<span class="posts-pagination-detail">%1$s/%2$s</span>', $attrs['current_page'], $attrs['max_pages'] );

	// Add next page button
	$next_button_attributes = array();
	if ( intval( $attrs['current_page'] ) === intval( $attrs['max_pages'] ) ) {
		$next_button_attributes['disabled'] = 'true';
	} else {
		$next_button_attributes['data-page'] = $attrs['current_page'] + 1;
	}
	$output .= wskt_get_icon_button(
		array(
			'icon'       => wskt_get_icon(
				'arrow-right-line',
				'remix/arrows'
			),
			'attributes' => $next_button_attributes,
		)
	);

	return sprintf( '<div class="posts-pagination">%1$s</div>', $output );
}

/**
 * Output the Posts Pagination HTML.
 *
 * @param mixed ...$args Posts Pagination arguments, @see wskt_get_posts_pagination() for a description.
 */
function wskt_posts_pagination( ...$args ) {
	echo wskt_get_posts_pagination( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
