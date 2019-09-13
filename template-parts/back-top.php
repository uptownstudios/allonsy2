<?php
	$hide_backtop = get_theme_mod('hide-back-top');
	$backtop_position = get_theme_mod('back-top-position');

	if ( ! $hide_backtop ):
?>

<div id="back-top" class="<?php echo $backtop_position; ?>">
	<a href="#" title="Back to top"><span class="fa fa-chevron-up"></span></a>
</div>

<?php endif; ?>
