<?php
/**
 * Layout - Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_media( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'media'         => array(),
		'full_width'    => false,
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/media/layout-template-media',
		null,
		$args
	);
}
