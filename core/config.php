<?php
/**
 * Theme Configuration
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wskt_theme_config() {
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'wsk-theme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'wskt_theme_config' );

/**
 * Add custom image sizes.
 */
add_image_size( 'hero', 1600, 800, true );
add_image_size( 'lg', 1440, 972, true );
add_image_size( 'md', 800, 800, true );
add_image_size( 'sm', 250, 140, true );

/**
 * Disable the default WordPress editor.
 */
function wskt_disable_editor() {
	// Get the Post ID.
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}

	if ( ! isset( $post_id ) || empty( $post_id ) ) {
		return;
	}

	$current_template = get_post_meta( $post_id, '_wp_page_template', true );

	// Array of templates to exclude from disabling the editor
	$excluded_templates = apply_filters( 'wskt_disable_editor_excluded_templates', array() );

	// Check if the current template is not in the excluded templates
	if ( ! in_array( $current_template, $excluded_templates ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_init', 'wskt_disable_editor' );

/**
 * Customise the excerpt more output.
 */
function wskt_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'wskt_excerpt_more' );

/**
 * Customise the excerpt length.
 */
function wskt_excerpt_length() {
	return 32;
}
add_filter( 'excerpt_length', 'wskt_excerpt_length' );

/**
 * Remove wrapping P tags on images.
 *
 * @param string $content The content string.
 */
function wskt_filter_p_tags_on_images( $content ) {
	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'wskt_filter_p_tags_on_images', 9999 );
add_filter( 'acf_the_content', 'wskt_filter_p_tags_on_images', 9999 );

/**
 * Wraps the auto embed with a container div and set the ratio.
 */
function wskt_wrap_embed_with_div( $html, $url, $attr ) {
	return '<div class="embed-container ratio ratio-16x9">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'wskt_wrap_embed_with_div', 10, 3 );
