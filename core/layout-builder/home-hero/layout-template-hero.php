<?php
/**
 * Layout Template - Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'hero',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array( 'layout--next-layout-preview' ),
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php wskt_media( $args['background'], array( 'layout__background animation animation--fade-in media--fill media--tint' ) ); ?>

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="layout__content">
				<?php if ( $args['content'] ) : ?>
				<div class="layout__body animation animation--fade-in-up animation--delay-2">
					<h1 class="layout__title"><?php echo esc_attr( $args['content'] ); ?></h1>
				</div>
				<?php endif; ?>

				<footer class="layout__footer animation animation--fade-in-up animation--delay-4">
					<?php wskt_button( $args['button'] ); ?>
				</footer>
			</div>

		</div>
	</div>

</section>
