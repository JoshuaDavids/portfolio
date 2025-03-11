<?php
/**
 * Layout Template - Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'content',
	'colour_scheme' => $args['colour_scheme'],
);

if ( $args['full_width'] ) {
	$column_class = 'g-col-12';
} else {
	$column_class = 'g-col-12 g-col-lg-10';
}
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="grid">

				<div class="<?php echo esc_attr( $column_class ); ?>">
					<div class="layout__content">

						<?php if ( $args['content'] ) : ?>
						<div class="layout__body animation animation--fade-in">
							<?php echo $args['content']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
						</div>
						<?php endif; ?>

					</div>
				</div>

			</div>

		</div>
	</div>

</section>
