<?php
/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles() { ?>
	<style>
    #customize-theme-controls ul.customize-pane-parent, #customize-theme-controls ul.customize-pane-child {
      padding: 0 5px;
    }
		#customize-theme-controls #accordion-section-themes .accordion-section-title {
			background: #003a71 !important;
			border-left: 0 !important;
			color: #FFF !important;
		}
		#customize-theme-controls #accordion-section-themes .accordion-section-title button {
			background: #FFF !important;
			color: #003a71 !important;
		}
    #customize-theme-controls h3.accordion-section-title {
      background: #1e73be;
      color: #FFF;
      margin-bottom: 5px;
      border-radius: 4px;
      border-color: #003a71;
      border-right: 1px solid;
      border-bottom: 0;
      letter-spacing: 1px;
      font-weight: 400;
      text-transform: uppercase;
    }
    #customize-theme-controls h3.accordion-section-title:hover,
    #customize-theme-controls h3.accordion-section-title:focus {
      background: #003a71 !important;
      color: #FFF !important;
      border-left: 4px solid #003a71 !important;
    }
    #customize-outer-theme-controls h3.accordion-section-title:after,
    #customize-theme-controls h3.accordion-section-title:after,
    #customize-outer-theme-controls h3.accordion-section-title:hover:after,
    #customize-theme-controls h3.accordion-section-title:hover:after,
    #customize-outer-theme-controls h3.accordion-section-title:focus:after,
    #customize-theme-controls h3.accordion-section-title:focus:after {
      color: #FFF !important;
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control,
    #customize-theme-controls ul.customize-pane-child li.customize-control {
      background: #1e73be;
      border: 1px solid #003a71;
      border-radius: 4px;
      color: #FFF !important;
      margin: 0 auto 10px;
      padding: 5px 10px;
      width: calc(100% - 20px);
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control .description,
    #customize-theme-controls ul.customize-pane-child li.customize-control .description {
      color: #FFF !important;
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control input,
    #customize-theme-controls ul.customize-pane-child li.customize-control input,
    #customize-theme-controls ul.customize-pane-parent li.customize-control textarea,
    #customize-theme-controls ul.customize-pane-child li.customize-control textarea {
      border-color: #FFF
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control input[type="text"],
    #customize-theme-controls ul.customize-pane-child li.customize-control input[type="text"] {
      margin-bottom: 5px;
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control span.customize-control-title,
    #customize-theme-controls ul.customize-pane-child li.customize-control span.customize-control-title {
      font-size: 18px;
      font-weight: 400;
      letter-spacing: 1px;
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control label,
    #customize-theme-controls ul.customize-pane-child li.customize-control label {
      font-size: 15px;
      font-weight: 400;
      letter-spacing: .5px;
    }
    #customize-theme-controls ul.customize-pane-parent li.customize-control .attachment-media-view.attachment-media-view-image,
    #customize-theme-controls ul.customize-pane-child li.customize-control .attachment-media-view.attachment-media-view-image {
      background: rgba(255,255,255,.5);
      border-radius: 4px;
      margin-bottom: 5px;
      padding: 10px 5px;
      text-align: center;
    }
    #customize-theme-controls button.button {
      box-shadow: none !important;
      color: #FFF !important;
      -webkit-transition: background .2s ease-out;
      -moz-transition: background .2s ease-out;
      -ms-transition: background .2s ease-out;
      transition: background .2s ease-out;
    }
		#customize-theme-controls .button:not(.wp-color-result) {
      background: #b01f23 !important;
      border: 1px solid #b01f23 !important;
			color: #FFF !important;
		}
		#customize-theme-controls .button:not(.wp-color-result):hover,
    #customize-theme-controls .button:not(.wp-color-result):focus {
      background: #000 !important;
      border: 1px solid #000 !important;
    }
    #customize-controls .description.customize-section-description {
      font-size: 18px;
      line-height: 1.2;
      color: #333;
      font-style: italic;
    }
		#customize-controls #customize-control-header-layout label:after,
		#customize-controls #customize-control-blog-page-layout label:after,
		#customize-controls #customize-control-single-post-layout label:after,
		#customize-controls #customize-control-blog-posts-layout label:after,
		#customize-controls #customize-control-mobile_menu_layout label:after {
		  content: '';
			background-size: contain !important;
  		box-shadow: 1px 2px 6px rgba(0,0,0,.5);
		  display: block;
		  height: 0;
			margin-top: 10px;
			margin-bottom: 10px;
			width: 100%;
		}
		/* Header Layout Thumbnails */
		#customize-controls #customize-control-header-layout label[for="_customize-input-header-layout-radio-menu-right"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/header-option-one.jpg) no-repeat center top;
			padding-bottom: 15%;
		}
		#customize-controls #customize-control-header-layout label[for="_customize-input-header-layout-radio-menu-bottom"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/header-option-two.jpg) no-repeat center top;
			padding-bottom: 15%;
		}
		#customize-controls #customize-control-header-layout label[for="_customize-input-header-layout-radio-menu-center"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/header-option-three.jpg) no-repeat center top;
			padding-bottom: 22.75%;
		}
		#customize-controls #customize-control-header-layout label[for="_customize-input-header-layout-radio-menu-top-bottom"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/header-option-four.jpg) no-repeat center top;
			padding-bottom: 16%;
		}

		/* Blog Page Layout Thumbnails */
		#customize-controls #customize-control-blog-page-layout label[for="_customize-input-blog-page-layout-radio-blog-sidebar-right"]:after,
		#customize-controls #customize-control-single-post-layout label[for="_customize-input-single-post-layout-radio-single-sidebar-right"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-layout-sidebar-right.jpg) no-repeat center top;
			padding-bottom: 59.75%;
		}
		#customize-controls #customize-control-blog-page-layout label[for="_customize-input-blog-page-layout-radio-blog-sidebar-left"]:after,
		#customize-controls #customize-control-single-post-layout label[for="_customize-input-single-post-layout-radio-single-sidebar-left"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-layout-sidebar-left.jpg) no-repeat center top;
			padding-bottom: 59.75%;
		}
		#customize-controls #customize-control-blog-page-layout label[for="_customize-input-blog-page-layout-radio-blog-full-width"]:after,
		#customize-controls #customize-control-single-post-layout label[for="_customize-input-single-post-layout-radio-single-full-width"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-layout-full-width.jpg) no-repeat center top;
			padding-bottom: 59.75%;
		}
		#customize-controls #customize-control-blog-page-layout label[for="_customize-input-blog-page-layout-radio-blog-narrow-content"]:after,
		#customize-controls #customize-control-single-post-layout label[for="_customize-input-single-post-layout-radio-single-narrow-content"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-layout-no-sidebar.jpg) no-repeat center top;
			padding-bottom: 59.75%;
		}

		/* Blog Posts Layout Thumbnails */
		#customize-controls #customize-control-blog-posts-layout label[for="_customize-input-blog-posts-layout-radio-bs-blog-loop-list-large"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-post-layout-large.jpg) no-repeat center top;
			padding-bottom: 100%;
		}
		#customize-controls #customize-control-blog-posts-layout label[for="_customize-input-blog-posts-layout-radio-bs-blog-loop-list"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-post-layout-small.jpg) no-repeat center top;
			padding-bottom: 100%;
		}
		#customize-controls #customize-control-blog-posts-layout label[for="_customize-input-blog-posts-layout-radio-bs-blog-loop-grid"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-post-layout-grid-masonry.jpg) no-repeat center top;
			padding-bottom: 100%;
		}
		#customize-controls #customize-control-blog-posts-layout label[for="_customize-input-blog-posts-layout-radio-bs-blog-loop-grid-standard"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/blog-post-layout-grid-standard.jpg) no-repeat center top;
			padding-bottom: 100%;
		}

		/* Mobile Menu Thumbnails */
		#customize-controls #customize-control-mobile_menu_layout label[for="_customize-input-mobile_menu_layout-radio-topbar"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/mobile-menu-dropdown.jpg) no-repeat center top;
			padding-bottom: 50%;
		}
		#customize-controls #customize-control-mobile_menu_layout label[for="_customize-input-mobile_menu_layout-radio-offcanvas"]:after {
			background: url(../wp-content/themes/allonsy2/src/assets/images/customizer-thumbnails/mobile-menu-off-canvas.jpg) no-repeat center top;
			padding-bottom: 50%;
		}
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );
