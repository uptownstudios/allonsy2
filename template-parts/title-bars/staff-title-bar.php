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
	$staff_title = get_post_meta( $post->ID, '_staff_title', true );
	$staff_email = get_post_meta( $post->ID, '_staff_email', true );
  $staff_phone = get_post_meta( $post->ID, '_staff_phone', true );

  if ( $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-bar' ) : ?>

	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url(<?php echo $default_image; ?>) <?php echo $default_image_repeat; ?> center center; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if( $staff_title ): ?><span class="staff-meta staff-title"><i class="far fa-bookmark"></i> <?php echo $staff_title; ?></span><?php endif; ?>
		<?php if( $staff_email ): ?><span class="staff-meta staff-email"><i class="far fa-envelope"></i> <?php echo $staff_email; ?></span><?php endif; ?>
		<?php if( $staff_phone ): ?><span class="staff-meta staff-phone"><i class="far fa-phone"></i> <?php echo $staff_phone; ?></span><?php endif; ?>
	</header>

	<?php endif;

	if ( $title_bar === 'bs-featured-image' || $title_bar === 'bs-default-image' ) : ?>

		<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url(<?php echo $default_image; ?>) <?php echo $default_image_repeat; ?> center center; <?php if( $default_image_repeat === 'no-repeat' ) { ?>background-size: cover;<?php } ?>"></header>

	<?php endif; ?>
