<?php
	$svg_logo = get_theme_mod('svg_logo');

	if( $svg_logo ) {

		echo '<a class="custom-logo-link" href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '">' . $svg_logo . '</a>';

	} else {

		if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); }

	}

?>
