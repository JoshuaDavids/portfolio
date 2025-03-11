<?php
/**
 * ACF Layout - Team Member Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_team_member_listing( $layouts ) {
	$layouts['layout_team_member_listing'] = array(
		'key'        => 'layout_team_member_listing',
		'label'      => __( 'Team Member Listing', 'wsk-theme' ),
		'name'       => 'team_member_listing',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_team_member_listing_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'           => 'field_layout_team_member_listing_department',
				'label'         => __( 'Department', 'wsk-theme' ),
				'name'          => 'department',
				'type'          => 'taxonomy',
				'taxonomy'      => 'team_member_department',
				'return_format' => 'id',
				'field_type'    => 'select',
			),
			array(
				'key'     => 'field_layout_team_member_listing_colour_scheme',
				'label'   => __( 'Colour Scheme', 'wsk-theme' ),
				'name'    => 'colour_scheme',
				'type'    => 'clone',
				'clone'   => array(
					0 => 'field_colour_scheme',
				),
				'display' => 'seamless',
			),
		),
	);

	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_team_member_listing' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_team_member_listing() {
	$department = get_sub_field( 'department' );

	$query_args = array(
		'post_type'      => 'team-member',
		'posts_per_page' => -1,
		// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		'tax_query'      => array(
			array(
				'taxonomy' => 'team_member_department',
				'field'    => 'term_id',
				'terms'    => $department,
			),
		),
	);

	$query = new WP_Query( $query_args );

	$attrs = array();

	$attrs['title']         = get_sub_field( 'title' );
	$attrs['query']         = $query;
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_team_member_listing( $attrs );

	wp_reset_postdata();
}
add_action( 'wskt_layout_builder_layout_team_member_listing', 'wskt_acf_layout_team_member_listing' );
