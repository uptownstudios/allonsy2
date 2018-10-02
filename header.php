<?php
$search_position = get_theme_mod('search-position');
$header_layout = get_theme_mod('header-layout');
$loading_animation = get_theme_mod('loading-animation');
$loading_animation_img = get_theme_mod('loading-animation-image');
$a11y_toolbar = get_theme_mod('show-a11y-toolbar');
$menu_layout = get_theme_mod('wpt_mobile_menu_layout');
global $post;
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php if( get_theme_mod('highlight_color')): ?>
		<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('highlight_color','default')); ?>">
		<?php endif; ?>
		<!-- <script src="https://use.fontawesome.com/7bd6344e68.js"></script> -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-9ralMzdK1QYsk4yBY680hmsb4/hJ98xK3w0TIaJ3ll4POWpWUYaA2bRjGGujGT8w" crossorigin="anonymous">
		<?php wp_head(); ?>
		<?php if( get_theme_mod('analytics')): ?><?php echo get_theme_mod('analytics','default'); ?><?php endif; ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( $loading_animation ) { get_template_part('template-parts/preloader'); } ?>

	<?php if ( $a11y_toolbar ) { get_template_part('template-parts/a11y'); } ?>

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( $menu_layout === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<?php
		if( ! $header_layout || $header_layout == 'menu-right') { get_template_part('template-parts/header_option_one'); }
		if( ! $header_layout || $header_layout == 'menu-bottom') { get_template_part('template-parts/header_option_two'); }
		if( ! $header_layout || $header_layout == 'menu-center') { get_template_part('template-parts/header_option_three'); }
		if( ! $header_layout || $header_layout == 'menu-top-bottom') { get_template_part('template-parts/header_option_four'); }
	?>

	<section id="main-container" class="container">
		<?php do_action( 'foundationpress_after_header' );
