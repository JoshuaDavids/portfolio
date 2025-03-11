<?php
/**
 * Layout - Content / Media Fill
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_content_media_fill( $attrs = array() ) {
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
		'core/layout-builder/content-media-fill/layout-template-content-media-fill',
		null,
		$args
	);
}
