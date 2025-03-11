<?php
/**
 * ACF Layout - Accordion
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add layout and fields to layout builder.
 *
 * @param array $layouts Layouts.
 */
function wskt_add_acf_layout_accordion( $layouts ) {
	$layouts['layout_accordion'] = array(
		'key'        => 'layout_accordion',
		'label'      => __( 'Accordion', 'wsk-theme' ),
		'name'       => 'accordion',
		'sub_fields' => array(
			array(
				'key'   => 'field_layout_accordion_title',
				'label' => __( 'Title', 'wsk-theme' ),
				'name'  => 'title',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_layout_accordion_items',
				'label'        => __( 'Accordion Items', 'wsk-theme' ),
				'name'         => 'items',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => __( 'Add Item', 'wsk-theme' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_layout_accordion_item_title',
						'label' => __( 'Item Title', 'wsk-theme' ),
						'name'  => 'item_title',
						'type'  => 'text',
					),
					array(
						'key'          => 'field_layout_accordion_item_content',
						'label'        => __( 'Item Content', 'wsk-theme' ),
						'name'         => 'item_content',
						'type'         => 'wysiwyg',
						'media_upload' => 1,
						'delay'        => 1,
					),
				),
			),
			array(
				'key'     => 'field_layout_accordion_colour_scheme',
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
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_accordion' );

/**
 * Hook template into layout builder.
 */
function wskt_acf_layout_accordion() {
	$attrs = array();

	$attrs['title'] = get_sub_field( 'title' );

	$acf_items = get_sub_field( 'items' );

	// Transform the acf_items data into a shape that the Accordion Expects.
	$items = array();
	foreach ( $acf_items as $index => $item ) :
		$items[] = array(
			'id'      => $index,
			'title'   => $item['item_title'],
			'content' => $item['item_content'],
		);
	endforeach;

	$attrs['items']         = $items;
	$attrs['colour_scheme'] = get_sub_field( 'colour_scheme' );

	wskt_layout_accordion( $attrs );
}
add_action( 'wskt_layout_builder_layout_accordion', 'wskt_acf_layout_accordion' );
