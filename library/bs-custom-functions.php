<?php

// Allow the upload of SVG graphics to Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Add 'mobile' to body class on mobile device
function my_body_classes($c) {
    wp_is_mobile() ? $c[] = 'mobile' : null;
    return $c;
}
add_filter('body_class','my_body_classes');


// Add not-home to body class
function add_not_home_body_class($classes) {
    if( !is_front_page() ) $classes[] = 'not-home';
    return $classes;
}
add_filter('body_class','add_not_home_body_class');


// Not sure what this is for
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


// Set ACF portfolio thumbnail as featured image
function acf_set_featured_image( $value, $post_id, $field  ){
    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
//$thumb = get_field('bs_portfolio_thumbnail');
add_filter('acf/update_value/name=bs_portfolio_thumbnail', 'acf_set_featured_image', 10, 3);


// Enqueue Scripts
function bs_scripts_enqueue() {
	wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/src/assets/js/vendor/isotope.pkgd.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'classie', get_stylesheet_directory_uri() . '/src/assets/js/vendor/classie.js', array( 'jquery' ) );
	wp_enqueue_script( 'bsimagesloaded', get_stylesheet_directory_uri() . '/src/assets/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'bs_scripts_enqueue' );


// Shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


// Custom pagination
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
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span><span class='pipe-separator'>|</span>";
      echo $paginate_links;
    echo "</nav>";
  }

}


// Add new image size for blog featured image
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'bs_blog', 800, 500, true ); //(cropped)
}
