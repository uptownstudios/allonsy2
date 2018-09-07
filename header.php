<?php
$search_position = get_theme_mod('search-position');
$header_layout = get_theme_mod('header-layout');
$loading_animation = get_theme_mod('loading-animation');
$loading_animation_img = get_theme_mod('loading-animation-image');
$menu_layout = get_theme_mod('wpt_mobile_menu_layout');
global $post;
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scaleable=yes" />
		<?php if( get_theme_mod('highlight_color')): ?>
		<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('highlight_color','default')); ?>">
		<?php endif; ?>
		<script src="https://use.fontawesome.com/7bd6344e68.js"></script>
		<?php wp_head(); ?>
		<?php if( get_theme_mod('analytics')): ?><?php echo get_theme_mod('analytics','default'); ?><?php endif; ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( $loading_animation != '' ) { get_template_part('template-parts/preloader'); } ?>

	<?php if ( has_shortcode( $post->post_content, 'bs_social_share' ) ) : ?>

		<script>window.fbAsyncInit = function() { FB.init({ appId: '317466291976025', xfbml: true, version: 'v2.5' }); };
	  (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;}
	      js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js"; fjs.parentNode.insertBefore(js, fjs); } (document, 'script', 'facebook-jssdk'));
	  		function fb_share() { FB.ui({ method: 'share', href: '<?php the_permalink(); ?>' },
	      function(response) { if (response && !response.error_code) {
	            // window.location = ""
	          } else { } }); }
	  </script>

	  <div id="fb-root"></div>
	  <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>
	  <?php function customFShare() {
	      $like_results = file_get_contents('http://graph.facebook.com/'. get_permalink());
	      $like_array = json_decode($like_results, true);
	      $like_count =  $like_array['shares'];
	      return ($like_count ) ? $like_count : "0";
	  } ?>

	<?php endif; ?>

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( $menu_layout === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<?php
		if( ! $header_layout || $header_layout == 'menu-right') { get_template_part('template-parts/header_option_one'); }
		if( ! $header_layout || $header_layout == 'menu-bottom') { get_template_part('template-parts/header_option_two'); }
		if( ! $header_layout || $header_layout == 'menu-center') { get_template_part('template-parts/header_option_three'); }
		if( ! $header_layout || $header_layout == 'menu-top-bottom') { get_template_part('template-parts/header_option_four'); }
	?>

	<section id="main-container" class="container">
		<?php do_action( 'foundationpress_after_header' );
