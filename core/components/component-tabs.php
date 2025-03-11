<?php
/**
 * Component - Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Tabs HTML.
 *
 * $tab = array (
 *   'id'      => 'uuid',
 *   'title'   => 'Example Title',
 *   'content' => '<div><p>Lorem Ipsum</p></div>',
 * );
 *
 * @param array $tabs Array of tabs.
 */
function wskt_get_tabs( $tabs = array() ) {
	// UUID for tabs so that we don't run into issues when more than one tab layout is used on the same page.
	$uuid = uniqid();

	// Prepare Tabs HTML
	$output = '';

	$output .= '<div class="responsive-tabs">';
	$output .= wskt_get_nav_tabs(
		array(
			'id'   => sprintf( 'tabs-%1$s', $uuid ),
			'tabs' => $tabs,
		)
	);
	$output .= wskt_get_tab_content(
		array(
			'id'   => sprintf( 'tabs-%1$s', $uuid ),
			'tabs' => $tabs,
		)
	);
	$output .= '</div>';

	return $output;
}

/**
 * Output the Tabs HTML.
 *
 * @param mixed ...$args Tabs arguments, @see wskt_get_tabs() for a description.
 */
function wskt_tabs( ...$args ) {
	echo wskt_get_tabs( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Return the Nav Tabs HTML.
 *
 * @param array $attrs Nav Tabs attributes.
 */
function wskt_get_nav_tabs( $attrs = array() ) {
	$default_attrs = array(
		'id'   => '',
		'tabs' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Prepare Nav Tabs HTML
	$output  = '';
	$output .= sprintf( '<ul id="%1$s" class="nav nav-tabs" role="tablist">', $attrs['id'] );

	foreach ( $attrs['tabs'] as $index => $tab ) :
		$output .= wskt_get_nav_tab(
			array(
				'id'       => sprintf( '%1$s-%2$s-tab', esc_attr( $attrs['id'] ), esc_attr( $tab['id'] ) ),
				'selected' => 0 === $index,
				'target'   => sprintf( '#%1$s-%2$s', esc_attr( $attrs['id'] ), esc_attr( $tab['id'] ) ),
				'title'    => $tab['title'],
			)
		);
	endforeach;

	$output .= '</ul>';

	return $output;
}

/**
 * Return the Nav Tab HTML.
 *
 * @param array $attrs Nav Tab attributes.
 */
function wskt_get_nav_tab( $attrs = array() ) {
	$default_attrs = array(
		'id'       => '',
		'target'   => '',
		'selected' => false,
		'title'    => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$nav_link_attrs = array(
		'id'             => $attrs['id'],
		'class'          => $attrs['selected'] ? 'nav-link active' : 'nav-link',
		'data-bs-toggle' => 'tab',
		'data-bs-target' => $attrs['target'],
		'aria-selected'  => $attrs['selected'],
		'type'           => 'button',
		'role'           => 'tab',
	);

	// Prepare Nav Tab HTML
	$output  = '';
	$output .= '<li class="nav-item" role="presentation">';
	$output .= sprintf(
		'<button %1$s>%2$s</button>',
		wskt_implode_html_attributes( $nav_link_attrs ),
		$attrs['title']
	);
	$output .= '</li>';

	return $output;
}

/**
 * Return the Tab Content HTML.
 *
 * @param array $attrs Tab Content attributes.
 */
function wskt_get_tab_content( $attrs = array() ) {
	$default_attrs = array(
		'id'   => '',
		'tabs' => array(),
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	// Prepare tab content output
	$output  = '';
	$output .= sprintf( '<div id="%1$s-content" class="tab-content">', $attrs['id'] );

	foreach ( $attrs['tabs'] as $index => $tab ) :
		$output .= wskt_get_tab_pane(
			array(
				'id'       => sprintf( '%1$s-%2$s', esc_attr( $attrs['id'] ), esc_attr( $tab['id'] ) ),
				'selected' => 0 === $index,
				'title'    => $tab['title'],
				'content'  => $tab['content'],
			)
		);
	endforeach;

	$output .= '</div>';

	return $output;
}

/**
 * Return the Tab Pane HTML.
 *
 * @param array $attrs Tab Content attributes.
 */
function wskt_get_tab_pane( $attrs = array() ) {
	$default_attrs = array(
		'id'       => '',
		'selected' => false,
		'title'    => '',
		'content'  => '',
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$tab_pane_attrs = array(
		'id'    => $attrs['id'],
		'class' => $attrs['selected'] ? 'tab-pane fade show active' : 'tab-pane fade',
		'role'  => 'tabpanel',
	);

	$output  = '';
	$output .= sprintf( '<div %1$s>', wskt_implode_html_attributes( $tab_pane_attrs ) );

	$tab_collapse_toggle_attrs = array(
		'data-bs-toggle' => 'collapse',
		'class'          => $attrs['selected'] ? 'collapse-toggle' : 'collapse-toggle collapsed',
		'href'           => sprintf( '#%1$s-collapse', $attrs['id'] ),
		'aria-expanded'  => $attrs['selected'] ? 'true' : 'false',
		'aria-controls'  => sprintf( '%1$s-collapse', $attrs['id'] ),
	);

	$output .= sprintf(
		'<a %1$s>%2$s <span class="collapse-toggle__icon"></span></a>',
		wskt_implode_html_attributes( $tab_collapse_toggle_attrs ),
		$attrs['title']
	);

	$tab_collapse_attrs = array(
		'id'    => sprintf( '%1$s-collapse', $attrs['id'] ),
		'class' => $attrs['selected'] ? 'collapse show' : 'collapse',
	);

	$output .= sprintf(
		'<div %1$s><div class="collapse__inner">%2$s</div></div>',
		wskt_implode_html_attributes( $tab_collapse_attrs ),
		$attrs['content']
	);

	$output .= '</div>';

	return $output;
}
