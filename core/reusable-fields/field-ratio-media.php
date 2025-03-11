<?php
/**
 * Reusable fields - Ratio Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Ratio Media.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_ratio_media( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_ratio_media',
			'label'      => __( 'Media', 'wsk-theme' ),
			'name'       => 'ratio_media',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'           => 'field_ratio_media_type',
					'label'         => __( 'Type', 'wsk-theme' ),
					'name'          => 'type',
					'type'          => 'select',
					'choices'       => array(
						'image' => __( 'Image', 'wsk-theme' ),
						'video' => __( 'Video', 'wsk-theme' ),
					),
					'default_value' => 'image',
					'return_format' => 'value',
				),
				array(
					'key'               => 'field_ratio_media_image',
					'label'             => __( 'Image', 'wsk-theme' ),
					'name'              => 'image',
					'type'              => 'image',
					'return_format'     => 'id',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_ratio_media_type',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
				),
				array(
					'key'               => 'field_ratio_media_video',
					'label'             => __( 'Video', 'wsk-theme' ),
					'name'              => 'video',
					'type'              => 'file',
					'return_format'     => 'url',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_ratio_media_type',
								'operator' => '==',
								'value'    => 'video',
							),
						),
					),
				),
				array(
					'key'               => 'field_ratio_media_video_poster',
					'label'             => __( 'Video Poster', 'wsk-theme' ),
					'name'              => 'video_poster',
					'type'              => 'image',
					'return_format'     => 'id',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_ratio_media_type',
								'operator' => '==',
								'value'    => 'video',
							),
						),
					),
				),
				array(
					'key'           => 'field_ratio_media_ratio',
					'label'         => __( 'Ratio', 'wsk-theme' ),
					'name'          => 'ratio',
					'type'          => 'select',
					'choices'       => array(
						''           => __( 'None', 'wsk-theme' ),
						'ratio-1x1'  => __( 'Ratio 1x1', 'wsk-theme' ),
						'ratio-5x6'  => __( 'Ratio 5x6', 'wsk-theme' ),
						'ratio-16x9' => __( 'Ratio 16x9', 'wsk-theme' ),
					),
					'default_value' => '',
					'return_format' => 'value',
				),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_ratio_media' );
