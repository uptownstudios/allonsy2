<?php
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
		template: '<a class="instagram-image" href="{{link}}" target="_blank" rel="noopener" title="{{caption}}"><img class="instafeed-img" src="{{image}}" /><span class="ig-caption"><span class="far fa-heart"></span> {{likes}} &nbsp;•&nbsp; <span class="far fa-comment"></span> {{comments}}</span></a>',
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
	      prevArrow: '<button type="button" class="slick-prev"><span class="fas fa-chevron-left"></span></a>',
	      nextArrow: '<button type="button" class="slick-next"><span class="fas fa-chevron-right"></span></a>',
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
