<?php
/**
 * Layout Template - Filterable Posts
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'   => $args['layout_name'],
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>" data-post-type="<?php echo esc_attr( $args['post_type'] ); ?>" data-posts-template="<?php echo esc_attr( $args['posts_template'] ); ?>">

	<?php wp_nonce_field( 'filter-posts-nonce', 'filter-posts-security', true ); ?>

	<?php
	wskt_posts_filtering(
		array(
			'order'       => $args['order'],
			'search_term' => $args['search_term'],
			'found_posts' => $args['found_posts'],
		)
	);
	?>

	<div class="layout__body">
		<div class="container-fluid">

			<?php if ( ! empty( $args['posts'] ) ) : ?>

				<?php if ( $args['posts_template'] === 'grid' ) : ?>
					<?php
					wskt_posts_grid(
						$args['posts'],
						$args['post_template']
					);
					?>
				<?php endif; ?>

				<?php if ( $args['posts_template'] === 'list' ) : ?>
					<div class="row">
						<div class="col-lg-9">

						<?php
						wskt_posts_list(
							$args['posts'],
							$args['post_template']
						);
						?>

						</div>
					</div>
				<?php endif; ?>

			<?php else : ?>

			<h1><?php esc_attr_e( 'No results', 'wsk-theme' ); ?>

		<?php endif; ?>

		<?php
		wskt_posts_pagination(
			array(
				'current_page' => $args['current_page'],
				'max_pages'    => $args['max_pages'],
			)
		);
		?>

		</div>
	</div>

</section>
