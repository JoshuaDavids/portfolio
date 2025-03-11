<?php
/**
 * Layout Template - Call To Action : Button
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$layout_classes_attrs = array(
	'layout_name' => 'call-to-action-button',
);
?>

<section class="<?php wskt_layout_classes( $layout_classes_attrs ); ?>">

	<div class="container-fluid">
		<div class="layout__inner">

			<div class="layout__content">

				<?php wskt_button( $args['button'] ); ?>

			</div>

		</div>
	</div>

</section>
