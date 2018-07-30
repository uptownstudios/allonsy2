<?php

// Edits to WooCommerce breadcrumbs are in /allonsy2/library/navigation.php


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
