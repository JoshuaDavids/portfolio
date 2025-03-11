<?php
/**
 * Layout Template - Logo Grid
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'logo-grid',
	'padding_variant' => 'none',
	'classes'         => array( 'layout--split-colour-scheme' ),
);

$grid_colour_scheme = 'default';
if ( $args['top_colour_scheme'] === 'default' || $args['bottom_colour_scheme'] === 'default' ) {
	$grid_colour_scheme = 'light';
}
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php if ( $args['top_colour_scheme'] ) : ?>
		<div class="layout__background-top colour-scheme colour-scheme--<?php echo esc_attr( $args['top_colour_scheme'] ); ?>"></div>
	<?php endif; ?>

	<?php if ( $args['bottom_colour_scheme'] ) : ?>
		<div class="layout__background-bottom colour-scheme colour-scheme--<?php echo esc_attr( $args['bottom_colour_scheme'] ); ?>"></div>
	<?php endif; ?>

	<div class="container-fluid">
		<div class="layout__content colour-scheme colour-scheme--<?php echo esc_attr( $grid_colour_scheme ); ?>">

		<?php if ( $args['title'] ) : ?>
		<header class="layout__header animation animation--fade-in-up">
         <h5 class="layout__title">
            <?php echo esc_attr( $args['title'] ); ?>
         </h5>
         <?php wskt_button( $args['button'] ); ?>
		</header>
		<?php endif; ?>

		<div class="layout__body animation animation--fade-in-up">

		<?php foreach ( $args['logos'] as $image ) : ?>
			<?php
			$media = wskt_get_media( $image['logo_media_media'] );

			if ( $image['logo_link'] ) {
				$media = sprintf(
					'<a href="%1$s">%2$s</a>',
					$image['logo_link'],
					$media
				);
			}

			printf(
				'<div class="logo">%1$s</div>',
				$media
			);
			?>
		<?php endforeach; ?>
		</div>

		</div>
	</div>

</section>
