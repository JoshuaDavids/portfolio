<?php
/**
 * ACF Layout - Sub Page Navbar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_sub_page_navbar( $layouts ) {
	$layouts['layout_sub_page_navbar'] = array(
		'key'        => 'layout_sub_page_navbar',
		'label'      => __( 'Sub Page Navbar', 'wsk-theme' ),
		'name'       => 'sub_page_navbar',
		'sub_fields' => array(
			array(
				'key'       => 'field_layout_sub_page_navbar_message',
				'label'     => __( 'Details', 'wsk-theme' ),
				'name'      => '',
				'type'      => 'message',
				'message'   => __( 'This layout will show the Sub Page Navbar', 'wsk-theme' ),
				'new_lines' => 'wpautop',
				'esc_html'  => 0,
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_sub_page_navbar' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_sub_page_navbar() {
	$attrs = array();

	$parent_page = wskt_get_top_level_page( get_the_ID() );

	// Prepare the title
	$title = get_the_title( $parent_page );

	// Prepare the links
	$children_query_args = array(
		'post_type'      => 'any',
		'post_parent'    => $parent_page,
		'posts_per_page' => -1,
	);

	$children_query = new WP_Query( $children_query_args );

	$links = array();

	// Add the parent post
	$links[] = array(
		'title'   => esc_attr__( 'Overview', 'wsk-theme' ),
		'url'     => get_the_permalink( $parent_page ),
		'current' => get_the_ID() === $parent_page,
	);

	if ( ! empty( $children_query->posts ) ) {
		foreach ( $children_query->posts as $post ) {
			$links[] = array(
				'title'   => $post->post_title,
				'url'     => get_the_permalink( $post->ID ),
				'current' => get_the_ID() === $post->ID,
			);
		}
	}

	wp_reset_postdata();

	// Prepare the template arguments
	$attrs = array(
		'title' => $title,
		'links' => $links,
	);

	wskt_layout_sub_page_navbar( $attrs );
}
add_action( 'wskt_layout_builder_layout_sub_page_navbar', 'wskt_acf_layout_sub_page_navbar' );
