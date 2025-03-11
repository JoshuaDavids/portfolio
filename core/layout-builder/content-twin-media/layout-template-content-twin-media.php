<?php
/**
 * Layout Template - Content / Twin Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'content-twin-media',
	'colour_scheme' => $args['colour_scheme'],
);

// Prepare classes.
$content_col_classes[] = 'g-col-12 g-col-lg-5';
$media_col_classes[]   = 'g-col-12 g-col-lg-6';

// Animation classes
$content_col_classes[] = 'animation';
$content_col_classes[] = 'animation--fade-in';
$content_col_classes[] = 'animation--delay-4';

if ( 'content-first' === $args['alignment'] ) {
	$content_col_classes[] = 'order-lg-first';

	$media_col_classes[] = 'g-start-lg-7';
	$media_col_classes[] = 'order-lg-last';
} else {
	$content_col_classes[] = 'g-start-lg-8';
}
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="<?php echo esc_attr( implode( ' ', $media_col_classes ) ); ?>">
					<?php if ( $args['media_1'] ) : ?>
						<?php wskt_media( $args['media_1'], array( 'layout__media_1 animation animation--fade-in' ) ); ?>
					<?php endif; ?>

					<?php if ( $args['media_2'] ) : ?>
						<?php wskt_media( $args['media_2'], array( 'layout__media_2 animation animation--fade-in animation--delay-4' ) ); ?>
					<?php endif; ?>
				</div>

				<div class="<?php echo esc_attr( implode( ' ', $content_col_classes ) ); ?>">
					<div class="layout__content">

						<?php if ( $args['title'] ) : ?>
						<header class="layout__header">
							<h1><?php echo esc_attr( $args['title'] ); ?></h1>
						</header>
						<?php endif; ?>

						<?php if ( $args['content'] ) : ?>
						<div class="layout__body">
							<?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</div>
						<?php endif; ?>

						<footer class="layout__footer">
							<?php wskt_button( $args['button'] ); ?>
						</footer>

					</div>
				</div>

			</div>

		</div>
	</div>

</section>
