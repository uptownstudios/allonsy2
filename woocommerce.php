<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	get_header();
	$title_bar = get_theme_mod('internal-title-bar');
	$breadcrumbs = get_theme_mod('internal-breadcrumbs');
	$shop_title = get_theme_mod('shop-title');
	$shop_title_icon = get_theme_mod('shop-title-icon');
	$shop_layout = get_theme_mod('shop-layout');

	if( !is_shop() ) {
		if( $title_bar === 'bs-featured-image') {
	    get_template_part( 'template-parts/title-bars/featured-image' );
	  }
	  if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' ) {
	    get_template_part( 'template-parts/title-bars/woocommerce-title-bar' );
	  }
	} else {
		if ( ! $title_bar || $title_bar === 'bs-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-default-bar' || $title_bar === 'bs-featured-image') {
	    get_template_part( 'template-parts/title-bars/woocommerce-title-bar' );
	  }
	}
?>

<?php if( $breadcrumbs != '' ) { ?>
	<?php if( is_shop() ) { ?><div class="breadcrumbs-wrapper max-width-twelve-hundred shop-layout-<?php echo $shop_layout; ?>"><?php foundationpress_breadcrumb(); ?></div><?php } ?>
	<?php if( !is_shop() ) { ?><div class="breadcrumbs-wrapper max-width-twelve-hundred shop-layout-<?php echo $shop_layout; ?>"><?php woocommerce_breadcrumb(); ?></div><?php } ?>
<?php } ?>

<?php if( $title_bar === 'bs-hide-title-bar' || $title_bar === 'bs-default-image' || $title_bar === 'bs-featured-image' ) : ?>
<header class="woocommerce-shop-title max-width-twelve-hundred shop-layout-<?php echo $shop_layout; ?>">
	<h1 class="entry-title"><?php if( $shop_title_icon != 'no-icon' ) { ?><i class="fas <?php echo $shop_title_icon; ?>"></i> <?php } echo $shop_title; ?></h1>
</header>
<?php endif; ?>

<div class="main-wrap shop-layout-<?php echo $shop_layout; ?>" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php /* while ( woocommerce_content() ) : the_post(); */ ?>
		<article class="main-content woocommerce-index" id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>

			<div class="entry-content">
				<?php if( !is_shop() ) { ?><h2 class="woocommerce-page-title"><?php woocommerce_page_title(); ?></h2><?php } ?>
				<?php woocommerce_content(); ?>
			</div>

		</article>
	<?php /* endwhile; */ ?>

	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php if( $shop_layout === 'sidebar-right' || $shop_layout === 'sidebar-left' ): get_sidebar('woocommerce'); endif; ?>

</div>

<?php get_footer();
