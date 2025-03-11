<?php
/**
 * Layout - Post : Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_post_content( $attrs = array() ) {
	$default_attrs = array(
		'title'   => '',
		'content' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/posts/layouts/post-content/layout-template-post-content',
		null,
		$args
	);
}
