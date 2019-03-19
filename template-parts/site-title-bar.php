<?php
	$menu_layout = get_theme_mod('wpt_mobile_menu_layout');
?>
<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
	<div class="title-bar-left">
		<div class="title-bar-title">
			<?php get_template_part('template-parts/header_logo'); ?>
		</div>
		<button class="menu-icon <?php if ( $menu_layout === 'topbar' ) { ?>menu-type-topbar<?php } ?>" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>">
			<span class="menu-icon-bar menu-icon-bar-1"></span>
			<span class="menu-icon-bar menu-icon-bar-2"></span>
			<span class="menu-icon-bar menu-icon-bar-3"></span>
			<span class="keep-together">Menu <?php if ( $menu_layout === 'topbar' ) { ?><i class="fas fa-caret-down" aria-hidden="hidden"></i><?php } else { ?><i class="fas fa-caret-right" aria-hidden="hidden"></i><?php } ?></span>
		</button>
	</div>
</div>
