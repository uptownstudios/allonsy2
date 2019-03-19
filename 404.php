<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header();
 $title_bar = get_theme_mod('internal-title-bar');
 $breadcrumbs = get_theme_mod('internal-breadcrumbs');

  if ( ! $title_bar || $title_bar === 'bs-featured-image' || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
    get_template_part( 'template-parts/title-bars/404-title-bar' );
  }
?>

 <div class="main-wrap full-width no-sidebar" role="main">
	<article <?php post_class('main-content') ?>>

    <?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
      <header>
  			<h1 class="entry-title"><?php _e( 'Error 404: Page Not Found', 'foundationpress' ); ?></h1>
  		</header>
		<?php endif; ?>

		<div class="entry-content">
			<div class="error">
				<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'foundationpress' ); ?></p>
			</div>
      <h3><?php _e( 'Please try the following', 'allonsy' ); ?></h3>
      <ul>
        <li><?php _e( 'Make sure your spelling is correct.', 'allonsy' ); ?></li>
        <li><?php printf( __( 'Return to the <a href="%s">home page</a>', 'allonsy' ), home_url() ); ?></li>
        <li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'allonsy' ); ?></li>
      </ul>
      <p><?php _e( 'Even though you couldn&rsquo;t find what you were looking for, we do have other great stuff to look at. Below is a list of our latest posts: ', 'wp-forge' ); ?></p>

      <div class="row fourohfour-recent-posts grid-x">
        <ul class="small-12 large-4 columns">
        <?php
          $recent_posts = wp_get_recent_posts(array('post_status' => 'publish', 'numberposts' => 3));
          foreach( $recent_posts as $recent ){
            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
          }
        ?>
        </ul>
        <ul class="small-12 large-4 columns">
        <?php
          $recent_posts = wp_get_recent_posts(array('post_status' => 'publish', 'numberposts' => 3, 'offset' => 3));
          foreach( $recent_posts as $recent ){
            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
          }
        ?>
        </ul>
        <ul class="small-12 large-4 columns">
        <?php
          $recent_posts = wp_get_recent_posts(array('post_status' => 'publish', 'numberposts' => 3, 'offset' => 6));
          foreach( $recent_posts as $recent ){
            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
          }
        ?>
        </ul>
      </div>
		</div>
	</article>

</div>

<?php get_footer();
