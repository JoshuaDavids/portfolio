<?php

/**
 * Layout Template - Content / Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name' => 'testimonials-slider',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
);

?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">

		<div class="layout__content">
			<div class="swiper">
				<div class="swiper-controls">
					<div class="d-flex w-100 justify-content-between">
						<div class="d-flex flex-grow-1">
							<div class="swiper-button-prev"><?php wskt_icon('arrow-prev', 'wsk'); ?></div>
							<div class="swiper-button-next"><?php wskt_icon('arrow-next', 'wsk'); ?></div>
						</div>
						<div class="swiper-scrollbar">

						</div>
					</div>
				</div>
				<div class="swiper-wrapper">
					<?php
					foreach ($args['items'] as $item) {
					?>
						<div class="swiper-slide card bg-light">
							<div class="card-body">
								<?php echo $item['content']; ?>

								<div class="d-flex align-items-center pt-6">
									<div class="testimonial__image">
										<?php wskt_media($item['ratio_media']); ?>
									</div>
									<div class="testimonial__details flex-grow-1 w-100 ps-6">
										<h4><?php echo $item['name']; ?></h4>
										<?php echo $item['role']; ?>
									</div>
								</div>
							</div>
						</div>
					<?php
					}

					?>
				</div>
			</div>
		</div>

	</div>

</section>