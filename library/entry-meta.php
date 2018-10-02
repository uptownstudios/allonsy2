<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
	function foundationpress_entry_meta() {
		/* translators: %1$s: current date, %2$s: current time */
		echo '<p class="bs-post-date" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '<i class="far fa-calendar-alt" aria-hidden="true"></i> %1$s', 'allonsy2' ), get_the_date() ) . '</p>';
		echo '<p class="bs-post-cats"><i class="far fa-sitemap"></i> ';
		the_category(",");
		echo '</p>';
		echo '<p class="bs-post-byline byline author">' . __( '<i class="fas fa-user" aria-hidden="true"></i>', 'allonsy2' ) . ' By <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
		echo '<p class="bs-post-comments">' . __( '<i class="far fa-comments" aria-hidden="true"></i> ', 'allonsy2' ); comments_number( 'No comments', '1 comment', '% comments' );
		echo '</p>';
	}
endif;
