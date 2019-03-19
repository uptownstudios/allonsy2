<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 $pre_footer = get_theme_mod('pre-footer-widgets');
 $popup_enabled = get_theme_mod('bs_pop_up_enable');
 $popup_delay = get_theme_mod('bs_pop_up_delay');
 $popup_content = get_theme_mod('bs_pop_up_content');
 $popup_mouseleave = get_theme_mod('bs_pop_up_mouseleave');
 $a11y_toolbar = get_theme_mod('show-a11y-toolbar');
 $shop_products_layout = get_theme_mod('shop-products-layout');
?>

		</section>

		<div id="footer-container">

			<?php if( is_active_sidebar('pre-footer-widgets') && $pre_footer ) : ?>
				<div class="pre-footer-container">
          <div class="pre-footer grid-x">
					  <?php dynamic_sidebar('pre-footer-widgets'); ?>
          </div>
				</div>
			<?php endif; ?>

			<div class="footer-container" data-sticky-footer>
				<footer class="footer grid-x">
					<?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>
				</footer>
			</div>
			<div id="copyright-container">
				<footer id="copyright" class="max-width-twelve-hundred grid-x <?php if( get_theme_mod('social-copyright') != '' ) { ?>has-social<?php } ?>">
					<?php if( get_theme_mod('social-copyright') != '') { ?><div class="small-12 medium-12 large-7 cell"><?php } ?>
					<?php if( get_theme_mod('copyright')): ?>
						<p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('copyright','default'); ?></p>
					<?php else: ?>
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
					<?php endif; ?>
					<?php if( get_theme_mod('social-copyright') != '' ) { ?></div><div class="small-12 medium-12 large-5 cell"><?php echo do_shortcode('[bs_social_urls]');?></div><?php } ?>
				</footer>
			</div>
		</div>

		<?php get_template_part('template-parts/back-top'); ?>

    <?php if( $popup_enabled ):

      get_template_part('template-parts/sitewide-popup');

    endif; ?>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div>
	</div>
</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>

<script type="text/javascript">

  jQuery(document).ready(function($) {
    /**** Greensock Animation Trial ****/
    // declare variables
    var tardis = $('#Layer_1-3'),
        letters = $('.allonsy-letters'),
        tl;

    // create timeline
    tl = new TimelineMax();

    // animate timeline
    tl.set(tardis, {xPixel: 0});
    tl.set(letters, {xPercent: 0});

    // sequence
    tl.staggerFrom(letters, 1, {autoAlpha: 0, xPercent: -50, delay: 1.5, ease:Back.easeOut}, 0.25)
      .from(tardis, 2, {autoAlpha: 0, delay: 1.5}, 0.5);

    /* END Greensock Animation Trial */
  });

  // Animate T.A.R.D.I.S. Waypoint
  jQuery('#trigger-animate-tardis').waypoint(function() {
		jQuery('.tardis-animate').toggleClass('animate');
	}, {
		offset: '50%'
	});

  jQuery('svg.logo-w-tardis').waypoint(function() {
		jQuery('#Layer_1-3').toggleClass('animate');
	}, {
		offset: '50%'
	});

</script>

<?php get_template_part('template-parts/footer-scripts'); ?>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
