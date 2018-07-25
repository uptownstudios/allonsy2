<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>

		<div id="footer-container">
			<div class="footer-container" data-sticky-footer>
				<footer class="footer grid-x">
					<?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>
				</footer>
			</div>
			<div id="copyright-container">
				<footer id="copyright" class="max-width-twelve-hundred grid-x <?php if( get_theme_mod('social-copyright') != '' ) { ?>has-social<?php } ?>">
					<?php if( get_theme_mod('social-copyright') != '') { ?><div class="small-12 medium-9 large-9 cell"><?php } ?>
					<?php if( get_theme_mod('copyright')): ?>
						<p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('copyright','default'); ?></p>
					<?php else: ?>
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
					<?php endif; ?>
					<?php if( get_theme_mod('social-copyright') != '' ) { ?></div><div class="small-12 medium-3 large-3 cell"><?php echo do_shortcode('[bs_social_urls]');?></div><?php } ?>
				</footer>
			</div>
		</div>

		<div id="back-top">
  		<a href="#" title="Back to top"><i class="fa fa-chevron-up"></i></a>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div>
	</div>
</div><!-- Close off-canvas content -->
<?php endif; ?>

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

		//$(window).imagesLoaded(function() {

			// Site Preloader
			$('#preloader').addClass('loaded')
			$('#preloader.loaded').delay(250).fadeOut(1000, function() {
				$(this).hide();
			});
		//});

		$('button.search-toggle').click(function() {
			$('nav.top-bar form#searchform').toggleClass('show');
		});
		$(document).click(function(e) {
			var target = $(e.target);
		  if( ! target.is('li.menu-search-wrapper, li.menu-search-wrapper *') ) {
				$('nav.top-bar form#searchform.show').removeClass('show');
				//$('button.search-toggle').click();
			}
		});

		$('button.menu-icon').click(function() {
			$(this).toggleClass('active');
		});
		$('.js-off-canvas-overlay').click(function() {
			$('button.menu-icon.active').removeClass('active');
		});

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

	// Masonry Layout for Portfolio, Blog Posts, and Events
	// (function ($) {
	// 	var $container = $('.bs-isotope');
	// 	$container.imagesLoaded(function() {
	// 		$container.isotope({
	// 			itemSelector: '.bs-isotope-item',
	// 			layoutMode: 'masonry'
	// 		});
	// 		$container.isotope('layout').isotope();
	// 	});
	// 	$(window).trigger('resize');
	// }(jQuery));

	// Lazy Load with Isotope/Masonry Layout
	// $('.lazy-isotope-wrapper').each(function(){
	//
	// 	var $isotope = $('.lazy-isotope', this);
	//
	// 	$isotope.isotope({
	// 		itemSelector: '.bs-isotope-item',
	// 		layoutMode: 'masonry'
	// 	});
	//
	//   $isotope[0].addEventListener('load', (function(){
	//     var runs;
	//     var update = function(){
	//       $isotope.isotope('layout');
	//       runs = false;
	//     };
	//     return function(){
	//       if(!runs){
	//         runs = true;
	//         setTimeout(update, 33);
	//       }
	//     };
	//   }()), true);
	// });

	// Isotope Filters for Portfolio
	jQuery(document).ready(function($) {
		// cache container
		var $container = $('.portfolio-container');
		// filter items when filter link is clicked
		$('#filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
			$('#filters a.active').not(this).removeClass('active');
			$(this).addClass('active');
		  return false;
		});
	});

	jQuery(function($) {
		// Scroll to hash on click
	  $('a[href*="#"]:not([href="#"])').click(function() {
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
	window.onload = init();
	<?php } ?>

	// $('.bs-carousel').slick({
	//   dots: false,
	//   infinite: false,
	//   speed: 300,
	//   slidesToShow: 3,
	//   slidesToScroll: 1,
	// 	arrows: true,
	// 	prevArrow: '<button aria-hidden="true" role="presentation" type="button" class="slick-prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/prev-arrow.svg" alt="Previous Arrow" width="20" /></button>',
	// 	nextArrow: '<button aria-hidden="true" role="presentation" type="button" class="slick-next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/next-arrow.svg" alt="Next Arrow" width="20" /></button>',
	//   responsive: [{
  //     breakpoint: 1024,
  //     settings: {
  //       slidesToShow: 2,
  //       slidesToScroll: 1,
  //       infinite: true,
  //     }
  //   },{
  //     breakpoint: 600,
  //     settings: {
  //       slidesToShow: 2,
  //       slidesToScroll: 1
  //     }
  //   },{
  //     breakpoint: 480,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1
  //     }
  //   }]
	// });

</script>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
