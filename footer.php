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
 $popup_delay = get_theme_mod('bs_pop_up_delay');
 $popup_content = get_theme_mod('bs_pop_up_content');
?>

		</section>

		<div id="footer-container">

			<?php if( is_active_sidebar('pre-footer-widgets') && $pre_footer ) : ?>
				<div class="pre-footer-container">
          <div class="pre-footer">
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

		<div id="back-top">
  		<a href="#" title="Back to top"><i class="fa fa-chevron-up"></i></a>
		</div>

    <div id="bs-sitewide-popup" class="bs-sitewide-popup" style="display: none;">
      <div class="bs-popup-overlay"></div>
      <a href="#" class="bs-popup-close"><i class="far fa-times"></i></a>
      <div class="bs-popup-inner">
        <?php echo apply_filters('the_content', $popup_content); ?>
        <p style="margin-bottom: 0;"><a class="bs-popup-hide-forever" href="#">Never show this again</a></p>
      </div>
    </div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div>
	</div>
</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>

<script type="text/javascript">

	var windowWidth;
	var headerHeight;
	var topScrollOffset;
	var windowWidth = jQuery(window).width();
	var headerHeight = jQuery('#masthead').height();
	if(windowWidth > 640) {
		var topScrollOffset = '112';
	} else {
		var topScrollOffset = '0';
	}

	jQuery(document).ready(function($) {

		$(window).imagesLoaded(function() {

			// Site Preloader
			$('#preloader').addClass('loaded')
			$('#preloader.loaded').delay(250).fadeOut(1000, function() {
				$(this).hide();
			});
		});

    // Set Cookie for a11y buttons to make persistent across page loads
    var $fontsize_cookie = Cookies.get('toggle-fontsize');
    var $contrast_cookie = Cookies.get('toggle-contrast');
		if( $fontsize_cookie == 'true' ) {
			$('html').addClass('a11y-fontsize');
      $('button.a11y-fontsize').addClass('a11y-active');
		}
    if( $contrast_cookie == 'true' ) {
			$('html').addClass('a11y-contrast');
      $('button.a11y-contrast').addClass('a11y-active');
		}

    // Toggle large font size mode
    function setFontsizeCookie() {
      fontsizeCookieVal = $('html').hasClass('a11y-fontsize') ? 'true' : 'false';
      Cookies.set('toggle-fontsize', fontsizeCookieVal, { expires: 7 });
    }
    $('button.a11y-fontsize').click(function() {
      $('html').toggleClass('a11y-fontsize');
      $(this).toggleClass('a11y-active');
      setFontsizeCookie();
    });

    // Toggle high contrast mode
    function setContrastCookie() {
      contrastCookieVal = $('html').hasClass('a11y-contrast') ? 'true' : 'false';
      Cookies.set('toggle-contrast', contrastCookieVal, { expires: 7 });
    }
    $('button.a11y-contrast').click(function() {
      $('html').toggleClass('a11y-contrast');
      $(this).toggleClass('a11y-active');
      setContrastCookie();
    });

    // Popup
    $(window).imagesLoaded(function() {
      $('.bs-sitewide-popup').delay(6000).fadeIn('slow');
    });
    var $popup_cookie = Cookies.get('hide-sitewide-popup');
		if( $popup_cookie == 'true' ) {
      $('.bs-sitewide-popup').remove();
		}
    $('a.bs-popup-hide-forever').click(function() {
      $('.bs-sitewide-popup').fadeOut('fast');
      Cookies.set('hide-sitewide-popup', 'true', { expires: 30 });
      return false;
    });


    // $('.input-number-increment').click(function() {
    //   var $input = $(this).parents('.input-number-group').find('.input-number');
    //   var val = parseInt($input.val(), 10);
    //   $input.val(val + 1);
    // });
    // $('.input-number-decrement').click(function() {
    //   var $input = $(this).parents('.input-number-group').find('.input-number');
    //   var val = parseInt($input.val(), 10);
    //   $input.val(val - 1);
    // })
    function bsAddQuantityBoxes(a) {
      var b, c = !1;
      a || (a = ".qty"),
      b = jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").find(a),
      b.length && (jQuery.each(b, function(a, b) {
        "date" !== jQuery(b).prop("type") && "hidden" !== jQuery(b).prop("type") && (jQuery(b).parent().hasClass("buttons_added") || (jQuery(b).parent().addClass("buttons_added").prepend('<input type="button" value="-" class="input-group-button input-number-decrement minus" />'),
        jQuery(b).addClass("input-text").after('<input type="button" value="+" class="input-group-button input-number-increment plus" />'),
        c = !0))
      }),
      c && (jQuery("input" + a + ":not(.product-quantity input" + a + ")").each(function() {
        var a = parseFloat(jQuery(this).attr("min"));
        a && 0 < a && parseFloat(jQuery(this).val()) < a && jQuery(this).val(a)
      }),
      jQuery(".plus, .minus").unbind("click"),
      jQuery(".plus, .minus").on("click", function() {
        var b = jQuery(this).parent().find(a)
          , c = parseFloat(b.val())
          , d = parseFloat(b.attr("max"))
          , e = parseFloat(b.attr("min"))
          , f = b.attr("step");
        c && "" !== c && "NaN" !== c || (c = 0),
        "" !== d && "NaN" !== d || (d = ""),
        "" !== e && "NaN" !== e || (e = 0),
        "any" !== f && "" !== f && void 0 !== f && "NaN" !== parseFloat(f) || (f = 1),
        jQuery(this).is(".plus") ? d && (d == c || c > d) ? b.val(d) : b.val(c + parseFloat(f)) : e && (e == c || c < e) ? b.val(e) : 0 < c && b.val(c - parseFloat(f)),
        b.trigger("change")
      })))
    }
    jQuery(window).on("load", function() {
      bsAddQuantityBoxes()
    }),
    jQuery(document).ajaxComplete(function() {
      bsAddQuantityBoxes()
    });


    $('li.menu-item-has-children > a').on('focus focusout', function() {
      $(this).parents().toggleClass('is-active');
    });

    // Toggle search box in header
		$('button.search-toggle').click(function() {
			$('nav.top-bar form#searchform').toggleClass('show');
		});
		$(document).click(function(e) {
			var target = $(e.target);
		  if( ! target.is('.menu-search-wrapper, .menu-search-wrapper *') ) {
				$('nav.top-bar form#searchform.show').removeClass('show');
				//$('button.search-toggle').click();
			}
      if( target.is('.bs-popup-overlay, .bs-popup-close') ) {
        $('.bs-sitewide-popup').fadeOut('fast');
      }
		});

		$('button.menu-icon').click(function() {
			$(this).toggleClass('active');
		});
		$('.js-off-canvas-overlay').click(function() {
			$('button.menu-icon.active').removeClass('active');
		});

		// Hide WooCommerce notice on checkout page
		$('.woocommerce-info').append('<span class="clear-notice"><i class="fa fa-times-circle" aria-hidden="hidden"></i></span>');
		$('.woocommerce-info .clear-notice').click(function() {
			$(this).parents('.woocommerce-info').addClass('hide-notice');
			$('form.checkout_coupon.woocommerce-form-coupon').addClass('hide-notice');
		});

    // Add class to inputs with labels below
    $('input + label').parents('li.gfield').find('span').addClass('has-label-below');

    // Add class to labels above address fields
    $('.ginput_complex.ginput_container_address').parents('li.gfield').find('label.gfield_label').addClass('ginput_container_address_label');

	  // Back to top script
	  $('#back-top').hide();
	  $(function () {
	    $(window).scroll(function () {
	      if ($(this).scrollTop() > 600) {
	        $('#back-top').fadeIn();
	      } else {
	        $('#back-top').fadeOut();
	      }
	    });
			if($('body').hasClass('mobile')) {
				// do nothing
			} else {
		    $('#back-top a').click(function () {
		      $('body,html').animate({ scrollTop: '0px' }, 'slow');
		      return false;
		    });
			}
	  });

		// Float Labels
		function floatLabel(inputType) {
			$(inputType).each(function(){
					var $this = $(this);
					$this.focus(function(){
						$this.closest('li.gfield').find('label').attr("data-attr","active");
					});
					$this.blur(function(){
						if($this.val() === '' || $this.val() === 'blank'){
							$this.closest('li.gfield').find('label').attr("data-attr","");
						}
					});
			});
		}
		floatLabel(".floatLabel input");
		floatLabel(".floatLabel textarea");
	});

	// Isotope Filters for Portfolio
	jQuery(document).ready(function($) {

    // Lazy Load with Isotope/Masonry Layout
    var $lazycontainer = $('.lazy-isotope-wrapper');
    if($lazycontainer) {
    	$lazycontainer.each(function() {

        // cache container
    		var $lazyisotope = $('.lazy-isotope');
    		$lazyisotope.isotope({
    			itemSelector: '.bs-isotope-item',
    			layoutMode: 'masonry'
    		});
    	  $lazyisotope[0].addEventListener('load', (function() {
    	    var runs;
    	    var update = function(){
    	      $lazyisotope.isotope('layout').isotope();
    	      runs = false;
    	    };
    	    return function(){
    	      if(!runs){
    	        runs = true;
    	        setTimeout(update, 33);
    	      }
    	    };
    	  }()), true);
        $(window).trigger('resize');
    	});
    }

		// cache container
		var $container = $('.bs-isotope');
    if($container) {
			$container.imagesLoaded(function() {
				$container.isotope({
					itemSelector: '.bs-isotope-item',
				});
				$container.isotope('layout').isotope();
			});
		}

		// $(window).trigger('resize');
	});

  $('.portfolio-filter-toggle a').click(function() {
    $('ul.filter-portfolio-category').slideToggle('slow');
    return false;
  });

	jQuery(function($) {
		// Scroll to hash on click
	  $('a.scroll-to-hash').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
				console.log(target);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top - topScrollOffset
	        }, 1000);
	        return false;
	      }
	    }
	  });

	});
	<?php if( get_theme_mod( 'sticky-header' ) != '') { ?>
	// Sticky Header Classie script
	$('#masthead').imagesLoaded( function init() {
		window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        stickPrep = jQuery('#masthead').outerHeight() * 2,
				topBarHeight = jQuery('#masthead').outerHeight(),
        header = document.querySelector("body");
      if (distanceY > stickPrep) {
        classie.add(header,"sticky-prep");
				$('#sticky-header-placeholder').css({'height' : topBarHeight,'display' : 'block'});
      } else {
        if (classie.has(header,"sticky-prep")) {
          classie.remove(header,"sticky-prep");
					$('#sticky-header-placeholder').css({'height' : '0','display' : 'none'});
        }
      }
  	});
    window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        stickOn = jQuery('#masthead').outerHeight() * 2.5,
        header = document.querySelector("body");
      if (distanceY > stickOn) {
        classie.add(header,"sticky-header");

      } else {
        if (classie.has(header,"sticky-header")) {
          classie.remove(header,"sticky-header");
        }
      }
  	});
	});
	// window.onload = init();
	<?php } ?>

</script>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
