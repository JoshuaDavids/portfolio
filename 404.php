<?php

/**
 * Template for the 404 page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WSK_Theme
 */

get_header();
?>

<main id="main" class="site-main" role="main">

	<?php
	wskt_layout_nothing_found(
		array(
			'title'   => esc_attr__('404', 'wsk-theme'),
			'content' => esc_attr__('Sorry, we couldn\'t find that page.', 'wsk-theme'),
			'button'  => array(
				'type' => 'primary',
				'text' => esc_attr__('Return home', 'wsk-theme'),
				'url'  => get_site_url(),
			),
		)
	);
	?>

</main>

<?php
get_footer();
