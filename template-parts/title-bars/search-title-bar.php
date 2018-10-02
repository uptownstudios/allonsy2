<?php
	global $wp_query;
	$title_bar = get_theme_mod('internal-title-bar');
	$default_image = get_theme_mod('default-title-bar-image');
	$default_image_repeat = esc_attr( get_theme_mod('default-title-bar-repeat','no-repeat') );
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';
	$total_results = $wp_query->found_posts;

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
		<h1 class="entry-title"><?php _e( 'Search Results', 'allonsy2' ); ?> (<?php echo $total_results; ?>)</h1>
		<p class="search-query">You searched for: "<em><?php echo get_search_query(); ?></em>"</p>
	</header>

	<?php endif; ?>
