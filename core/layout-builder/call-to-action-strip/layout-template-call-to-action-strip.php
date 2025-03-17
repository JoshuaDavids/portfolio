<?php

/**
 * Layout Template - Call To Action : Strip
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'call-to-action-strip',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">
		<div class="layout__inner">
			<div class="layout__content d-flex flex-column justify-content-end">
				<div class="grid d-grid align-items-end">

					<?php if ($args['content']) : ?>
						<div class="layout__text animation animation--fade-in-up g-col-11">
							<h2 class="heading__black"><?php echo esc_attr($args['content']); ?></h2>
							<h4><?php echo esc_attr($args['subtitle']); ?></h4>
						</div>
					<?php endif; ?>

					<footer class="layout__footer animation animation--fade-in animation--delay-6 g-col-1">
						<?php wskt_button($args['button']); ?>
					</footer>

				</div>
			</div>
			<div class="blob-outer-container">
				<div class="blob-inner-container">
					<div class="blob"></div>
				</div>
			</div>

		</div>
	</div>

</section>