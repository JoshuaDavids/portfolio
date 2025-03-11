<?php
/**
 * ACF Layout - Resources Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_resources_listing( $layouts ) {
	$layouts['layout_resources_listing'] = array(
		'key'        => 'layout_resources_listing',
		'label'      => __( 'Resources Listing', 'wsk-theme' ),
		'name'       => 'resources_listing',
		'sub_fields' => array(
			array(
				'key'          => 'field_layout_resources_listing_category',
				'label'        => __( 'Category', 'wsk-theme' ),
				'instructions' => __( 'Leave blank to show all resources.', 'wsk-theme' ),
				'name'         => 'category',
				'type'         => 'taxonomy',
				'taxonomy'     => 'category',
				'field_type'   => 'select',
				'allow_null'   => 1,
			),
			array(
				'key'           => 'field_layout_resources_listing_posts_template',
				'label'         => __( 'Posts Template', 'wsk-theme' ),
				'name'          => 'posts_template',
				'type'          => 'select',
				'choices'       => array(
					'grid' => 'Grid',
					'list' => 'List',
				),
				'default_value' => 'grid',
				'wrapper'       => array(
					'class' => 'acf-hidden',
				),
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_resources_listing' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_resources_listing() {
	$attrs = array();

	$attrs['category']       = get_sub_field( 'category' );
	$attrs['posts_template'] = get_sub_field( 'posts_template' );

	if ( $attrs['posts_template'] === 'grid' ) {
		$attrs['post_template'] = 'wskt_get_post_card';
	}

	if ( $attrs['posts_template'] === 'list' ) {
		$attrs['post_template'] = 'wskt_get_post_tile';
	}

	wskt_layout_resources_listing( $attrs );
}
add_action( 'wskt_layout_builder_layout_resources_listing', 'wskt_acf_layout_resources_listing' );
