<?php
	$cart_in_alt_nav = get_theme_mod('cart_in_alt_nav');
	$search_position = get_theme_mod('search-position');
	$facebook = get_theme_mod('facebook');
	$twitter = get_theme_mod('twitter');
	$linkedin = get_theme_mod('linkedin');
	$flickr = get_theme_mod('flickr');
	$instagram = get_theme_mod('instagram');
	$youtube = get_theme_mod('youtube');
	$pinterest = get_theme_mod('pinterest');
	$vimeo = get_theme_mod('vimeo');
	$contact = get_theme_mod('contact');
	$rss = get_theme_mod('rss');
	$custom = get_theme_mod('custom');
	$custom_text = get_theme_mod('custom-text');
	$telephone = get_theme_mod('telephone');
	$stripphone = preg_replace('/\D+/', '', $telephone);
?>

			<ul class="social-media-wrapper">
				<?php if( $telephone ): ?><li class="telephone"><a href="tel:+1<?php echo $stripphone; ?>" target="_blank" rel="noopener noreferrer"><?php echo $telephone; ?></a></li><?php endif; ?>

				<?php if( $search_position == 'search-social-menu' ) { ?>
					<li class="inline-social-search-wrapper menu-search-wrapper">
						<button class="search-toggle"><span class="fas fa-search" aria-hidden="true"></span></button>
						<?php get_search_form(); ?>
					</li>
				<?php } ?>

				<?php if( $facebook ): ?><li class="facebook"><a href="<?php echo $facebook; ?>" target="_blank"><span class="fab fa-facebook-f"></span></a></li><?php endif; ?>

				<?php if( $twitter ): ?><li class="twitter"><a href="<?php echo $twitter; ?>" target="_blank"><span class="fab fa-twitter"></span></a></li><?php endif; ?>

				<?php if( $linkedin ): ?><li class="linkedin"><a href="<?php echo $linkedin; ?>" target="_blank"><span class="fab fa-linkedin-in"></span></a></li><?php endif; ?>

				<?php if( $flickr ): ?><li class="flickr"><a href="<?php echo $flickr; ?>" target="_blank"><span class="fab fa-flickr"></span></a></li><?php endif; ?>

				<?php if( $instagram ): ?><li class="instagram"><a href="<?php echo $instagram; ?>" target="_blank"><span class="fab fa-instagram"></span></a></li><?php endif; ?>

				<?php if( $youtube ): ?><li class="youtube"><a href="<?php echo $youtube; ?>" target="_blank"><span class="fab fa-youtube"></span></a></li><?php endif; ?>

				<?php if( $pinterest ): ?><li class="pinterest"><a href="<?php echo $pinterest; ?>" target="_blank"><span class="fab fa-pinterest"></span></a></li><?php endif; ?>

				<?php if( $vimeo ): ?><li class="vimeo"><a href="<?php echo $vimeo; ?>" target="_blank"><span class="fab fa-vimeo-v"></span></a></li><?php endif; ?>

				<?php if( $contact ): ?><li class="contact"><a href="<?php echo $contact; ?>"><span class="far fa-envelope"></span></a></li><?php endif; ?>

				<?php if( $rss ): ?><li class="rss"><a href="<?php echo $rss; ?>" target="_blank"><span class="fas fa-rss"></span></a></li><?php endif; ?>

				<?php if( $custom ): ?><li class="custom-button"><a href="<?php echo $custom; ?>" target="_blank"><?php echo $custom_text; ?></a></li><?php endif; ?>

				<?php if( class_exists( 'WooCommerce' ) && !$cart_in_alt_nav ) { ?>
				<li class="custom-button top-bar-my-cart">
					<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>"><span class="fas fa-shopping-bag"></span> My Cart <span class="cart-contents"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></a>
				</li>
				<?php } ?>
			</ul>
