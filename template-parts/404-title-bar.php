<?php

	/*
	'bs-featured-image' => 'Featured Image in Title Bar'
	'bs-title-bar' 			=> 'Featured Image with Meta Info in Title Bar'
	'bs-default-image'	=> 'Default Image in Title Bar'
	'bs-default-bar'		=> 'Default Image with Meta Info in Title Bar'
	*/
	$title_bar = get_theme_mod('internal-title-bar');
	$default_image = get_theme_mod('default-title-bar-image');
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';

	if( $default_image === '' ) {
		$default_image = $default_backup;
	}

	// show title bar with default image and no title, title will show in content area
	if ( $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;">
	</header>

	<?php endif;

	// show title bar with default image and show title/meta in title bar
	if ( $title_bar === 'bs-default-bar' || $title_bar === 'bs-title-bar' ) : ?>
	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;">
		<h1 class="entry-title"><?php _e( 'Error 404: Page Not Found', 'foundationpress' ); ?></h1>
	</header>

	<?php endif; ?>
