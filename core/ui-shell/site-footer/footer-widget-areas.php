<?php
/**
 * Footer Widget Areas
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Footer Widget Areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wskt_register_footer_widget_areas() {
	$widget_areas = array(
		array(
			'id'            => 'footer-widget-area-1',
			'name'          => esc_html__( 'Footer widget area #1', 'wsk-theme' ),
			'description'   => esc_html__( 'Add widgets here.', 'wsk-theme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget__title">',
			'after_title'   => '</h3>',
		),
		array(
			'id'            => 'footer-widget-area-2',
			'name'          => esc_html__( 'Footer widget area #2', 'wsk-theme' ),
			'description'   => esc_html__( 'Add widgets here.', 'wsk-theme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget__title">',
			'after_title'   => '</h3>',
		),
	);

	foreach ( $widget_areas as $widget_area ) {
		register_sidebar( $widget_area );
	}
}
add_action( 'widgets_init', 'wskt_register_footer_widget_areas' );

/**
 * Output Footer Widget Area.
 *
 * @param string $id The id of the registered widget area.
 */
function wskt_footer_widget_area( $id ) {
	if ( ! is_active_sidebar( $id ) ) {
		return;
	}

	?>
	<aside class="<?php echo esc_attr( $id ); ?>">
		<?php dynamic_sidebar( $id ); ?>
	</aside>
	<?php
}
