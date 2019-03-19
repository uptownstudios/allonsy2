<?php
add_shortcode( 'ajax_blog_loop', 'bs_ajax_blog_loop' );
function bs_ajax_blog_loop( $atts ) {
  $args = shortcode_atts( array(
		'ppp' => '9', // Posts per page
		'offset' => '', // Skip the first few posts equal to this number
		'cat' => '0',
		'order_by' => 'date',
		'order' => 'DESC',
		// 'show_meta' => '1', // Show or hide ALL meta data (date, author, avatar, categories, & comments)
		// 'show_date' => '1',
		// 'show_author' => '0',
		// 'show_avatar' => '0',
		// 'show_cats' => '1',
		// 'show_comments' => '0',
		'show_readmore' => '1',
		'show_thumbnail' => '1',
		'default_thumbnail' => '', // Input "img src" here. This will show if the post has no featured image
		'thumbnail_size' => 'bs_blog',
		// 'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
		// 'display' => 'list', // Display as a "grid", "carousel", or leave blank (default is a "list")
		'grid_cols' => '3', // Must be an integer! Max 4 columns. This will determine the grid layout, if 'display' is set to 'grid'
  ), $atts, 'bs_ajax_blog_loop' );
  ob_start();

	// if ( get_query_var('paged') ) {
	// 	$paged = get_query_var('paged');
	// } elseif ( get_query_var('page') ) {
	// 	$paged = get_query_var('page');
	// } else {
	//   $paged = 1;
	// }

  $custom_query_args_1 = array(
    'post_type' => 'post',
		'status' => 'published',
		'orderby' => $args['order_by'],
		'order' => $args['order'],
    'posts_per_page' => $args['ppp'],
		'cat' => $args['cat'],
		'offset' => $args['offset'],
  );

	$custom_query_args_2 = array(
		'post_type' => 'post',
		'status' => 'published',
    'posts_per_page' => '1',
		'cat' => $args['cat'],
		'offset' => $args['offset'],
		// 'paged' => $paged,
		// 'page' => $paged,
	);
  global $post;
  $bs_ajax_query1 = new WP_Query( $custom_query_args_1 );
  $bs_ajax_query2 = new WP_Query( $custom_query_args_2 );
  $ppp = $args['ppp'];
	$grid_cols = $args['grid_cols'];
  $image_size = $args['thumbnail_size'];
  $show_thumbnail = $args['show_thumbnail'];
  $default_image = $args['default_thumbnail'];
  $hide_meta = get_theme_mod('hide-blog-meta');
  $hide_date = get_theme_mod('hide-blog-date');
  $hide_cats = get_theme_mod('hide-blog-cats');
  $hide_author = get_theme_mod('hide-blog-author');
  $hide_comments = get_theme_mod('hide-blog-comments');
  $show_avatar = get_theme_mod('show-author-avatar');
  $show_readmore = $args['show_readmore'];
  ?>
	<section class="bs-ajax-blog-loop">

    <div class="bs-ajax-blog-loop-wrapper">

      <div class="bs-ajax-blog-loop-left">

        <?php if ( $bs_ajax_query1->have_posts() ) : ?>

          <ul class="bs-ajax-blog-images <?php if( $grid_cols ) { echo 'grid-' . $grid_cols . '-cols'; } ?>">

          <?php while ( $bs_ajax_query1->have_posts() ) : $bs_ajax_query1->the_post(); ?>

            <li>
              <?php if( has_post_thumbnail() ) { ?>
        				<div class="bs-ajax-post-featured-image">
        					<figure><a class="bs-ajax-post-link" data-id="<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img data-src="<?php echo the_post_thumbnail_url( $image_size ); ?>" class="lazyload" /></a></figure>
        				</div>
        			<?php } ?>
        			<?php if( !has_post_thumbnail() ) { ?>
        				<div class="bs-ajax-post-featured-image default-featured-image">
        					<figure><a class="bs-ajax-post-link" data-id="<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="lazyload" data-src="<?php echo $default_image; ?>" alt="Blog post featured image" /></a></figure>
        				</div>
        			<?php } ?>
            </li>

          <?php endwhile; ?>

          </ul> <!-- /.bs-ajax-blog-images -->
          <script scoped type="text/javascript">
          jQuery(document).ready(function($) {

            $('.bs-ajax-blog-images').on('init', function() {
              window.dispatchEvent(new Event('resize'));
            });

            $(window).on('load', function() {

              $(window).on('resize', function() {
                if( $(window).width() < 800 ) {
                  var thumbHeight = $('.bs-ajax-blog-loop-left .slick-slide.slick-current').height();
                  $('.slick-track, .slick-list').css({'height': thumbHeight});
                  console.log(thumbHeight);
                }
              });


              $('.bs-ajax-blog-images').slick({
                infinite: true,
                slidesToShow: <?php echo $grid_cols; ?>,
                slidesToScroll: 3,
                rows: <?php echo $grid_cols; ?>,
                centerPadding: '20px',
                arrows: true,
                dots: false,
                autoplay: false,
                // adaptiveHeight: true,
                easing: 'ease-out-back',
                pauseOnFocus: true,
                pauseOnHover: true,
                pauseOnDotsHover: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></a>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></a>',
                respondTo: 'window',
                responsive: [{
                  breakpoint: 801,
                  settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    rows: 1,
                    infinite: true,
                    arrows: true,
                    dots: false,
                    autoplay: false,
                    // adaptiveHeight: true,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    rows: 1,
                    infinite: true,
                    arrows: true,
                    dots: false,
                    autoplay: false,
                    // adaptiveHeight: true,
                  }
                }],
              });
            });
          });
          </script>
        <?php endif; wp_reset_postdata(); ?>

      </div> <!-- /.bs-ajax-blog-loop-left -->

      <div class="bs-ajax-blog-loop-right">

        <div class="bs-ajax-swap-area">

          <?php if ( $bs_ajax_query2->have_posts() ) : while ( $bs_ajax_query2->have_posts() ) : $bs_ajax_query2->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('bs-single-post'); ?>>

            <?php if( $show_thumbnail == '1' && has_post_thumbnail() ) { ?>
      				<div class="bs-post-featured-image">
      					<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img data-src="<?php echo the_post_thumbnail_url( 'bs_blog' ); ?>" class="lazyload" /></a></figure>
      				</div>
        		<?php } ?>
        		<?php if( $show_thumbnail == '1' && $default_image != '' && !has_post_thumbnail() ) { ?>
      				<div class="bs-post-featured-image default-featured-image">
      					<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="lazyload" data-src="<?php echo $default_image; ?>" alt="Blog post featured image" /></a></figure>
      				</div>
        		<?php } ?>

        			<div class="entry-content">

      					<div class="bs-post-title">
      						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
      					</div>

      					<?php if( ! $hide_meta ) { ?>
      					<div class="bs-post-meta">
      						<?php if( ! $hide_date ) { ?>
      							<p class="bs-post-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date(); ?></p>
      						<?php } ?>

      						<?php if( ! $hide_author ) { ?>
      							<p class="bs-post-byline">
      								<?php if( $show_avatar ) { ?><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></span> <?php } ?>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a>
                    </p>
      						<?php } ?>

      						<?php if( ! $hide_cats ) { ?>
      							<p class="bs-post-cats"><i class="far fa-sitemap" aria-hidden="true"></i> <?php the_category(','); ?></p>
      						<?php } ?>

      						<?php if( ! $hide_comments ) { ?>
      							<p class="bs-post-comments"><i class="far fa-comments" aria-hidden="true"></i> <a href="<?php comments_link(); ?>" title="Join the discussion"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a></p>
      						<?php } ?>
      					</div>
      					<?php } ?>

      					<div class="bs-post-excerpt">
      						<?php the_excerpt(); ?>
      					</div>

      					<?php if( $show_readmore == '1' ) { ?>
      					<div class="bs-post-footer">
      						<a class="bs-post-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
      					</div>
      					<?php } ?>
      				</div>
        			</article>

          <?php endwhile; endif; wp_reset_postdata(); ?>

        </div> <!-- /.bs-ajax-swap-area -->

      </div> <!-- /.bs-ajax-blog-loop-right -->

    </div> <!-- /.bs-ajax-blog-loop-wrapper -->

  </section>

	<?php $ajaxblogloop = ob_get_clean(); return $ajaxblogloop;
}
