<?php

/**
 * Layout Template - Featured Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $args['posts'] ) ) {
	return;
}

$layout_classes_attrs = array(
	'layout_name'   => $args['layout_name'],
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<header class="layout__header">
				<?php if ( $args['title'] ) : ?>
					<h2 class="layout__title"><?php echo esc_attr( $args['title'] ); ?></h2>
				<?php endif ?>

				<?php if ( $args['cta_button'] ) : ?>
					<?php wskt_button( $args['cta_button'] ); ?>
				<?php endif ?>
			</header>

			<?php wskt_posts_grid( $args['posts'], $args['post_template'] ); ?>

		</div>
	</div>

</section>
