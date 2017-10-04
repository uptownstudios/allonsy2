<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'team', 'posts_per_page' => 9, 'paged' => $paged );
$loop = new WP_Query( $args );

?>
			<?php if ( $loop->have_posts()) : while ( $loop->have_posts()) : $loop->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('index-card bs-isotope-item single-team-member'); ?>>
					<div class="entry-content">
						<div class="team-featured-image">
							<figure>
								<a class="<?php echo $post->post_name; ?>" href="#"><?php the_post_thumbnail(); ?></a>
								<figcaption><?php the_field('tm_job_title'); ?></figcaption>
							</figure>
						</div>
						<div class="team-title-excerpt">
							<h3><a href="#" class="<?php echo $post->post_name; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<h4 class="fun-title">A.K.A. <?php the_field('tm_fun_title'); ?></h4>
							<?php the_excerpt(); ?>
							<?php $name = get_the_title(); $firstname = explode(' ',$name); ?>
							<a href="#" class="<?php echo $post->post_name; ?>" title="<?php the_title(); ?>">Learn More about <?php echo $firstname[0]; ?> &raquo;</a>
							<div class="team-social-icons">
								<?php if( have_rows('tm_social_media_links') ): ?>
									<ul class="tm-sm-links">
									<?php while( have_rows('tm_social_media_links') ): the_row();
										$smnetwork = get_sub_field_object('tm_social_network');
										$smvalue = get_sub_field('tm_social_network');
										$smlabel = $smnetwork['choices'][$smvalue];
										$smurl = get_sub_field('tm_profile_url');
									?>
										<li class="tm-sm-link">
											<a href="<?php echo $smurl; ?>" title="Find <?php echo the_title(); ?> on <?php echo $smlabel; ?>" target="_blank"><i class="fa <?php echo $smvalue; ?>"></i></a>
										</li>
									<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</article>
				<div class="team-member-modal-wrapper <?php echo $post->post_name; ?>">
					<div class="team-member-modal-overlay"></div>
					<div class="team-member-modal-inner">
						<a class="team-close" href="#"><i class="fa fa-times"></i></a>
						<div class="team-featured-image">
							<figure>
								<?php the_post_thumbnail(); ?>
								<figcaption><?php the_field('tm_job_title'); ?></figcaption>
							</figure>
						</div>
						<?php the_content(); ?>
					</div>
				</div>
				<script type="text/javascript">
					jQuery('a.<?php echo $post->post_name; ?>').click(function() {
						jQuery('.team-member-modal-wrapper.<?php echo $post->post_name; ?>').fadeIn(250);
						return false;
					});
					jQuery('a.team-close').click(function() {
						jQuery('.team-member-modal-wrapper').fadeOut(150);
						return false;
					});
					jQuery(document).keyup(function(e) {
     				if (e.keyCode == 27) {
				      jQuery('.team-member-modal-wrapper').fadeOut(150);
				    }
					});
				</script>
			<?php endwhile; endif; ?>
