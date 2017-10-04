<?php

	$default_image = get_theme_mod('default-title-bar-image');
	$default_backup = get_stylesheet_directory_uri() . '/assets/img/title-bar-image.jpg';
	if( $default_image === '' ) {
		$default_image = $default_backup;
	}
	// If a feature image is set, get the id, so it can be injected as a css background property
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$image = $image[0];
	if ( has_post_thumbnail( $post->ID ) && $image ) { ?>
	<header id="featured-hero" role="banner" style="background: url('<?php echo $image; ?>') no-repeat center bottom; background-size: cover;"><h1 class="entry-title"><?php the_title(); ?></h1></header>
	<div id="init-header-change"></div>
<?php } else { ?>
	<header id="featured-hero" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;"><h1 class="entry-title"><?php the_title(); ?></h1></header>
	<div id="init-header-change"></div>
<?php } ?>
