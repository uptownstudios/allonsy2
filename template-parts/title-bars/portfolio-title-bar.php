<?php

	/*
	'bs-featured-image' => 'Featured Image in Title Bar'
	'bs-title-bar' 			=> 'Featured Image with Meta Info in Title Bar'
	'bs-default-image'	=> 'Default Image in Title Bar'
	'bs-default-bar'		=> 'Default Image with Meta Info in Title Bar'
	*/
	global $post;
	$title_bar = get_theme_mod('internal-title-bar');
	$default_image = get_theme_mod('default-title-bar-image');
	$default_image_repeat = esc_attr( get_theme_mod('default-title-bar-repeat','no-repeat') );
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';

	if( $default_image === '' ) {
		$default_image = $default_backup;
	}

	// show title bar with default image and no title, title will show in content area
	if ( $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') <?php echo $default_image_repeat; ?> center bottom; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
	</header>

	<?php endif;

	// show title bar with default image and show title/meta in title bar
	if ( $title_bar === 'bs-default-bar' || $title_bar === 'bs-title-bar' ) : ?>
	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') <?php echo $default_image_repeat; ?> center bottom; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<ul class="portfolio-category"><li><i class="far fa-sitemap"></i></li><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
	</header>

	<?php endif; ?>
