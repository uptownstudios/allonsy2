<?php
/*
Template Name: Full Width, No Sidebar
*/
	get_header();
	$title_bar = get_theme_mod('internal-title-bar');
	$breadcrumbs = get_theme_mod('internal-breadcrumbs');
	$bs_site_width = get_theme_mod('bs_site_width'); // options are max-width-twelve-hundred, max-width-fourteen-hundred, and max-width-sixteen-hundred

	if( $title_bar === 'bs-featured-image') {
		get_template_part( 'template-parts/title-bars/featured-image' );
	}
	if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
		get_template_part( 'template-parts/title-bars/title-bar' );
	}
?>

<?php if( $breadcrumbs != '' ) { ?><div class="breadcrumbs-wrapper <?php echo $bs_site_width; ?>"><?php foundationpress_breadcrumb(); ?></div><?php } ?>

<div class="main-wrap full-width <?php echo $bs_site_width; ?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php if( $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' || $title_bar === 'bs-hide-title-bar' ) : ?>

      <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

    <?php endif; ?>
    <?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
    <?php endif; ?>
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
