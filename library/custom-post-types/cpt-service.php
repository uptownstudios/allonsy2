<?php
function my_custom_post_services() {
	$labels = array(
		'name'               => _x( 'Services', 'post type general name' ),
		'singular_name'      => _x( 'Service', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'service' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit Service' ),
		'new_item'           => __( 'New Service' ),
		'all_items'          => __( 'All Services' ),
		'view_item'          => __( 'View Service' ),
		'search_items'       => __( 'Search Services' ),
		'not_found'          => __( 'No Service items found' ),
		'not_found_in_trash' => __( 'No Service items found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Services'
	);
	$args = array(
		'labels'        	     => $labels,
		'description'   	     => 'Holds our Service and Service specific data',
		'capablility_type' 	   => 'post',
		'public'        	     => true,
		'menu_position' 	     => 5,
    'taxonomies'           => array( 'post_tag' ),
		'supports'      	     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'has_archive'   	     => false,
		'exclude_from_search'	 => true,
    'menu_icon'            => 'dashicons-list-view',
		'rewrite'							 => array('slug' => 'service'),
	);
	register_post_type( 'service', $args );
}
add_action( 'init', 'my_custom_post_services' );

// 2a. Category Taxonomy
function service_tax_category() {
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
	register_taxonomy( 'service-cat', 'service', $args );
}
add_action( 'init', 'service_tax_category', 0 );
