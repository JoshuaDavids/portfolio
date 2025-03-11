<?php
/**
 * Layout - Call To Action : Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_call_to_action_button( $attrs = array() ) {
	$default_attrs = array(
		'button' => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/call-to-action-button/layout-template-call-to-action-button',
		null,
		$args
	);
}
