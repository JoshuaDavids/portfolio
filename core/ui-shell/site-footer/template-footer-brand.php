<?php
/**
 * Template Function - Footer Brand
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the Footer Brand HTML.
 */
function wskt_get_footer_brand() {
	return sprintf(
		'<a href="%1$s" class="footer-brand" title="%2$s">%3$s</a>',
		esc_url( home_url() ),
		esc_attr( get_bloginfo( 'name' ) ),
		wskts_get_inline_svg(
			get_template_directory() . '/dist/img/logo-caleb.svg',
			array(
				'width'  => 202,
				'height' => 20,
				'class'  => 'icon',
			)
		)
	);
}

/**
 * Output the Footer Brand HTML.
 */
function wskt_footer_brand() {
	echo wskt_get_footer_brand(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
