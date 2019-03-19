<?php
add_shortcode( 'staff_loop', 'bs_staff_loop' );
function bs_staff_loop( $atts ) {
    $args = shortcode_atts( array(
			'ppp' => '-1', // Posts per page
			'cat' => '', // Show a single category, or multiple by comma separating the ID numbers
			'display' => 'list', // Display as a "list" or leave blank (default is a "grid")
			'grid_cols' => '3', // Select grid columns. Min: 1. Max: 4.
			'pagination' => '0', // Will paginate after the designated number of posts set in 'ppp'
			'show_excerpt' => '1', // Show/hide the excerpt
			'hide_filters' => '0',
			'id' => '',
    ), $atts, 'bs_staff_loop' );
    ob_start();

		global $post;
		$display = $args['display'];
		$grid_cols = $args['grid_cols'];
		$cat = $args['cat'];
		$ppp = $args['ppp'];
		$pagination = $args['pagination'];
		$show_excerpt = $args['show_excerpt'];
		$hide_filters = $args['hide_filters'];
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
				'post_type' => 'staff',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
	      'posts_per_page' => $ppp,
				'tax_query' => array(
					array(
						'taxonomy' => 'staff-cat',
						'field' => 'slug',
						'terms' => $cat,
					),
				),
			);
		} else {
			$custom_query_args = array(
				'post_type' => 'staff',
				'status' => 'published',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $ppp,
			);
		}
    $bs_query = new WP_Query( $custom_query_args );

		if( $bs_query->have_posts()):

			if( $display === 'grid' ): ?>

				<div class="small-12 large-12 staffs-wrapper staffs-display-grid grid-cols-<?php echo $grid_cols; ?>" role="main">

			<?php endif; if( $display === 'list' ): ?>

				<div class="small-12 large-12 staffs-wrapper staffs-display-list" role="main">

			<?php endif;

				$taxonomy = 'staff-cat';
				$tax_terms = get_terms($taxonomy);
				$all_terms;
				$filterText = '';

			if( $hide_filters === '0' ) { ?>
				<div class="staff-filter-toggle"><a href="#" title="View All  Departments">+ Department Categories</a></div>
				<ul id="filters<?php if( $unique_id ) { echo '-' . $unique_id; } ?>" class="filter-staff-category option-set filter">
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
				<div class="staffs-container bs-isotope lazy-isotope">
					<?php
						while ( $bs_query->have_posts()) : $bs_query->the_post();
						$image_url = get_the_post_thumbnail_url( get_the_id(), 'full' );
						$staff_position = get_post_meta( $post->ID, '_staff_title', true );
						$staff_email = get_post_meta( $post->ID, '_staff_email', true );
						$staff_phone = get_post_meta( $post->ID, '_staff_phone', true );
						if( $display === 'grid' ):
					?>
						<div id="post-<?php the_ID(); ?>" class="single-staff-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'staff-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<a href="<?php the_permalink();?>" class="single-staff-link" title="<?php the_title();?>">
								<section class="staff-content">
									<h4 class="staff-title"><?php the_title(); ?></h4>
									<?php /*
									<?php $terms = get_the_terms( $post->ID , 'staff-cat' );
									if( $terms ): ?><ul class="staff-category"><?php foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
									*/ ?>
									<?php if( $staff_position ): ?><ul class="staff-category"><?php echo '<li class="staff-position">' . $staff_position . '</li>'; endif; ?></ul>
									<?php /* endif; */
									if( has_post_thumbnail() ): ?><img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="staff-thumbnail" alt="<?php the_title();?> staff thumbnail" /><?php endif; ?>
								</section>
							</a>
						</div>
					<?php endif;
					if( $display === 'list' ): ?>
						<div id="post-<?php the_ID(); ?>" class="single-staff-item bs-isotope-item <?php $terms = get_the_terms( $post->ID , 'staff-cat' ); foreach ( $terms as $term ) { echo $term->slug . ' '; } ?> ">
							<div class="staff-thumbnail">
								<?php if( has_post_thumbnail() ): ?>
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
										<img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="staff-thumbnail" alt="<?php the_title();?> staff thumbnail" />
									</a>
								<?php endif; ?>
							</div>
							<div class="staff-content">
								<h3 class="staff-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h3>
								<?php if( $staff_position ): echo '<p class="staff-meta staff-position"><i class="far fa-bookmark"></i> ' . $staff_position . '</p>'; endif; ?>
								<?php if( $staff_email ): echo '<p class="staff-meta staff-email"><i class="far fa-envelope"></i> ' . $staff_email . '</p>'; endif; ?>
								<?php if( $staff_phone ): echo '<p class="staff-meta staff-phone"><i class="far fa-phone"></i> ' . $staff_phone . '</p>'; endif; ?>
								<?php $terms = get_the_terms( $post->ID , 'staff-cat' );
								if ( $terms ): ?>
									<ul class="staff-category"><li><i class="far fa-building"></i></li><?php foreach ( $terms as $term ) { echo '<li class="cat-name">' . $term->name . '</li>'; } ?></ul>
								<?php endif; ?>
								<?php if( $show_excerpt ): ?>
									<div class="staff-excerpt"><?php the_excerpt(); ?></div>
								<?php endif; ?>
								<div class="staff-footer">
									<a class="staff-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
								</div>
							</div>
						</div>
					<?php endif; endwhile; // End the loop ?>
					<script>
						jQuery(document).ready(function($) {
							// cache container
							var $container = $('.staffs-container<?php if( $unique_id ) { echo '-' . $unique_id; } ?>');
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
