<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 $search_position = get_theme_mod('search-position');
 $hide_social = get_theme_mod('hide_header_social');
 $alt_nav = get_theme_mod('show_alt_nav');
 $cart_in_alt_nav = get_theme_mod('cart_in_alt_nav');
?>
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner">
    <nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
      <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
      <?php foundationpress_mobile_nav(); ?>
      <?php if( $alt_nav != '' ): foundationpress_top_bar_alt(); endif; ?>
      <?php if( $hide_social == '' ): get_template_part('template-parts/social-media'); endif; ?>
      <?php if( class_exists( 'WooCommerce' ) && $cart_in_alt_nav ) { ?>
				<div class="custom-button alt-nav-my-cart">
					<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>"><i class="fas fa-shopping-bag"></i> My Cart <span class="cart-contents"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></a>
				</div>
				<?php } ?>
      <?php if( $hide_social == '' ): get_search_form(); endif; ?>
    </nav>

    <div class="off-canvas-content" data-off-canvas-content>
