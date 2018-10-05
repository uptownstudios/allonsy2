<?php

/* UPTOWN STUDIOS ADDITIONS: I added a "Return to Shop" button on line 34 */

/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 *
 * UPTOWN UPDATE NOTES: I added the 'Return to shop' button beneath the 'Proceed
 * to Checkout' button. I also moved the 'Update Cart' button from
 * /woocommerce/cart/cart.php to this file, and placed above the 'Proceed to
 * Checkout' button.
 *
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

<a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="checkout-button button alt wc-forward">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>

<a class="checkout-button button alt wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
	<?php _e( 'Return to shop', 'woocommerce' ) ?>
</a>
