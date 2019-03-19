<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :

	function foundationpress_entry_meta() {

		$hide_meta = get_theme_mod('hide-blog-meta');
		$hide_date = get_theme_mod('hide-blog-date');
		$hide_cats = get_theme_mod('hide-blog-cats');
		$hide_author = get_theme_mod('hide-blog-author');
		$hide_comments = get_theme_mod('hide-blog-comments');

		if ( ! $hide_meta ):

			/* translators: %1$s: current date, %2$s: current time */
			echo '<div class="bs-entry-meta">';

			if ( ! $hide_date ):
				echo '<p class="bs-post-date" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '<i class="far fa-calendar-alt" aria-hidden="true"></i> %1$s', 'allonsy2' ), get_the_date() ) . '</p>';
			endif;

			if ( ! $hide_cats ):
				echo '<p class="bs-post-cats"><i class="far fa-sitemap"></i> ';
				the_category(",");
				echo '</p>';
			endif;

			if ( ! $hide_author ):
				echo '<p class="bs-post-byline byline author">' . __( '<i class="fas fa-user" aria-hidden="true"></i>', 'allonsy2' ) . ' By <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
			endif;

			if ( ! $hide_comments ):
				echo '<p class="bs-post-comments">' . __( '<i class="far fa-comments" aria-hidden="true"></i> ', 'allonsy2' ); comments_number( 'No comments', '1 comment', '% comments' );
				echo '</p>';
			endif;
			
			echo '</div>';

		endif;

	}

endif;
