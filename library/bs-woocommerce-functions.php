<?php

// Edits to WooCommerce breadcrumbs are in /allonsy2/library/navigation.php


// Change stupid WooCommerce pagination arrow to &laquo; and &raquo; instead
add_filter( 'woocommerce_pagination_args', 	'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {
	$args['prev_text'] = '&laquo;';
	$args['next_text'] = '&raquo;';
	return $args;
}


// Change thumbnail size in WC galleries
add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
  return 'thumbnail';
} );


// Add parent category to body class
function woo_custom_taxonomy_in_body_class( $classes ){
  $custom_terms = get_the_terms(0, 'product_cat');
  if ($custom_terms) {
    foreach ($custom_terms as $custom_term) {

      // Check if the parent category exists:
      if( $custom_term->parent > 0 ) {
        // Get the parent product category:
        $parent = get_term( $custom_term->parent, 'product_cat' );
        // Append the parent class:
        if ( ! is_wp_error( $parent ) ) {
          $classes[] = 'wc-term-' . $parent->slug;
				}
      }
      $classes[] = 'wc-term-' . $custom_term->slug;
    }
  }
  return $classes;
}
add_filter( 'body_class', 'woo_custom_taxonomy_in_body_class' );


// Hide shipping rates when free shipping is available
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


// Custom 'no shipping options available' message
function change_msg_no_available_shipping_methods( $default_msg ) {
  $custom_msg = "There are no shipping options available for your area. We apologize for the inconvenince. Please double-check your address for errors.";

  if( empty( $custom_msg ) ) {
    return $default_msg;
  }
  return $custom_msg;
}
add_filter( 'woocommerce_cart_no_shipping_available_html', 'change_msg_no_available_shipping_methods', 10, 1  );
add_filter( 'woocommerce_no_shipping_available_html', 'change_msg_no_available_shipping_methods', 10, 1 );


// Ajaxifies the cart total in the header upon Add To Cart
function woocommerce_cart_link() {
  global $woocommerce;
  ob_start();
  ?>
  <span class="cart-contents"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
  <?php
  $fragments['span.cart-contents'] = ob_get_clean();
  return $fragments;
}
add_filter('add_to_cart_fragments', 'woocommerce_cart_link');


// Remove Uncategorized from WooCommerce Categories
add_filter( 'woocommerce_product_subcategories_args', 'remove_uncategorized_category' );
function remove_uncategorized_category( $args ) {
  $uncategorized = get_option( 'default_product_cat' );
  $args['exclude'] = $uncategorized;
  return $args;
}
add_filter('woocommerce_ship_to_different_address_checked', '__return_true', 999);


// Rename product data tabs
function woo_rename_tabs( $tabs ) {

  // Rename the description tab
	$tabs['description']['title'] = __( 'More Information' );

  // Rename the reviews tab
  $tabs['reviews']['title'] = __( 'Reviews' );

  // Rename the additional information tab
	$tabs['additional_information']['title'] = __( 'Product Attributes' );

	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );


// Move related products into tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

$show_hide_related = get_theme_mod('show_related');
if( $show_hide_related === 'show-related' ):

  function bs_related_product_tab( $tabs ) {
    $custom_tab = array(
    	'custom_tab' =>  array(
        'title' => __('Related Products','woocommerce'),
        'priority' => 50000,
      	'callback' => 'woo_custom_product_tab_content'
      )
    );
    return array_merge( $custom_tab, $tabs );
  }
  function woo_custom_product_tab_content() {
  	woocommerce_related_products();
  }
  add_filter( 'woocommerce_product_tabs', 'bs_related_product_tab' );

endif;


// This snippet removes the action that inserts thumbnails to products in the loop
// and re-adds the function customized with our wrapper in it.
// It applies to all archives with products.
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
  function woocommerce_template_loop_product_thumbnail() {
    echo woocommerce_get_product_thumbnail();
  }
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
  function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
    global $post, $woocommerce;
    $output = '<div class="image-wrapper">';

    if ( has_post_thumbnail() ) {
      $output .= get_the_post_thumbnail( $post->ID, $size );
    }
    $output .= '</div>';
    return $output;
  }
}
