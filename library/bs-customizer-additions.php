<?php

// Customizer Additions
if ( ! function_exists( 'newuptown_customize_register' ) ) {
function newuptown_customize_register( $wp_customize ) {

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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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

  /* Social Media Custom Button Background Color setting */
  $wp_customize->add_setting('sm_btn_bg_color', array(
    'default' => '#b01f23',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Social Media Custom Button Background Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_btn_bg_color',array(
    'label' => __('Social Media Custom Button Background Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_btn_bg_color',
  )));
  /* Social Media Custom Button Background Hover Color setting */
  $wp_customize->add_setting('sm_btn_bg_hover_color', array(
    'default' => '#003a71',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Social Media Custom Button Background Hover Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_btn_bg_hover_color',array(
    'label' => __('Social Media Custom Button Background Hover Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_btn_bg_hover_color',
  )));

  /* Social Media Custom Button Text Color setting */
  $wp_customize->add_setting('sm_btn_text_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Social Media Custom Button Text Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_btn_text_color',array(
    'label' => __('Social Media Custom Button Text Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_btn_text_color',
  )));
  /* Social Media Custom Button Text Hover Color setting */
  $wp_customize->add_setting('sm_btn_text_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Social Media Custom Button Text Hover Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sm_btn_text_hover_color',array(
    'label' => __('Social Media Custom Button Text Hover Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'sm_btn_text_hover_color',
  )));

  /* H1 Color setting */
  $wp_customize->add_setting('heading1_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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

  /* Image Caption Color setting */
  $wp_customize->add_setting('figcaption_bg_color', array(
    'default' => '#F2F2F2',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* Image Caption Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'figcaption_bg_color',array(
    'label' => __('Image Caption BG Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'figcaption_bg_color',
  )));
  /* Image Caption Text Color setting */
  $wp_customize->add_setting('figcaption_color', array(
    'default' => '#000000',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* Image Caption Text Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'figcaption_color',array(
    'label' => __('Image Caption Font Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'figcaption_color',
  )));

  /* About the Author Color setting */
  $wp_customize->add_setting('about_author_bg_color', array(
    'default' => '#F2F2F2',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* About the Author Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'about_author_bg_color',array(
    'label' => __('About the Author BG Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'about_author_bg_color',
  )));
  /* About the Author Text Color setting */
  $wp_customize->add_setting('about_author_color', array(
    'default' => '#000000',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* About the Author Text Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'about_author_color',array(
    'label' => __('About the Author Font Color', 'allonsy2'),
    'section' => 'default_colors',
    'settings' => 'about_author_color',
  )));

  /* Highlight Color setting */
  $wp_customize->add_setting('highlight_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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

  /* Alt Nav color setting */
  $wp_customize->add_setting('alt_nav_color', array(
    'default' => '#003a71',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 9,
  ));
  /* Alt Nav color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'alt_nav_color',array(
    'label' => __('Alt Nav Menu Item Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'alt_nav_color',
  )));
  /* Alt Nav hover color setting */
  $wp_customize->add_setting('alt_nav_hover_color', array(
    'default' => '#b01f23',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Alt Nav hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'alt_nav_hover_color',array(
    'label' => __('Alt Nav Menu Item Hover Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'alt_nav_hover_color',
  )));

  /* Header #4 Top Bar color setting */
  $wp_customize->add_setting('header_4_topbar_color', array(
    'default' => '#003a71',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Header #4 Top Bar color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'header_4_topbar_color',array(
    'label' => __('Header Option 4 Top Bar BG Color', 'allonsy2'),
    'section' => 'header_colors',
    'settings' => 'header_4_topbar_color',
  )));

  /* Footer colors section */
  $wp_customize->add_section('footer_colors', array(
    'title' => __('Footer Colors', 'allonsy2'),
    'description' => __('Change the colors in the footer, such as footer background, headings, paragraph text, and link text colors.', 'allonsy2'),
    'priority' => 107,
    'panel' => 'theme-colors',
  ));

  /* Pre-Footer BG color setting */
  $wp_customize->add_setting('pre_footer_bg_color', array(
    'default' => '#CCCCCC',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Pre-Footer BG color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pre_footer_bg_color',array(
    'label' => __('Pre-Footer BG Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'pre_footer_bg_color',
  )));
  /* Pre-Footer widget heading color setting */
  $wp_customize->add_setting('pre_footer_widget_heading_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Pre-Footer widget heading color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pre_footer_widget_heading_color',array(
    'label' => __('Pre-Footer Widget Heading Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'pre_footer_widget_heading_color',
  )));
  /* Pre-Footer widget paragraph color setting */
  $wp_customize->add_setting('pre_footer_widget_p_color', array(
    'default' => '#000000',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Pre-Footer widget paragraph color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pre_footer_widget_p_color',array(
    'label' => __('Pre-Footer Widget Paragraph Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'pre_footer_widget_p_color',
  )));
  /* Pre-Footer widget link color setting */
  $wp_customize->add_setting('pre_footer_widget_a_color', array(
    'default' => '#1e73be',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* Pre-Footer widget link color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pre_footer_widget_a_color',array(
    'label' => __('Pre-Footer Widget Link Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'pre_footer_widget_a_color',
  )));
  /* Pre-Footer widget link hover color setting */
  $wp_customize->add_setting('pre_footer_widget_a_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Pre-Footer widget link hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pre_footer_widget_a_hover_color',array(
    'label' => __('Pre-Footer Widget Link Hover Color', 'allonsy2'),
    'section' => 'footer_colors',
    'settings' => 'pre_footer_widget_a_hover_color',
  )));


  /* Footer BG color setting */
  $wp_customize->add_setting('footer_bg_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
    'transport' => 'refresh',
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
  $wp_customize->add_setting( 'facebook' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
      'label' => __( 'Facebook', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'facebook',
  ) ) );

  // Add Twitter Setting
  $wp_customize->add_setting( 'twitter' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
      'label' => __( 'Twitter', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'twitter',
  ) ) );

  // Add LinkedIn Setting
  $wp_customize->add_setting( 'linkedin' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
      'label' => __( 'LinkedIn', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'linkedin',
  ) ) );

  // Add Flickr Setting
  $wp_customize->add_setting( 'flickr' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
      'label' => __( 'Flickr', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'flickr',
  ) ) );

  // Add Instagram Setting
  $wp_customize->add_setting( 'instagram' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
      'label' => __( 'Instagram', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'instagram',
  ) ) );

  // Add YouTube Setting
  $wp_customize->add_setting( 'youtube' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
      'label' => __( 'YouTube', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'youtube',
  ) ) );

  // Add Pinterest Setting
  $wp_customize->add_setting( 'pinterest' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
      'label' => __( 'Pinterest', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'pinterest',
  ) ) );

  // Add Vimeo Setting
  $wp_customize->add_setting( 'vimeo' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
      'label' => __( 'Vimeo', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'vimeo',
  ) ) );

  // Add Contact Setting
  $wp_customize->add_setting( 'contact' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact', array(
      'label' => __( 'Contact', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'contact',
  ) ) );

  // Add RSS Setting
  $wp_customize->add_setting( 'rss' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
      'label' => __( 'RSS', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'rss',
  ) ) );

  // Add Custom Button Setting
  $wp_customize->add_setting( 'custom' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom', array(
      'label' => __( 'Custom Button', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'custom',
  ) ) );
  $wp_customize->add_setting( 'custom-text' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom-text', array(
      'label' => __( 'Custom Button Text', 'allonsy2' ),
      'section' => 'social-media',
      'settings' => 'custom-text',
  ) ) );


  // Add General Settings Section
  $wp_customize->add_section( 'general-settings' , array(
    'title' => __( 'General Settings', 'allonsy2' ),
    'priority' => 35,
  ) );
  // Show/Hide A11y Toolbar
  $wp_customize->add_setting( 'show-a11y-toolbar' , array( 'default' => '', 'transport' => 'refresh' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show-a11y-toolbar', array(
      'label' => __( 'Show Accessibility Toolbar?', 'allonsy2' ),
      'section' => 'general-settings',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the accessibility toolbar',
  ) ) );
  // A11y Position
  $wp_customize->add_setting( 'a11y-position' , array( 'default' => 'a11y-left', 'transport' => 'refresh' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'a11y-position', array(
      'label' => __( 'Accessibility Toolbar Position', 'allonsy2' ),
      'section' => 'general-settings',
      'type' => 'radio',
      'choices' => array(
        'a11y-left' => 'On the left',
        'a11y-right' => 'On the right',
      ),
      'description' => 'Select the position of the accessibility toolbar',
  ) ) );

  // A11y Skip to navigation ID
  $wp_customize->add_setting( 'skip-to-nav' , array( 'default' => '', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'skip-to-nav', array(
      'label' => __( 'Skip to navigation ID', 'allonsy2' ),
      'section' => 'general-settings',
      'settings' => 'skip-to-nav',
      'description' => 'Input the container ID for the navigation. Be sure to include the hash symbol as well! (ex. #main-nav)',
  ) ) );

  // A11y Skip to content ID
  $wp_customize->add_setting( 'skip-to-content' , array( 'default' => '#main-container', 'transport' => 'postMessage' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'skip-to-content', array(
      'label' => __( 'Skip to content ID', 'allonsy2' ),
      'section' => 'general-settings',
      'settings' => 'skip-to-content',
      'description' => 'Input the container ID for the main content section. Be sure to include the hash symbol as well! (ex. #main-container)',
  ) ) );

  // Loading Animation
  $wp_customize->add_setting( 'loading-animation' , array( 'default' => '', 'transport' => 'postMessage' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'loading-animation', array(
      'label' => __( 'Enable the loading animation?', 'allonsy2' ),
      'section' => 'general-settings',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the page loading animation',
  ) ) );
  // Loading Animation Image URL
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

  // Show Cart Button in Alt Nav
  if ( class_exists( 'WooCommerce' ) ) {

    $wp_customize->add_setting( 'cart_in_alt_nav' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cart_in_alt_nav', array(
        'label' => __( 'Show Cart Button in Alt Nav?', 'allonsy2' ),
        'section' => 'header-options',
        'type' => 'checkbox',
        'description' => 'Check this box to show the cart button to alt nav',
    ) ) );

  }

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
        'menu-right' => 'Option 1 - Logo Left, Menu Right',
        'menu-bottom' => 'Option 2 - Logo Left, Menu Bottom',
        'menu-center' => 'Option 3 - Logo Center, Menu Bottom & Center',
        'menu-top-bottom' => 'Option 4 - Logo Left, Menu Right, Alt Nav & Social on Top',
      ),
  ) ) );

  // Footer Options
  $wp_customize->add_section( 'footer-options' , array(
    'title' => __( 'Footer Options', 'allonsy2' ),
    'priority' => 41,
    'description' => __( 'Choose options for the footer.', 'allonsy2' )
  ) );

  // Pre-Footer
  $wp_customize->add_setting( 'pre-footer-widgets' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pre-footer-widgets', array(
      'label' => __( 'Pre-Footer?', 'allonsy2' ),
      'description' => 'Check this box to enable the pre-footer widget area, which will be an include on all pages.',
      'section' => 'footer-options',
      'type' => 'checkbox'
  ) ) );

  // Footer Columns
  $wp_customize->add_setting( 'footer-columns' , array( 'default' => 'columns-4' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-columns', array(
      'label' => __( 'Footer Columns', 'allonsy2' ),
      'section' => 'footer-options',
      'type' => 'radio',
      'choices' => array(
        'columns-1' => '1 Column',
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
        'bs-default-image' => 'Default Image',
        'bs-default-bar' => 'Default Image with Title &amp; Meta Info',
        'bs-hide-title-bar' => 'Hide Title Bar'
      ),
  ) ) );

  // Default Title Bar Image URL
  $wp_customize->add_setting( 'default-title-bar-image' , array( 'default' => '','sanitize_callback' => 'esc_url_raw', 'transport' => 'refresh' ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default-title-bar-image', array(
      'label' => __( 'Default Title Bar Image', 'allonsy2' ),
      'description' => 'This image will be used if no featured image is selected, and in other areas where there can be no featured image selected (such as in search results and on single portfolio pages).',
      'section' => 'internal-pages',
      'settings' => 'default-title-bar-image',
  ) ) );
  // Breadcrumb Separator
  $wp_customize->add_setting( 'default-title-bar-repeat' , array( 'default' => 'no-repeat' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default-title-bar-repeat', array(
      'label' => __( 'Default Title Bar Image Tiling', 'allonsy2' ),
      'section' => 'internal-pages',
      'type' => 'radio',
      'choices' => array(
        'no-repeat' => 'No Repeat',
        'repeat' => 'Repeat (tile the image)',
        'repeat-x' => 'Repeat only along X axis',
        'repeat-y' => 'Repeat only along Y axis'
      ),
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
  // Blog Page Layout
  $wp_customize->add_setting( 'blog-page-layout' , array( 'default' => 'blog-sidebar-right' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-page-layout', array(
      'label' => __( 'Blog Page Layout', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'blog-sidebar-right' => 'Sidebar Right',
        'blog-sidebar-left' => 'Sidebar Left',
        'blog-full-width' => 'Full Width, No Sidebar',
        'blog-narrow-content' => 'No Sidebar, Narrow Content',
      ),
  ) ) );
  // Blog Items Layout
  $wp_customize->add_setting( 'blog-posts-layout' , array( 'default' => 'bs-blog-loop-list-large' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-posts-layout', array(
      'label' => __( 'Blog Posts Layout', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'bs-blog-loop-list-large' => 'List (large thumbnail)',
        'bs-blog-loop-list' => 'List (small thumbnail)',
        'bs-blog-loop-grid' => 'Grid (masonry)',
        'bs-blog-loop-grid-standard' => 'Grid (standard)',
      ),
  ) ) );
  // Blog Content Style
  $wp_customize->add_setting( 'blog-content-style' , array( 'default' => 'bs-blog-excerpt' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-content-style', array(
      'label' => __( 'Blog Content Style', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'bs-blog-content' => 'Show "The Content"',
        'bs-blog-excerpt' => 'Show "The Excerpt"',
        'bs-blog-no-excerpt' => 'Show Neither',
      ),
  ) ) );
  // Blog Excerpt Length
  $wp_customize->add_setting( 'blog-excerpt-length' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog-excerpt-length', array(
      'label' => __( 'Blog Post Excerpt Length', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'text',
      'description' => 'Input a number here to indicate the number of words each post excerpt should have. (default: 45)',
  ) ) );
  // Blog Single Post Layout
  $wp_customize->add_setting( 'single-post-layout' , array( 'default' => 'single-sidebar-right' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single-post-layout', array(
      'label' => __( 'Single Posts Layout', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'single-sidebar-right' => 'Sidebar Right',
        'single-sidebar-left' => 'Sidebar Left',
        'single-full-width' => 'Full Width, No Sidebar',
        'single-narrow-content' => 'No Sidebar, Narrow Content',
      ),
  ) ) );

  // Disable About The Author
  $wp_customize->add_setting( 'about-the-author' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about-the-author', array(
      'label' => __( 'Disable About the Author?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to disable the about the auther section on single blog posts.',
  ) ) );
  // Disable Author Avatar
  $wp_customize->add_setting( 'author-avatar' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'author-avatar', array(
      'label' => __( 'Hide the Author\'s Avatar?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to hide the author avatar in the about the auther section on single blog posts.',
  ) ) );
  // Show Post Tags
  $wp_customize->add_setting( 'show-post-tags' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show-post-tags', array(
      'label' => __( 'Show the post tags?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to show post tags on single blog posts.',
  ) ) );
  // Show Social Share Buttons
  $wp_customize->add_setting( 'show-share-buttons' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show-share-buttons', array(
      'label' => __( 'Show the social share buttons?', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'checkbox',
      'description' => 'Check this box to show social share buttons on single blog posts.',
  ) ) );
  // Social Share Buttons Position
  $wp_customize->add_setting( 'share-buttons-position' , array( 'default' => 'top' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'share-buttons-position', array(
      'label' => __( 'Social Share Buttons Position', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        'top' => 'Above the content',
        'bottom' => 'Below the content'
      ),
  ) ) );
  // Social Share Buttons Count
  $wp_customize->add_setting( 'share-buttons-count' , array( 'default' => '1' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'share-buttons-count', array(
      'label' => __( 'Social Share Buttons Count', 'allonsy2' ),
      'section' => 'blog-options',
      'type' => 'radio',
      'choices' => array(
        '1' => 'Show the number of shares',
        '0' => 'Hide the number of shares'
      ),
  ) ) );

  // WooCommerce Layout Options
  if ( class_exists( 'WooCommerce' ) ) {

    $wp_customize->add_setting( 'shop-layout' , array( 'default' => 'sidebar-right' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shop-layout', array(
        'label' => __( 'Shop Page Layout', 'allonsy2' ),
        'section' => 'woocommerce_product_catalog',
        'type' => 'radio',
        'choices' => array(
          'sidebar-right' => 'Sidebar Right',
          'sidebar-left' => 'Sidebar Left',
          'full-width' => 'Full Width, No Sidebar',
          'narrow-content' => 'No Sidebar, Narrow Content',
        ),
    ) ) );

    $wp_customize->add_setting( 'show_related' , array( 'default' => 'show-related' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_related', array(
        'label' => __( 'Show related products?', 'allonsy2' ),
        'section' => 'woocommerce_product_catalog',
        'type' => 'radio',
        'description' => 'Choose whether to show or hide related products at the bottom of each single product page',
        'choices' => array(
          'show-related' => 'Show',
          'hide-related' => 'Hide',
        ),
    ) ) );

  }

  // Add Copyright Section
  $wp_customize->add_section( 'copyright-text' , array(
    'title' => __( 'Copyright Text', 'allonsy2' ),
    'priority' => 1000,
    'description' => __( 'Enter the copyright text to appear at the bottom of the page. Do not include the copyright symbol or the year as these are added automatically to the beginning of this line.', 'allonsy2' )
  ) );

  // Add Copyright Text Field
  $wp_customize->add_setting( 'copyright' , array( 'default' => '', 'transport' => 'postMessage' ) );
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
  $wp_customize->add_setting( 'analytics' , array( 'default' => '', 'transport' => 'postMessage' ) );
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
header#masthead, .top-bar, .top-bar ul.social-media-wrapper, .top-bar-left, .top-bar-right, .top-bar-top, .top-bar-bottom {
  background-color: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?>;
}
@media only screen and (max-width: 40rem) {
  header#masthead .title-bar {
    background-color: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?> !important;
  }
  .off-canvas.position-right {
    background-color: <?php echo esc_attr(get_theme_mod('header_color','#FFFFFF')); ?>;
  }
}
#main-container p, #main-container li, #main-container span, #main-container time {
  color: <?php echo esc_attr(get_theme_mod('paragraph_color','#272e31')); ?>;
}
a, .breadcrumbs a, .woocommerce .woocommerce-breadcrumb a, ul.pagination li a {
  color: <?php echo esc_attr(get_theme_mod('link_color','#1e73be')); ?>;
  -webkit-transition: color .2s ease-out;
  -moz-transition: color .2s ease-out;
  -o-transition: color .2s ease-out;
  transition: color .2s ease-out;
}
a:hover, a:focus, .breadcrumbs a:hover, .breadcrumbs a:focus, .woocommerce .woocommerce-breadcrumb a:hover, .woocommerce .woocommerce-breadcrumb a:focus, ul.pagination li a:hover, ul.pagination li a:focus {
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
header#masthead ul.social-media-wrapper li.custom-button a,
nav.off-canvas ul.social-media-wrapper li.custom-button a,
.alt-nav-my-cart a {
  color: <?php echo esc_attr(get_theme_mod('sm_btn_text_color','#FFFFFF')); ?> !important;
  background: <?php echo esc_attr(get_theme_mod('sm_btn_bg_color','#b01f23')); ?> !important;
  -webkit-transition: background .2s ease-out;
  -moz-transition: background .2s ease-out;
  -o-transition: background .2s ease-out;
  transition: background .2s ease-out;
}
header#masthead ul.social-media-wrapper li.custom-button a:hover,
header#masthead ul.social-media-wrapper li.custom-button a:focus,
nav.off-canvas ul.social-media-wrapper li.custom-button a:hover,
nav.off-canvas ul.social-media-wrapper li.custom-button a:focus,
.alt-nav-my-cart a:hover,
.alt-nav-my-cart a:focus {
  color: <?php echo esc_attr(get_theme_mod('sm_btn_text_hover_color','#FFFFFF')); ?> !important;
  background: <?php echo esc_attr(get_theme_mod('sm_btn_bg_hover_color','#003a71')); ?> !important;
}
.top-bar-my-cart a span.cart-contents,
.alt-nav-my-cart a span.cart-contents {
  background: <?php echo esc_attr(get_theme_mod('sm_btn_text_color','#FFFFFF')); ?> !important;
  color: <?php echo esc_attr(get_theme_mod('sm_btn_bg_color','#b01f23')); ?> !important;
}
.top-bar-my-cart a:hover span.cart-contents,
.top-bar-my-cart a:focus span.cart-contents,
.alt-nav-my-cart a:hover span.cart-contents,
.alt-nav-my-cart a:focus span.cart-contents {
  background: <?php echo esc_attr(get_theme_mod('sm_btn_text_hover_color','#FFFFFF')); ?> !important;
  color: <?php echo esc_attr(get_theme_mod('sm_btn_bg_hover_color','#003a71')); ?> !important;
}
#main-container h1, #main-container h1 span {
  color: <?php echo esc_attr(get_theme_mod('heading1_color','#003a71')); ?>;
}
#main-container h2, #main-container h2 span {
  color: <?php echo esc_attr(get_theme_mod('heading2_color','#003a71')); ?>;
}
#main-container h3, #main-container h3 span {
  color: <?php echo esc_attr(get_theme_mod('heading3_color','#003a71')); ?>;
}
#main-container h4, #main-container h4 span {
  color: <?php echo esc_attr(get_theme_mod('heading4_color','#003a71')); ?>;
}
#main-container h5, #main-container h5 span {
  color: <?php echo esc_attr(get_theme_mod('heading5_color','#003a71')); ?>;
}
#main-container h6, #main-container h6 span {
  color: <?php echo esc_attr(get_theme_mod('heading6_color','#003a71')); ?>;
}
#main-container h1.entry-title {
  color: <?php echo esc_attr(get_theme_mod('pagetitle_color','#003a71')); ?>;
}
#main-container .featured-hero-title-bar h1.entry-title,
#main-container .featured-hero-title-bar time,
#main-container .featured-hero-title-bar p.bs-post-date,
#main-container .featured-hero-title-bar p.bs-post-cats,
#main-container .featured-hero-title-bar p.byline.author,
#main-container .featured-hero-title-bar p.bs-post-comments,
#main-container .featured-hero-title-bar p.search-query,
#main-container .featured-hero-title-bar ul li,
#main-container .featured-hero-title-bar span,
#main-container .featured-hero-title-bar a {
  color: <?php echo esc_attr(get_theme_mod('titlebar_color','#FFFFFF')); ?>;
}
#main-container .about-the-author-wrap {
  background-color: <?php echo esc_attr(get_theme_mod('about_author_bg_color','#F2F2F2')); ?>;
}
#main-container .about-the-author-wrap .author-description p,
#main-container .about-the-author-wrap .author-description p strong {
  color: <?php echo esc_attr(get_theme_mod('about_author_color','#000000')); ?>;
}
.entry-content figure.wp-caption figcaption.wp-caption-text {
  background-color: <?php echo esc_attr(get_theme_mod('figcaption_bg_color','#F2F2F2')); ?>;
  color: <?php echo esc_attr(get_theme_mod('figcaption_color','#000000')); ?>;
}
.top-bar .top-bar-bottom, ul.desktop-menu,
ul.desktop-menu + .menu-search-wrapper, .desktop-menu + .menu-search-wrapper button.search-toggle {
  background-color: <?php echo esc_attr(get_theme_mod('main_nav_bar_bg_color','#FFFFFF')); ?> !important;
}
header#masthead.header-option-two ul.desktop-menu,
header#masthead.header-option-three ul.desktop-menu {
  position: relative;
}
header#masthead.header-option-two ul.desktop-menu:before,
header#masthead.header-option-two ul.desktop-menu:after,
header#masthead.header-option-three ul.desktop-menu:before,
header#masthead.header-option-three ul.desktop-menu:after {
  background-color: <?php echo esc_attr(get_theme_mod('main_nav_bar_bg_color','#FFFFFF')); ?> !important;
  content: '';
  display: block;
  height: 100%;
  position: absolute;
  right: 100%;
  width: 100%;
}
header#masthead.header-option-two ul.desktop-menu:after,
header#masthead.header-option-three ul.desktop-menu:after {
  left: 100%;
  right: auto;
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
nav.off-canvas ul.menu li.current_page_parent a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_hover_color','#003a71')); ?>;
}
.alt-nav-wrapper .menu > li > a {
  color: <?php echo esc_attr(get_theme_mod('alt_nav_color','#003a71')); ?> !important;
}
.alt-nav-wrapper .menu > li > a:hover,
.alt-nav-wrapper .menu > li > a:focus {
  color: <?php echo esc_attr(get_theme_mod('alt_nav_hover_color','#b01f23')); ?> !important;
}
header#masthead.header-option-four .top-bar-top,
header#masthead.header-option-four .top-bar-top:before,
header#masthead.header-option-four .top-bar-top:after {
  background-color: <?php echo esc_attr(get_theme_mod('header_4_topbar_color','#003a71')); ?> !important;
}
@media only screen and (min-width: 641px) {
  body.sticky-header header#masthead.sticky-header {
    border-bottom: 0.125rem solid <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?> !important;
  }
}
nav.top-bar.has-search .menu-search-wrapper button:hover,
nav.top-bar.has-search .menu-search-wrapper button:focus,
.top-bar .menu > li > a:hover,
.top-bar .menu > li > a:focus,
.top-bar .menu > .active > a,
.top-bar .desktop-menu > li.current-menu-item > a,
.top-bar .desktop-menu > li.current-menu-parent > a,
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
.desktop-menu.menu > li > a:before,
nav.off-canvas .submenu-toggle {
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
  background-color: <?php echo esc_attr(get_theme_mod('main_nav_hover_color','#b01f23')); ?>;
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
header#masthead form#searchform {
  background-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown li a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_color','#b01f23')); ?>;
}
.top-bar .menu .dropdown li > a:focus,
.top-bar .menu .dropdown li > a:hover,
.top-bar .menu .dropdown li:hover > a,
.top-bar .menu .dropdown li:focus > a,
.top-bar .menu .dropdown li.active > a,
.top-bar .menu .dropdown li.current-menu-item > a,
nav.off-canvas ul.menu li.active > a,
nav.off-canvas ul.menu li.current_page_parent > a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_color','#FFFFFF')); ?> !important;
  background: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_bg_color','#b01f23')); ?> !important;
}
.top-bar .menu > li:after {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.above-menu-search-wrapper form#searchform:after,
.inline-social-search-wrapper form#searchform:after,
.menu-search-wrapper form#searchform:after {
  border-bottom-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?> !important;
}
nav.top-bar .menu-search-wrapper form#searchform {
  background-color: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
.pre-footer-container {
  background-color: <?php echo esc_attr(get_theme_mod('pre_footer_bg_color','#CCCCCC')); ?>;
}
.pre-footer-container .pre-footer h1,
.pre-footer-container .pre-footer h2,
.pre-footer-container .pre-footer h3,
.pre-footer-container .pre-footer h4,
.pre-footer-container .pre-footer h5,
.pre-footer-container .pre-footer h6 {
  color: <?php echo esc_attr(get_theme_mod('pre_footer_widget_heading_color','#003a71')); ?>;
}
.pre-footer-container .pre-footer p, .pre-footer-container .pre-footer li, .pre-footer-container .pre-footer span, .pre-footer-container .pre-footer .vcard abbr {
  color: <?php echo esc_attr(get_theme_mod('pre_footer_widget_p_color','#000000')); ?>;
}
.pre-footer-container .pre-footer a,
.pre-footer-container .pre-footer ul.menu li a {
  color: <?php echo esc_attr(get_theme_mod('pre_footer_widget_a_color','#1e73be')); ?>;
}
.pre-footer-container .pre-footer a:hover,
.pre-footer-container .pre-footer a:focus,
.pre-footer-container .pre-footer ul.menu li a:hover,
.pre-footer-container .pre-footer ul.menu li a:focus,
.pre-footer-container .pre-footer ul.menu li.active > a {
  color: <?php echo esc_attr(get_theme_mod('pre_footer_widget_a_hover_color','#000000')); ?>;
}
.footer-container {
  background-color: <?php echo esc_attr(get_theme_mod('footer_bg_color','#FFFFFF')); ?>;
}
.footer-container .footer h1,
.footer-container .footer h2,
.footer-container .footer h3,
.footer-container .footer h4,
.footer-container .footer h5,
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
#back-top a,
#back-top a:hover,
#back-top a:focus {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#b01f23')); ?>;
}
</style>
<?php }
add_action( 'wp_head', 'bs_customize_css', 999);
