<?php

/**
 * ACF Layout - Blog Posts
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_blog_posts($layouts)
{
	$layouts['layout_blog_posts'] = array(
		'key'        => 'layout_blog_posts',
		'label'      => __('Blog Posts', 'wsk-theme'),
		'name'       => 'blog_posts',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_card_post_types_title',
				'label' => __('Title', 'wsk-theme'),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key' => 'field_layout_blog_posts',
				'label' => 'Posts',
				'name' => 'posts',
				'type' => 'post_object',
				'multiple' => 1,
			),
		),
	);

	return $layouts;
}
add_action('wskt_layout_builder_layouts', 'wskt_add_acf_layout_blog_posts');

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_blog_posts()
{
	$attrs = array();

	$attrs['title'] = get_sub_field('title');
	$attrs['posts'] = get_sub_field('posts');

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_blog_posts($attrs);
}
add_action('wskt_layout_builder_layout_blog_posts', 'wskt_acf_layout_blog_posts');
