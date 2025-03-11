<?php
/**
 * Layout Template - Content / Media Tabs
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name' => 'content-media-tabs',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">

		<div class="layout__content">

			<?php if ( $args['title'] ) : ?>
			<header class="layout__header">
				<h1><?php echo esc_attr( $args['title'] ); ?></h1>
			</header>
			<?php endif; ?>

			<?php if ( $args['intro'] ) : ?>
			<div class="layout__intro">
				<?php echo wp_kses( $args['intro'], 'post' ); ?>
			</div>
			<?php endif; ?>	

		</div>

		<div class="layout__tabs">
			<?php wskt_content_media_tabs( $args['tabs'] ); ?>
		</div>

	</div>

</section>
