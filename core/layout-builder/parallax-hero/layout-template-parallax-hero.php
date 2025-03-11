<?php
/**
 * Layout Template - Parallax Hero
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'parallax-hero',
	'padding_variant' => 'none',
	'colour_scheme'   => 'dark',
	'classes'         => array( 'layout--full-screen' ),
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<?php wskt_media( $args['background'], array( 'layout__background' ) ); ?>

	<div class="layout__content">
		<?php
		wskts_inline_svg(
			get_template_directory() . '/dist/img/logo-digitronix.svg',
			array(
				'width'  => 148,
				'height' => 20,
				'class'  => 'icon',
			)
		);
		?>
	</div>

</section>
