<?php
/**
 * Layout - Call To Action : Strip
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_call_to_action_strip( $attrs = array() ) {
	$default_attrs = array(
		'subtitle'         => '',
		'content'       => '',
		'button'        => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/call-to-action-strip/layout-template-call-to-action-strip',
		null,
		$args
	);
}
