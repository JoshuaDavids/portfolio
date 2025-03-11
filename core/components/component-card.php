<?php
/**
 * Component - Card
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Card HTML.
 *
 * @param array $attrs Card attributes.
 */
function wskt_get_card( $attrs = array() ) {
	$default_attrs = array(
		'type'         => '',
		'media_top'    => '',
		'title'        => '',
		'body'         => '',
		'footer'       => '',
		'media_bottom' => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$output = '';

	// Prepare the classes
	$classes   = array( 'card' );
	$classes[] = sprintf( 'card--%1$s', $attrs['type'] );

	$output .= sprintf( '<div class="%1$s">', implode( ' ', $classes ) );

	if ( $attrs['media_top'] ) {
		$output .= sprintf( '<div class="card-media-top">%1$s</div>', $attrs['media_top'] );
	}

	// Add header if present.
	if ( $attrs['title'] ) {
		$output .= sprintf( '<div class="card-header"><h3 class="card-title">%1$s</h3></div>', $attrs['title'] );
	}

	// Add body if present.
	if ( $attrs['body'] ) {
		$output .= sprintf( '<div class="card-body">%1$s</div>', $attrs['body'] );
	}

	// Add footer if present.
	if ( $attrs['footer'] ) {
		$output .= sprintf( '<div class="card-footer">%1$s</div>', $attrs['footer'] );
	}

	// Add media bottom if present.
	if ( $attrs['media_bottom'] ) {
		$output .= sprintf( '<div class="card-media-bottom">%1$s</div>', $attrs['media_bottom'] );
	}

	$output .= '</div>';

	return $output;
}

/**
 * Output the Card HTML.
 *
 * @param mixed ...$args Card arguments, @see wskt_get_card() for a description.
 */
function wskt_card( ...$args ) {
	echo wskt_get_card( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
