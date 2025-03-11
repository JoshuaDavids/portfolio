<?php

/**
 * Template Function - Navbar Brand
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Returns the Navbar Brand HTML.
 */
function wskt_get_navbar_brand()
{
	return sprintf(
		'<a href="%1$s" class="navbar-brand" title="%2$s">%3$s</a>',
		esc_url(home_url()),
		esc_attr(get_bloginfo('name')),
		wskts_get_inline_svg(
			get_template_directory() . '/dist/img/logo-caleb.svg',
			array(
				'width'  => 404,
				'height' => 40,
				'class'  => 'icon',
			)
		)
	);
}

/**
 * Output the Navbar Brand HTML.
 */
function wskt_navbar_brand()
{
	echo wskt_get_navbar_brand(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
