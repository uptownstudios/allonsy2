<div class="about-the-author-wrap">
	<div class="author-image">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
	</div>
	<div class="author-description">
		<strong>By <?php $authorName = the_author_meta('nickname'); echo $authorName; ?></strong><br>
		<?php $authorDesc = the_author_meta('description'); echo $authorDesc; ?>
	</div>
</div>
