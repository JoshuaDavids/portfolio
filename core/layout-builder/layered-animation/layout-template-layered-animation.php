<?php
/**
 * Layout Template - Layered Animation
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $args['layers'] ) ) {
	return;
}

$layout_classes_attrs = array(
	'layout_name'     => 'layered-animation',
	'colour_scheme'   => 'dark',
	'padding_variant' => 'none',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php foreach ( $args['layers'] as $index => $layer ) : ?>

		<?php
		$layer_classes = array();
		if ( 0 === $index ) {
			$layer_classes[] = 'layout__anchor';
		} else {
			$layer_classes[] = 'layout__layer';
		}
		?>

		<div class="<?php echo esc_attr( implode( ' ', $layer_classes ) ); ?>">

			<?php if ( 'animation' === $layer['type'] ) : ?>

				<?php
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				printf(
					'<lottie-player class="layout__animation" src="%1$s" background="transparent" speed="1"></lottie-player>',
					esc_url( $layer['animation']['url'] )
				);
				?>

			<?php endif; ?>

			<?php if ( 'image' === $layer['type'] ) : ?>

				<?php
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo wp_get_attachment_image( $layer['image'], 'full' );
				?>

			<?php endif; ?>

		</div>

	<?php endforeach; ?>

	<div class="layout__inner">
		<div class="container-fluid">

			<div class="layout__content">
				<?php if ( $args['content'] ) : ?>
				<div class="layout__body animation animation--fade-in-up animation--delay-2">
					<h1 class="layout__title"><?php echo esc_attr( $args['content'] ); ?></h1>
				</div>
				<?php endif; ?>

				<footer class="layout__footer animation animation--fade-in-up animation--delay-4">
					<?php wskt_button( $args['button'] ); ?>
				</footer>
			</div>

		</div>
	</div>

</section>
