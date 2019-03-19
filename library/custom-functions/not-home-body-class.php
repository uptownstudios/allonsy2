<?php
function add_not_home_body_class($classes) {
    if( !is_front_page() ) $classes[] = 'not-home';
    return $classes;
}
add_filter('body_class','add_not_home_body_class');
