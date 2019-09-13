<?php
	$loading_animation = get_theme_mod('loading-animation');
	$loading_animation_img = get_theme_mod('loading-animation-image');
?>
<div id="preloader">
	<div class="preloader-inner">
		<?php if( $loading_animation_img != '' ) { ?><img src="<?php echo $loading_animation_img; ?>" class="preloader-logo"><?php } ?>
		<div class="animate-loading">
	    <div class="letter-holder">
	      <div class="l-1 letter">L</div>
	      <div class="l-2 letter">o</div>
	      <div class="l-3 letter">a</div>
	      <div class="l-4 letter">d</div>
	      <div class="l-5 letter">i</div>
	      <div class="l-6 letter">n</div>
	      <div class="l-7 letter">g</div>
	      <div class="l-8 letter">.</div>
	      <div class="l-9 letter">.</div>
	      <div class="l-10 letter">.</div>
	    </div>
	  </div>
	</div>
</div>
