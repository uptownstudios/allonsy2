<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

  get_header();
  $title_bar = get_theme_mod('internal-title-bar');
  $single_post_layout = get_theme_mod('single-post-layout');
  /* BLOG PAGE LAYOUT CHOICES
      'single-sidebar-right' => 'Sidebar Right',
      'single-sidebar-left' => 'Sidebar Left',
      'single-full-width' => 'Full Width, No Sidebar',
      'single-narrow-content' => 'No Sidebar, Narrow Content',
  */

  $share_buttons = get_theme_mod('show-share-buttons');
  $share_buttons_position = get_theme_mod('share-buttons-position');
  $share_buttons_count = get_theme_mod('share-buttons-count');

	if( $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/title-bars/featured-image' );
  }
  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
    get_template_part( 'template-parts/title-bars/service-title-bar' );
  }
?>

<div class="main-wrap <?php echo $single_post_layout . ' '; if( $single_post_layout === 'single-full-width' || $single_post_layout === 'single-narrow-content') {?>no-sidebar<?php } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' || $title_bar === 'bs-hide-title-bar' ) : ?>

      <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php endif; ?>
    <?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<ul class="service-category"><li><span class="far fa-sitemap"></span></li><?php $terms = get_the_terms( $post->ID , 'service-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
		</header>
		<?php endif; ?>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

      <?php if( has_post_thumbnail() ) { ?><div class="service-featured-image mb15 alignright"><?php the_post_thumbnail(); ?></div><?php } ?>

			<?php the_content(); ?>

      <?php if( get_theme_mod('show-post-tags') != '' ) { ?>
			<p class="post-tags"><?php the_tags(); ?></p>
      <?php } ?>
		</div>

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
<?php if( $single_post_layout === 'single-sidebar-right' || $single_post_layout === 'single-sidebar-left') { get_sidebar(); } ?>
</div>
<?php get_footer();
