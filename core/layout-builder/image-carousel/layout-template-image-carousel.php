<?php
/**
 * Layout Template - Image Carousel
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;


$layout_classes_attrs = array(
	'layout_name' => 'image-carousel',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
<div class="container-fluid">
		<?php
		$size = 'small';
		if ( $args['gallery'] ) :
			?>
		<div class="swiper image-carousel-swiper">

		<div class="swiper-wrapper">
			<?php foreach ( (array) $args['gallery'] as $image ) : ?>
			<div class="swiper-slide">	
				<?php echo wp_get_attachment_image( $image['id'], $size, '', array( 'class' => 'shadow' ) ); ?>
				<?php if ( $image ['caption'] ) : ?>
				<figcaption>
						<?php echo esc_html( $image['caption'] ); ?>
				</figcaption>
			<?php endif; ?>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="swiper-button-next">
			<?php
			wskt_icon(
				'arrow-right-s-line',
				'remix/system',
				array(
					'height' => 24,
					'width'  => 24,
				)
			)
			?>
		</div>
		<div class="swiper-button-prev">
			<?php
			wskt_icon(
				'arrow-left-s-line',
				'remix/system',
				array(
					'height' => 24,
					'width'  => 24,
				)
			)
			?>
		</div>
	</div>
	<div class="swiper-pagination my-7"></div>
	<?php endif; ?>
	</div>
</section>
