<?php
/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles() { ?>
	<style>
    #customize-theme-controls ul.customize-pane-parent, #customize-theme-controls ul.customize-pane-child {
      padding: 0 5px;
    }
    #customize-theme-controls .accordion-section-title {
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
    #customize-theme-controls .accordion-section-title:hover,
    #customize-theme-controls .accordion-section-title:focus {
      background: #003a71 !important;
      color: #FFF !important;
      border-left: 4px solid #003a71 !important;
    }
    #customize-outer-theme-controls .accordion-section-title:after,
    #customize-theme-controls .accordion-section-title:after,
    #customize-outer-theme-controls .accordion-section-title:hover:after,
    #customize-theme-controls .accordion-section-title:hover:after,
    #customize-outer-theme-controls .accordion-section-title:focus:after,
    #customize-theme-controls .accordion-section-title:focus:after {
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
      background: #b01f23 !important;
      border: 1px solid #b01f23 !important;
      box-shadow: none !important;
      color: #FFF !important;
      -webkit-transition: background .2s ease-out;
      -moz-transition: background .2s ease-out;
      -ms-transition: background .2s ease-out;
      transition: background .2s ease-out;
    }
    #customize-theme-controls button.button:hover,
    #customize-theme-controls button.button:focus {
      background: #000 !important;
      border: 1px solid #000 !important;
    }
    #customize-controls .description.customize-section-description {
      font-size: 18px;
      line-height: 1.2;
      color: #333;
      font-style: italic;
    }
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );
