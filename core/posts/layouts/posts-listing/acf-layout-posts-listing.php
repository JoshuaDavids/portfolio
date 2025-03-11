<?php
/**
 * ACF Layout - Posts Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_posts_listing( $layouts ) {
	$layouts['layout_posts_listing'] = array(
		'key'        => 'layout_posts_listing',
		'label'      => __( 'Posts Listing', 'wsk-theme' ),
		'name'       => 'posts_listing',
		'sub_fields' => array(
			array(
				'key'     => 'field_layout_posts_listing_posts_template',
				'label'   => __( 'Posts Template', 'wsk-theme' ),
				'name'    => 'posts_template',
				'type'    => 'select',
				'choices' => array(
					'grid' => 'Grid',
					'list' => 'List',
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_posts_listing' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_posts_listing() {
	$attrs = array();

	$attrs['posts_template'] = get_sub_field( 'posts_template' );

	wskt_layout_posts_listing( $attrs );
}
add_action( 'wskt_layout_builder_layout_posts_listing', 'wskt_acf_layout_posts_listing' );
