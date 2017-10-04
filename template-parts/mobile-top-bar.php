<?php
/**
 * Template part for mobile top bar menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 $search_position = get_theme_mod('search-position');
 $hide_social = get_theme_mod('hide_header_social');
 $alt_nav = get_theme_mod('show_alt_nav');
?>

<nav class="mobile-menu vertical menu" id="<?php foundationpress_mobile_menu_id(); ?>" role="navigation">
  <?php foundationpress_mobile_nav(); ?>
  <?php if( $alt_nav != '' ): foundationpress_top_bar_alt(); endif; ?>
  <?php if( $hide_social == '' ): get_template_part('template-parts/social-media'); endif; ?>
  <?php if( $hide_social == '' ): get_search_form(); endif; ?>
</nav>
