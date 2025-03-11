<?php
/**
 * Layout Template - Call To Action : Strip
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'call-to-action-strip',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="layout__content">

				<?php if ( $args['content'] ) : ?>
				<div class="layout__body animation animation--fade-in-up">
					<h4><?php echo esc_attr( $args['subtitle'] ); ?></h4>
					<h2><?php echo esc_attr( $args['content'] ); ?></h2>
				</div>
				<?php endif; ?>

				<footer class="layout__footer animation animation--fade-in animation--delay-6">
					<?php wskt_button( $args['button'] ); ?>
				</footer>

			</div>

		</div>
	</div>

</section>
