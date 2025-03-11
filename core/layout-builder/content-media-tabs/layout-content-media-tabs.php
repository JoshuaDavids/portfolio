<?php
/**
 * Layout - Content / Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_content_media_tabs( $attrs = array() ) {
	$default_attrs = array(
		'title' => '',
		'intro' => '',
		'tabs'  => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/content-media-tabs/layout-template-content-media-tabs',
		null,
		$args
	);
}
