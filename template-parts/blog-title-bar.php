<?php

	$default_image = get_theme_mod('default-title-bar-image');
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';
	if( $default_image === '' ) {
		$default_image = $default_backup;
	}

	if ( has_post_thumbnail( $post->ID ) ) : ?>

	<header class="featured-hero featured-hero-title-bar" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php foundationpress_entry_meta(); ?>
	</header>

	<?php else : ?>

	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php foundationpress_entry_meta(); ?>
	</header>

	<?php endif; ?>
