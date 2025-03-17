<?php

/**
 * Layout Template - Hero
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'animated-hero',
	// 'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array('layout--next-layout-preview'),
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">
		<div class="layout__inner d-flex">

			<div class="layout__content">
				<?php if ($args['title']) : ?>
					<div class="layout__body animation animation--fade-in-up animation--delay-2">
						<h1 class="layout__title heading__black normal"><?php echo $args['title']; ?></h1>
					</div>
				<?php endif; ?>

				<?php if ($args['content']) : ?>
					<div class="layout__body pe-13 animation animation--fade-in-up animation--delay-2">
						<p><?php echo esc_attr($args['content']); ?></p>
					</div>
				<?php endif; ?>

				<footer class="layout__footer animation animation--fade-in-up animation--delay-4">
					<div class="d-flex">
						<div class="button"><?php wskt_button($args['button']); ?></div>
						<div class="button-two"></div>
					</div>
				</footer>

			</div>

			<div class="layout__blank"></div>

		</div>

		<div class="glassy-overlay"></div>
		<canvas></canvas>

	</div>

</section>