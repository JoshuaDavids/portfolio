<?php
/**
 * Layout - Form
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_form( $attrs = array() ) {
	$default_attrs = array(
		'title' => '',
		'form'  => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/form/layout-template-form',
		null,
		$args
	);
}
