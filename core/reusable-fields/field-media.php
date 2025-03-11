<?php
/**
 * Reusable fields - Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add Reusable Field - Media.
 *
 * @param array $fields Fields.
 */
function wskt_add_reusable_field_media( $fields ) {
	$new_fields = array(
		array(
			'key'        => 'field_media',
			'label'      => __( 'Media', 'wsk-theme' ),
			'name'       => 'media',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'           => 'field_media_type',
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
					'key'               => 'field_media_image',
					'label'             => __( 'Image', 'wsk-theme' ),
					'name'              => 'image',
					'type'              => 'image',
					'return_format'     => 'id',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_media_type',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
				),
				array(
					'key'               => 'field_media_video',
					'label'             => __( 'Video', 'wsk-theme' ),
					'name'              => 'video',
					'type'              => 'file',
					'return_format'     => 'url',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_media_type',
								'operator' => '==',
								'value'    => 'video',
							),
						),
					),
				),
				array(
					'key'               => 'field_media_video_poster',
					'label'             => __( 'Video Poster', 'wsk-theme' ),
					'name'              => 'video_poster',
					'type'              => 'image',
					'return_format'     => 'id',
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_media_type',
								'operator' => '==',
								'value'    => 'video',
							),
						),
					),
				),
			),
		),
	);

	return array_merge( $fields, $new_fields );
}
add_action( 'wskt_reusable_fields', 'wskt_add_reusable_field_media' );
