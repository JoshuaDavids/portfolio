<?php
/**
 * Layout Template - Media
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $args['media'] ) ) {
	return;
}

$layout_classes_attrs = array(
	'layout_name'   => 'media',
	'colour_scheme' => $args['colour_scheme'],
);

if ( $args['full_width'] ) {
	$layout_classes_attrs['padding_variant'] = 'none';
	$layout_classes_attrs['colour_scheme']   = 'none';
}
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php if ( ! $args['full_width'] ) : ?>
	<div class="container-fluid">
	<?php endif; ?>

		<div class="layout__inner">
			<div class="layout__content">

				<?php if ( $args['title'] ) : ?>
				<header class="layout__header">
					<h1><?php echo esc_attr( $args['title'] ); ?></h1>
				</header>
				<?php endif; ?>

				<div class="animation animation--fade-in">
					<?php wskt_media( $args['media'] ); ?>
				</div>

			</div>
		</div>

	<?php if ( ! $args['full_width'] ) : ?>
	</div>
	<?php endif; ?>

</section>
