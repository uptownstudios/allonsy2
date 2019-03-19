<?php
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
