<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demon_CREW
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- APP ICONS -->

<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('stylesheet_directory'); ?>/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('stylesheet_directory'); ?>/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/icons/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- STYLESHEETS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="mobile-bar">
		<div class="nav-hamburger">
			<span class="hamburger-bar"></span>
			<span class="hamburger-bar"></span>
			<span class="hamburger-bar"></span>
		</div>
	</div>
	<nav class="left-navigation" id="nav">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="Demon CREW Logo" />
		<?php
			wp_nav_menu( array (
				'theme_location' 	=> 'homepage',
				'menu_class'			=> 'text-left'
			) )
		?>
	</nav>

	<div class="main-body">
