<?php
/*
Template Name: Front
*/
$bs_site_width = get_theme_mod('bs_site_width'); // options are max-width-twelve-hundred, max-width-fourteen-hundred, and max-width-sixteen-hundred
get_header(); ?>

<div class="main-wrap full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
  <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
  <div class="entry-content <?php echo $bs_site_width; ?> pl15 pr15">
   <?php the_content(); ?>
  </div>
</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
