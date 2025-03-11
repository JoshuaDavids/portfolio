<?php
/**
 * Layout - Content / Twin Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_content_twin_media( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'content'       => '',
		'button'        => array(),
		'media_1'       => array(),
		'media_2'       => array(),
		'alignment'     => '',
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/content-twin-media/layout-template-content-twin-media',
		null,
		$args
	);
}
