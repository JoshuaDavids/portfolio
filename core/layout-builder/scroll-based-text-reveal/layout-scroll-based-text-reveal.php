<?php
/**
 * Layout - Scroll Based Text Reveal
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_scroll_based_text_reveal( $attrs = array() ) {
	$default_attrs = array(
		'background' => array(),
		'text'       => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/scroll-based-text-reveal/layout-template-scroll-based-text-reveal',
		null,
		$args
	);
}
