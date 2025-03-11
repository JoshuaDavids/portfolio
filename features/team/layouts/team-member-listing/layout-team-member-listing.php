<?php
/**
 * Layout - Team Member Listing
 *
 * @package WSK_Theme/Features
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_team_member_listing( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'query'         => null,
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'features/team/layouts/team-member-listing/layout-template-team-member-listing',
		null,
		$args
	);
}
