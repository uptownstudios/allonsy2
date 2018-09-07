	<?php
		/* This template file arranges the header with the logo on the left, menu
		on right, and social icons above the menu */
		$search_position = get_theme_mod('search-position');
		$hide_social = get_theme_mod('hide_header_social');
		$alt_nav = get_theme_mod('show_alt_nav');
		$menu_layout = get_theme_mod('wpt_mobile_menu_layout');
	?>
	<div id="sticky-header-placeholder"></div>
	<header id="masthead" class="site-header header-option-three <?php if( get_theme_mod( 'sticky-header' ) != '') { ?>sticky-header<?php } ?>" role="banner">
		<div id="header-inner" class="max-width-twelve-hundred">
			<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
				<div class="title-bar-left">
					<div class="title-bar-title">
						<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
					</div>
					<button class="menu-icon <?php if ( $menu_layout === 'topbar' ) { ?>menu-type-topbar<?php } ?>" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"><span class="keep-together">Menu <i class="fa fa-caret-right" aria-hidden="hidden"></i></span></button>
					<!-- <span class="site-mobile-title title-bar-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span> -->
				</div>
			</div>

			<nav class="site-navigation top-bar <?php if( $search_position == 'search-menu' ) { ?>has-search<?php } ?>" role="navigation">
				<div class="top-bar-top">

					<?php if( $alt_nav ) : get_template_part('template-parts/alt-nav'); endif; ?>

					<div class="site-desktop-title top-bar-title">
						<div class="logo-wrapper hide-for-small-only">
							<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
						</div>
					</div>

					<?php if( $search_position == 'search-above-menu' ): ?>
						<div class="top-bar-social">
							<div class="above-menu-search-wrapper">
								<?php get_search_form(); ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
				<div class="top-bar-left">
					<?php foundationpress_top_bar_r(); ?>

					<?php if( $search_position == 'search-menu' ) { ?>
					<div class="menu-search-wrapper">
						<button class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></button>
						<?php get_search_form(); ?>
					</div>
					<?php } ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
				<div class="top-bar-right">

					<?php if( get_theme_mod('hide_header_social') == '' ): ?>
					<?php if( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('linkedin') || get_theme_mod('instagram') || get_theme_mod('youtube') || get_theme_mod('pinterest') || get_theme_mod('rss') || get_theme_mod('vimeo') || get_theme_mod('contact') ) { ?>
					<div class="top-bar-social">
						<?php get_template_part('template-parts/social-media'); ?>
					</div>
					<?php } ?>
					<?php endif; ?>

				</div>
			</nav>
		</div>
	</header>
