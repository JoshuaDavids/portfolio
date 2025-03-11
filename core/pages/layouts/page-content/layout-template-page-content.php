<?php
/**
 * Layout Template - Page Content
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name' => 'page-content',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">
	<div class="container-fluid">
		<div class="row justify-content-between">

			<div class="col-lg-3 order-1 order-lg-0">
				<?php
				wskt_sidebar(
					array(
						'header' => apply_filters( 'wskt_page_sidebar_header', '' ),
						'body'   => apply_filters( 'wskt_page_sidebar_body', '' ),
						'footer' => apply_filters( 'wskt_page_sidebar_footer', '' ),
					)
				);
				?>
			</div>

			<div class="col-lg-8 order-0 order-lg-1">

				<?php if ( ! empty( $args['title'] ) ) : ?>
				<div class="layout__header">
					<h1 class="layout__title display-1"><?php echo $args['title']; ?></h1>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $args['content'] ) ) : ?>
				<div class="layout__body">
					<?php echo apply_filters( 'the_content', $args['content'] ); ?>
				</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
</section>
