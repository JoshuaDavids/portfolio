<?php
/**
 * Pages
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layouts
 */
require_once 'layouts/nothing-found/layout-nothing-found.php';
require_once 'layouts/page-content/layout-page-content.php';

/**
 * Utils
 */
require_once 'page-utils.php';

/**
 * Add Page post type to layout builder locations.
 *
 * @param array $locations Array of locations that the layout builder is enabled on.
 */
function wskt_add_page_post_type_to_layout_builder( $locations ) {
	$locations[] = array(
		array(
			'param'    => 'post_type',
			'operator' => '==',
			'value'    => 'page',
		),
	);

	return $locations;
}
add_filter( 'wskt_layout_builder_locations', 'wskt_add_page_post_type_to_layout_builder' );

/**
 * Add Standard Page Template to the disable editor excluded templates.
 *
 * @param array $excluded_templates Array of excluded templates.
 */
function wskt_exclude_standard_page_template( $excluded_templates ) {
	$excluded_templates[] = 'page-templates/standard-page.php';

	return $excluded_templates;
}
add_filter( 'wskt_disable_editor_excluded_templates', 'wskt_exclude_standard_page_template', 0 );

/**
 * Configure Page Sidebar Header
 *
 * @param string $header The page sidebar header.
 */
function wskt_configure_page_sidebar_header( $header ) {
	$header .= '<div class="sidebar__group">';
	$header .= wskt_get_previous_page_button();
	$header .= '</div>';

	return $header;
}
add_filter( 'wskt_page_sidebar_header', 'wskt_configure_page_sidebar_header' );
