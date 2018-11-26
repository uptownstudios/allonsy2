<?php
	$popup_content = get_theme_mod('bs_pop_up_content');
	$popup_position = get_theme_mod('bs_pop_up_position');
	$popup_opacity = get_theme_mod('bs_pop_up_opacity');
?>
<div id="bs-sitewide-popup" class="bs-sitewide-popup <?php echo $popup_position; ?>" style="display: none;">
	<div class="bs-popup-overlay" style="background: rgba(0,0,0,<?php if( $popup_opacity > '99' ) { echo '1'; } else { echo '.' . $popup_opacity; } ?>);"></div>
	<a href="#" class="bs-popup-close" title="Close Modal Window"><i class="far fa-times"></i></a>
	<div class="bs-popup-inner">
		<?php echo apply_filters('the_content', $popup_content); ?>
		<p style="margin-bottom: 0;"><a class="bs-popup-hide-forever" href="#">Never show this again</a></p>
	</div>
</div>
