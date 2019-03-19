<?php
function my_custom_post_current_portfolio() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'portfolio' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit Portfolio Item' ),
		'new_item'           => __( 'New Portfolio Item' ),
		'all_items'          => __( 'All Portfolio Items' ),
		'view_item'          => __( 'View Portfolio Item' ),
		'search_items'       => __( 'Search Portfolio' ),
		'not_found'          => __( 'No portfolio items found' ),
		'not_found_in_trash' => __( 'No portfolio items found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Portfolio'
	);
	$args = array(
		'labels'        	     => $labels,
		'description'   	     => 'Holds our portfolio and portfolio specific data',
		'capablility_type' 	   => 'post',
		'public'        	     => true,
		'menu_position' 	     => 5,
    'taxonomies'           => array( 'post_tag' ),
		'supports'      	     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'has_archive'   	     => true,
    'menu_icon'            => 'dashicons-schedule',
		'rewrite'							 => array('slug' => 'project'),
	);
	register_post_type( 'bs_portfolio', $args );
}
add_action( 'init', 'my_custom_post_current_portfolio' );

// Category Taxonomy
function portfolio_tax_category() {
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category' ),
		'menu_name'         => __( 'Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'portfolio-cat', 'bs_portfolio', $args );
}
add_action( 'init', 'portfolio_tax_category', 0 );
