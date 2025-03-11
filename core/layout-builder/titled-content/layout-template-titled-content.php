<?php
/**
 * Layout Template - Titled Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'titled-content',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">

		<?php if ( $args['title'] ) : ?>
			<header class="layout__header animation animation--fade-in-up">
				<h1>
					<?php echo esc_attr( $args['title'] ); ?>
				</h1>
			</header>
		<?php endif; ?>

		<div class="layout__content">
			<?php foreach ( $args['sections'] as $index => $section_item ) : ?>

				<div class="layout__section">
					<div class="row">

						<div class="col-md-4">
							<?php if ( $section_item['title'] ) : ?>
								<header class="layout__header animation animation--fade-in-up">
									<h4>
										<?php echo esc_attr( $section_item['title'] ); ?>
									</h4>
								</header>
							<?php endif; ?>
						</div>

						<div class="col-md-7 offset-md-1">
							<?php if ( $section_item['content'] ) : ?>
								<div class="layout__body animation animation--fade-in-up animation--delay-4">
									<?php echo $section_item['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>

			<?php endforeach; ?>
		</div>

	</div>

</section>
