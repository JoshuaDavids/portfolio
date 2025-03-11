<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WSK_Theme
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<?php wskt_head_start(); ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

		<?php wskt_head_end(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wskt_body_start(); ?>

		<div class="site">

			<?php wskt_layout_site_header(); ?>
