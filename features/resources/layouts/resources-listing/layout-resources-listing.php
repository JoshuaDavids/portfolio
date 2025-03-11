<?php
/**
 * Layout - Resources Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_resources_listing( $attrs = array() ) {
	$default_attrs = array(
		'category'       => '',
		'posts_template' => 'grid',
		'post_template'  => 'wskt_get_post_card',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	$query_args = array(
		'post_type'           => 'post',
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => 1,
	);

	if ( $attrs['category'] ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $attrs['category'],
			),
		);
	}

	$query = new WP_Query( $query_args );

	$args['query'] = $query;

	$args['current_category_id'] = $attrs['category'];

	wskt_layout_posts_listing( $args );

	wp_reset_postdata();
}
