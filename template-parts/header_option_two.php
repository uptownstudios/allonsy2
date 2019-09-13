	<?php
		/* This template file arranges the header with the logo on the left, menu
		on right, and social icons above the menu */
		$search_position = get_theme_mod('search-position');
		$hide_social = get_theme_mod('hide_header_social');
		$alt_nav = get_theme_mod('show_alt_nav');
		$menu_layout = get_theme_mod('wpt_mobile_menu_layout');
		$bs_site_width = get_theme_mod('bs_site_width'); // options are max-width-twelve-hundred, max-width-fourteen-hundred, and max-width-sixteen-hundred
	?>
	<div id="sticky-header-placeholder"></div>
	<header id="masthead" class="site-header header-option-two <?php if( get_theme_mod( 'sticky-header' ) != '') { ?>sticky-header<?php } ?>" role="banner">
		<div id="header-inner" class="<?php $bs_site_width; ?>">

			<?php get_template_part('template-parts/site-title-bar'); ?>

			<nav class="site-navigation top-bar <?php if( $search_position == 'search-menu' ) { ?>has-search<?php } ?>" role="navigation">
				<div class="top-bar-left">
					<div class="site-desktop-title top-bar-title">
						<div class="logo-wrapper hide-for-small-only">
							<?php get_template_part('template-parts/header_logo'); ?>
						</div>
					</div>
				</div>
				<div class="top-bar-right">

					<?php if( get_theme_mod('hide_header_social') == '' ): ?>
					<?php if( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('linkedin') || get_theme_mod('instagram') || get_theme_mod('youtube') || get_theme_mod('pinterest') || get_theme_mod('rss') || get_theme_mod('vimeo') || get_theme_mod('contact') ) { ?>
					<div class="top-bar-social">
						<?php get_template_part('template-parts/social-media'); ?>
						<?php if( $search_position == 'search-above-menu' ) { ?>
						<div class="above-menu-search-wrapper">
							<?php get_search_form(); ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					<?php endif; ?>

					<?php if( $hide_social != '' && $search_position == 'search-above-menu' ): ?>
						<div class="top-bar-social">
							<div class="above-menu-search-wrapper">
								<?php get_search_form(); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if( $alt_nav != '' ) : get_template_part('template-parts/alt-nav'); endif; ?>

				</div>
				<div class="top-bar-bottom">
					<?php foundationpress_top_bar_r(); ?>

					<?php if( $search_position == 'search-menu' ) { ?>
					<div class="menu-search-wrapper">
						<button class="search-toggle"><span class="fa fa-search" aria-hidden="true"></span></button>
						<?php get_search_form(); ?>
					</div>
					<?php } ?>
					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>
