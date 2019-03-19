<?php
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
	$staff_email = get_post_meta( $post->ID, '_staff_email', true );
	$staff_phone = get_post_meta( $post->ID, '_staff_phone', true );

	wp_nonce_field( basename( __FILE__ ), 'staff_meta_box_nonce' );
	?>
	<p>
			<label>Job Title (optional)</label><br />
			<input type="text" value="<?php echo $staff_title; ?>" name="staff_title" size="40" />
	</p>

	<p>
			<label>Email Address (optional)</label><br />
			<input type="email" value="<?php echo $staff_email; ?>" name="staff_email" size="40" />
	</p>

	<p>
			<label>Phone Number (optional)</label><br />
			<input type="tel" value="<?php echo $staff_phone; ?>" name="staff_phone" size="40" />
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
			delete_post_meta( $post_id, '_staff_title' );
	}
	if ( isset( $_REQUEST['staff_phone'] ) ) {
			update_post_meta( $post_id, '_staff_phone', sanitize_text_field( $_POST['staff_phone'] ) );
	} else {
			delete_post_meta( $post_id, '_staff_phone' );
	}
	if ( isset( $_REQUEST['staff_email'] ) ) {
			update_post_meta( $post_id, '_staff_email', sanitize_text_field( $_POST['staff_email'] ) );
	} else {
			delete_post_meta( $post_id, '_staff_email' );
	}
}
