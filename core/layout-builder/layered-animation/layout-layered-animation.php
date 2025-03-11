<?php
/**
 * Layout - Layered Animation
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_layered_animation( $attrs = array() ) {
	$default_attrs = array(
		'layers'  => array(),
		'content' => '',
		'button'  => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/layered-animation/layout-template-layered-animation',
		null,
		$args
	);
}
