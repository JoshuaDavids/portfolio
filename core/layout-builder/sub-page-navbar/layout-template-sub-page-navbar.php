<?php
/**
 * Layout Template - Sub Page Navbar
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'sub-page-navbar',
	'padding_variant' => 'none',
	'colour_scheme'   => 'none',
);

$default_navbar_classes = array(
	'sub-page-navbar',
	'navbar',
	'navbar-expand-xl',
	'navbar-light',
);

$navbar_classes = apply_filters( 'wskt_sub_page_navbar_classes', $default_navbar_classes );
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
	<nav class="<?php echo esc_attr( implode( ' ', $navbar_classes ) ); ?>">

		<div class="container-fluid">

			<?php if ( $args['title'] ) : ?>
			<h3 class="navbar-title">
				<?php echo esc_attr( $args['title'] ); ?>
			</h3>
			<?php endif; ?>

			<?php wskt_sub_page_navbar_toggler(); ?>

			<div id="subNavbarSupportedContent" class="collapse navbar-collapse">

				<ul class="navbar-nav">
					<?php foreach ( $args['links'] as $nav_item ) : ?>
						<li class="<?php echo $nav_item['current'] ? 'nav-item current-menu-ancestor' : 'nav-item'; ?>">
						<?php
						printf(
							'<a href="%1$s" class="%2$s">%3$s</a>',
							esc_url( $nav_item['url'] ),
							esc_attr( 'nav-link' ),
							esc_attr( $nav_item['title'] )
						);
						?>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php do_action( 'wskt_sub_page_navbar_button' ); ?>

			</div>

		</div>

	</nav>
</section>
