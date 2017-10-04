<?php

	$default_image = get_theme_mod('default-title-bar-image');
	$default_backup = get_stylesheet_directory_uri() . '/assets/img/title-bar-image.jpg';
	if( $default_image === '' ) {
		$default_image = $default_backup;
	}

?>
<header id="featured-hero" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;"><h1 class="entry-title">404 - Page Not Found</h1></header>
<div id="init-header-change"></div>
