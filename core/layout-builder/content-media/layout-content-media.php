<?php
/**
 * Layout - Content / Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_content_media( $attrs = array() ) {
	$default_attrs = array(
		'title'              => '',
		'content'            => '',
		'button'             => array(),
		'media'              => array(),
		'alignment'          => 'content-first',
		'colour_scheme'      => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/content-media/layout-template-content-media',
		null,
		$args
	);
}
