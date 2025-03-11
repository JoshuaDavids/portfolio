<?php
/**
 * Layout - Posts Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_posts_listing( $attrs = array() ) {
	$default_attrs = array(
		'posts_template' => 'grid',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	$query_args = array(
		'post_type' => 'post',
	);

	$query = new WP_Query( $query_args );

	$args['posts']        = wp_list_pluck( $query->posts, 'ID' );
	$args['current_page'] = $query->query_vars['paged'];
	$args['max_pages']    = $query->max_num_pages;
	$args['found_posts']  = $query->found_posts;

	wp_reset_postdata();

	$args['posts_template'] = $attrs['posts_template'];

	if ( $args['posts_template'] === 'grid' ) {
		$args['post_template'] = 'wskt_get_post_card';
	}

	if ( $args['posts_template'] === 'list' ) {
		$args['post_template'] = 'wskt_get_post_tile';
	}

	wskt_layout_filterable_posts( $args );
}
