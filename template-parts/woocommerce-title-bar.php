<?php

	/*
	'bs-featured-image' => 'Featured Image in Title Bar'
	'bs-title-bar' 			=> 'Featured Image with Meta Info in Title Bar'
	'bs-default-image'	=> 'Default Image in Title Bar'
	'bs-default-bar'		=> 'Default Image with Meta Info in Title Bar'
	*/
	global $post;
	$title_bar = get_theme_mod('internal-title-bar');
	$default_image = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';

?>

	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url(<?php echo $default_image; ?>) no-repeat center center; background-size: cover;">
		<h1 class="entry-title"><i class="fa fa-shopping-cart"></i> Shop Our Store</h1>
	</header>
