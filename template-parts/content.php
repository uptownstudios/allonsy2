<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 $title_bar = get_theme_mod('internal-title-bar');
 $blog_content = get_theme_mod('blog-content-style');
 $blog_posts_layout = get_theme_mod('blog-posts-layout');
 $tag = get_the_tags();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bs-single-post blogpost-entry bs-isotope-item'); ?>>

	<?php if( has_post_thumbnail() ): ?>

		<div class="blog-featured-image featured-image <?php if( $blog_posts_layout === 'bs-blog-loop-list-large' ) { ?>mb15<?php } ?>">
			<?php /* the_post_thumbnail('large'); */ ?>
			<a href="<?php the_permalink(); ?>">
				<img data-src="<?php echo the_post_thumbnail_url('large'); ?>" class="lazyload" />
				<?php /*
				<img data-interchange="[<?php echo the_post_thumbnail_url('medium'); ?>, medium], [<?php echo the_post_thumbnail_url('large'); ?>, large], [<?php echo the_post_thumbnail_url('full'); ?>, xlarge]" />
				*/ ?>
			</a>
		</div>

	<?php endif; ?>

	<div class="entry-content">
		<div class="bs-post-title">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<div class="blog-meta">
			<?php foundationpress_entry_meta(); ?>
		</div>
		<div class="bs-post-excerpt">
			<?php if( $blog_content === 'bs-blog-content' ) {
				the_content( __( 'Continue reading...', 'foundationpress' ) );
			} elseif( $blog_content === 'bs-blog-no-excerpt' ) {
				// hide excerpt
			} else {
				the_excerpt( __( 'Continue reading...', 'foundationpress' ) );
			}?>
		</div>
		<?php if ( $tag ) { ?>
			<div class="bs-post-tags">
				<p><?php the_tags(); ?></p>
			</div>
		<?php }

    if( $blog_content != 'bs-blog-content' ) { ?>
		<div class="blog-footer">
			<a class="blog-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
		</div>
    <?php } ?>
	</div>
	<?php if( $blog_posts_layout === 'bs-blog-loop-list-large' ) { ?><hr /><?php } ?>
</article>
