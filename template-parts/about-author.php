<?php
	$authorAvatar = get_theme_mod('author-avatar');
?>
<div class="about-the-author-wrap">
	<?php if( !$authorAvatar ) { ?>
	<div class="author-image">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
	</div>
	<?php } ?>
	<div class="author-description <?php if( $authorAvatar ) { ?>no-avatar<?php } ?>">
		<p><strong>About <?php $authorName = the_author_meta('nickname'); echo $authorName; ?></strong><br>
		<?php $authorDesc = the_author_meta('description'); echo $authorDesc; ?></p>
	</div>
</div>
