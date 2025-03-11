<?php
/**
 * Layout Template - Nothing Found
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'nothing-found',
	'colour_scheme' => 'primary',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="layout__content">

				<?php if ( $args['title'] ) : ?>
				<header class="layout__header animation animation--fade-in-up">
					<h1 class="display-1"><?php echo esc_attr( $args['title'] ); ?></h1>
				</header>
				<?php endif; ?>

				<?php if ( $args['content'] ) : ?>
				<div class="layout__body animation animation--fade-in-up animation--delay-2">
					<?php echo wp_kses( $args['content'], 'post' ); ?>
				</div>
				<?php endif; ?>

				<footer class="layout__footer animation animation--fade-in animation--delay-6">
					<?php wskt_button( $args['button'] ); ?>
				</footer>

			</div>

		</div>
	</div>

</section>
