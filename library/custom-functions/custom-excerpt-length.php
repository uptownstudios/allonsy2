<?php
function bs_custom_excerpt_length( $length ) {
  $bs_excerpt_length = get_theme_mod('blog-excerpt-length');
  if ( $bs_excerpt_length ) {
    return $bs_excerpt_length;
  } else {
    return 45;
  }
}
add_filter( 'excerpt_length', 'bs_custom_excerpt_length', 999 );
