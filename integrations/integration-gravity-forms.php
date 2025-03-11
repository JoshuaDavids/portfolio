<?php
/**
 * Integration - Gravity Forms
 *
 * Customisations to gravity forms to make it play nice with our theme
 *
 * @package WSK_Theme/Integrations
 */

defined( 'ABSPATH' ) || exit;

/**
 * Filter to show "Hide label" option in GForms admin
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/**
 * Prevent the jump to anchor on Gravity Forms submission
 *
 * @link https://docs.gravityforms.com/gform_confirmation_anchor/
 */
add_filter( 'gform_confirmation_anchor', '__return_false' );

/**
 * Disable the default gravity forms CSS from being loaded
 *
 * @link https://docs.gravityforms.com/gform_disable_form_theme_css/
 */
add_filter( 'gform_disable_form_theme_css', '__return_true' );

/**
 * Customise field size choices
 */
function wskt_customise_field_size_choices() {
	$choices = array(
		array(
			'value' => 'form-control-default',
			'text'  => __( 'Default', 'wsk-theme' ),
		),
		array(
			'value' => 'form-control-sm',
			'text'  => __( 'Small', 'wsk-theme' ),
		),
		array(
			'value' => 'form-control-lg',
			'text'  => __( 'Large', 'wsk-theme' ),
		),
	);

	return $choices;
}
add_filter( 'gform_field_size_choices', 'wskt_customise_field_size_choices' );

/**
 * Add bootstrap classes to fields
 *
 * @link https://docs.gravityforms.com/gform_field_content/
 *
 * @param string $content The field content.
 * @param array  $field The Field Object.
 * @param string $value The field value.
 * @param int    $lead_id The entry ID.
 * @param int    $form_id The form ID.
 */
function wskt_add_bootstrap_classes_to_fields( $content, $field, $value, $lead_id, $form_id ) {
	// Only apply classes to the front end.
	if ( ! is_admin() ) {
		$field_type = $field->type;

		$dom = new DOMDocument();
		libxml_use_internal_errors( true );
		$dom->loadHTML( '<html><body>' . mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) . '</body></html>', LIBXML_HTML_NODEFDTD );
		libxml_use_internal_errors( false );

		// Add bootstrap label class.
		wskts_dom_add_class_to_elements( $dom, 'label', 'form-label' );

		switch ( $field_type ) {
			case 'text':
			case 'number':
			case 'name':
			case 'date':
			case 'phone':
			case 'website':
			case 'email':
			case 'list':
			case 'post_title':
			case 'post_tags':
			case 'post_custom_field':
			case 'quantity':
				wskts_dom_add_class_to_elements( $dom, 'input', 'form-control' );
				break;
			case 'textarea':
			case 'post_content':
			case 'post_excerpt':
				wskts_dom_add_class_to_elements( $dom, 'textarea', 'form-control' );
				break;
			case 'select':
			case 'multiselect':
			case 'post_category':
			case 'option':
				wskts_dom_add_class_to_elements( $dom, 'select', 'form-control' );
				break;
			case 'checkbox':
			case 'radio':
				wskts_dom_add_class_to_elements( $dom, 'li', 'form-check' );

				$inputs = $dom->getElementsByTagName( 'input' );
				foreach ( $inputs as $input ) {
					$type = $input->getAttribute( 'type' );

					if ( 'radio' === $type || 'checkbox' === $type ) {
						wskts_dom_append_attr_to_element( $input, 'class', 'form-check-input' );
					}

					if ( 'text' === $type ) {
						wskts_dom_append_attr_to_element( $input, 'class', 'form-control form-control--other' );
					}
				}

				wskts_dom_add_class_to_elements( $dom, 'label', 'form-check-label' );
				break;
			case 'time':
			case 'address':
				wskts_dom_add_class_to_elements( $dom, 'input', 'form-control' );
				wskts_dom_add_class_to_elements( $dom, 'select', 'form-control' );
				break;
			case 'fileupload':
			case 'post_image':
				wskts_dom_add_class_to_elements( $dom, 'input', 'form-control' );
				wskts_dom_add_class_to_elements( $dom, 'button', 'btn btn-outline-primary btn-sm' );
				break;
			case 'consent':
				$divs = $dom->getElementsByTagName( 'div' );
				if ( $divs[0] ) {
					wskts_dom_append_attr_to_element( $divs[0], 'class', 'form-check' );
				}

				$inputs = $dom->getElementsByTagName( 'input' );
				if ( $inputs[0] ) {
					wskts_dom_append_attr_to_element( $inputs[0], 'class', 'form-check-input' );
				}

				$labels = $dom->getElementsByTagName( 'label' );
				if ( $labels[0] ) {
					wskts_dom_append_attr_to_element( $labels[0], 'class', 'form-check-label' );
				}
				break;
		}

		$content = substr( trim( $dom->saveHTML() ), 12, -14 );
	}

	return $content;
}
add_filter( 'gform_field_content', 'wskt_add_bootstrap_classes_to_fields', 10, 5 );

/**
 * Adds a button class field to the gravity forms settings page.
 *
 * @link https://docs.gravityforms.com/gform_form_settings_fields/
 *
 * @param array $fields Form settings fields.
 * @param array $form   Form Object.
 */
function wskt_add_button_class_field( $fields, $form ) {
	$fields['form_button']['fields'][] = array(
		'name'  => 'buttonClass',
		'type'  => 'text',
		'label' => esc_html__( 'Button Class', 'wsk-theme' ),
	);

	return $fields;
}
add_filter( 'gform_form_settings_fields', 'wskt_add_button_class_field', 10, 2 );

/**
 * Convert the submit and next inputs to a button
 *
 * @link https://docs.gravityforms.com/gform_submit_button/
 *
 * @param string $button The Button content.
 * @param array  $form The Form object.
 */
function wskt_convert_inputs_to_button( $button, $form ) {
	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( '<html><body>' . mb_convert_encoding( $button, 'HTML-ENTITIES', 'UTF-8' ) . '</body></html>', LIBXML_HTML_NODEFDTD );
	libxml_use_internal_errors( false );

	$input      = $dom->getElementsByTagName( 'input' )->item( 0 );
	$new_button = $dom->createElement( 'button' );
	$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
	$input->removeAttribute( 'value' );

	foreach ( $input->attributes as $attribute ) {
		if ( 'class' === $attribute->name ) {
			$class = ! empty( $form['buttonClass'] ) ? $form['buttonClass'] : 'btn btn-primary';

			$attribute->value = str_replace( 'button', $class, $attribute->value );
		}
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}

	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
	$input->parentNode->replaceChild( $new_button, $input );

	return $dom->saveHtml( $new_button );
}
add_filter( 'gform_next_button', 'wskt_convert_inputs_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'wskt_convert_inputs_to_button', 10, 2 );

/**
 * Convert the submit and next inputs to a button
 *
 * @link https://docs.gravityforms.com/gform_submit_button/
 *
 * @param string $button The Button content.
 * @param array  $form The Form object.
 */
function wskt_convert_prev_input_to_button( $button, $form ) {
	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( '<html><body>' . mb_convert_encoding( $button, 'HTML-ENTITIES', 'UTF-8' ) . '</body></html>', LIBXML_HTML_NODEFDTD );
	libxml_use_internal_errors( false );

	$input      = $dom->getElementsByTagName( 'input' )->item( 0 );
	$new_button = $dom->createElement( 'button' );
	$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
	$input->removeAttribute( 'value' );

	foreach ( $input->attributes as $attribute ) {
		if ( 'class' === $attribute->name ) {
			$class = ! empty( $form['buttonClass'] ) ? $form['buttonClass'] : 'btn btn-outline-primary';

			$attribute->value = str_replace( 'button', $class, $attribute->value );
		}
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}

	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
	$input->parentNode->replaceChild( $new_button, $input );

	return $dom->saveHtml( $new_button );
}

add_filter( 'gform_previous_button', 'wskt_convert_prev_input_to_button', 10, 2 );
