<?php
/**
 * Template Function - Breadcrumbs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Breadcrumbs HTML.
 */
function wskt_get_breadcrumbs() {
	if ( ! function_exists( 'yoast_breadcrumb' ) ) {
		return;
	}

	return yoast_breadcrumb( '<nav aria-label="breadcrumb">', '</nav>', false );
}

/**
 * Output the Breadcrumbs HTML.
 */
function wskt_breadcrumbs() {
	echo wskt_get_breadcrumbs(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
