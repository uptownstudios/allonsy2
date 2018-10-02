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
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';
	$default_image_repeat = get_theme_mod('default-title-bar-repeat');
	if( $default_image === '' ) {
		$default_image = $default_backup;
	}

	// show title bar w/ featured image and title/meta info
	if ( has_post_thumbnail( $post->ID ) && $title_bar === 'bs-title-bar' ) : ?>

	<header class="featured-hero featured-hero-title-bar" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

  <?php endif;

  if ( !has_post_thumbnail( $post->ID ) && $title_bar === 'bs-title-bar' ) : ?>

	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url(<?php echo $default_image; ?>) <?php echo $default_image_repeat; ?> center center; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<?php endif;

	// show title bar w/ featured image and no title, show title in content area
	if ( has_post_thumbnail( $post->ID ) && $title_bar === 'bs-featured-image' ) : ?>

		<header class="featured-hero featured-hero-title-bar" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
		</header>

  <?php endif;

	if ( !has_post_thumbnail( $post->ID ) && $title_bar === 'bs-featured-image' ) : ?>

		<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url(<?php echo $default_image; ?>) <?php echo $default_image_repeat; ?> center center; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>"></header>

	<?php endif;

  // show title bar with default image and no title, title will show in content area
	if ( $title_bar === 'bs-default-image' ) : ?>
		<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') <?php echo $default_image_repeat; ?> center bottom; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
	</header>

	<?php endif;

	// show title bar with default image and show title/meta in title bar
	if ( $title_bar === 'bs-default-bar' ) : ?>
		<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') <?php echo $default_image_repeat; ?> center bottom; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

	<?php endif; ?>
