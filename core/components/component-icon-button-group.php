<?php
/**
 * Component - Icon Button Group
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Icon Button Group HTML.
 *
 * @param array $buttons Icon Buttons, @see wskt_get_icon_button() for a description of Button attrs.
 * @param array $attrs Button group attributes.
 */
function wskt_get_icon_button_group( $buttons = array(), $attrs = array() ) {
	$default_attrs = array(
		'classes' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	if ( empty( $buttons ) ) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default button group class.
	$classes[] = 'btn-group';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	$html = sprintf( '<div class="%1$s" role="group">', implode( ' ', $classes ) );
	foreach ( $buttons as $button ) {
		$html .= wskt_get_icon_button( $button );
	}
	$html .= '</div>';

	return $html;
}

/**
 * Output the Icon Button Group HTML.
 *
 * @param mixed ...$args Icon Button Group arguments, @see wskt_get_icon_button_group() for a description.
 */
function wskt_icon_button_group( ...$args ) {
	echo wskt_get_icon_button_group( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
