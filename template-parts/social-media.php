			<ul class="social-media-wrapper">
				<?php $search_position = get_theme_mod('search-position'); if( $search_position == 'search-social-menu' ) { ?>
				<li class="inline-social-search-wrapper">
					<?php get_search_form(); ?>
				</li>
				<?php } ?>
				<?php if( get_theme_mod('twitter')): ?><li class="twitter"><a href="<?php echo get_theme_mod('twitter','default'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('facebook')): ?><li class="facebook"><a href="<?php echo get_theme_mod('facebook','default'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('linkedin')): ?><li class="linkedin"><a href="<?php echo get_theme_mod('linkedin','default'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('flickr')): ?><li class="flickr"><a href="<?php echo get_theme_mod('flickr','default'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('instagram')): ?><li class="instagram"><a href="<?php echo get_theme_mod('instagram','default'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('youtube')): ?><li class="youtube"><a href="<?php echo get_theme_mod('youtube','default'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('pinterest')): ?><li class="pinterest"><a href="<?php echo get_theme_mod('pinterest','default'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('vimeo')): ?><li class="vimeo"><a href="<?php echo get_theme_mod('vimeo','default'); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('contact')): ?><li class="contact"><a href="<?php echo get_theme_mod('contact','default'); ?>"><i class="fa fa-envelope-o"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('rss')): ?><li class="rss"><a href="<?php echo get_theme_mod('rss','default'); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php endif; ?>
				<?php if( get_theme_mod('custom')): ?><li class="custom-button"><a href="<?php echo get_theme_mod('custom','default'); ?>" target="_blank"><?php echo get_theme_mod('custom-text','default'); ?></a></li><?php endif; ?>
			</ul>
