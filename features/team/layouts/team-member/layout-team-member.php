<?php
/**
 * Layout - Team Member
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_layout_team_member( $layouts ) {
	$layouts['layout_team_member'] = array(
		'key'        => 'layout_team_member',
		'label'      => __( 'Team Member', 'wsk-theme' ),
		'name'       => 'team_member',
		'sub_fields' => array(
			array(
				'key'           => 'field_layout_team_member_team_member',
				'label'         => __( 'Team Member', 'wsk-theme' ),
				'name'          => 'team_member',
				'type'          => 'post_object',
				'post_type'     => array(
					'team-member',
				),
				'return_format' => 'id',
			),
			array(
				'key'     => 'field_layout_team_member_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_layout_team_member' );

/**
 * Layout template function.
 */
function wskt_layout_team_member() {
	$team_member = get_sub_field( 'team_member' );

	if ( ! $team_member ) {
		return;
	}

	$args = array();

	$args['media'] = array(
		'type'  => 'image',
		'image' => get_post_thumbnail_id( $team_member ),
		'ratio' => 'ratio-1x1',
	);

	$args['title'] = sprintf(
		'%1$s',
		get_the_title( $team_member )
	);

	$args['bio'] = get_field( 'team_member_bio', $team_member );

	$args['social_networks'] = array(
		array(
			'key' => 'twitter',
			'url' => get_field( 'team_member_twitter_url', $team_member ),
		),
		array(
			'key' => 'linkedin',
			'url' => get_field( 'team_member_linkedin_url', $team_member ),
		),
	);

	$args['colour_scheme'] = get_field( 'colour_scheme' );

	get_template_part(
		'features/team/layouts/team-member/layout-template-team-member',
		null,
		$args
	);

	wp_reset_postdata();
}

/**
 * Hook template into layout builder.
 */
add_action( 'wskt_layout_builder_layout_team_member', 'wskt_layout_team_member' );
