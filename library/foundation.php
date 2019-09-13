<?php
/**
 * Foundation PHP template
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// Pagination.
if ( ! function_exists( 'foundationpress_pagination' ) ) :
function foundationpress_pagination() {
	global $wp_query;

	$big = 999999999; // This needs to be an unlikely integer

	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5,
		'prev_next' => true,
		'prev_text' => __( '&laquo;', 'allonsy2' ),
		'next_text' => __( '&raquo;', 'allonsy2' ),
		'type' => 'list',
	) );

	// Display the pagination if more than one page is found.
  if ( $paginate_links ) {
    // Match patterns for preg_replace
    $preg_find = [
      '/\s*page-numbers\s*/', // Captures string 'page-numbers' and any whitespace before and after
      "/\s*class=''/", // Captures any empty class attributes
      '/<li><a class="prev" href="(\S+)">/', // '(\S+)' Captures href value for backreference
      '/<li><a class="next" href="(\S+)">/', // '(\S+)' Captures href value for backreference
      "/<li><span aria-current='page' class='current'>(\d+)<\/span><\/li>/", // '(\d+)' Captures page number for backreference
      "/<li><a href='(\S+)'>(\d+)<\/a><\/li>/", // '(\S+)' Captures href value for backreference, (\d+)' Captures page number for backreference
    ];
    // preg_replace replacements
    $preg_replace = [
      '',
      '',
      '<li class="pagination-previous"><a href="$1" aria-label="Previous page">', // '$1' Outputs backreference href value
      '<li class="pagination-next"><a href="$1" aria-label="Next page">', // '$1' Outputs backreference href value
      '<li class="current" aria-current="page"><span class="show-for-sr">You\'re on page </span>$1</li>', // '$1' Outputs backreference page number
      '<li><a href="$1" aria-label="Page $2">$2</a>', // '$1' Ouputs backreference href, '$2' outputs backreference page number
    ];
    // Match patterns for str_replace
    $str_find = [
      "<ul>",
      '<li><span class="dots">&hellip;</span></li>',
    ];
    // str_replace replacements
    $str_replace = [
      '<ul class="pagination text-center">',
      '<li class="ellipsis" aria-hidden="true"></li>',
    ];
    $paginate_links = preg_replace( $preg_find, $preg_replace, $paginate_links );
    $paginate_links = str_replace( $str_find, $str_replace, $paginate_links );
    $paginate_links = '<nav aria-label="Pagination">' . $paginate_links . '</nav>';
		echo $paginate_links;
	}
}
endif;


// Custom Comments Pagination.
if ( ! function_exists( 'foundationpress_get_the_comments_pagination' ) ) :
	function foundationpress_get_the_comments_pagination( $args = array() ) {
		$navigation = '';
		$args = wp_parse_args( $args, array(
			'prev_text'				=> __( '&laquo;', 'foundationpress' ),
			'next_text'				=> __( '&raquo;', 'foundationpress' ),
			'size'					=> 'default',
			'show_disabled'			=> true,
		) );
		$args['type'] = 'array';
		$args['echo'] = false;
		$links = paginate_comments_links( $args );
		if ( $links ) {
			$link_count = count( $links );
			$pagination_class = 'pagination';
			if ( 'large' == $args['size'] ) {
				$pagination_class .= ' pagination-lg';
			} elseif ( 'small' == $args['size'] ) {
				$pagination_class .= ' pagination-sm';
			}
			$current = get_query_var( 'cpage' ) ? intval( get_query_var( 'cpage' ) ) : 1;
			$total = get_comment_pages_count();
			$navigation .= '<ul class="' . $pagination_class . '">';
			if ( $args['show_disabled'] && 1 === $current ) {
				$navigation .= '<li class="page-item disabled">' . $args['prev_text'] . '</li>';
			}
			foreach ( $links as $index => $link ) {
				if ( 0 == $index && 0 === strpos( $link, '<a class="prev' ) ) {
					$navigation .= '<li class="page-item">' . str_replace( 'prev page-numbers', 'page-link', $link ) . '</li>';
				} elseif ( $link_count - 1 == $index && 0 === strpos( $link, '<a class="next' ) ) {
					$navigation .= '<li class="page-item">' . str_replace( 'next page-numbers', 'page-link', $link ) . '</li>';
				} else {
					$link = preg_replace( "/(class|href)='(.*)'/U", '$1="$2"', $link );
					if ( 0 === strpos( $link, '<span class="page-numbers current' ) ) {
						$navigation .= '<li class="page-item active">' . str_replace( array( '<span class="page-numbers current">', '</span>' ), array( '<a class="page-link" href="#">', '</a>' ), $link ) . '</li>';
					} elseif ( 0 === strpos( $link, '<span class="page-numbers dots' ) ) {
						$navigation .= '<li class="page-item disabled">' . str_replace( array( '<span class="page-numbers dots">', '</span>' ), array( '<a class="page-link" href="#">', '</a>' ), $link ) . '</li>';
					} else {
						$navigation .= '<li class="page-item">' . str_replace( 'class="page-numbers', 'class="page-link', $link ) . '</li>';
					}
				}
			}
			if ( $args['show_disabled'] && $current == $total ) {
				$navigation .= '<li class="page-item disabled">' . $args['next_text'] . '</li>';
			}
			$navigation .= '</ul>';
			$navigation = _navigation_markup( $navigation, 'comments-pagination' );
		}
		return $navigation;
	}
endif;
// Custom Comments Pagination.
if ( ! function_exists( 'foundationpress_the_comments_pagination' ) ) :
	function foundationpress_the_comments_pagination( $args = array() ) {
		echo foundationpress_get_the_comments_pagination( $args );
	}
endif;


/**
 * A fallback when no navigation is selected by default.
 */

if ( ! function_exists( 'foundationpress_menu_fallback' ) ) :
function foundationpress_menu_fallback() {
	echo '<div class="alert-box secondary">';
	/* translators: %1$s: link to menus, %2$s: link to customize. */
	printf( __( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'foundationpress' ),
		/* translators: %s: menu url */
		sprintf(  __( '<a href="%s">Menus</a>', 'foundationpress' ),
			get_admin_url( get_current_blog_id(), 'nav-menus.php' )
		),
		/* translators: %s: customize url */
		sprintf(  __( '<a href="%s">Customize</a>', 'foundationpress' ),
			get_admin_url( get_current_blog_id(), 'customize.php' )
		)
	);
	echo '</div>';
}
endif;

// Add Foundation 'is-active' class for the current menu item.
// if ( ! function_exists( 'foundationpress_active_nav_class' ) ) :
// function foundationpress_active_nav_class( $classes, $item ) {
// 	if ( $item->current == 1 || $item->current_item_ancestor == true ) {
// 		$classes[] = 'is-active';
// 	}
// 	return $classes;
// }
// add_filter( 'nav_menu_css_class', 'foundationpress_active_nav_class', 10, 2 );
// endif;

/**
 * Use the is-active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch.
 */
// if ( ! function_exists( 'foundationpress_active_list_pages_class' ) ) :
// function foundationpress_active_list_pages_class( $input ) {
//
// 	$pattern = '/current_page_item/';
// 	$replace = 'current_page_item is-active';
//
// 	$output = preg_replace( $pattern, $replace, $input );
//
// 	return $output;
// }
// add_filter( 'wp_list_pages', 'foundationpress_active_list_pages_class', 10, 2 );
// endif;

/**
 * Enable Foundation responsive embeds for WP video embeds
 */

if ( ! function_exists( 'foundationpress_responsive_video_oembed_html' ) ) :
function foundationpress_responsive_video_oembed_html( $html, $url, $attr, $post_id ) {

	// Whitelist of oEmbed compatible sites that **ONLY** support video.
	// Cannot determine if embed is a video or not from sites that
	// support multiple embed types such as Facebook.
	// Official list can be found here https://codex.wordpress.org/Embeds
	$video_sites = array(
		'youtube', // first for performance
		'collegehumor',
		'dailymotion',
		'funnyordie',
		'ted',
		'videopress',
		'vimeo',
	);

	$is_video = false;

	// Determine if embed is a video
	foreach ( $video_sites as $site ) {
		// Match on `$html` instead of `$url` because of
		// shortened URLs like `youtu.be` will be missed
		if ( strpos( $html, $site ) ) {
			$is_video = true;
			break;
		}
	}

	// Process video embed
	if ( true == $is_video ) {

		// Find the `<iframe>`
		$doc = new DOMDocument();
		$doc->loadHTML( $html );
		$tags = $doc->getElementsByTagName( 'iframe' );

		// Get width and height attributes
		foreach ( $tags as $tag ) {
			$width  = $tag->getAttribute('width');
			$height = $tag->getAttribute('height');
			break; // should only be one
		}

		$class = 'responsive-embed'; // Foundation class

		// Determine if aspect ratio is 16:9 or wider
		if ( is_numeric( $width ) && is_numeric( $height ) && ( $width / $height >= 1.7 ) ) {
			$class .= ' widescreen'; // space needed
		}

		// Wrap oEmbed markup in Foundation responsive embed
		return '<div class="' . $class . '">' . $html . '</div>';

	} else { // not a supported embed
		return $html;
	}

}
add_filter( 'embed_oembed_html', 'foundationpress_responsive_video_oembed_html', 10, 4 );
endif;

/**
 * Get mobile menu ID
 */

if ( ! function_exists( 'foundationpress_mobile_menu_id' ) ) :
function foundationpress_mobile_menu_id() {
	if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) {
		echo 'off-canvas-menu';
	} else {
		echo 'mobile-menu';
	}
}
endif;

/**
 * Get title bar responsive toggle attribute
 */

if ( ! function_exists( 'foundationpress_title_bar_responsive_toggle' ) ) :
function foundationpress_title_bar_responsive_toggle() {
	if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) {
		echo 'data-responsive-toggle="mobile-menu"';
	}
}
endif;
