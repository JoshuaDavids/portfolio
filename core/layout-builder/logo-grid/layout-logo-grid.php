
<?php
/**
 * Layout - Logo Grid
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_logo_grid( $attrs = array() ) {
	$default_attrs = array(
		'title'                => '',
		'button'              => array(),
		'logos'                => array(),
		'top_colour_scheme'    => 'default',
		'bottom_colour_scheme' => 'default',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/logo-grid/layout-template-logo-grid',
		null,
		$args
	);
}
