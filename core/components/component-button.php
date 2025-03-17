<?php

/**
 * Component - Button
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

/**
 * Returns the Button HTML.
 *
 * @param array $attrs Button attributes.
 */
function wskt_get_button($attrs = array())
{
	$attrs = wskt_unwrap_attrs('button', $attrs);

	$default_attrs = array(
		'type'       => 'primary',
		'size'       => '',
		'left_icon'  => '',
		'text'       => '',
		'url'        => '', // Because we use this so often it's added here as a convenience. Could also supply a href to the attributes.
		'right_icon' => '',
		'attributes' => array(),
		'classes'    => array(),
	);

	$attrs = wp_parse_args($attrs, $default_attrs);

	// Bail if the button has no text.
	if (empty($attrs['text'])) {
		return;
	}

	// Initialise array for holding classes.
	$classes = array();

	// Add the default button class.
	$classes[] = 'button-content';

	// Add button type modifier class.
	if (! empty($attrs['type'])) {
		$classes[] = 'btn-' . $attrs['type'];
	}

	// Add button size modifier class.
	if (! empty($attrs['size'])) {
		$classes[] = 'btn-' . $attrs['size'];
	}

	// Merge in supplied classes.
	$classes = wskt_merge_classes($classes, $attrs['classes']);

	// Set the class attribute.
	$attrs['attributes']['class'] = implode(' ', $classes);

	// Set the url attribute.
	if ($attrs['url']) {
		$attrs['attributes']['href'] = $attrs['url'];
	}

	// Prepare the HTML tag and associated attributes.
	if (isset($attrs['attributes']['href'])) {
		$tag = 'a';
	} else {
		$tag = 'button';

		$attrs['attributes']['type'] = $attrs['attributes']['type'] ?? 'button';
	}

	$attributes = wskt_implode_html_attributes($attrs['attributes']);

	// Add the external link icon if the target is "_blank"
	if (isset($attrs['attributes']['target'])) {
		$target = $attrs['attributes']['target'];
		if ('_blank' === $target) {
			$attrs['right_icon'] = wskt_get_icon(
				'external-link-line',
				'remix/system',
				array(
					'class' => 'btn__icon btn__icon-right',
				)
			);
		}
	}

	// Prepare button HTML.
	$html = '<' . $tag . ' ' . $attributes . '>';

	if ($attrs['left_icon']) {
		$html .= $attrs['left_icon'];
	}

	$html .= $attrs['text'];

	if ($attrs['right_icon']) {
		$html .= $attrs['right_icon'];
	}

	$html .= '</' . $tag . '>';

	return $html;
}

/**
 * Output the Button HTML.
 *
 * @param mixed ...$args Button arguments, @see wskt_get_button() for a description.
 */
function wskt_button(...$args)
{
	echo wskt_get_button(...$args); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
