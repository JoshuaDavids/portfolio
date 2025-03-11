<?php
/**
 * Component - Blockquote
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Blockquote HTML.
 *
 * @param array $attrs Array of blockquote attributes.
 */
function wskt_get_blockquote( $attrs = array() ) {
	$default_attrs = array(
		'quote'   => '',
		'name'    => '',
		'role'    => '',
		'company' => '',
		'classes' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	if ( empty( $attrs['quote'] ) ) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default blockquote class.
	$classes[] = 'blockquote';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	// Prepare the output
	$output = sprintf( '<blockquote class="%1$s">', implode( ' ', $classes ) );

	$output .= '<div class="blockquote__body">';

	$output .= wp_kses( $attrs['quote'], 'post' );

	$output .= '</div>';

	// Prepare citation
	$cite_parts = array();

	if ( ! empty( $attrs['name'] ) ) {
		$cite_parts[] = $attrs['name'];
	}

	if ( ! empty( $attrs['role'] ) ) {
		$cite_parts[] = $attrs['role'];
	}

	if ( ! empty( $attrs['company'] ) ) {
		$cite_parts[] = $attrs['company'];
	}

	if ( ! empty( $cite_parts ) ) {
		$output .= sprintf(
			'<footer class="blockquote__footer">%1$s</footer>',
			implode( ', ', $cite_parts )
		);
	}

	$output .= '</blockquote>';

	return $output;
}

/**
 * Output the Blockquote HTML.
 *
 * @param mixed ...$args Blockquote arguments, @see wskt_get_blockquote() for a description.
 */
function wskt_blockquote( ...$args ) {
	echo wskt_get_blockquote( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
