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
  $staff_title = get_post_meta( $post->ID, '_staff_title', true );
  /* BLOG PAGE LAYOUT CHOICES
      'single-sidebar-right' => 'Sidebar Right',
      'single-sidebar-left' => 'Sidebar Left',
      'single-full-width' => 'Full Width, No Sidebar',
      'single-narrow-content' => 'No Sidebar, Narrow Content',
  */

  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' || $title_bar === 'bs-featured-image' ) {
    get_template_part( 'template-parts/title-bars/staff-title-bar' );
  }
?>

<div class="main-wrap <?php echo $single_post_layout . ' '; if( $single_post_layout === 'single-full-width' || $single_post_layout === 'single-narrow-content') {?>no-sidebar<?php } ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

    <?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
      <?php if( $staff_title || $terms ): ?>
			<p><span class="staff-title"><i class="far fa-bookmark"></i> <?php echo $staff_title; ?></span></p>
      <?php $terms = get_the_terms( $post->ID , 'staff-cat' );
      if ( $terms ): ?>
        <ul class="staff-category"><li><i class="far fa-building"></i></li><?php foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
      <?php endif; ?>
      <?php endif; ?>
		</header>
		<?php endif; ?>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

      <?php if( has_post_thumbnail() ) { ?><div class="staff-featured-image mb15 alignright"><?php the_post_thumbnail(); ?></div><?php } ?>

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

	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php if( $single_post_layout === 'single-sidebar-right' || $single_post_layout === 'single-sidebar-left') { get_sidebar(); } ?>
</div>
<?php get_footer();
