<?php

/**
 * ACF Layout - Case Study Slider
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_case_study_slider($layouts)
{
	$layouts['layout_case_study_slider'] = array(
		'key'        => 'layout_case_study_slider',
		'label'      => __('Case Studies', 'wsk-theme'),
		'name'       => 'case_study_slider',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_case_study_slider_title',
				'label' => __('Title', 'wsk-theme'),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key' => 'field_layout_case_study_slider',
				'label' => 'Posts',
				'name' => 'posts',
				'type' => 'post_object',
				'multiple' => 1,
			),
		),
	);

	return $layouts;
}
add_action('wskt_layout_builder_layouts', 'wskt_add_acf_layout_case_study_slider');

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_case_study_slider()
{
	$attrs = array();

	$attrs['title'] = get_sub_field('title');
	$attrs['posts'] = get_sub_field('posts');

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_case_study_slider($attrs);
}
add_action('wskt_layout_builder_layout_case_study_slider', 'wskt_acf_layout_case_study_slider');
