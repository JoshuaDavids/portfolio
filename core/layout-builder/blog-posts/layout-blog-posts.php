<?php

/**
 * Layout - Blog Posts
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_blog_posts($attrs = array())
{
	$default_attrs = array(
		'title'         => '',
		'posts'         => '',
	);

	$args = wp_parse_args($attrs, $default_attrs);

	get_template_part(
		'core/layout-builder/blog-posts/layout-template-blog-posts',
		null,
		$args
	);
}
