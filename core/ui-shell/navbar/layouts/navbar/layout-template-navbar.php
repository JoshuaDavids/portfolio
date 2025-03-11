<?php
/**
 * Layout Template - Navbar
 *
 * TODO: Decouple from data and make re-usable.
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;

$default_classes = array(
	'navbar',
	'navbar-expand-xl',
	'navbar-dark',
);

$classes = apply_filters( 'wskt_navbar_classes', $default_classes );
?>

<nav class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

	<div class="container-fluid">

		<?php wskt_navbar_brand(); ?>

		<?php wskt_navbar_toggler(); ?>

		<div id="navbarSupportedContent" class="collapse navbar-collapse">
			<?php wskt_navbar_menu(); ?>
		</div>

	</div>

</nav>
