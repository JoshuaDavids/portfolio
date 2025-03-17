<?php

/**
 * ACF Layout - Hero
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_animated_hero($layouts)
{
	$layouts['layout_animated_hero'] = array(
		'key'        => 'layout_animated_hero',
		'label'      => __('Animated Hero', 'wsk-theme'),
		'name'       => 'animated_hero',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_animated_hero_title',
				'label' => __('Title', 'wsk-theme'),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_layout_animated_hero_content',
				'label' => __('Content', 'wsk-theme'),
				'name'  => 'content',
				'type'  => 'textarea',
			),
			array(
				'key'     => 'field_layout_animated_hero_button',
				'label'   => __('Button', 'wsk-theme'),
				'name'    => 'button',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_button',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action('wskt_layout_builder_layouts', 'wskt_add_acf_layout_animated_hero');

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_animated_hero()
{
	$attrs = array();

	$attrs['title'] = get_sub_field('title');
	$attrs['content']    = get_sub_field('content');
	$attrs['button']     = get_sub_field('button');

	// Make the button a large size
	$attrs['button']['size'] = 'lg';

	wskt_layout_animated_hero($attrs);
}
add_action('wskt_layout_builder_layout_animated_hero', 'wskt_acf_layout_animated_hero');
