
    <?php
/**
 * ACF Layout - Logo Grid
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_logo_grid( $layouts ) {
	$layouts['layout_logo-grid'] = array(
		'key'        => 'layout_logo_grid',
		'label'      => __( 'Logo Grid', 'wsk-theme' ),
		'name'       => 'logo_grid',
		'sub_fields' => array(
      array(
				'key'   => 'field_layout_logo_grid_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_logo_grid_top_colour_scheme',
				'label'        => __( 'Top', 'wsk-theme' ),
				'name'         => 'top_colour_scheme',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_colour_scheme',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
			array(
				'key'          => 'field_layout_logo_grid_bottom_colour_scheme',
				'label'        => __( 'Bottom', 'wsk-theme' ),
				'name'         => 'bottom_colour_scheme',
				'type'         => 'clone',
				'clone'        => array(
					0 => 'field_colour_scheme',
				),
				'display'      => 'seamless',
				'prefix_name'  => true,
				'prefix_label' => true,
			),
      array(
        'key'   => 'field_layout_logo_grid_button',
        'label' => __( 'Button', 'wsk-theme' ),
        'name'  => 'button',
        'type'  => 'clone',
        'clone' => array(
          0 => 'field_button',
        ),
        'display'      => 'seamless',
      ),
			array(
				'key'          => 'field_layout_logo_grid_logos',
				'label'        => __( 'Logos', 'wsk-theme' ),
				'name'         => 'logos',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Logo', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'          => 'field_layout_logo_grid_logo_media',
						'label'        => __( 'Logo', 'wsk-theme' ),
						'name'         => 'logo_media',
						'type'         => 'clone',
						'clone'        => array(
							0 => 'field_media',
						),
						'display'      => 'seamless',
						'prefix_name'  => true,
						'prefix_label' => true,
					),
					array(
						'key'          => 'field_layout_logo_grid_logo_link',
						'label'        => __( 'Logo Link', 'wsk-theme' ),
						'name'         => 'logo_link',
						'type'         => 'url',
						'media_upload' => 1,
						'delay'        => 1,
					),
				),
			),
		),
	);
	return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_logo_grid' );
  
/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_logo_grid() {
	$attrs = array();

	$attrs['title']                = get_sub_field( 'title' );
  $attrs['button']               = get_sub_field( 'button' );
	$attrs['logos']                = get_sub_field( 'logos' );
	$attrs['top_colour_scheme']    = get_sub_field( 'top_colour_scheme_colour_scheme' );
	$attrs['bottom_colour_scheme'] = get_sub_field( 'bottom_colour_scheme_colour_scheme' );

	wskt_layout_logo_grid( $attrs );
}
add_action( 'wskt_layout_builder_layout_logo_grid', 'wskt_acf_layout_logo_grid' );
