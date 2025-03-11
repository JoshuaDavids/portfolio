
<?php
/**
 * Layout - accordion-media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Layout template function
 *
 * @param array $attrs Layout attributes.
 */
function wskt_layout_accordion_media( $attrs = array() ) {
	$default_attrs = array(
		'title'         => '',
		'items'         => array(),
		'colour_scheme' => '',
	);

	$args = wp_parse_args( $attrs, $default_attrs );

	get_template_part(
		'core/layout-builder/accordion-media/layout-template-accordion-media',
		null,
		$args
	);
}