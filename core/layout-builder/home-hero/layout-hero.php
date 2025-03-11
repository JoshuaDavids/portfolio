<?php
/**
 * Layout - Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_hero( $attrs = array() ) {
	$default_attrs = array(
		'background' => array(),
		'content'    => '',
		'button'     => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/hero/layout-template-hero',
		null,
		$args
	);
}
