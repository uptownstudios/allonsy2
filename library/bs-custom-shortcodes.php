<?php

/**** TABLE OF CONTENTS ****/

// 1. Current Year Shortcode
// 2. Customizer Social Media Links Shortcode
// 3. Instagram Feed Shortcode
// 4. BS Social Share shortcode
// 5. Custom Blog Loop Shortcode
// 6. Custom Portfolio Loop Shortcode
// 7. Services Loop Shortcode
// 8. Section Heading Shortcode
// 9. Staff Loop Shortcode

/**** TABLE OF CONTENTS ****/

// 1. Current Year Shortcode
function bs_current_year() {
	$year = date('Y');
	return $year;
}
add_shortcode('year','bs_current_year');


// 2. Customizer Social Media Links Shortcode
add_shortcode( 'bs_social_urls', 'bs_social_urls_shortcode' );
function bs_social_urls_shortcode( $atts ) {
    extract( shortcode_atts( array(
      'align' => '',
      'color' => ''
    ), $atts ) );
    ob_start(); ?>

    <ul class="social-media-wrapper <?php echo $align; ?> <?php echo $color; ?>">
      <?php if( get_theme_mod('twitter')): ?><li class="twitter"><a href="<?php echo get_theme_mod('twitter','default'); ?>" target="_blank" title="Follow us on Twitter"><i class="fab fa-twitter"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('facebook')): ?><li class="facebook"><a href="<?php echo get_theme_mod('facebook','default'); ?>" target="_blank" title="Find us on Facebook"><i class="fab fa-facebook-f"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('linkedin')): ?><li class="linkedin"><a href="<?php echo get_theme_mod('linkedin','default'); ?>" target="_blank" title="Connect with us on LinkedIn"><i class="fab fa-linkedin-in"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('flickr')): ?><li class="flickr"><a href="<?php echo get_theme_mod('flickr','default'); ?>" target="_blank" title="Check us out on Flickr"><i class="fab fa-flickr"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('instagram')): ?><li class="instagram"><a href="<?php echo get_theme_mod('instagram','default'); ?>" target="_blank" title="Follow us on Instagram"><i class="fab fa-instagram"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('youtube')): ?><li class="youtube"><a href="<?php echo get_theme_mod('youtube','default'); ?>" target="_blank" title="Check out our YouTube Channel"><i class="fab fa-youtube"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('pinterest')): ?><li class="pinterest"><a href="<?php echo get_theme_mod('pinterest','default'); ?>" target="_blank" title="Follow us on Pinterest"><i class="fab fa-pinterest"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('vimeo')): ?><li class="vimeo"><a href="<?php echo get_theme_mod('vimeo','default'); ?>" target="_blank" title="Check out our Vimeo Channel"><i class="fab fa-vimeo-v"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('contact')): ?><li class="contact"><a href="<?php echo get_theme_mod('contact','default'); ?>"><i class="far fa-envelope"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('rss')): ?><li class="rss"><a href="<?php echo get_theme_mod('rss','default'); ?>" target="_blank" title="Subscribe to our RSS Feed"><i class="fas fa-rss"></i></a></li><?php endif; ?>
    </ul>

    <?php $bs_social_variable = ob_get_clean();
    return $bs_social_variable;
}


// 3. Instagram Feed Shortcode
add_shortcode( 'bs_ig_feed', 'bs_instagram_feed' );
function bs_instagram_feed( $atts ) {
	$args = shortcode_atts( array(
		'limit' 						=> '6',
		'user_id' 					=> '',
		'access_token' 			=> '',
		'resolution'				=> 'standard_resolution',
		'slides_to_show'		=> '6',
		'slides_to_scroll'	=> '6',
		'arrows'					 	=> 'true',
		'dots'							=> 'true',
		'autoplay'					=> 'false',
		'autoplay_speed'			=> '5000',
	), $atts, 'bs_instagram_feed' );

	ob_start();
	$limit = $args['limit'];
	$user_id = $args['user_id'];
	$access_token = $args['access_token'];
	$resolution = $args['resolution'];
	$slides_to_show = $args['slides_to_show'];
	$slides_to_scroll = $args['slides_to_scroll'];
	$arrows = $args['arrows'];
	$dots = $args['dots'];
	$autoplay = $args['autoplay'];
	$autoplay_speed = $args['autoplay_speed'];
	?>

  <div id="instafeed" class="<?php if( $arrows === 'true' ) { ?>has-arrows<?php } ?>"></div>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/src/assets/js/vendor/instafeed.js"></script>
	<script>
	// Use this for getting new IG accessToken
	// Log in using clients IG account and go to...
	// https://www.instagram.com/oauth/authorize/?client_id=564bc1f5f7054a74be9a94523b16e9cf&redirect_uri=http://uptownstudios.net&response_type=token&scope=public_content

	var userFeed = new Instafeed({
		get: 'user',
		userId: <?php echo "'" . $user_id . "'"; ?>, // Get client's userId
		accessToken: <?php echo "'" . $access_token . "'"; ?>,
		limit: <?php echo $limit; ?>,
		resolution: '<?php echo $resolution; ?>',
		template: '<a class="instagram-image" href="{{link}}" target="_blank" rel="noopener" title="{{caption}}"><img class="instafeed-img" src="{{image}}" /><span class="ig-caption"><i class="far fa-heart"></i> {{likes}} &nbsp;•&nbsp; <i class="far fa-comment"></i> {{comments}}</span></a>',
		after: function() {
	    jQuery('#instafeed').slick({
	      infinite: true,
	      slidesToShow: <?php echo $slides_to_show; ?>,
	      slidesToScroll: <?php echo $slides_to_scroll; ?>,
	      rows: 1,
	      centerPadding: '20px',
	      arrows: <?php echo $arrows; ?>,
				dots: <?php echo $dots; ?>,
	      autoplay: <?php echo $autoplay; ?>,
	      autoplaySpeed: <?php echo $autoplay_speed; ?>,
				pauseOnFocus: true,
				pauseOnHover: true,
				pauseOnDotsHover: true,
	      easing: 'ease-out-back',
	      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></a>',
	      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></a>',
	      responsive: [{
	        breakpoint: 1024,
	        settings: {
	          slidesToShow: 3,
	          slidesToScroll: 3,
	          infinite: true,
						arrows: false,
	          dots: <?php echo $dots; ?>,
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
	          dots: <?php echo $dots; ?>,
	          autoplay: false,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 2,
	          infinite: true,
						arrows: false,
	          dots: <?php echo $dots; ?>,
	          autoplay: false,
	        }
	    	}],
	    });
	  }
	});
	userFeed.run();
	</script>
  <?php
		$bs_ig_feed_variable = ob_get_clean();
    return $bs_ig_feed_variable;
}


// 4. BS Social Share shortcode
add_shortcode( 'bs_social_share', 'bs_social_share_shortcode' );
function bs_social_share_shortcode( $atts ) {
$args = shortcode_atts( array(
	'show_count' => '1',
), $atts, 'bs_social_share_shortcode' );
ob_start();
$show_count = $args['show_count']; ?>
<div class="bs-social-share-container">
	<div class="bs-social-share-inner <?php if( $show_count ) { ?>show-count<?php } ?>">

		<div class="single-social-share social-share-twitter">
			<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
			<a class="twitter-button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%2E&amp;url=<?php the_permalink(); ?>&amp;via=uptownstudios" data-social-action="Twitter : Tweet" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
		</div>

		<div class="single-social-share social-share-facebook">
			<script>window.fbAsyncInit = function() { FB.init({ appId: '317466291976025', xfbml: true, version: 'v2.5' }); };
		  (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;}
		      js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js"; fjs.parentNode.insertBefore(js, fjs); } (document, 'script', 'facebook-jssdk'));
		  		function fb_share() { FB.ui({ method: 'share', href: '<?php the_permalink(); ?>' },
		      function(response) { if (response && !response.error_code) {
		            // window.location = ""
		          } else { } }); }
		  </script>

		  <div id="fb-root"></div>
		  <script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));</script>
			<?php function customFShare() {
		      $like_results = file_get_contents('http://graph.facebook.com/'. get_permalink());
		      $like_array = json_decode($like_results, true);
		      $like_count =  $like_array['shares'];
		      return ($like_count) ? $like_count : "0";
		  } ?>
			<a href="javascript:void(0)" class="btn" onClick="fb_share()" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a><?php if( $show_count ) { ?><span><?php echo customFShare(); ?></span><?php } ?>
		</div>

		<div class="single-social-share social-share-google">
			<script src="https://apis.google.com/js/platform.js" async defer></script>
			<?php
				$google_plusones = function ( $url ) {
					$curl = curl_init();
					curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
					curl_setopt( $curl, CURLOPT_POST, 1 );
					curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
					curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
					curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
					$curl_results = curl_exec( $curl );
					curl_close( $curl );
					$json = json_decode( $curl_results, true );

			return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
			};
			$url = get_permalink();
			?>
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" data-link="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Share on Google+"><i class="fab fa-google-plus-g"></i></a><?php if( $show_count ) { ?><span><?php echo $google_plusones ("$url"); ?></span><?php } ?>
		</div>

		<div class="single-social-share social-share-linkedin">
			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
			<?php $linkedin_shares = function ( $url ) {
				$li_json_string = file_get_contents( "https://www.linkedin.com/countserv/count/share?format=json&url=" . $url );
				$li_json = json_decode($li_json_string, true);
				return isset($li_json['count'])?intval($li_json['count']):0;
			}; ?>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title();?>&source=uptownstudios.net" target="_blank" title="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a><?php if( $show_count ) { ?><span><?php $url = get_permalink(); echo $linkedin_shares ("$url"); ?></span><?php } ?>
		</div>

		<div class="single-social-share social-share-pinterest">
			<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
			<?php $pinterest_pins = function ( $url ) {
				$api = file_get_contents( 'https://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );
				$body = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
				$count = json_decode( $body );
				return $count->count;
			}; ?>
			<a href="https://www.pinterest.com/pin/create/button/" data-pin-count="true" data-pin-custom="true" title="Share on Pinterest"><i class="fab fa-pinterest-p"></i></a><?php if( $show_count ) { ?><span><?php $url = get_permalink(); echo $pinterest_pins ("$url"); ?></span><?php } ?>
		</div>

	</div>
</div>
<?php $bs_social_variable = ob_get_clean();
return $bs_social_variable;
}


// 5. Custom Blog Loop Shortcode
add_shortcode( 'blog_loop', 'bs_blog_loop' );
function bs_blog_loop( $atts ) {
  $args = shortcode_atts( array(
		'ppp' => '10', // Posts per page
		'offset' => '0', // Skip the first few posts equal to this number
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
								<?php if($args['show_avatar'] == '1') { ?><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></span> <?php } ?>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a></p>
						<?php } ?>

						<?php if($args['show_cats'] == '1') { ?>
							<p class="bs-post-cats"><i class="far fa-sitemap" aria-hidden="true"></i> <?php the_category(','); ?></p>
						<?php } ?>

						<?php if($args['show_comments'] == '1') { ?>
							<p class="bs-post-comments"><i class="far fa-comments" aria-hidden="true"></i> <a href="<?php comments_link(); ?>" title="Join the discussion"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a></p>
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


// 6. Custom Portfolio Loop Shortcode
add_shortcode( 'portfolio_loop', 'bs_portfolio_loop' );
function bs_portfolio_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'grid', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'hide_filters' => '0', // Show/hide filters
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '0', // Show/hide the excerpt
			'id' => '', // Unique identifier for the shortcode (useful if there are two on the same page)
    ), $atts, 'bs_portfolio_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$hide_filters = $args['hide_filters'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];
		$unique_id = $args['id'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		if( $cat ) {
			$custom_query_args = array(
				'post_type' => 'bs_portfolio',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'bs_portfolio',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 portfolio-display-grid grid-cols-<?php echo $grid_cols; ?> portfolio-page-thumbs-wrapper" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 portfolio-display-list portfolio-page-thumbs-wrapper" role="main">

			<?php endif;

				$taxonomy = 'portfolio-cat';
				$tax_terms = get_terms($taxonomy);
				$all_terms;
				$filterText = '';
				$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';

			if( $hide_filters === '0' ) { ?>
				<div class="portfolio-filter-toggle"><a href="#" title="View All Portfolio Categories">+ Portfolio Categories</a></div>
				<ul id="filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?>" class="filter-portfolio-category option-set filter">
					<!-- <li class="filter-label">Filter portfolio:</li> -->
					<?php
						foreach ($tax_terms as $tax_term) {
							$filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a></li>';
							// $filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a><span class="term-num">' . $tax_term->count . '</span></li>';
							// $all_terms += $tax_term->count;
						}
						$filterText = '<li><a class="active" href="#" data-filter="*">All</a></li>' . $filterText;
						echo $filterText;
					?>
				</ul>
			<?php } ?>
			<?php /* Start loop */ ?>
			<div class="lazy-isotope-wrapper">
				<div class="portfolio-container <?php if( $unique_id ) { echo 'portfolio-container-' . $unique_id; } ?> bs-isotope lazy-isotope ">
					<?php
						while ( $bs_query->have_posts()) : $bs_query->the_post();
						$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

						if( $display === 'grid' ):
					?>
						<div id="post-<?php the_ID(); ?>" class="single-portfolio-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<a href="<?php the_permalink();?>" class="single-portfolio-link" title="<?php the_title();?>">
								<section class="portfolio-content">
									<h4 class="portfolio-title"><?php the_title(); ?></h4>
									<ul class="portfolio-category"><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
									<img data-src="<?php echo $image_url; ?>" class="lazyload portfolio-thumbnail" alt="<?php the_title();?> portfolio thumbnail" />
								</section>
							</a>
						</div>
					<?php endif;
					if( $display === 'list' ): ?>
						<div id="post-<?php the_ID(); ?>" class="single-portfolio-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<div class="portfolio-thumbnail">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<img data-src="<?php echo $image_url; ?>" class="lazyload portfolio-thumbnail" alt="<?php the_title();?> portfolio thumbnail" />
								</a>
							</div>
							<div class="portfolio-content">
								<h3 class="portfolio-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
								<ul class="portfolio-category"><li><i class="far fa-sitemap"></i></li><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php if( $show_excerpt ): ?>
									<div class="portfolio-excerpt"><?php the_excerpt(); ?></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; endwhile; // End the loop ?>
					<script>
						jQuery(document).ready(function($) {
							// cache container
							var $container = $('.portfolio-container<?php if( $unique_id ) { echo '-' . $unique_id; } ?>');
							// filter items when filter link is clicked
							$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a').click(function(){
								var selector = $(this).attr('data-filter');
								$container.isotope({ filter: selector });
								$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a.active').not(this).removeClass('active');
								$(this).addClass('active');
								return false;
							});
						});
					</script>
				</div>
			</div>
			<?php if ( $pagination ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			} ?>
		</div>
		<?php	endif; wp_reset_postdata(); $myvariable = ob_get_clean(); return $myvariable; ?>
	<?php
}


// 7. Services Loop Shortcode
add_shortcode( 'services_loop', 'bs_services_loop' );
function bs_services_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'list', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '1', // Show/hide the excerpt
    ), $atts, 'bs_services_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		if( $cat ) {
			$custom_query_args = array(
				'post_type' => 'service',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'service-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'service',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 services-wrapper services-display-grid grid-cols-<?php echo $grid_cols; ?>" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 services-wrapper services-display-list" role="main">

			<?php endif; ?>
			<?php /* Start loop */ ?>
			<div class="services-container">
				<?php
					while ( $bs_query->have_posts()) : $bs_query->the_post();
					$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

					if( $display === 'grid' ):
				?>
					<div id="post-<?php the_ID(); ?>" class="single-service-item">
						<a href="<?php the_permalink();?>" class="single-service-link" title="<?php the_title();?>">
							<section class="service-content">
								<h4 class="service-title"><?php the_title(); ?></h4>
								<ul class="service-category"><?php $terms = get_the_terms( $post->ID , 'service-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php if( has_post_thumbnail() ): ?><img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="service-thumbnail" alt="<?php the_title();?> service thumbnail" /><?php endif; ?>
							</section>
						</a>
					</div>
				<?php endif;
				if( $display === 'list' ): ?>
					<div id="post-<?php the_ID(); ?>" class="single-service-item">
						<div class="service-thumbnail">
							<?php if( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="service-thumbnail" alt="<?php the_title();?> service thumbnail" />
								</a>
							<?php endif; ?>
						</div>
						<div class="service-content">
							<h3 class="service-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
							<ul class="service-category"><li><i class="far fa-sitemap"></i></li><?php $terms = get_the_terms( $post->ID , 'service-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
							<?php if( $show_excerpt ): ?>
								<div class="service-excerpt"><?php the_excerpt(); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; endwhile; // End the loop ?>
			</div>
			<?php if ( $pagination ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			} ?>
		</div>
		<?php	endif; wp_reset_postdata(); $myvariable = ob_get_clean(); return $myvariable; ?>
	<?php
}

// 8. Section Heading Shortcode
add_shortcode( 'section_heading', 'bs_section_heading' );
function bs_section_heading( $atts ) {
	$args = shortcode_atts( array(
		'title' => '',
		'html_tag' => 'h2',
		'align' => 'none',
		'icon' => '',
		'color' => '#003a71',
	), $atts, 'bs_section_heading' );
  ob_start();

	$section_title = $args['title'];
	$section_html_tag = $args['html_tag'];
	$section_heading_align = $args['align'];
	$section_icon = $args['icon'];
	$section_title_color = $args['color'];
	?>

	<<?php echo $section_html_tag; ?> class="section-heading align<?php echo $section_heading_align; ?>"><span class="section-heading-inner" style="color: <?php echo $section_title_color;?>;"><?php if( $section_icon ) { ?><i class="<?php echo $section_icon; ?>"></i> <?php } ?><?php echo $section_title; ?></span></<?php echo $section_html_tag; ?>>

  <?php $bssectionheading = ob_get_clean(); return $bssectionheading;
}


// 9. Staff Loop Shortcode
add_shortcode( 'staff_loop', 'bs_staff_loop' );
function bs_staff_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'list', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '1', // Show/hide the excerpt
			'hide_filters' => '0',
			'id' => '',
    ), $atts, 'bs_staff_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];
		$hide_filters = $args['hide_filters'];
		$unique_id = $args['id'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		if( $cat ) {
			$custom_query_args = array(
				'post_type' => 'staff',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'staff-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'staff',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 staffs-wrapper staffs-display-grid grid-cols-<?php echo $grid_cols; ?>" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 staffs-wrapper staffs-display-list" role="main">

			<?php endif;

				$taxonomy = 'staff-cat';
				$tax_terms = get_terms($taxonomy);
				$all_terms;
				$filterText = '';

			if( $hide_filters === '0' ) { ?>
				<div class="staff-filter-toggle"><a href="#" title="View All  Departments">+ Department Categories</a></div>
				<ul id="filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?>" class="filter-staff-category option-set filter">
					<!-- <li class="filter-label">Filter portfolio:</li> -->
					<?php
						foreach ($tax_terms as $tax_term) {
							$filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a></li>';
							// $filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a><span class="term-num">' . $tax_term->count . '</span></li>';
							// $all_terms += $tax_term->count;
						}
						$filterText = '<li><a class="active" href="#" data-filter="*">All</a></li>' . $filterText;
						echo $filterText;
					?>
				</ul>
			<?php } ?>
			<?php /* Start loop */ ?>
			<div class="lazy-isotope-wrapper">
				<div class="staffs-container bs-isotope lazy-isotope">
					<?php
						while ( $bs_query->have_posts()) : $bs_query->the_post();
						$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );
						$staff_position = get_post_meta( $post->ID, '_staff_title', true );
						$staff_email = get_post_meta( $post->ID, '_staff_email', true );
						$staff_phone = get_post_meta( $post->ID, '_staff_phone', true );
						if( $display === 'grid' ):
					?>
						<div id="post-<?php the_ID(); ?>" class="single-staff-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'staff-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<a href="<?php the_permalink();?>" class="single-staff-link" title="<?php the_title();?>">
								<section class="staff-content">
									<h4 class="staff-title"><?php the_title(); ?></h4>
									<?php /*
									<?php $terms = get_the_terms( $post->ID , 'staff-cat' );
									if( $terms ): ?><ul class="staff-category"><?php foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
									*/ ?>
									<?php if( $staff_position ): ?><ul class="staff-category"><?php echo '<li class="staff-position">' . $staff_position . '</li>'; endif; ?></ul>
									<?php /* endif; */
									if( has_post_thumbnail() ): ?><img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="staff-thumbnail" alt="<?php the_title();?> staff thumbnail" /><?php endif; ?>
								</section>
							</a>
						</div>
					<?php endif;
					if( $display === 'list' ): ?>
						<div id="post-<?php the_ID(); ?>" class="single-staff-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'staff-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<div class="staff-thumbnail">
								<?php if( has_post_thumbnail() ): ?>
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
										<img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="staff-thumbnail" alt="<?php the_title();?> staff thumbnail" />
									</a>
								<?php endif; ?>
							</div>
							<div class="staff-content">
								<h3 class="staff-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
								<?php if( $staff_position ): echo '<p class="staff-meta staff-position"><i class="far fa-bookmark"></i> ' . $staff_position . '</p>'; endif; ?>
								<?php if( $staff_email ): echo '<p class="staff-meta staff-email"><i class="far fa-envelope"></i> ' . $staff_email . '</p>'; endif; ?>
								<?php if( $staff_phone ): echo '<p class="staff-meta staff-phone"><i class="far fa-phone"></i> ' . $staff_phone . '</p>'; endif; ?>
								<?php $terms = get_the_terms( $post->ID , 'staff-cat' );
								if ( $terms ): ?>
									<ul class="staff-category"><li><i class="far fa-building"></i></li><?php foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php endif; ?>
								<?php if( $show_excerpt ): ?>
									<div class="staff-excerpt"><?php the_excerpt(); ?></div>
								<?php endif; ?>
								<div class="staff-footer">
									<a class="staff-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
								</div>
							</div>
						</div>
					<?php endif; endwhile; // End the loop ?>
					<script>
						jQuery(document).ready(function($) {
							// cache container
							var $container = $('.staffs-container<?php if( $unique_id ) { echo '-' . $unique_id; } ?>');
							// filter items when filter link is clicked
							$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a').click(function(){
								var selector = $(this).attr('data-filter');
								$container.isotope({ filter: selector });
								$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a.active').not(this).removeClass('active');
								$(this).addClass('active');
								return false;
							});
						});
					</script>
				</div>
			</div>
			<?php if ( $pagination ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			} ?>
		</div>
		<?php	endif; wp_reset_postdata(); $myvariable = ob_get_clean(); return $myvariable; ?>
	<?php
}
