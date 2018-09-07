<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 $pre_footer = get_theme_mod('pre-footer-widgets');

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {

	$footer_columns = get_theme_mod('footer-columns');
	switch($footer_columns) {
		case 'columns-1':
		 	$footer_cols = 'large-12 medium-12 small-12';
			break;
		case 'columns-2':
		 	$footer_cols = 'large-6 medium-6 small-12';
			break;
		case 'columns-3':
		 	$footer_cols = 'large-4 medium-6 small-12';
			break;
		case 'columns-4':
		 	$footer_cols = 'large-3 medium-6 small-12';
			break;
		default;
			$footer_cols = 'large-4 medium-6 small-12';
			break;
	}

	register_sidebar(array(
		'id' => 'sidebar-widgets',
		'name' => __( 'Sidebar widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));

	if( class_exists( 'WooCommerce' ) ) {
		register_sidebar(array(
			'id' => 'woocommerce-widgets',
			'name' => __( 'WooCommerce widgets', 'foundationpress' ),
			'description' => __( 'Drag widgets to this WooCommerce sidebar container.', 'foundationpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h6>',
			'after_title' => '</h6>',
		));
	}

	register_sidebar(array(
		'id' => 'pre-footer-widgets',
		'name' => __( 'Pre Footer widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this pre-footer container. The "Pre-Footer?" checkbox must be checked in the Customizer for these widgets to appear.', 'foundationpress' ),
		'before_widget' => '<section id="%1$s" class="large-12 medium-12 columns widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => __( 'Footer widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
		'before_widget' => '<section id="%1$s" class="' . $footer_cols . ' columns widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
