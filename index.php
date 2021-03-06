<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();
$title_bar = get_theme_mod('internal-title-bar');
$breadcrumbs = get_theme_mod('internal-breadcrumbs');
$blog_title = get_theme_mod('blog-page-title');
$blog_posts_layout = get_theme_mod('blog-posts-layout');
$blog_page_layout = get_theme_mod('blog-page-layout');
$bs_site_width = get_theme_mod('bs_site_width'); // options are max-width-twelve-hundred, max-width-fourteen-hundred, and max-width-sixteen-hundred
/* BLOG PAGE LAYOUT CHOICES
    'blog-sidebar-right' => 'Sidebar Right',
    'blog-sidebar-left' => 'Sidebar Left',
    'blog-full-width' => 'Full Width, No Sidebar',
    'blog-narrow-content' => 'No Sidebar, Narrow Content',
*/

  if( ! $title_bar || $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/title-bars/featured-image' );
  }
  if ( $title_bar === 'bs-title-bar' ) {
    get_template_part( 'template-parts/title-bars/loop-title-bar' );
  }
?>

<?php if( $breadcrumbs != '' ) { ?><div class="breadcrumbs-wrapper <?php echo $bs_site_width; ?>"><?php foundationpress_breadcrumb(); ?></div><?php } ?>

<div class="main-wrap <?php echo $blog_page_layout . ' '; if( $blog_page_layout === 'blog-full-width' || $blog_page_layout === 'blog-narrow-content') { ?>no-sidebar<?php } ?>" role="main">
	<article class="main-content">

	<?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image') : ?>

  	<?php if ( has_post_thumbnail() && $title_bar === 'bs-hide-featured-image' ) :

      the_post_thumbnail();

  	endif; ?>

  	<header>
  		<h1 class="entry-title"><?php echo $blog_title; ?></h1>
  	</header>

	<?php endif; ?>

	<?php if ( have_posts() ) : ?>

    <div class="lazy-isotope-wrapper">
      <section class="bs-blog-loop <?php echo $blog_posts_layout . ' '; if( $blog_posts_layout === 'bs-blog-loop-grid' ) { ?>bs-isotope lazy-isotope grid-3-cols<?php } if( $blog_posts_layout === 'bs-blog-loop-grid-standard' ) { ?>bs-blog-loop-grid grid-3-cols"<?php } ?>">

  		<?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

  		<?php endwhile; ?>

      </section>
    </div>

		<?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

    <?php /* Display navigation to next/previous pages when applicable */

      if ( function_exists( 'foundationpress_pagination' ) ) :
  			foundationpress_pagination();
  		elseif ( is_paged() ) :

    ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>

		<?php endif; ?>

	</article>

	<?php if( $blog_page_layout === 'blog-sidebar-right' || $blog_page_layout === 'blog-sidebar-left') { get_sidebar(); } ?>

</div>

<?php get_footer();
