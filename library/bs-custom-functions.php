<?php

/**** TABLE OF CONTENTS ****/

// 1. Allow the upload of SVG graphics to Media Library
// 2. Add 'mobile' to body class on mobile device
// 3. Add not-home to body class
// 4. Adding portfolio items into search results with posts and pages
// 5. ACF Local Field Groups
// 6. Enqueue Scripts
// 7. Shortcodes in widgets
// 8. Custom pagination
// 9. Add new image sizes
// 10. Custom Excerpt Length

/**** TABLE OF CONTENTS ****/


// 1. Allow the upload of SVG graphics to Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// 2. Add 'mobile' to body class on mobile device
function my_body_classes($c) {
    wp_is_mobile() ? $c[] = 'mobile' : null;
    return $c;
}
add_filter('body_class','my_body_classes');


// 3. Add not-home to body class
function add_not_home_body_class($classes) {
    if( !is_front_page() ) $classes[] = 'not-home';
    return $classes;
}
add_filter('body_class','add_not_home_body_class');


// 4. Adding portfolio items into search results with posts and pages
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_archive() && (is_category() || is_tag()) && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	    if($post_type)
	      $post_type = $post_type;
	    else
	      $post_type = array('post','portfolio');
        $query->set('post_type',$post_type);
	    return $query;
    }
}


// 5. ACF Local Field Groups - Portfolio Options (just a gallery of images, but perhaps more to come)
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b998f4137260',
	'title' => 'Portfolio Options',
	'fields' => array(
		array(
			'key' => 'field_5b998f5e1a4fc',
			'label' => 'Additional Images',
			'name' => 'portfolio_additional_images',
			'type' => 'gallery',
			'instructions' => 'Advanced Custom Fields PRO plugin must be installed and activated',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'insert' => 'append',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'bs_portfolio',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
endif;


// 6. Enqueue Scripts
function bs_scripts_enqueue() {
	wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/src/assets/js/vendor/isotope.pkgd.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'classie', get_stylesheet_directory_uri() . '/src/assets/js/vendor/classie.js', array( 'jquery' ) );
	// wp_enqueue_script( 'bsimagesloaded', get_stylesheet_directory_uri() . '/src/assets/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'bs_scripts_enqueue' );


// 7. Shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


// 8. Custom pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
  if (empty($pagerange)) { $pagerange = 2; }

  global $paged;
  if (empty($paged)) { $paged = 1; }
  if ($numpages == '') { global $wp_query; $numpages = $wp_query->max_num_pages;
  	if(!$numpages) { $numpages = 1; }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    //'format'          => '/page=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => true,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination center-text' role='navigation' aria-label='Paginiation'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span><span class='pipe-separator'>|</span>";
      echo $paginate_links;
    echo "</nav>";
  }

}


// 9. Add new image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'bs_blog', 600, 375, true ); //(cropped)
}


// 10. Custom Excerpt Length
function bs_custom_excerpt_length( $length ) {
  $bs_excerpt_length = get_theme_mod('blog-excerpt-length');
  if ( $bs_excerpt_length ) {
    return $bs_excerpt_length;
  } else {
    return 45;
  }
}
add_filter( 'excerpt_length', 'bs_custom_excerpt_length', 999 );
