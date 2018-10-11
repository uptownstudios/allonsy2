<?php

/**** TABLE OF CONTENTS ****

1. PORTFOLIO CUSTOM POST TYPE
	1a. Category Taxonomy

2. SERVICE CUSTOM POST TYPE
	2a. Category Taxonomy

3. STAFF CUSTOM POST TYPE
	3a. Category Taxonomy
	3b. Staff Meta Boxes
	3c. Save Staff Meta Info

**** TABLE OF CONTENTS ****/

// 1. PORTFOLIO CUSTOM POST TYPE
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

// 1a. Category Taxonomy
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


// 2. SERVICE CUSTOM POST TYPE
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


// 3. STAFF CUSTOM POST TYPE
function my_custom_post_staff() {
	$labels = array(
		'name'               => _x( 'Staff', 'post type general name' ),
		'singular_name'      => _x( 'Staff', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'service' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit Staff' ),
		'new_item'           => __( 'New Staff' ),
		'all_items'          => __( 'All Staff' ),
		'view_item'          => __( 'View Staff' ),
		'search_items'       => __( 'Search Staff' ),
		'not_found'          => __( 'No Staff members found' ),
		'not_found_in_trash' => __( 'No Staff members found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Staff'
	);
	$args = array(
		'labels'        	     => $labels,
		'description'   	     => 'Holds our Staff and Staff specific data',
		'capablility_type' 	   => 'post',
		'public'        	     => true,
		'menu_position' 	     => 5,
    'taxonomies'           => array( 'post_tag' ),
		'supports'      	     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', ),
		'has_archive'   	     => false,
		'exclude_from_search'	 => true,
    'menu_icon'            => 'dashicons-id-alt',
		'rewrite'							 => array('slug' => 'staff'),
		'register_meta_box_cb' => 'staff_meta_boxes',
	);
	register_post_type( 'staff', $args );
}
add_action( 'init', 'my_custom_post_staff' );

// 3a. Category Taxonomy
function staff_tax_category() {
	$labels = array(
		'name'              => _x( 'Department', 'taxonomy general name' ),
		'singular_name'     => _x( 'Department', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Departments' ),
		'all_items'         => __( 'All Departments' ),
		'parent_item'       => __( 'Parent Department' ),
		'parent_item_colon' => __( 'Parent Department:' ),
		'edit_item'         => __( 'Edit Department' ),
		'update_item'       => __( 'Update Department' ),
		'add_new_item'      => __( 'Add New Department' ),
		'new_item_name'     => __( 'New Department' ),
		'menu_name'         => __( 'Departments' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'staff-cat', 'staff', $args );
}
add_action( 'init', 'staff_tax_category', 0 );


// 3b. Staff Meta Boxes
function staff_meta_boxes() {
	add_meta_box( 'staff_form', __('Staff Details', 'allonsy2'), 'the_staff_form', 'staff', 'normal', 'high' );
}

function the_staff_form( $post ) {
	$post_id = get_the_ID();
	$staff_data = get_post_meta( $post_id, '_staff', true );
	$staff_title = get_post_meta( $post->ID, '_staff_title', true );

	wp_nonce_field( basename( __FILE__ ), 'staff_meta_box_nonce' );
	?>
	<p>
			<label>Staff Member's Title (optional)</label><br />
			<input type="text" value="<?php echo $staff_title; ?>" name="staff_title" size="40" />
	</p>

	<?php
}

// 3c. Save Staff Meta Info
add_action( 'save_post', 'staff_save_post' );
function staff_save_post( $post_id ) {
	// Verify meta box nonce
	if ( !isset( $_POST['staff_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['staff_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	// return if autosaving
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	//
	if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	if ( ! wp_is_post_revision( $post_id ) && 'staff' == get_post_type( $post_id ) ) {
		remove_action( 'save_post', 'staff_save_post' );

		wp_update_post( array(
			'ID' => $post_id,
			//'post_title' => 'sponsor - ' . $post_id
		) );

		add_action( 'save_post', 'staff_save_post' );
	}

	if ( isset( $_REQUEST['staff_title'] ) ) {
			update_post_meta( $post_id, '_staff_title', sanitize_text_field( $_POST['staff_title'] ) );
	} else {
			delete_post_meta( $post_id, '_staff' );
	}
}
