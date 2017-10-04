<?php
/*
Template Name: Front
*/
get_header(); ?>

<div class="main-wrap full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
  <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
  <div class="entry-content max-width-twelve-hundred pl15 pr15">
   <?php the_content(); ?>
   <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
