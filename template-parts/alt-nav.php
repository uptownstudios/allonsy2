<?php
	$cart_in_alt_nav = get_theme_mod('cart_in_alt_nav');
	global $woocommerce;
?>

<div class="alt-nav-wrapper hide-for-small-only">
	<?php foundationpress_top_bar_alt(); ?>
	<?php if( class_exists( 'WooCommerce' ) && $cart_in_alt_nav ) { ?>
	<div class="alt-nav-my-cart">
		<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>"><span class="fas fa-shopping-bag"></span> My Cart <span class="cart-contents"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></a>
	</div>
	<?php } ?>
</div>
