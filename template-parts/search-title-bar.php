<?php
	global $wp_query;
	$title_bar = get_theme_mod('internal-title-bar');
	$default_image = get_theme_mod('default-title-bar-image');
	$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';
	$total_results = $wp_query->found_posts;
?>

	<header class="featured-hero featured-hero-title-bar" role="banner" style="background: url('<?php echo $default_image; ?>') no-repeat center bottom; background-size: cover;">
		<h1 class="entry-title"><?php _e( 'Search Results', 'allonsy2' ); ?> (<?php echo $total_results; ?>)</h1>
		<p class="search-query">You searched for: "<em><?php echo get_search_query(); ?></em>"</p>
	</header>
