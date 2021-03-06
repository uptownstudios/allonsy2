<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 *
 * UPTOWN UPDATE NOTES: I converted col-1 and col-2 into Foundation6 tabs. I also
 * move the Review and Payment section into the tabs instead of them being
 * separate and below the billing and shipping forms.
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<ul id="deeplinked-tabs" class="billing-shipping-tabs tabs" data-deep-link="true" data-update-history="true" data-deep-link-smudge="true" data-deep-link-smudge-delay="500" data-auto-focus data-tabs>
			<li class="tabs-title is-active"><a href="#billing_show">Billing Info</a></li>
			<li class="tabs-title"><a href="#shipping_show">Shipping Info</a></li>
			<li class="tabs-title"><a href="#payment_show">Review &amp; Payment</a></li>
		</ul>
		<div class="billing-shipping-wrapper tabs-content" data-tabs-content="deeplinked-tabs" id="customer_details">
			<div class="billing-details tabs-panel is-active" id="billing_show">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				<p class="tabs-title checkout-cont-btn"><a class="button" href="#shipping_show">Continue</a></p>
			</div>

			<div class="shipping-details tabs-panel" id="shipping_show">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				<p class="tabs-title checkout-cont-btn"><a class="button" href="#payment_show">Continue</a></p>
			</div>

			<div class="payment-details tabs-panel" id="payment_show">

				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

				<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
