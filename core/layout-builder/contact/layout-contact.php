<?php
/**
 * Layout - Contact
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_contact( $attrs = array() ) {
	$default_attrs = array(
		'intro'         => '',
		'contacts'      => array(),
		'form'          => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	$args['form']            = gravity_form(
		$args['form'],
		$display_title       = false,
		$display_description = false,
		$display_inactive    = false,
		$field_values        = null,
		$ajax                = true,
		$tabindex            = 0,
		$echo                = false
	);

	get_template_part(
		'core/layout-builder/contact/layout-template-contact',
		null,
		$args
	);
}
