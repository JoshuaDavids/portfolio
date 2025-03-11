<?php

/**
 * Layout - Case Study Slider
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_case_study_slider($attrs = array())
{
	$default_attrs = array(
		'title'         => '',
		'posts'         => '',
	);

	$args = wp_parse_args($attrs, $default_attrs);

	get_template_part(
		'core/layout-builder/case-study-slider/layout-template-case-study-slider',
		null,
		$args
	);
}
