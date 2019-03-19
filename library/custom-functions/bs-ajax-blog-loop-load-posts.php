<?php
/**
 * Passes WP AJAX URL and loading image URL to `load-post.js` and loads it in the footer.
 */
function bs_load_post_script() {

    wp_enqueue_script(
      'bs-loadpost', get_stylesheet_directory_uri() . '/src/assets/js/vendor/load-posts.js', array( 'jquery' ), 1.0, true
    );

    wp_localize_script(
      'bs-loadpost', 'bs_ajaxobject', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'loadingimage' => get_stylesheet_directory_uri() . '/src/assets/images/loading.gif',
      )
    );
}
add_action( 'wp_enqueue_scripts', 'bs_load_post_script' );

// Function to load posts
add_action('wp_ajax_bs_load_post', 'bs_load_post');
add_action('wp_ajax_nopriv_bs_load_post', 'bs_load_post');
function bs_load_post() {

  $ajax_query_args = array(
    'post_type' => 'post',
    'no_found_rows' => true,
    'status' => 'published',
    'posts_per_page' => '1',
    'p' => $_POST['post_id'],
  );

  $bs_ajax_query = new WP_Query( $ajax_query_args );
  $bs_ajax_query->the_post();

  $hide_meta = get_theme_mod('hide-blog-meta');
  $hide_date = get_theme_mod('hide-blog-date');
  $hide_cats = get_theme_mod('hide-blog-cats');
  $hide_author = get_theme_mod('hide-blog-author');
  $hide_comments = get_theme_mod('hide-blog-comments');
  $show_avatar = get_theme_mod('show-author-avatar');

  ?>

    <article <?php post_class('bs-single-post loaded-with-ajax'); ?>>

    <?php if( has_post_thumbnail() ) { ?>
      <div class="bs-post-featured-image">
        <figure><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img data-src="<?php echo the_post_thumbnail_url( 'bs_blog' ); ?>" class="lazyload" /></a></figure>
      </div>
    <?php } ?>

      <div class="entry-content">

        <div class="bs-post-title">
          <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        </div>

        <?php if( ! $hide_meta ): ?>
        <div class="bs-post-meta">

          <?php if( ! $hide_date ): ?>
            <p class="bs-post-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date(); ?></p>
          <?php endif; ?>

          <?php if( ! $hide_author ): ?>
            <p class="bs-post-byline">
              <?php if( $show_avatar ) { ?><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></span> <?php } ?>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" title=""><?php the_author_meta( 'display_name' ); ?></a>
            </p>
          <?php endif; ?>

          <?php if( ! $hide_cats ): ?>
            <p class="bs-post-cats"><i class="far fa-sitemap" aria-hidden="true"></i> <?php the_category(','); ?></p>
          <?php endif; ?>

          <?php if( ! $hide_comments ): ?>
            <p class="bs-post-comments"><i class="far fa-comments" aria-hidden="true"></i> <a href="<?php comments_link(); ?>" title="Join the discussion"><?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a></p>
          <?php endif; ?>

        </div>
        <?php endif; ?>

        <div class="bs-post-excerpt">
          <?php the_excerpt(); ?>
        </div>

        <div class="bs-post-footer">
          <a class="bs-post-read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
        </div>
      </div>
    </article>
  <?php wp_die();
}
