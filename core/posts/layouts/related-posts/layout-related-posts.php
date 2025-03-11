<?php
/**
 * Layout - Related Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_related_posts( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'colour_scheme' => 'default',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$query_args = array(
		'post_type'      => 'post',
		'posts_per_page' => '3',
		'post__not_in'   => array( get_the_ID() ),
	);

	$query = new WP_Query( $query_args );

	$posts = wp_list_pluck( $query->posts, 'ID' );

	wp_reset_postdata();

	$args['title']         = $attrs['title'];
	$args['posts']         = $posts;
	$args['colour_scheme'] = $attrs['colour_scheme'];

	wskt_layout_featured_posts( $args );
}
