<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

  get_header();
  $title_bar = get_theme_mod('internal-title-bar');
  $breadcrumbs = get_theme_mod('internal-breadcrumbs');

  if( ! $title_bar || $title_bar == 'bs-featured-image') {
    get_template_part( 'template-parts/featured-image' );
  }
  if ( $title_bar == 'bs-title-bar' ) {
    get_template_part( 'template-parts/title-bar' );
  }
?>

<?php if( $breadcrumbs != '' ) { ?><div class="breadcrumbs-wrapper max-width-twelve-hundred"><?php foundationpress_breadcrumb(); ?></div><?php } ?>

<div class="main-wrap" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( $title_bar === 'bs-hide-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
    <?php endif; ?>
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php do_action( 'foundationpress_page_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_page_after_comments' ); ?>
	</article>
 <?php endwhile;?>

 <?php do_action( 'foundationpress_after_content' ); ?>
 <?php get_sidebar(); ?>

 </div>

 <?php get_footer();
