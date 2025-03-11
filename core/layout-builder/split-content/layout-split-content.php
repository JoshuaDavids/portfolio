<?php
/**
 * Layout - Split Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_split_content( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'intro'         => '',
		'content'       => '',
		'button'        => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/split-content/layout-template-split-content',
		null,
		$args
	);
}
