<?php
/**
 * Component - Overlay
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Overlay HTML.
 *
 * @param array $attrs Overlay attributes.
 */
function wskt_get_overlay( $attrs = array() ) {
	$default_attrs = array(
		'id'         => '',
		'title'      => '',
		'content'    => '',
		'active'     => false,
		'attributes' => array(),
		'classes'    => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Bail if there is no id or content.
	if ( empty( $attrs['id'] ) || empty( $attrs['content'] ) ) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default overlay class.
	$classes[] = 'overlay';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	// Set the id attribute.
	$attrs['attributes']['id'] = $attrs['id'];

	// Set the active state.
	$attrs['attributes']['data-wsk-active'] = wp_json_encode( $attrs['active'] );

	// Set the class attribute.
	$attrs['attributes']['class'] = implode( ' ', $classes );

	$attributes = wskt_implode_html_attributes( $attrs['attributes'] );

	// Prepare overlay HTML.
	$html = '<div ' . $attributes . '>';

	// Add overlay header.
	if ( $attrs['title'] ) {
		$html .= '<div class="overlay__header">';
		$html .= '<div class="container-fluid">';
		$html .= sprintf( '<h1 class="overlay__title">%1$s</h1>', esc_attr( $attrs['title'] ) );
		$html .= '</div>';
		$html .= '</div>';
	}

	// Add overlay content.
	$html .= '<div class="overlay__content">';
	$html .= '<div class="overlay__content-inner">';
	$html .= '<div class="container-fluid">';
	$html .= $attrs['content'];
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	$html .= '</div>';

	return $html;
}

/**
 * Output the Overlay HTML.
 *
 * @param mixed ...$args overlay arguments, @see wskt_get_overlay() for a description.
 */
function wskt_overlay( ...$args ) {
	echo wskt_get_overlay( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
