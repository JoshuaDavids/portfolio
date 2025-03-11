<?php
/**
 * Layout - Call To Action
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_call_to_action( $attrs = array() ) {
	$default_attrs = array(
		'background' => array(),
		'title'      => '',
		'content'    => '',
		'button'     => array(),
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/call-to-action/layout-template-call-to-action',
		null,
		$args
	);
}
