<?php
// Custom Excerpt Length
function custom_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Current Year Shortcode
function bs_current_year() {
	$year = date('Y');
	return $year;
}
add_shortcode('year','bs_current_year');


// Allow the upload of SVG graphics to Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Add 'mobile' to body class on mobile device
function my_body_classes($c) {
    wp_is_mobile() ? $c[] = 'mobile' : null;
    return $c;
}
add_filter('body_class','my_body_classes');


// Add not-home to body class
function add_not_home_body_class($classes) {
    if( !is_front_page() ) $classes[] = 'not-home';
    return $classes;
}
add_filter('body_class','add_not_home_body_class');


// Not sure what this is for
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_archive() && (is_category() || is_tag()) && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	    if($post_type)
	      $post_type = $post_type;
	    else
	      $post_type = array('post','portfolio');
        $query->set('post_type',$post_type);
	    return $query;
    }
}


// Set ACF portfolio thumbnail as featured image
function acf_set_featured_image( $value, $post_id, $field  ){
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
//$thumb = get_field('bs_portfolio_thumbnail');
add_filter('acf/update_value/name=bs_portfolio_thumbnail', 'acf_set_featured_image', 10, 3);


// Enqueue Scripts
function bs_scripts_enqueue() {
  wp_enqueue_script( 'classie', get_stylesheet_directory_uri() . '/src/assets/js/vendor/classie.js', array( 'jquery' ) );
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/src/assets/js/vendor/slick.min.js', array( 'jquery' ) );
	//wp_enqueue_script( 'bsimagesloaded', get_stylesheet_directory_uri() . '/src/assets/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/src/assets/js/vendor/isotope.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'swipebox', get_stylesheet_directory_uri() . '/src/assets/js/vendor/jquery.swipebox.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/src/assets/js/vendor/jquery.waypoints.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'bs_scripts_enqueue' );

// Shortcodes in widget
add_filter('widget_text', 'do_shortcode');


// Customizer Social Media Links Shortcode
add_shortcode( 'bs_social_urls', 'bs_social_urls_shortcode' );
function bs_social_urls_shortcode( $atts ) {
    extract( shortcode_atts( array(
      'align' => '',
      'color' => ''
    ), $atts ) );
    ob_start(); ?>

    <ul class="social-media-wrapper <?php echo $align; ?> <?php echo $color; ?>">
      <?php if( get_theme_mod('twitter')): ?><li class="twitter"><a href="<?php echo get_theme_mod('twitter','default'); ?>" target="_blank" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('facebook')): ?><li class="facebook"><a href="<?php echo get_theme_mod('facebook','default'); ?>" target="_blank" title="Find us on Facebook"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('linkedin')): ?><li class="linkedin"><a href="<?php echo get_theme_mod('linkedin','default'); ?>" target="_blank" title="Connect with us on LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('flickr')): ?><li class="flickr"><a href="<?php echo get_theme_mod('flickr','default'); ?>" target="_blank" title="Check us out on Flickr"><i class="fa fa-flickr"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('instagram')): ?><li class="instagram"><a href="<?php echo get_theme_mod('instagram','default'); ?>" target="_blank" title="Follow us on Instagram"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('youtube')): ?><li class="youtube"><a href="<?php echo get_theme_mod('youtube','default'); ?>" target="_blank" title="Check out our YouTube Channel"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('pinterest')): ?><li class="pinterest"><a href="<?php echo get_theme_mod('pinterest','default'); ?>" target="_blank" title="Follow us on Pinterest"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('vimeo')): ?><li class="vimeo"><a href="<?php echo get_theme_mod('vimeo','default'); ?>" target="_blank" title="Check out our Vimeo Channel"><i class="fa fa-vimeo"></i></a></li><?php endif; ?>
			<?php if( get_theme_mod('contact')): ?><li class="contact"><a href="<?php echo get_theme_mod('contact','default'); ?>"><i class="fa fa-envelope-o"></i></a></li><?php endif; ?>
      <?php if( get_theme_mod('rss')): ?><li class="rss"><a href="<?php echo get_theme_mod('rss','default'); ?>" target="_blank" title="Subscribe to our RSS Feed"><i class="fa fa-rss"></i></a></li><?php endif; ?>
    </ul>

    <?php $bs_social_variable = ob_get_clean();
    return $bs_social_variable;
}


// Instagram Feed Shortcode
function bs_instagram_feed( $atts ) {
  extract( shortcode_atts(array(), $atts) );
  ob_start(); ?>

  <div id="instafeed"></div>

  <?php
    wp_enqueue_script( 'instafeed', get_template_directory_uri() . '/src/assets/js/vendor/instafeed.js', array('jquery'), '1.0', true );
    $bs_ig_feed_variable = ob_get_clean();
    return $bs_ig_feed_variable;
}
add_shortcode( 'bs_ig_feed', 'bs_instagram_feed' );


// BS Social Share shortcode
add_shortcode( 'bs_social_share', 'bs_social_share_shortcode' );
function bs_social_share_shortcode( $atts ) {
ob_start(); ?>
<div class="bs-social-share-container">
	<div class="bs-social-share-inner">

		<div class="single-social-share social-share-twitter">
			<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
			<a class="twitter-button" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%2E&amp;url=<?php the_permalink(); ?>&amp;via=uptownstudios" data-social-action="Twitter : Tweet" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
		</div>

		<div class="single-social-share social-share-facebook">
			<a href="javascript:void(0)" class="btn" onClick="fb_share()" title="Share on Facebook"><i class="fa fa-facebook"></i></a><span><?php echo customFShare(); ?></span>
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
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" data-link="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i></a><span><?php echo $google_plusones ("$url"); ?></span>
		</div>

		<div class="single-social-share social-share-linkedin">
			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
			<?php $linkedin_shares = function ( $url ) {
				$li_json_string = file_get_contents( "https://www.linkedin.com/countserv/count/share?format=json&url=" . $url );
				$li_json = json_decode($li_json_string, true);
				return isset($li_json['count'])?intval($li_json['count']):0;
			}; ?>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title();?>&source=uptownstudios.net" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a><span><?php $url = get_permalink(); echo $linkedin_shares ("$url"); ?></span>
		</div>

		<div class="single-social-share social-share-pinterest">
			<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
			<?php $pinterest_pins = function ( $url ) {
				$api = file_get_contents( 'https://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );
				$body = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
				$count = json_decode( $body );
				return $count->count;
			}; ?>
			<a href="https://www.pinterest.com/pin/create/button/" data-pin-count="true" data-pin-custom="true" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a><span><?php $url = get_permalink(); echo $pinterest_pins ("$url"); ?></span>
		</div>

	</div>
</div>
<?php $bs_social_variable = ob_get_clean();
return $bs_social_variable;
}


// Services Shortcode
add_shortcode( 'services_loop', 'bs_services_loop' );
function bs_services_loop( $atts ) {
    $args = shortcode_atts( array(
			'category' => '',
    ), $atts, 'services_loop' );
    ob_start();
    $query = new WP_Query( array(
      'post_type' => 'service',
			'order_by' => 'date',
			'order' => 'ASC',
      'posts_per_page' => -1,
    ) );

    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php
            $image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id,'full', true);
            $post_id = get_the_ID();
						global $post;
        ?>
        <article <?php post_class('service-main-content') ?> id="<?php echo $post->post_name; ?>">
          <section class="entry-content">
            <h3 class="service-title"><?php the_title(); ?></h3>
						<?php if( $image_id ) { ?><img src="<?php echo $image_url[0]; ?>" style="margin: 10px 0; width: 100%; max-width: 100%; height: auto;" alt="Service featured image" /><?php } ?>
						<div class="service-content<?php if( $image_id ) { ?> has-featured-image<?php } ?>">
							<?php the_content(); ?>
						</div>
          </section>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php $myvariable = ob_get_clean(); return $myvariable;
    endif;
}


// Custom pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
  if (empty($pagerange)) { $pagerange = 2; }

  global $paged;
  if (empty($paged)) { $paged = 1; }
  if ($numpages == '') { global $wp_query; $numpages = $wp_query->max_num_pages;
  	if(!$numpages) { $numpages = 1; }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    //'format'          => '/page=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => true,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span><span class='pipe-separator'>|</span>";
      echo $paginate_links;
    echo "</nav>";
  }

}

// Add new image size for blog featured image
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'bs_blog', 800, 500, true ); //(cropped)
}
// Custom Loop Shortcode
add_shortcode( 'blog_loop', 'bs_blog_loop' );
function bs_blog_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '',
			'cat' => '0',
			'order_by' => 'date',
			'order' => 'DESC',
			'show_meta' => '1',
			'show_date' => '1',
			'show_author' => '0',
			'show_avatar' => '0',
			'show_cats' => '1',
			'show_comments' => '0',
			'show_excerpt' => '1',
			'show_readmore' => '1',
			'show_thumbnail' => '1',
			'default_thumbnail' => '',
			'thumbnail_size' => 'bs_blog',
			'pagination' => '0',
    ), $atts, 'bs_blog_loop' );
    ob_start();

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		// $temp_query = $wp_query;
		// $wp_query   = NULL;
		// $wp_query   = $bs_query;

		$custom_query_args = array(
			'post_type' => 'post',
			'status' => 'published',
			'orderby' => $args['order_by'],
			'order' => $args['order'],
      'posts_per_page' => $args['ppp'],
			'cat' => $args['cat'],
			//'offset' => $args['offset'],
			'paged' => $paged,
			'page' => $paged,
		);
    $bs_query = new WP_Query( $custom_query_args );

    ?>
			<section class="bs-blog-loop temp-blog-wrapper">
			<?php if ( $bs_query->have_posts() ) : while ( $bs_query->have_posts() ) : $bs_query->the_post(); ?>

			<?php
				global $post;
				$image_size = $args['thumbnail_size'];
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
				<?php if($args['show_thumbnail'] == '1' && has_post_thumbnail()) { ?>
					<div class="blog-featured-image">
						<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( $image_size ); ?></a></figure>
					</div>
				<?php } ?>
				<?php if($args['show_thumbnail'] == '1' && $args['default_thumbnail'] != '' && !has_post_thumbnail()) { ?>
					<div class="blog-featured-image default-featured-image">
						<figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $args['default_thumbnail']; ?>" alt="Blog post featured image" /></a></figure>
					</div>
				<?php } ?>
					<div class="entry-content">
						<div class="bs-post-title">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						</div>

						<?php if($args['show_meta'] == '1') { ?>
						<div class="blog-meta">
							<?php if($args['show_date'] == '1') { ?>
								<p class="bs-post-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></p>
							<?php } ?>

							<?php if($args['show_author'] == '1') { ?>
								<p class="bs-post-byline">
									<?php if($args['show_avatar'] == '1') { ?><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></span> <?php } else { ?><i class="fa fa-user" aria-hidden="true"></i> <?php } ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a></p>
							<?php } ?>

							<?php if($args['show_cats'] == '1') { ?>
								<p class="bs-post-cats"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(','); ?></p>
							<?php } ?>

							<?php if($args['show_comments'] == '1') { ?>
								<p class="bs-post-comments"><i class="fa fa-comments" aria-hidden="true"></i> <a href="<?php comments_link(); ?>" title="Join the discussion"><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a></p>
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
							<a class="blog-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More...</a>
						</div>
						<?php } ?>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			<?php if ( $args['pagination'] == '1' ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			}

			// $wp_query = NULL;
			// $wp_query = $temp_query;
			$myvariable = ob_get_clean(); return $myvariable; ?>
			</section>
	<?php
}
