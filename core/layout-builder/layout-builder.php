<?php

/**
 * Layout Builder
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Layouts.
 */
require_once 'accordion/accordion.php';
require_once 'accordion-media/accordion-media.php';
require_once 'call-to-action/call-to-action.php';
require_once 'call-to-action-strip/call-to-action-strip.php';
require_once 'contact/contact.php';
require_once 'content-media/content-media.php';
require_once 'content/content.php';
require_once 'content-media-tabs/content-media-tabs.php';
require_once 'hero/hero.php';
require_once 'image-carousel/image-carousel.php';
require_once 'logo-grid/logo-grid.php';
require_once 'metrics/metrics.php';
require_once 'split-content/split-content.php';

// Custom Concepts
require_once 'blog-posts/blog-posts.php';
require_once 'case-study-slider/case-study-slider.php';

/**
 * To Review - In figma design
 */
// require_once 'call-to-action-button/call-to-action-button.php';
// require_once 'call-to-action/call-to-action.php';
// require_once 'content/content.php';
// require_once 'content-media/content-media.php'; 
// require_once 'content-media-fill/content-media-fill.php';
// require_once 'form/form.php';
// require_once 'header/header.php';
// require_once 'media/media.php';
// require_once 'tabs/tabs.php';

/**
 * Not in figma
 */

// require_once 'call-to-action-button/call-to-action-button.php';
// require_once 'contact/layout-contact.php';
// require_once 'content-twin-media/content-twin-media.php';
// require_once 'cross-scrolling-images/cross-scrolling-images.php';
// require_once 'layered-animation/layered-animation.php';
// require_once 'locations/locations.php';
// require_once 'map/map.php';
// require_once 'parallax-hero/parallax-hero.php';
// require_once 'testimonial/testimonial.php';
// require_once 'scroll-based-text-highlight/scroll-based-text-highlight.php';
// require_once 'scroll-based-text-reveal/scroll-based-text-reveal.php';
// require_once 'scroll-based-video/scroll-based-video.php';
// require_once 'sub-page-navbar/sub-page-navbar.php';
// require_once 'titled-content/titled-content.php';

/**
 * Template Functions
 */
require_once 'template-layout-decoration.php';
require_once 'template-next-layout-toggle.php';

/**
 * Adds the Layout Builder.
 *
 * By default there are no layouts. A filter is provided so that features can
 * programmatically register layouts.
 */
function wskt_add_layout_builder()
{
	$layouts   = apply_filters('wskt_layout_builder_layouts', array());
	$locations = apply_filters('wskt_layout_builder_locations', array());

	// Only add the layout builder if we have layouts and locations to populate it with.
	if (empty($layouts) && empty($locations)) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_layout_builder',
			'title'    => __('Layout Builder', 'wsk-theme'),
			'fields'   => array(
				array(
					'key'          => 'field_layouts',
					'label'        => __('Layouts', 'wsk-theme'),
					'name'         => 'layouts',
					'type'         => 'flexible_content',
					'layouts'      => $layouts,
					'button_label' => __('Add Layout', 'wsk-theme'),
				),
			),
			'location' => $locations,
		)
	);
}
add_action('acf/init', 'wskt_add_layout_builder');

/**
 * Template function that checks if we have content builder layouts,
 * if we do then loop over them and output each layout
 */
function wskt_layout_builder()
{
	if (have_rows('layouts')) :
		while (have_rows('layouts')) :

			the_row();

			do_action('wskt_layout_builder_layout_' . get_row_layout(), 'wsk-theme');

		endwhile;
	endif;
}

/**
 * Output the layout classes.
 *
 * @param array $attrs Layout class attributes.
 */
function wskt_layout_classes($attrs = array())
{
	$default_attrs = array(
		'layout_name'     => '',
		'colour_scheme'   => 'default',
		'padding_variant' => 'default',
		'classes'         => array(),
	);

	$attrs = wp_parse_args($attrs, $default_attrs);

	$layout_classes = array(
		'layout',
	);

	// Add layout name class.
	if ($attrs['layout_name']) {
		$layout_classes[] = "layout--{$attrs['layout_name']}";
	}

	// Add colour scheme class.
	if ($attrs['colour_scheme']) {
		$layout_classes[] = "colour-scheme colour-scheme--{$attrs['colour_scheme']}";
	}

	// Add padding variant class.
	if ('default' === $attrs['padding_variant']) {
		$layout_classes[] = 'layout--padding-y';
	} else {
		$layout_classes[] = "layout--padding-y-{$attrs['padding_variant']}";
	}

	// Merge in supplied classes.
	$layout_classes = wskt_merge_classes($layout_classes, $attrs['classes']);

	echo esc_attr(implode(' ', $layout_classes));
}

/**
 * Register Layout Builder Minimal UI Layouts.
 *
 * @param bool $is_minimal_ui Whether or not we are on a minimal ui view.
 */
function wskt_register_layout_builder_minimal_ui_layouts($is_minimal_ui)
{
	$layouts = get_field('layouts');

	if (empty($layouts)) {
		return $is_minimal_ui;
	}

	// Filter to allow layout builder layouts to register themselves as a minimal ui layout.
	$minimal_ui_layouts = apply_filters('wskt_minimal_ui_layouts', array());

	$first_layout_name = $layouts[0]['acf_fc_layout'];

	if (in_array($first_layout_name, $minimal_ui_layouts, true)) {
		$is_minimal_ui = true;
	}

	return $is_minimal_ui;
}
add_filter('wskt_is_minimal_ui', 'wskt_register_layout_builder_minimal_ui_layouts');
