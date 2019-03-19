<?php
	$pre_footer = get_theme_mod('pre-footer-widgets');
	$preloader = get_theme_mod('loading-animation');
	$popup_enabled = get_theme_mod('bs_pop_up_enable');
	$popup_delay = get_theme_mod('bs_pop_up_delay');
	$popup_content = get_theme_mod('bs_pop_up_content');
	$popup_mouseleave = get_theme_mod('bs_pop_up_mouseleave');
	$a11y_toolbar = get_theme_mod('show-a11y-toolbar');
	$shop_products_layout = get_theme_mod('shop-products-layout');


	/**** TABLE OF CONTENTS ****

	1. GENERAL SCRIPTS
		1a. Toggle search box in header
		1b. Add 'active' class to mobile menu toggle
		1c. Add class to inputs with labels below
		1d. Add class to labels above address fields
		1e. Back to top script
		1f. Float Labels
		1g. Top padding for off canvas overlap menu
		1h. Scroll to hash on click

	2. SITE PRELOADER

	3. ISOTOPE/MASONRY SCRIPT
		3a. Lazy Load with Isotope/Masonry Layout
		3b. Portfolio Filter Toggle for small screens

	4. ACCESSIBILITY SCRIPTS

	5. SITEWIDE POPUP SCRIPT

	6. WOOCOMMERCE SCRIPTS
		6a. Custom quantity input buttons on div.quantity (mainly in WC)
		6b. Hide WooCommerce notice on checkout page
		6c. Wrap WC products in masonry markup on shop index page

	7. STICKY HEADER CLASSIE SCRIPT
	**** END TABLE OF CONTENTS ****/
?>
<script type="text/javascript">

	var windowWidth;
	var headerHeight;
  var topBarHeight;
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

			// 1. GENERAL SCRIPTS
			$('li.menu-item-has-children > a').on('focus focusout', function() {
	      $(this).parents().toggleClass('is-active');
	    });

	    // 1a. Toggle search box in header
			$('button.search-toggle').click(function() {
				$('nav.top-bar form#searchform').toggleClass('show');
			});
			$(document).click(function(e) {
				var target = $(e.target);
			  if( ! target.is('.menu-search-wrapper, .menu-search-wrapper *') ) {
					$('nav.top-bar form#searchform.show').removeClass('show');
				}
	      <?php if( $popup_enabled ): ?>
	      if( target.is('.bs-popup-overlay, .bs-popup-close') ) {
	        $('.bs-sitewide-popup').fadeOut('fast');
	      }
	      <?php endif; ?>
			});

			// 1b. Add 'active' class to mobile menu toggle
			$('button.menu-icon').click(function() {
				$(this).toggleClass('active');
			});
			$('.js-off-canvas-overlay').click(function() {
				$('button.menu-icon.active').removeClass('active');
			});

			// 1c. Add class to inputs with labels below
	    $('input + label').parents('li.gfield').find('span').addClass('has-label-below');

	    // 1d. Add class to labels above address fields
	    $('.ginput_complex.ginput_container_address').parents('li.gfield').find('label.gfield_label').addClass('ginput_container_address_label');

		  // 1e. Back to top script
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

			// 1f. Float Labels
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

			<?php if( get_theme_mod( 'wpt_off_canvas_menu_type' ) === 'overlap'): ?>
			// 1g. Top padding for off canvas overlap menu
      jQuery(window).on('resize', function() {

        var topBarHeight = jQuery('#masthead').outerHeight();

        jQuery('.mobile-off-canvas-menu.off-canvas.is-transition-overlap').css({'padding-top' : topBarHeight });

      });
      jQuery(window).trigger('resize');
      <?php endif; ?>

			// 1h. Scroll to hash on click
			$(function() {
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

			<?php if( $preloader ) { ?>
			// 2. SITE PRELOADER
			$('#preloader').addClass('loaded')
			$('#preloader.loaded').delay(250).fadeOut(1000, function() {
				$(this).hide();
			});
			<?php } ?>

			// 3. ISOTOPE/MASONRY SCRIPT
			// 3a. Lazy Load with Isotope/Masonry Layout
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

			// 3b. Portfolio Filter Toggle for small screens
			$('.portfolio-filter-toggle a, .staff-filter-toggle a').click(function() {
		    $('ul.filter-portfolio-category, ul.filter-staff-category').slideToggle('slow');
		    return false;
		  });
		});

    <?php if( $a11y_toolbar ): ?>
		// 4. ACCESSIBILITY SCRIPTS
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
    <?php endif; ?>

    <?php if( $popup_enabled ): ?>
    // 5. SITEWIDE POPUP SCRIPT
    $(window).imagesLoaded(function() {
      <?php if( $popup_mouseleave ) { ?>
        $(document).one('mouseleave', function() {
          $('.bs-sitewide-popup').addClass('popup-active').fadeIn('slow');
        });
      <?php } else { ?>
        $('.bs-sitewide-popup').addClass('popup-active').delay(<?php echo $popup_delay; ?>).fadeIn('slow');
      <?php } ?>
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
    <?php endif; ?>

		<?php if( class_exists( 'WooCommerce' ) ) { ?>
		// 6. WOOCOMMERCE SCRIPTS
    // 6a. Custom quantity input buttons on div.quantity (mainly in WC)
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

		// 6b. Hide WooCommerce notice on checkout page
		$('.woocommerce-info').append('<span class="clear-notice"><i class="fa fa-times-circle" aria-hidden="hidden"></i></span>');
		$('.woocommerce-info .clear-notice').click(function() {
			$(this).parents('.woocommerce-info').addClass('hide-notice');
			$('form.checkout_coupon.woocommerce-form-coupon').addClass('hide-notice');
		});
		<?php } ?>

    <?php if ( class_exists( 'WooCommerce' ) && $shop_products_layout === 'grid-masonry' ) { ?>
    // 6c. Wrap WC products in masonry markup on shop index page
      $('.post-type-archive-product .woocommerce-index ul.products').addClass('bs-isotope').wrap('<div class="lazy-isotope"></div>');
      $('.post-type-archive-product .woocommerce-index ul.products li.product').addClass('bs-isotope-item');
    <?php } ?>

	});

	<?php if( get_theme_mod( 'sticky-header' ) != '') { ?>
	// 7. STICKY HEADER CLASSIE SCRIPT
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
