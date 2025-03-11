<?php
/**
 * Layout - Testimonial
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_testimonial( $attrs = array() ) {
	$default_attrs = array(
		'testimonial' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/testimonial/layout-template-testimonial',
		null,
		$args
	);
}
