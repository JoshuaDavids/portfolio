<?php
/**
 * Layout Template - Scroll Based Video
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'scroll-based-video',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array( 'layout--full-screen' ),
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php if ( ! empty( $args['background']['video'] ) ) : ?>
	<!-- TODO: Use Media Component -->
	<div class="layout__background media media--fill">
		<video class="layout__video" src="<?php echo esc_url( $args['background']['video'] ); ?>" playsinline="true" preload="auto" muted="muted"></video>
	</div>
	<?php endif; ?>

	<div class="layout__content">
		<div class="container-fluid">
			
			<div class="layout__body">
				<div class="layout__view layout__view-1">
					<!-- TODO: Hardcoded text -->
					<h1>Dive into a world of creative discovery.</h1>
				</div>

				<div class="layout__view layout__view-2">
					<!-- TODO: Hardcoded text -->
					<h1>Let inspiration immerse you.</h1>
				</div>
			</div>

		</div>
	</div>

</section>
