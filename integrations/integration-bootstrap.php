<?php
/**
 * Integration - Bootstrap
 *
 * Customisations to WordPress to make it play nice with our theme
 *
 * @package WSK_Theme/Integrations
 */

defined( 'ABSPATH' ) || exit;

/**
 * Adds bootstrap fluid image class to attachment images
 *
 * @param string[] $attrs Array of attribute values for the image markup, keyed by attribute name.
 */
function wskt_add_attachment_fluid_image_class( $attrs ) {
	$attrs['class'] .= ' img-fluid';

	return $attrs;
}
add_filter( 'wp_get_attachment_image_attributes', 'wskt_add_attachment_fluid_image_class' );

/**
 * Adds bootstrap fluid image class to editor images
 *
 * @param string[] $content The editor content.
 */
function wskt_add_editor_fluid_image_class( $content ) {
	if ( empty( $content ) ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( '<html><body>' . mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) . '</body></html>', LIBXML_HTML_NODEFDTD );
	libxml_use_internal_errors( false );

	wskts_dom_add_class_to_elements( $dom, 'img', 'img-fluid' );

	$html = substr( trim( $dom->saveHTML() ), 12, -14 );

	return $html;
}
add_filter( 'the_content', 'wskt_add_editor_fluid_image_class', 9999 );
add_filter( 'acf_the_content', 'wskt_add_editor_fluid_image_class', 9999 );

/**
 * Adds bootstrap list class to editor lists
 *
 * @param string[] $content The editor content.
 */
function wskt_add_editor_list_class( $content ) {
	if ( empty( $content ) ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( '<html><body>' . mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) . '</body></html>', LIBXML_HTML_NODEFDTD );
	libxml_use_internal_errors( false );

	wskts_dom_add_class_to_elements( $dom, 'ul', 'list' );

	$html = substr( trim( $dom->saveHTML() ), 12, -14 );

	return $html;
}
add_filter( 'the_content', 'wskt_add_editor_list_class', 9999 );
add_filter( 'acf_the_content', 'wskt_add_editor_list_class', 9999 );
