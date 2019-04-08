<?php
add_shortcode( 'blog_loop', 'bs_blog_loop' );
function bs_blog_loop( $atts ) {
  $args = shortcode_atts( array(
		'ppp' => '10', // Posts per page
		'offset' => '', // Skip the first few posts equal to this number
		'cat' => '0',
		'order_by' => 'date',
		'order' => 'DESC',
		'show_meta' => '1', // Show or hide ALL meta data (date, author, avatar, categories, & comments)
		'show_date' => '1',
		'show_author' => '0',
		'show_avatar' => '0',
		'show_cats' => '1',
		'show_comments' => '0',
		'show_excerpt' => '1',
		'show_readmore' => '1',
		'show_thumbnail' => '1',
		'default_thumbnail' => '', // Input "img src" here. This will show if the post has no featured image
		'thumbnail_size' => 'bs_blog',
		'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
		'display' => 'list', // Display as a "grid", "carousel", or leave blank (default is a "list")
		'grid_cols' => '3', // Must be an integer! Max 4 columns. This will determine the grid layout, if 'display' is set to 'grid'
  ), $atts, 'bs_blog_loop' );
  ob_start();

	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
	  $paged = 1;
	}

	$custom_query_args = array(
		'post_type' => 'post',
		'status' => 'published',
		'orderby' => $args['order_by'],
		'order' => $args['order'],
    'posts_per_page' => $args['ppp'],
		'cat' => $args['cat'],
		'offset' => $args['offset'],
		'paged' => $paged,
		'page' => $paged,
	);
  $bs_query = new WP_Query( $custom_query_args );
	$grid_cols = $args['grid_cols'];
  ?>
	<section class="bs-blog-loop <?php if($args['display'] == 'grid') { echo 'bs-blog-loop-grid'; } elseif($args['display'] === 'carousel') { echo 'bs-blog-loop-carousel'; } else { echo 'bs-blog-loop-list'; } ?> <?php if( $grid_cols ) { echo 'grid-' . $grid_cols . '-cols'; } ?>">
		<?php if ( $bs_query->have_posts() ) : while ( $bs_query->have_posts() ) : $bs_query->the_post(); ?>

		<?php
			global $post;
			$image_size = $args['thumbnail_size'];
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('bs-single-post'); ?>>
			<?php if($args['show_thumbnail'] == '1' && has_post_thumbnail()) { ?>
				<div class="blog-featured-image">
					<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img data-src="<?php echo the_post_thumbnail_url( $image_size ); ?>" class="lazyload" /></a></figure>
				</div>
			<?php } ?>
			<?php if($args['show_thumbnail'] == '1' && $args['default_thumbnail'] != '' && !has_post_thumbnail()) { ?>
				<div class="blog-featured-image default-featured-image">
					<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="lazyload" data-src="<?php echo $args['default_thumbnail']; ?>" alt="Blog post featured image" /></a></figure>
				</div>
			<?php } ?>
				<div class="entry-content">
					<div class="bs-post-title">
						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					</div>

					<?php if($args['show_meta'] == '1') { ?>
					<div class="blog-meta">
						<?php if($args['show_date'] == '1') { ?>
							<p class="bs-post-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date(); ?></p>
						<?php } ?>

						<?php if($args['show_author'] == '1') { ?>
							<p class="bs-post-byline">
								<?php if($args['show_avatar'] == '1') { ?><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></span> <?php } ?>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a>
              </p>
						<?php } ?>

						<?php if($args['show_cats'] == '1') { ?>
							<p class="bs-post-cats">
                <i class="far fa-sitemap" aria-hidden="true"></i> <?php the_category(','); ?>
              </p>
						<?php } ?>

						<?php if($args['show_comments'] == '1') { ?>
							<p class="bs-post-comments">
                <i class="far fa-comments" aria-hidden="true"></i> <a href="<?php comments_link(); ?>" title="Join the discussion"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a>
              </p>
						<?php } ?>
					</div>
					<?php } ?>

					<?php if($args['show_excerpt'] == '1') { ?>
					<div class="bs-post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<?php } ?>

					<?php if($args['show_readmore'] == '1') { ?>
					<div class="blog-footer">
						<a class="blog-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
					</div>
					<?php } ?>
				</div>
			</article>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<?php if ( $args['pagination'] == '1' ) {
			custom_pagination($bs_query->max_num_pages,"",$paged);
		} ?>
	</section>
	<?php if( $args['display'] === 'carousel' ) { ?>
		<script type="text/javascript">
			jQuery('.bs-blog-loop-carousel').slick({
				infinite: true,
				slidesToShow: <?php echo $args['ppp']; ?>,
				slidesToScroll: 1,
				rows: 1,
				centerPadding: '20px',
				arrows: false,
				dots: false,
				autoplay: false,
				easing: 'ease-out-back',
				pauseOnFocus: true,
				pauseOnHover: true,
				pauseOnDotsHover: true,
				prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></a>',
				nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></a>',
				respondTo: 'min',
				responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						arrows: false,
						dots: true,
						autoplay: false,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						infinite: true,
						arrows: false,
						dots: true,
						autoplay: false,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true,
						arrows: false,
						dots: true,
						autoplay: false,
					}
				}],
			});
		</script>
	<?php }
	$myvariable = ob_get_clean(); return $myvariable;
}
