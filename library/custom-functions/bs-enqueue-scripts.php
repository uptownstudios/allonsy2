<?php
function bs_scripts_enqueue() {
	wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/src/assets/js/vendor/isotope.pkgd.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'classie', get_stylesheet_directory_uri() . '/src/assets/js/vendor/classie.js', array( 'jquery' ) );
	// wp_enqueue_script( 'bsimagesloaded', get_stylesheet_directory_uri() . '/src/assets/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'bs_scripts_enqueue' );
