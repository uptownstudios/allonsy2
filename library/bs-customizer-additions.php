<?php
// Add WP 4.5 Custom Logo Support in Customizer
function theme_prefix_setup() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


// Customizer Additions
if ( ! function_exists( 'newuptown_customize_register' ) ) {
function newuptown_customize_register( $wp_customize ) {
  // Create custom panels

  // Color Section
  $wp_customize->get_section('colors')->panel = 'theme-colors';
  $wp_customize->add_panel( 'theme-colors' , array(
    'title' => __( 'Colors', 'allonsy2' ),
    'priority' => 20,
    'description' => __( 'Customize your the theme colors in this section.', 'allonsy2' ),
    'capability' => 'edit_theme_options',
  ) );
  $wp_customize->add_section('default_colors', array(
    'title' => __('Default Colors', 'allonsy2'),
    'description' => __('Change the default colors of the template.', 'allonsy2'),
    'priority' => 105,
    'panel' => 'theme-colors',
  ));

  /* Paragraph Text Color setting */
  $wp_customize->add_setting('paragraph_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Paragraph Text Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'paragraph_color',array(
    'label' => __('Paragraph Text Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'paragraph_color',
  )));
  /* Link Color setting */
  $wp_customize->add_setting('link_color', array(
    'default' => '#1e73be',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Link Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color',array(
    'label' => __('Link Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'link_color',
  )));
  /* Link Hover Color setting */
  $wp_customize->add_setting('link_hover_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Link Hover Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_hover_color',array(
    'label' => __('Link Hover Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'link_hover_color',
  )));

  /* Social Media Icon Color setting */
  $wp_customize->add_setting('sm_color', array(
    'default' => '#1e73be',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Social Media Icon Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_color',array(
    'label' => __('Social Media Icon Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_color',
  )));
  /* Social Media Icon Hover Color setting */
  $wp_customize->add_setting('sm_hover_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Social Media Icon Hover Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_hover_color',array(
    'label' => __('Social Media Icon Hover Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_hover_color',
  )));

  /* H1 Color setting */
  $wp_customize->add_setting('heading1_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 14,
  ));
  /* H1 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading1_color',array(
    'label' => __('H1 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading1_color',
  )));
  /* H2 Color setting */
  $wp_customize->add_setting('heading2_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 15,
  ));
  /* H2 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading2_color',array(
    'label' => __('H2 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading2_color',
  )));
  /* H3 Color setting */
  $wp_customize->add_setting('heading3_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 16,
  ));
  /* H3 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading3_color',array(
    'label' => __('H3 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading3_color',
  )));
  /* H4 Color setting */
  $wp_customize->add_setting('heading4_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 17,
  ));
  /* H4 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading4_color',array(
    'label' => __('H4 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading4_color',
  )));
  /* H5 Color setting */
  $wp_customize->add_setting('heading5_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 18,
  ));
  /* H5 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading5_color',array(
    'label' => __('H5 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading5_color',
  )));
  /* H6 Color setting */
  $wp_customize->add_setting('heading6_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 19,
  ));
  /* H6 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading6_color',array(
    'label' => __('H6 Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'heading6_color',
  )));
  /* Page Title Color setting */
  $wp_customize->add_setting('pagetitle_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* Page Title Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pagetitle_color',array(
    'label' => __('Page Title Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'pagetitle_color',
  )));

  /* Title Bar Color setting */
  $wp_customize->add_setting('titlebar_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* Title Bar Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'titlebar_color',array(
    'label' => __('Title Bar Font Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'titlebar_color',
  )));

  /* Highlight Color setting */
  $wp_customize->add_setting('highlight_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 100,
  ));
  /* Highlight Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'highlight_color',array(
    'label' => __('Highlight Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'highlight_color',
  )));

  /* Header Colors section */
  $wp_customize->add_section('header_colors', array(
    'title' => __('Header Colors', 'allonsy2'),
    'description' => __('Change the colors in the header, such as header background and main nav colors.', 'allonsy2'),
    'priority' => 106,
    'panel' => 'theme-colors',
  ));

  /* Header Background Color setting */
  $wp_customize->add_setting('header_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 5,
  ));
  /* Header Background Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'header_color',array(
    'label' => __('Header Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'header_color',
  )));
  /* top level main nav bar background color setting */
  $wp_customize->add_setting('main_nav_bar_bg_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 9,
  ));
  /* top level main nav bar background color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_bar_bg_color',array(
    'label' => __('Top Level Nav Bar BG Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_bar_bg_color',
  )));
  /* top level main nav color setting */
  $wp_customize->add_setting('main_nav_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* top level main nav color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_color',array(
    'label' => __('Top Level Nav Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_color',
  )));
  /* top level main nav hover color setting */
  $wp_customize->add_setting('main_nav_hover_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* top level main nav hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_hover_color',array(
    'label' => __('Top Level Nav Hover/Focus Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_hover_color',
  )));
  /* top level main nav submenu background color setting */
  $wp_customize->add_setting('main_nav_sub_bg_color', array(
    'default' => '#e1e1e1',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* top level main nav submenu background color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_bg_color',array(
    'label' => __('Top Level Nav Sub Menu BG', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_bg_color',
  )));
  /* top level main nav submenu li color setting */
  $wp_customize->add_setting('main_nav_sub_li_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* top level main nav submenu li color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_color',array(
    'label' => __('Top Level Nav Sub Menu Item Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_color',
  )));
  /* top level main nav submenu li hover color setting */
  $wp_customize->add_setting('main_nav_sub_li_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 14,
  ));
  /* top level main nav submenu li hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_hover_color',array(
    'label' => __('Top Level Nav Sub Menu Item Hover Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_hover_color',
  )));
  /* top level main nav submenu li hover bg color setting */
  $wp_customize->add_setting('main_nav_sub_li_hover_bg_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* top level main nav submenu li hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_hover_bg_color',array(
    'label' => __('Top Level Nav Sub Menu Item Hover BG Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_hover_bg_color',
  )));

  /* Footer colors section */
  $wp_customize->add_section('footer_colors', array(
    'title' => __('Footer Colors', 'allonsy2'),
    'description' => __('Change the colors in the footer, such as footer background, headings, paragraph text, and link text colors.', 'allonsy2'),
    'priority' => 107,
    'panel' => 'theme-colors',
  ));

  /* Footer BG color setting */
  $wp_customize->add_setting('footer_bg_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Footer BG color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bg_color',array(
    'label' => __('Footer BG Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'footer_bg_color',
  )));
  /* Footer widget heading color setting */
  $wp_customize->add_setting('footer_widget_heading_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Footer widget heading color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_heading_color',array(
    'label' => __('Footer Widget Heading Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_heading_color',
  )));
  /* Footer widget paragraph color setting */
  $wp_customize->add_setting('footer_widget_p_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Footer widget paragraph color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_p_color',array(
    'label' => __('Footer Widget Paragraph Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_p_color',
  )));
  /* Footer widget link color setting */
  $wp_customize->add_setting('footer_widget_a_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* Footer widget link color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_a_color',array(
    'label' => __('Footer Widget Link Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_a_color',
  )));
  /* Footer widget link hover color setting */
  $wp_customize->add_setting('footer_widget_a_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Footer widget link hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_a_hover_color',array(
    'label' => __('Footer Widget Link Hover Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_a_hover_color',
  )));
  /* Copyright BG color setting */
  $wp_customize->add_setting('copyright_bg_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 14,
  ));
  /* Copyright BG color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_bg_color',array(
    'label' => __('Copyright BG Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'copyright_bg_color',
  )));
  /* Copyright Text color setting */
  $wp_customize->add_setting('copyright_text_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 15,
  ));
  /* Copyright Text color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_text_color',array(
    'label' => __('Copyright Text Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'copyright_text_color',
  )));
  /* Copyright Link color setting */
  $wp_customize->add_setting('copyright_link_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 16,
  ));
  /* Copyright Link color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_link_color',array(
    'label' => __('Copyright Link Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'copyright_link_color',
  )));
  /* Copyright Link Hover color setting */
  $wp_customize->add_setting('copyright_link_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 16,
  ));
  /* Copyright Link Hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_link_hover_color',array(
    'label' => __('Copyright Link Hover Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'copyright_link_hover_color',
  )));



  // Add Social Media Section
  $wp_customize->add_section( 'social-media' , array(
    'title' => __( 'Social Media', 'allonsy2' ),
    'priority' => 30,
    'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'allonsy2' )
  ) );

  // Add Facebook Setting
  $wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
      'label' => __( 'Facebook', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'facebook',
  ) ) );

  // Add Twitter Setting
  $wp_customize->add_setting( 'twitter' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
      'label' => __( 'Twitter', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'twitter',
  ) ) );

  // Add LinkedIn Setting
  $wp_customize->add_setting( 'linkedin' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
      'label' => __( 'LinkedIn', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'linkedin',
  ) ) );

  // Add Flickr Setting
  $wp_customize->add_setting( 'flickr' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
      'label' => __( 'Flickr', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'flickr',
  ) ) );

  // Add Instagram Setting
  $wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
      'label' => __( 'Instagram', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'instagram',
  ) ) );

  // Add YouTube Setting
  $wp_customize->add_setting( 'youtube' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
      'label' => __( 'YouTube', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'youtube',
  ) ) );

  // Add Pinterest Setting
  $wp_customize->add_setting( 'pinterest' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
      'label' => __( 'Pinterest', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'pinterest',
  ) ) );

  // Add Vimeo Setting
  $wp_customize->add_setting( 'vimeo' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
      'label' => __( 'Vimeo', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'vimeo',
  ) ) );

  // Add Feedly Setting
  $wp_customize->add_setting( 'feedly' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'feedly', array(
      'label' => __( 'Feedly', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'feedly',
  ) ) );

  // Add Contact Setting
  $wp_customize->add_setting( 'contact' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact', array(
      'label' => __( 'Contact', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'contact',
  ) ) );

  // Add RSS Setting
  $wp_customize->add_setting( 'rss' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
      'label' => __( 'RSS', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'rss',
  ) ) );

  // Add Custom Button Setting
  $wp_customize->add_setting( 'custom' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom', array(
      'label' => __( 'Custom Button', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'custom',
  ) ) );
  $wp_customize->add_setting( 'custom-text' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom-text', array(
      'label' => __( 'Custom Button Text', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'custom-text',
  ) ) );


  // Add General Settings Section
  $wp_customize->add_section( 'general-settings' , array(
    'title' => __( 'General Settings', 'allonsy2' ),
    'priority' => 35,
    'description' => __( 'General settings, such as page loading animation, page loading graphic, etc.', 'allonsy2' )
  ) );
  // Loading Animation
  $wp_customize->add_setting( 'loading-animation' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'loading-animation', array(
      'label' => __( 'Enable the loading animation?', 'allonsy2' ),
      'section' => 'general-settings',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the page loading animation',
  ) ) );
  // Default Title Bar Image URL
  $wp_customize->add_setting( 'loading-animation-image' , array( 'default' => '','sanitize_callback' => 'esc_url_raw', 'transport' => 'postMessage' ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'loading-animation-image', array(
      'label' => __( 'Default Loading Animation Image', 'allonsy2' ),
      'section' => 'general-settings',
      'settings' => 'loading-animation-image',
  ) ) );


  // Header Options
  $wp_customize->add_section( 'header-options' , array(
    'title' => __( 'Header Options', 'allonsy2' ),
    'priority' => 40,
    'description' => __( 'Choose options for the header.', 'allonsy2' )
  ) );
  // Sticky Header
  $wp_customize->add_setting( 'sticky-header' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sticky-header', array(
      'label' => __( 'Sticky Header?', 'allonsy2' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the sticky header',
  ) ) );

  // Hide Social Icons in the Header
  $wp_customize->add_setting( 'hide_header_social' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_header_social', array(
      'label' => __( 'Hide Social Icons In Header?', 'allonsy2' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to hide social icons in the header',
  ) ) );

  // Show Alt Nav in the Header
  $wp_customize->add_setting( 'show_alt_nav' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_alt_nav', array(
      'label' => __( 'Show Alt Nav In Header Top Bar?', 'allonsy2' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to show the alt nav in the header',
  ) ) );

  // Search Position in Header
  $wp_customize->add_setting( 'search-position' , array( 'default' => 'search-menu' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'search-position', array(
      'label' => __( 'Search Bar Position?', 'allonsy2' ),
      'section' => 'header-options',
      'type' => 'radio',
      'choices' => array(
        'search-menu' => 'In the Menu',
        'search-above-menu' => 'Above Menu',
        'search-social-menu' => 'Inline with Social Icons',
        'search-hide' => 'Hide search for now'
      ),
  ) ) );

  // Header Layout
  $wp_customize->add_setting( 'header-layout' , array( 'default' => 'menu-right' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header-layout', array(
      'label' => __( 'Header Layout?', 'allonsy2' ),
      'section' => 'header-options',
      'type' => 'radio',
      'choices' => array(
        'menu-right' => 'Logo Left, Menu Right',
        'menu-bottom' => 'Logo Left, Menu Bottom',
        'menu-center' => 'Logo Center, Menu Bottom & Center'
      ),
  ) ) );

  // Footer Options
  $wp_customize->add_section( 'footer-options' , array(
    'title' => __( 'Footer Options', 'allonsy2' ),
    'priority' => 41,
    'description' => __( 'Choose options for the footer.', 'allonsy2' )
  ) );
  // Footer Columns
  $wp_customize->add_setting( 'footer-columns' , array( 'default' => 'columns-4' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-columns', array(
      'label' => __( 'Footer Columns', 'allonsy2' ),
      'section' => 'footer-options',
      'type' => 'radio',
      'choices' => array(
        'columns-2' => '2 Columns',
        'columns-3' => '3 Columns',
        'columns-4' => '4 Columns'
      ),
  ) ) );

  // Add Internal Page Section
  $wp_customize->add_section( 'internal-pages' , array(
    'title' => __( 'Internal Page Options', 'allonsy2' ),
    'priority' => 42,
    'description' => __( 'Internal page options, such as title bar options, breadcrumbs, etc.', 'allonsy2' )
  ) );

  // Title Bar with Background Image
  $wp_customize->add_setting( 'internal-title-bar' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'internal-title-bar', array(
      'label' => __( 'Title Bar Options', 'allonsy2' ),
      'section' => 'internal-pages',
      'type' => 'radio',
      'choices' => array(
        'bs-featured-image' => 'Featured Image',
        'bs-title-bar' => 'Featured Image with Title &amp; Meta Info',
        'bs-hide-featured-image' => 'Hide Title Bar'
      ),
  ) ) );

  // Default Title Bar Image URL
  $wp_customize->add_setting( 'default-title-bar-image' , array( 'default' => '','sanitize_callback' => 'esc_url_raw', 'transport' => 'postMessage' ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default-title-bar-image', array(
      'label' => __( 'Default Title Bar Image', 'allonsy2' ),
      'section' => 'internal-pages',
      'settings' => 'default-title-bar-image',
  ) ) );
  // Enable Breadcrumbs
  $wp_customize->add_setting( 'internal-breadcrumbs' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'internal-breadcrumbs', array(
      'label' => __( 'Enable Breadcrumbs?', 'allonsy2' ),
      'section' => 'internal-pages',
      'type' => 'checkbox',
      'description' => 'Check this box to enable breadcrumbs on pages, posts, and other supported post types.',
  ) ) );
  // Breadcrumb Separator
  // Blog Content Style
  $wp_customize->add_setting( 'breadcrumb-separator' , array( 'default' => 'raquo' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'breadcrumb-separator', array(
      'label' => __( 'Breadcrumb Separator', 'allonsy2' ),
      'section' => 'internal-pages',
      'type' => 'radio',
      'choices' => array(
        'raquo' => 'Double Right Arrow (&raquo;)',
        'rsaquo' => 'Single Right Arrow (&rsaquo;)',
        'slash' => 'Slash (&#x2F;)',
        'bullet' => 'Bullet (&#149;)'
      ),
  ) ) );

  // Add Blog Options Section
  $wp_customize->add_section( 'blog-options' , array(
    'title' => __( 'Blog Options', 'allonsy2' ),
    'priority' => 50,
    'description' => __( 'Blog options, such as about the auther and tags', 'allonsy2' )
  ) );

  // Blog Page Title
  $wp_customize->add_setting( 'blog-page-title' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-page-title', array(
      'label' => __( 'Blog Page Title', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'text',
      'description' => 'Give the blog page a custom title.',
  ) ) );
  // Blog Content Style
  $wp_customize->add_setting( 'blog-content-style' , array( 'default' => 'bs-blog-excerpt' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-content-style', array(
      'label' => __( 'Blog Content Style', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'bs-blog-content' => 'Show "The Content"',
        'bs-blog-excerpt' => 'Show "The Excerpt"'
      ),
  ) ) );
  // Disable Blog Sidebar
  $wp_customize->add_setting( 'blog-sidebar' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-sidebar', array(
      'label' => __( 'Disable the sidebar for the blog?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to disable the sidebar on the blog page and single blog posts.',
  ) ) );
  // Disable About The Author
  $wp_customize->add_setting( 'about-the-author' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about-the-author', array(
      'label' => __( 'Disable About the Author?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to disable the about the auther section on single blog posts.',
  ) ) );
  // Show Post Tags
  $wp_customize->add_setting( 'show-post-tags' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show-post-tags', array(
      'label' => __( 'Show the post tags?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to show post tags on single blog posts.',
  ) ) );


  // Add Copyright Section
  $wp_customize->add_section( 'copyright-text' , array(
    'title' => __( 'Copyright Text', 'allonsy2' ),
    'priority' => 1000,
    'description' => __( 'Enter the copyright text to appear at the bottom of the page. Do not include the copyright symbol or the year as these are added automatically to the beginning of this line.', 'allonsy2' )
  ) );

  // Add Copyright Text Field
  $wp_customize->add_setting( 'copyright' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright', array(
      'label' => __( 'Copyright', 'allonsy2' ),
      'section' => 'copyright-text',
      'settings' => 'copyright',
  ) ) );

  // Social Media in Copyright Area
  $wp_customize->add_setting( 'social-copyright' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social-copyright', array(
      'label' => __( 'Social Media in Copyright Section?', 'allonsy2' ),
      'section' => 'copyright-text',
      'type' => 'checkbox',
      'description' => 'Check this box to include social media icons in the copyright section',
  ) ) );

  // Add Google Analytics Tracking Section
  $wp_customize->add_section( 'analytics-code' , array(
    'title' => __( 'Analytics Tracking Code', 'allonsy2' ),
    'priority' => 2000,
    'description' => __( 'Paste in the entire Google Analytics tracking code here.', 'allonsy2' )
  ) );

  // Add Google Analytics Tracking Field
  $wp_customize->add_setting( 'analytics' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'analytics-code', array(
      'label' => __( 'Analytics Code', 'allonsy2' ),
      'type' => 'textarea',
      'section' => 'analytics-code',
      'settings' => 'analytics',
  ) ) );

}

add_action( 'customize_register', 'newuptown_customize_register' );
}

function bs_customize_css() { ?>
<style type="text/css" id="bs-customizer-css">
header#masthead, .top-bar, .top-bar ul {
  background: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?>;
}
@media only screen and (max-width: 39.9375rem) {
  header#masthead .title-bar {
    background-color: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?> !important;
  }
  .off-canvas.position-right {
    background: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?>;
  }
}
#main-container p, #main-container li, #main-container span, #main-container time {
  color: <?php echo esc_attr(get_theme_mod('paragraph_color','#272e31')); ?>;
}
a, .breadcrumbs a {
  color: <?php echo esc_attr(get_theme_mod('link_color','#1e73be')); ?>;
  -webkit-transition: color .2s ease-out;
  -moz-transition: color .2s ease-out;
  -o-transition: color .2s ease-out;
  transition: color .2s ease-out;
}
a:hover, a:focus, .breadcrumbs a:hover, .breadcrumbs a:focus {
  color: <?php echo esc_attr(get_theme_mod('link_hover_color','#000000')); ?>;
}
header#masthead ul.social-media-wrapper li a,
header#masthead ul.social-media-wrapper li.menu-search-wrapper button,
nav.off-canvas ul.social-media-wrapper li a {
  color: <?php echo esc_attr(get_theme_mod('sm_color','#003a71')); ?>;
  -webkit-transition: color .2s ease-out;
  -moz-transition: color .2s ease-out;
  -o-transition: color .2s ease-out;
  transition: color .2s ease-out;
}
header#masthead ul.social-media-wrapper li a:hover,
header#masthead ul.social-media-wrapper li a:focus,
header#masthead ul.social-media-wrapper li.menu-search-wrapper button:hover,
header#masthead ul.social-media-wrapper li.menu-search-wrapper button:focus,
nav.off-canvas ul.social-media-wrapper li a:hover,
nav.off-canvas ul.social-media-wrapper li a:focus {
  color: <?php echo esc_attr(get_theme_mod('sm_hover_color','#b01f23')); ?>;
}
header#masthead ul.social-media-wrapper li.custom-button a {
  color: #FFF;
  background: <?php echo esc_attr(get_theme_mod('sm_color','#003a71')); ?>;
  -webkit-transition: background .2s ease-out;
  -moz-transition: background .2s ease-out;
  -o-transition: background .2s ease-out;
  transition: background .2s ease-out;
}
header#masthead ul.social-media-wrapper li.custom-button a:hover,
header#masthead ul.social-media-wrapper li.custom-button a:focus {
  color: #FFF;
  background: <?php echo esc_attr(get_theme_mod('sm_hover_color','#b01f23')); ?> !important;
}
h1 {
  color: <?php echo esc_attr(get_theme_mod('heading1_color','#003a71')); ?>;
}
h2 {
  color: <?php echo esc_attr(get_theme_mod('heading2_color','#003a71')); ?>;
}
h3 {
  color: <?php echo esc_attr(get_theme_mod('heading3_color','#003a71')); ?>;
}
h4 {
  color: <?php echo esc_attr(get_theme_mod('heading4_color','#003a71')); ?>;
}
h5 {
  color: <?php echo esc_attr(get_theme_mod('heading5_color','#003a71')); ?>;
}
h6 {
  color: <?php echo esc_attr(get_theme_mod('heading6_color','#003a71')); ?>;
}
h1.entry-title {
  color: <?php echo esc_attr(get_theme_mod('pagetitle_color','#003a71')); ?>;
}
.featured-hero-title-bar h1.entry-title {
  color: <?php echo esc_attr(get_theme_mod('titlebar_color','#FFFFFF')); ?>;
}
.top-bar .top-bar-top,
.top-bar .top-bar-right,
.top-bar .top-bar-bottom,
.top-bar .top-bar-left {
  background: <?php echo esc_attr(get_theme_mod('main_nav_bar_bg_color','#FFFFFF')); ?>;
}
.top-bar .menu > li > a,
nav.off-canvas > .menu > li > a,
nav.off-canvas .submenu li a,
nav.top-bar.has-search .menu-search-wrapper button {
  color: <?php echo esc_attr(get_theme_mod('main_nav_color','#003a71')); ?>;
  -webkit-transition: color .2s ease-out;
  -moz-transition: color .2s ease-out;
  -o-transition: color .2s ease-out;
  transition: color .2s ease-out;
}
.alt-nav-wrapper .menu > li > a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_color','#003a71')); ?>;
}
nav.top-bar.has-search .menu-search-wrapper button:hover,
nav.top-bar.has-search .menu-search-wrapper button:focus,
.top-bar .menu > li > a:hover,
.top-bar .menu > li > a:focus,
.top-bar .menu > .active > a,
.dropdown.menu .is-active > a,
nav.off-canvas .menu li a:hover,
nav.off-canvas .menu li a:focus,
nav.top-bar.has-search .menu-search-wrapper button:hover,
nav.top-bar.has-search .menu-search-wrapper button:focus {
  color: <?php echo esc_attr(get_theme_mod('main_nav_hover_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown {
  border: 1px solid <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?> !important;
  border-top: 4px solid <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?> !important;
}
.desktop-menu.menu > li > a:before {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown {
  border-color: <?php echo esc_attr(get_theme_mod('main_nav_hover_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown li,
nav.top-bar.has-search .menu-search-wrapper form#searchform {
  background: <?php echo esc_attr(get_theme_mod('main_nav_sub_bg_color','#ffffff')); ?>;
}
nav.off-canvas > .menu > li > a:after {
  border-top-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
nav.off-canvas > .menu > li.is-active > a,
nav.off-canvas .submenu li.is-active a {
  background-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.submenu-toggle::after {
  border-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?> transparent transparent;
}
.menu-icon::after,
.menu-icon:hover::after,
.menu-icon:focus::after {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
  box-shadow: 0 14px 0 <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.menu-icon::before,
.menu-icon:hover::before,
.menu-icon:focus::before {
  box-shadow: 0 7px 0 <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.highlight-bg {
  background-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.highlight-text {
  color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
/* btc = border top color */
.highlight-btc {
  border-top-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
/* bbc = border bottom color */
.highlight-bbc {
  border-bottom-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
/* blc = border left color */
.highlight-blc {
  border-left-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
/* brc = border right color */
.highlight-brc {
  border-right-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown li a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown li:hover > a,
.top-bar .menu .dropdown li:focus > a,
.top-bar .menu .dropdown li.active > a,
nav.off-canvas .menu li.active > a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_color','#FFFFFF')); ?> !important;
  background: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_bg_color','#b01f23')); ?> !important;
}
.top-bar .menu > li:after {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.above-menu-search-wrapper form#searchform :after,
.inline-social-search-wrapper form#searchform :after {
  color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.footer-container {
  background-color: <?php echo esc_attr(get_theme_mod('footer_bg_color','#FFFFFF')); ?>;
}
.footer-container .footer h6 {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_heading_color','#003a71')); ?>;
}
.footer-container .footer p, .footer-container .footer li, .footer-container .footer span, .footer-container .footer .vcard abbr {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_p_color','#000000')); ?>;
}
.footer-container .footer a,
.footer-container .footer ul.menu li a {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_a_color','#1e73be')); ?>;
}
.footer-container .footer a:hover,
.footer-container .footer a:focus,
.footer-container .footer ul.menu li a:hover,
.footer-container .footer ul.menu li a:focus,
.footer-container .footer ul.menu li.active > a {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_a_hover_color','#000000')); ?>;
}
#copyright-container {
  background: <?php echo esc_attr(get_theme_mod('copyright_bg_color','#003a71')); ?>
}
#copyright p {
  color: <?php echo esc_attr(get_theme_mod('copyright_text_color','#FFFFFF')); ?>;
}
#copyright a {
  color: <?php echo esc_attr(get_theme_mod('copyright_link_color','#FFFFFF')); ?>;
}
#copyright a:hover, #copyright a:focus {
  color: <?php echo esc_attr(get_theme_mod('copyright_link_hover_color','#FFFFFF')); ?>;
}
</style>
<?php }
add_action( 'wp_head', 'bs_customize_css', 999);
