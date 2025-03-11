<?php
/**
 * Layout - Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_content( $attrs = array() ) {
	$default_attrs = array(
		'content'       => '',
		'full_width'    => false,
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/content/layout-template-content',
		null,
		$args
	);
}
