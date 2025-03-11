<?php
/**
 * Layout - Navbar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 */
function wskt_navbar() {
	$args = array();

	get_template_part(
		'core/ui-shell/navbar/layouts/navbar/layout-template-navbar',
		null,
		$args
	);
}
