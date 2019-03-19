<?php
add_shortcode( 'services_loop', 'bs_services_loop' );
function bs_services_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'list', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '1', // Show/hide the excerpt
    ), $atts, 'bs_services_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		if( $cat ) {
			$custom_query_args = array(
				'post_type' => 'service',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'service-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'service',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 services-wrapper services-display-grid grid-cols-<?php echo $grid_cols; ?>" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 services-wrapper services-display-list" role="main">

			<?php endif; ?>
			<?php /* Start loop */ ?>
			<div class="services-container">
				<?php
					while ( $bs_query->have_posts()) : $bs_query->the_post();
					$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

					if( $display === 'grid' ):
				?>
					<div id="post-<?php the_ID(); ?>" class="single-service-item">
						<a href="<?php the_permalink();?>" class="single-service-link" title="<?php the_title();?>">
							<section class="service-content">
								<h4 class="service-title"><?php the_title(); ?></h4>
								<ul class="service-category"><?php $terms = get_the_terms( $post->ID , 'service-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php if( has_post_thumbnail() ): ?><img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="service-thumbnail" alt="<?php the_title();?> service thumbnail" /><?php endif; ?>
							</section>
						</a>
					</div>
				<?php endif;
				if( $display === 'list' ): ?>
					<div id="post-<?php the_ID(); ?>" class="single-service-item">
						<div class="service-thumbnail">
							<?php if( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="service-thumbnail" alt="<?php the_title();?> service thumbnail" />
								</a>
							<?php endif; ?>
						</div>
						<div class="service-content">
							<h3 class="service-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
							<ul class="service-category"><li><i class="far fa-sitemap"></i></li><?php $terms = get_the_terms( $post->ID , 'service-cat' ); foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
							<?php if( $show_excerpt ): ?>
								<div class="service-excerpt"><?php the_excerpt(); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; endwhile; // End the loop ?>
			</div>
			<?php if ( $pagination ) {
				custom_pagination($bs_query->max_num_pages,"",$paged);
			} ?>
		</div>
		<?php	endif; wp_reset_postdata(); $myvariable = ob_get_clean(); return $myvariable; ?>
	<?php
}
