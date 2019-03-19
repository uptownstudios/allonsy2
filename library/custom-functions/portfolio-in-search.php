<?php
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
