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
$blog_title = get_theme_mod('blog-page-title');
$disable_sidebar = get_theme_mod('blog-sidebar');

  if( ! $title_bar || $title_bar == 'bs-featured-image') {
    get_template_part( 'template-parts/featured-image' );
  }
  if ( $title_bar == 'bs-title-bar' ) {
    get_template_part( 'template-parts/loop-title-bar' );
  }
?>

<div class="main-wrap <?php if( $disable_sidebar != '') {?>no-sidebar<?php } ?>" role="main">
	<article class="main-content">

	<?php if( $title_bar === 'bs-hide-featured-image' || $title_bar === 'bs-featured-image') : ?>
	<?php if ( has_post_thumbnail() && $title_bar === 'bs-hide-featured-image' ) :
		the_post_thumbnail();
	endif; ?>
	<header>
		<h1 class="entry-title"><?php echo $blog_title; ?></h1>
	</header>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>

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
	<?php if( $disable_sidebar == '') { get_sidebar(); } ?>

</div>

<?php get_footer();
