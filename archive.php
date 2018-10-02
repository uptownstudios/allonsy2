<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	get_header();
	$title_bar = get_theme_mod('internal-title-bar');
	$blog_posts_layout = get_theme_mod('blog-posts-layout');
	$blog_page_layout = get_theme_mod('blog-page-layout');
	/* BLOG PAGE LAYOUT CHOICES
	    'blog-sidebar-right' => 'Sidebar Right',
	    'blog-sidebar-left' => 'Sidebar Left',
	    'blog-full-width' => 'Full Width, No Sidebar',
	    'blog-narrow-content' => 'No Sidebar, Narrow Content',
	*/

	if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' || $title_bar === 'bs-featured-image' ) {
    get_template_part( 'template-parts/title-bars/archive-title-bar' );
  }
?>

<div class="main-wrap <?php echo $blog_page_layout . ' '; if( $blog_page_layout === 'blog-full-width' || $blog_page_layout === 'blog-narrow-content') { ?>no-sidebar<?php } ?>" role="main">
	<article class="main-content">

		<?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>

		<header>
			<h1 class="entry-title"><?php the_archive_title(); ?></h1>
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

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
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
	<?php if( $blog_page_layout === 'blog-sidebar-right' || $blog_page_layout === 'blog-sidebar-left') { get_sidebar(); } ?>

</div>

<?php get_footer();
