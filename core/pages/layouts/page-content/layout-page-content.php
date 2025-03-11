<?php
/**
 * Layout - Page : Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_page_content( $attrs = array() ) {
	$default_attrs = array(
		'title'   => '',
		'content' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/pages/layouts/page-content/layout-template-page-content',
		null,
		$args
	);
}
