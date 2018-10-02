<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	get_header();
	global $wp_query;
	$title_bar = get_theme_mod('internal-title-bar');
	$blog_page_layout = get_theme_mod('blog-page-layout');
	$blog_posts_layout = get_theme_mod('blog-posts-layout');
  /* BLOG PAGE LAYOUT CHOICES
      'single-sidebar-right' => 'Sidebar Right',
      'single-sidebar-left' => 'Sidebar Left',
      'single-full-width' => 'Full Width, No Sidebar',
      'single-narrow-content' => 'No Sidebar, Narrow Content',
  */
	$total_results = $wp_query->found_posts;

	if( $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/title-bars/featured-image' );
  }
  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
    get_template_part( 'template-parts/title-bars/search-title-bar' );
  }

?>

<div class="main-wrap <?php echo $blog_page_layout . ' '; if( $blog_page_layout === 'blog-full-width' || $blog_page_layout === 'blog-narrow-content') {?>no-sidebar<?php } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

<article <?php post_class('main-content') ?> id="search-results">

	<?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?> (<?php echo $total_results; ?>)"</h1>
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

	<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php
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

<?php do_action( 'foundationpress_after_content' ); ?>

<?php if( $blog_posts_layout === 'blog-sidebar-right' || $blog_posts_layout === 'blog-sidebar-left') { get_sidebar(); } ?>
</div>

<?php get_footer();
