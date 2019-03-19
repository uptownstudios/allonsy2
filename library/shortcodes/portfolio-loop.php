<?php
add_shortcode( 'portfolio_loop', 'bs_portfolio_loop' );
function bs_portfolio_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'grid', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'hide_filters' => '0', // Show/hide filters
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '0', // Show/hide the excerpt
			'id' => '', // Unique identifier for the shortcode (useful if there are two on the same page)
    ), $atts, 'bs_portfolio_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$hide_filters = $args['hide_filters'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];
		$unique_id = $args['id'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		if( $cat ) {
			$custom_query_args = array(
				'post_type' => 'bs_portfolio',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'bs_portfolio',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 portfolio-display-grid grid-cols-<?php echo $grid_cols; ?> portfolio-page-thumbs-wrapper" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 portfolio-display-list portfolio-page-thumbs-wrapper" role="main">

			<?php endif;

				$taxonomy = 'portfolio-cat';
				$tax_terms = get_terms($taxonomy);
				$all_terms;
				$filterText = '';
				$default_backup = get_stylesheet_directory_uri() . '/src/assets/images/default-title-bar-image.jpg';

			if( $hide_filters === '0' ) { ?>
				<div class="portfolio-filter-toggle"><a href="#" title="View All Portfolio Categories">+ Portfolio Categories</a></div>
				<ul id="filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?>" class="filter-portfolio-category option-set filter">
					<!-- <li class="filter-label">Filter portfolio:</li> -->
					<?php
						foreach ($tax_terms as $tax_term) {
							$filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a></li>';
							// $filterText .= '<li>' . '<a href="#" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" data-filter=".' . $tax_term->slug . '" ' . '>' . $tax_term->name.'</a><span class="term-num">' . $tax_term->count . '</span></li>';
							// $all_terms += $tax_term->count;
						}
						$filterText = '<li><a class="active" href="#" data-filter="*">All</a></li>' . $filterText;
						echo $filterText;
					?>
				</ul>
			<?php } ?>
			<?php /* Start loop */ ?>
			<div class="lazy-isotope-wrapper">
				<div class="portfolio-container <?php if( $unique_id ) { echo 'portfolio-container-' . $unique_id; } ?> bs-isotope lazy-isotope ">
					<?php
						while ( $bs_query->have_posts()) : $bs_query->the_post();
						$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

						if( $display === 'grid' ):
					?>
						<div id="post-<?php the_ID(); ?>" class="single-portfolio-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<a href="<?php the_permalink();?>" class="single-portfolio-link" title="<?php the_title();?>">
								<section class="portfolio-content">
									<h4 class="portfolio-title"><?php the_title(); ?></h4>
									<ul class="portfolio-category"><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
									<img data-src="<?php echo $image_url; ?>" class="lazyload portfolio-thumbnail" alt="<?php the_title();?> portfolio thumbnail" />
								</section>
							</a>
						</div>
					<?php endif;
					if( $display === 'list' ): ?>
						<div id="post-<?php the_ID(); ?>" class="single-portfolio-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<div class="portfolio-thumbnail">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<img data-src="<?php echo $image_url; ?>" class="lazyload portfolio-thumbnail" alt="<?php the_title();?> portfolio thumbnail" />
								</a>
							</div>
							<div class="portfolio-content">
								<h3 class="portfolio-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
								<ul class="portfolio-category"><li><i class="far fa-sitemap"></i></li><?php $terms = get_the_terms( $post->ID , 'portfolio-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php if( $show_excerpt ): ?>
									<div class="portfolio-excerpt"><?php the_excerpt(); ?></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; endwhile; // End the loop ?>
					<script>
						jQuery(document).ready(function($) {
							// cache container
							var $container = $('.portfolio-container<?php if( $unique_id ) { echo '-' . $unique_id; } ?>');
							// filter items when filter link is clicked
							$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a').click(function(){
								var selector = $(this).attr('data-filter');
								$container.isotope({ filter: selector });
								$('#filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?> a.active').not(this).removeClass('active');
								$(this).addClass('active');
								return false;
							});
						});
					</script>
				</div>
			</div>
			<?php if ( $pagination ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			} ?>
		</div>
		<?php	endif; wp_reset_postdata(); $myvariable = ob_get_clean(); return $myvariable; ?>
	<?php
}
