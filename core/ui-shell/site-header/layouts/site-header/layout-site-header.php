<?php
/**
 * Layout - Site Header
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_site_header( $attrs = array() ) {
	$default_attrs = array();

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/ui-shell/site-header/layouts/site-header/layout-template-site-header',
		null,
		$args
	);
}
