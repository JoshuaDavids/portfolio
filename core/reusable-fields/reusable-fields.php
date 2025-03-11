<?php
/**
 * Reusable Fields
 *
 * Includes a collection of reusable fields that can be used as clone elements. A reusable field
 * is typically a group of related fields that come together to create a single piece of
 * functionality. An example would be button which would need to have a label, link, type and maybe
 * an icon. By grouping these into a reusable field we avoid repeating the field setup and can
 * consolidate the templating.
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Fields
 *
 * Imports all of the fields that are required for this project.
 */
require_once 'field-button-group.php';
require_once 'field-button.php';
require_once 'field-colour-scheme.php';
require_once 'field-decoration.php';
require_once 'field-media.php';
require_once 'field-ratio-media.php';
require_once 'field-testimonial.php';

/**
 * Adds Reusable Fields.
 *
 * By default there are no fields. A filter is provided so that fields can
 * be programmatically registered.
 */
function wskt_add_reusable_fields() {
	$reusable_fields = apply_filters( 'wskt_reusable_fields', array() );

	// Only add the reusable fields if we have fields to populate it with.
	if ( empty( $reusable_fields ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_reusable_fields',
			'title'  => __( 'Reusable Fields', 'wsk-theme' ),
			'fields' => $reusable_fields,
		)
	);
}
add_action( 'acf/init', 'wskt_add_reusable_fields' );
