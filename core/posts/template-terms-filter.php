<?php
/**
 * Template part for the Terms Filter.
 *
 * @package WSK_Theme
 */

/**
 * Return the Terms Filter HTML.
 *
 * @param array $attrs Terms Filter attributes.
 */
function wskt_get_terms_filter( $attrs = array() ) {
	$default_attrs = array(
		'terms' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	if ( empty( $attrs['terms'] ) ) {
		return;
	}

	$current_term_id = get_queried_object_id();

	$output = '';

	$output .= '<div class="posts-filter__header">';
	$output .= esc_attr__( 'Type:', 'wsk-theme' );
	$output .= '</div>';

	$output .= '<div class="posts-filter__body">';
	$output .= sprintf(
		'<select class="terms-filter__input form-control form-control-sm" name="term" />',
		esc_attr__( 'Select Type', 'wsk-theme' )
	);
	$output .= sprintf(
		'<option value="0">%1$s</option>',
		esc_attr__( 'Any', 'wsk-theme' )
	);
	foreach ( $attrs['terms'] as $term ) {
		$selected = ( $term->term_id == $current_term_id ) ? 'selected' : '';
		$output  .= sprintf(
			'<option value="%1$s" %3$s>%2$s</option>',
			esc_attr( $term->term_id ),
			esc_html( $term->name ),
			$selected
		);
	}
	$output .= '</select>';
	$output .= '</div>';

	return sprintf( '<div class="posts-filter terms-filter">%1$s</div>', $output );
}

/**
 * Output the Terms Filter HTML.
 *
 * @param mixed ...$args Terms Filter arguments, @see wskt_get_terms_filter() for a description.
 */
function wskt_terms_filter( ...$args ) {
	echo wskt_get_terms_filter( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
