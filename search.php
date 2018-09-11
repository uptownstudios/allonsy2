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
	$disable_sidebar = get_theme_mod('blog-sidebar');
	$total_results = $wp_query->found_posts;

	if( $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/featured-image' );
  }
  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
    get_template_part( 'template-parts/search-title-bar' );
  }

?>

<div class="main-wrap <?php if( $disable_sidebar != '') {?>no-sidebar<?php } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

<article <?php post_class('main-content') ?> id="search-results">

	<?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?> (<?php echo $total_results; ?>)"</h1>
		</header>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>

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
<?php if( $disable_sidebar == '') { get_sidebar(); } ?>

</div>

<?php get_footer();
