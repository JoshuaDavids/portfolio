<?php
/**
 * Layout - Filterable Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_filterable_posts( $attrs = array() ) {
	$default_attrs = array(
		'layout_name'    => 'filterable-posts',
		'post_type'      => 'post',
		'order'          => 'DESC',
		'search_term'    => '',
		'posts'          => array(),
		'current_page'   => 1,
		'max_pages'      => 0,
		'found_posts'    => 0,
		'posts_template' => 'grid', // Accepts grid | list
		'post_template'  => '',
		'colour_scheme'  => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/posts/layouts/filterable-posts/layout-template-filterable-posts',
		null,
		$args
	);
}

