<?php

/**
 * Layout Template - Case Study Slider
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'case-studies',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array('layout--next-layout-preview'),
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="g-col-12">


					<?php if ($args['title']) : ?>
						<header class="layout__header animation animation--fade-in-up">
							<h2 class="heading__black"><?php echo esc_attr($args['title']); ?></h2>
						</header>
					<?php endif; ?>

					<div class="accordion__box">
						<div class="indicator"></div>
						<div class="gallery">
							<?php foreach ($args['posts'] as $newSinglePost) : ?>
								<div class="gallery__item d-flex flex-column">

									<a href="<?php echo get_permalink($newSinglePost); ?>">
										<img src="<?php echo get_the_post_thumbnail_url($newSinglePost); ?>" alt="image" />
									</a>

								</div>
							<?php endforeach; ?>
						</div>
					</div>



				</div>

			</div>

		</div>

	</div>

</section>