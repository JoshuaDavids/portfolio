<?php
/**
 * Template Function - Posts Filtering
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the Posts Filtering HTML.
 *
 * @param array $attrs Posts Filtering attributes.
 */
function wskt_get_posts_filtering( $attrs = array() ) {
	$default_attrs = array(
		'order'       => '',
		'search_term' => '',
		'found_posts' => 0,
	);

	$attrs = wp_parse_args( $attrs, $default_attrs );

	$terms = get_categories(
		array(
			'hide_empty' => 1,
		)
	);

	ob_start();
	?>

	<div class="posts-filtering colour-scheme colour-scheme--light">

		<div class="posts-filtering__header">
			<div class="container-fluid">
				<button class="btn btn-blank collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#posts-filtering-collapse" aria-expanded="false" aria-controls="posts-filtering-collapse">
					<?php esc_attr_e( 'Filters', 'wsk-theme' ); ?>

					<span class="collapse-toggle__icon"></span>
				</button>
			</div>
		</div>

		<div id="posts-filtering-collapse" class="posts-filtering__collapse collapse">
			<div class="container-fluid">
				<div class="posts-filtering__collapse-inner">

					<div class="posts-filtering__item">
						<?php
						printf(
							'<strong class="posts-results-title">%1$s %2$s</strong>',
							$attrs['found_posts'],
							_n( 'Result', 'Results', $attrs['found_posts'], 'wsk-theme' ),
						);
						?>
					</div>

					<?php if ( $terms ) : ?>
					<div class="posts-filtering__item">
						<?php
						wskt_terms_filter(
							array(
								'terms' => $terms,
							)
						);
						?>
					</div>
					<?php endif ?>

					<div class="posts-filtering__item">
					<?php
					wskt_search_filter(
						array(
							'search_term' => $attrs['search_term'],
							'placeholder' => esc_attr__( 'Search', 'wsk-theme' ),
						)
					);
					?>
					</div>

					<div class="posts-filtering__item">
						<?php
						wskt_button(
							array(
								'text'       => esc_attr__( 'Apply', 'wsk-theme' ),
								'attributes' => array(
									'data-wsk-toggle' => 'apply-filters',
								),
								'size'       => 'sm',
							)
						);
						?>
					</div>

					<div class="posts-filtering__item">
						<?php
						wskt_posts_sorting(
							array(
								'order' => $attrs['order'],
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php
	return ob_get_clean();
}

/**
 * Output the Posts Filtering HTML.
 *
 * @param mixed ...$args Posts Filtering arguments, @see wskt_get_posts_filtering() for a description.
 */
function wskt_posts_filtering( ...$args ) {
	echo wskt_get_posts_filtering( ...$args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
