<?php
/**
 * Layout - Featured Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_featured_posts( $attrs = array() ) {
	$default_attrs = array(
		'layout_name'   => 'featured-posts',
		'title'         => '',
		'cta_button'    => array(),
		'posts'         => array(),
		'post_template' => '',
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/posts/layouts/featured-posts/layout-template-featured-posts',
		null,
		$args
	);
}
