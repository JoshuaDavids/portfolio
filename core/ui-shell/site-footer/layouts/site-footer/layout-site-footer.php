<?php
/**
 * Layout - Site Footer
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Site Footer fields to theme settings.
 *
 * @param array $fields Array of theme settings fields.
 */
function wskt_add_site_footer_fields( $fields ) {
	$new_fields = array(
		array(
			'key'   => 'tab_site_footer',
			'label' => __( 'Site Footer', 'wsk-theme' ),
			'name'  => '',
			'type'  => 'tab',
		),
		array(
			'key'   => 'field_site_footer_strapline',
			'label' => __( 'Strapline', 'wsk-theme' ),
			'name'  => 'site_footer_strapline',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_site_footer_copyright_details',
			'label' => __( 'Copyright Details', 'wsk-theme' ),
			'name'  => 'site_footer_copyright_details',
			'type'  => 'text',
		),
	);

	return array_merge( $fields, $new_fields );
}
add_filter( 'wskts_theme_settings_fields', 'wskt_add_site_footer_fields' );

/**
 * Layout template function.
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_site_footer( $attrs = array() ) {
	// Add's a filter that allows us to enable and disable the footer template.
	$footer_enabled = apply_filters( 'wskt_footer_enabled', true );

	if ( ! $footer_enabled ) {
		return;
	}

	$default_attrs = array();

	$args = wp_parse_args( $attrs, $default_attrs );

	$args['strapline']         = do_shortcode( get_field( 'site_footer_strapline', 'option' ) );
	$args['copyright_details'] = do_shortcode( get_field( 'site_footer_copyright_details', 'option' ) );

	if ( class_exists( 'WSKTS_Social_Networks' ) ) {
		$args['social_networks'] = WSKTS_Social_Networks::get_social_networks();
	}

	get_template_part(
		'core/ui-shell/site-footer/layouts/site-footer/layout-template-site-footer',
		null,
		$args
	);
}
