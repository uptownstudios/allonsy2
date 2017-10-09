<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

  get_header();
  $title_bar = get_theme_mod('internal-title-bar');
	$disable_sidebar = get_theme_mod('blog-sidebar');

	if( ! $title_bar || $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/featured-image' );
  }
  if ( $title_bar === 'bs-title-bar' ) {
    get_template_part( 'template-parts/blog-title-bar' );
  }
?>

<div class="main-wrap <?php if( $disable_sidebar != '') {?>no-sidebar<?php } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php if( $title_bar === 'bs-hide-featured-image' || $title_bar === 'bs-featured-image') : ?>
		<?php if ( has_post_thumbnail() && $title_bar === 'bs-hide-featured-image' ) :
			the_post_thumbnail();
		endif; ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php foundationpress_entry_meta(); ?>
		</header>
		<?php endif; ?>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
      <?php if( get_theme_mod('show-post-tags') != '' ) { ?>
			<p class="post-tags"><?php the_tags(); ?></p>
      <?php } ?>
		</div>

		<?php if( get_theme_mod('about-the-author') == '' ) {
		get_template_part( 'template-parts/about-author' );
		} ?>

		<footer>
      <?php the_post_navigation( array(
        'prev_text' => __( '&laquo %title' ),
        'next_text' => __( '%title &raquo;' ),
      ) ); ?>
		</footer>

		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php if( $disable_sidebar == '') { get_sidebar(); } ?>
</div>
<?php get_footer();
