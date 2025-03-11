<?php
/**
 * Component - Accordion
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Accordion HTML.
 *
 * $accordion_item = array (
 *   'id'      => 'uuid',
 *   'title'   => 'Example Title',
 *   'content' => '<div><p>Lorem Ipsum</p></div>',
 * );
 *
 * @param array $items Array of accordion items.
 * @param array $attrs Array of accordion attributes.
 */
function wskt_get_accordion( $items = array(), $attrs = array() ) {
	$default_attrs = array(
		'expanded' => false,
		'classes'  => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// UUID for accordions so that we don't run into issues when more than one accordions layout is used on the same page.
	$accordion_id = sprintf( 'accordion-%1$s', uniqid() );

	// Initialise array for holding classes.
	$classes = array();

	// Add the default accordion class.
	$classes[] = 'accordion';

	// Merge in supplied classes.
	$classes = wskt_merge_classes( $classes, $attrs['classes'] );

	// Prepare Accordion HTML
	$output  = '';
	$output .= sprintf( '<div id="%1$s" class="%2$s">', $accordion_id, implode( ' ', $classes ) );
	foreach ( $items as $item ) :
		$output .= wskt_get_accordion_item(
			array(
				'parent'   => $accordion_id,
				'item'     => $item,
				'expanded' => $attrs['expanded'],
			)
		);
	endforeach;
	$output .= '</div>';

	return $output;
}

/**
 * Output the Accordion HTML.
 *
 * @param mixed ...$args Accordion arguments, @see wskt_get_accordion() for a description.
 */
function wskt_accordion( ...$args ) {
	echo wskt_get_accordion( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Return the Accordion Item HTML.
 *
 * @param array $attrs Accordion Item attributes.
 */
function wskt_get_accordion_item( $attrs = array() ) {
	$default_attrs = array(
		'parent'   => '',
		'item'     => array(),
		'expanded' => false,
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Prepare Accordion Header HTML.
	$button_attrs = array(
		'class'          => $attrs['expanded'] ? 'accordion-button' : 'accordion-button collapsed',
		'data-bs-toggle' => 'collapse',
		'data-bs-target' => sprintf( '#collapse-%1$s-%2$s', $attrs['parent'], $attrs['item']['id'] ),
		'aria-expanded'  => $attrs['expanded'],
		'aria-controls'  => sprintf( 'collapse-%1$s-%2$s', $attrs['parent'], $attrs['item']['id'] ),
		'type'           => 'button',
	);

	$button_html = sprintf(
		'<button %1$s>%2$s <span class="collapse-toggle__icon"></span></button>',
		wskt_implode_html_attributes( $button_attrs ),
		$attrs['item']['title']
	);

	$header_html = sprintf( '<h3 id="heading-%1$s-%2$s" class="accordion-header">%3$s</h3>', $attrs['parent'], $attrs['item']['id'], $button_html );

	// Prepare Accordion Collapse HTML.
	$collapse_attrs = array(
		'id'              => sprintf( 'collapse-%1$s-%2$s', $attrs['parent'], $attrs['item']['id'] ),
		'class'           => $attrs['expanded'] ? 'accordion-collapse collapse show' : 'accordion-collapse collapse',
		'aria-labelledby' => sprintf( 'heading-%1$s-%2$s', $attrs['parent'], $attrs['item']['id'] ),
		// 'data-bs-parent'  => sprintf( '#%1$s', $attrs['parent'] ), // Disable the linking of accordion items
	);

	$collapse_html  = '';
	$collapse_html .= sprintf( '<div %1$s>', wskt_implode_html_attributes( $collapse_attrs ) );
	$collapse_html .= '<div class="accordion-body">';
	$collapse_html .= $attrs['item']['content'];
	$collapse_html .= '</div>';
	$collapse_html .= '</div>';

	// Prepare Accordion Item HTML.
	return sprintf( '<div class="accordion-item">%1$s%2$s</div>', $header_html, $collapse_html );
}
