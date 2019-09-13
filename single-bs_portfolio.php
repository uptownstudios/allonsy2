<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

  get_header();
  $title_bar = get_theme_mod('internal-title-bar');
  $share_buttons = get_theme_mod('show-share-buttons');
  $share_buttons_position = get_theme_mod('share-buttons-position');
  $share_buttons_count = get_theme_mod('share-buttons-count');
  $bs_site_width = get_theme_mod('bs_site_width'); // options are max-width-twelve-hundred, max-width-fourteen-hundred, and max-width-sixteen-hundred

	if( $title_bar === 'bs-featured-image') {
    get_template_part( 'template-parts/title-bars/featured-image' );
  }
  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
    get_template_part( 'template-parts/title-bars/portfolio-title-bar' );
  }
?>

<?php if( $share_buttons && $share_buttons_position === 'top' ) { ?>
  <div class="<?php echo $bs_site_width; ?> bs-social-share-outer"><?php echo do_shortcode('[bs_social_share show_count="' . $share_buttons_count . '"]'); ?></div>
<?php } ?>

<div class="main-wrap sidebar-left <?php echo $bs_site_width; ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
      <ul class="portfolio-category"><li><span class="fa fa-list-ul"></span></li><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
		</header>
		<?php endif; ?>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
      <?php if( get_theme_mod('show-post-tags') != '' ) { ?>
			<p class="post-tags"><?php the_tags(); ?></p>
      <?php } ?>
		</div>

		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<aside class="sidebar portfolio-sidebar">
  <?php if( has_post_thumbnail() ) {
    $image_url = get_the_post_thumbnail_url( get_the_id(), 'full' ); ?>
    <a href="<?php echo $image_url; ?>"><?php the_post_thumbnail(); ?></a>
  <?php }

  if( function_exists('get_field') ):
    $images = get_field('portfolio_additional_images');
    $image_size = 'thumbnail';

    if( $images ): ?>
      <ul class="portfolio-additional-images">
        <?php foreach( $images as $image ): ?>
          <li>
            <a href="<?php echo $image['url']; ?>">
              <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif;
  endif; ?>
</aside>
</div>
<?php if( $share_buttons && $share_buttons_position === 'bottom' ) { ?>
  <div class="<?php echo $bs_site_width; ?> bs-social-share-outer"><?php echo do_shortcode('[bs_social_share show_count="' . $share_buttons_count . '"]'); ?></div>
<?php } ?>
<footer class="portfolio-navigation <?php echo $bs_site_width; ?>">
  <?php the_post_navigation( array(
    'prev_text' => __( '&laquo %title' ),
    'next_text' => __( '%title &raquo;' ),
  ) ); ?>
</footer>
<?php get_footer();
