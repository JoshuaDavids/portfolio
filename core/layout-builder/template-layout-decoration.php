<?php
/**
 * Template Function - Layout Decoration
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Layout Decoration HTML.
 *
 * @param array $decoration Decoration attributes.
 */
function wskt_get_layout_decoration( $decoration ) {
	if ( empty( $decoration['variant'] ) ) {
		return;
	}

	return sprintf( '<div class="layout-decoration layout-decoration--%1$s"></div>', esc_attr( $decoration['variant'] ) );
}

/**
 * Output the Layout Decoration HTML.
 *
 * @param mixed ...$args Decoration arguments, @see wskt_get_layout_decoration() for a description.
 */
function wskt_layout_decoration( ...$args ) {
	echo wskt_get_layout_decoration( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
