<?php
/**
 * Template part for the Search Filter.
 *
 * @package WSK_Theme
 */

/**
 * Return the Search Filter HTML.
 *
 * @param array $attrs Search Filter attributes.
 */
function wskt_get_search_filter( $attrs = array() ) {
	$default_attrs = array(
		'search_term' => '',
		'placeholder' => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$output = '';

	$output .= '<div class="posts-filter__header">';
	$output .= esc_attr__( 'Search:', 'wsk-theme' );
	$output .= '</div>';

	$output .= '<div class="posts-filter__body">';
	$output .= sprintf(
		'<input class="search-filter__input form-control form-control-sm" type="text" value="%1$s" placeholder="%2$s" name="search_term" />',
		esc_attr( $attrs['search_term'] ),
		esc_attr( $attrs['placeholder'] ),
	);
	$output .= '</div>';

	return sprintf( '<div class="posts-filter search-filter">%1$s</div>', $output );
}

/**
 * Output the Search Filter HTML.
 *
 * @param mixed ...$args Search Filter arguments, @see wskt_get_search_filter() for a description.
 */
function wskt_search_filter( ...$args ) {
	echo wskt_get_search_filter( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
