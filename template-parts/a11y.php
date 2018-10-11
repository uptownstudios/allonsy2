<?php
  $a11y_position = get_theme_mod('a11y-position');
  $a11y_skip_to_nav = get_theme_mod('skip-to-nav');
  $a11y_skip_to_content = get_theme_mod('skip-to-content');
?>

<?php if( $a11y_skip_to_nav || $a11y_skip_to_content ): ?>
<div id="a11y-skiplinks">
  <?php if( $a11y_skip_to_nav ) { ?>
  <a class="screen-reader-shortcut" href="<?php echo $a11y_skip_to_nav; ?>">Skip to navigation</a>
  <?php }
  if( $a11y_skip_to_content ) { ?>
  <a class="screen-reader-shortcut" href="<?php echo $a11y_skip_to_content; ?>">Skip to content</a>
  <?php } ?>
</div>
<?php endif; ?>
<div id="a11y-toolbar" class="<?php echo $a11y_position; ?>">
  <div id="a11y-fontsize">
    <button class="a11y-fontsize" title="Toggle Large Fontsize Mode"><span data-tooltip class="right" title="Toggle Larger Fontsize"><i class="fa fa-font"></i>+</span></button>
  </div>
  <div id="a11y-contrast">
    <button class="a11y-contrast" title="Toggle High Contrast Mode"><span data-tooltip data-click-open="true" class="right" title="Toggle High Contrast View"><i class="fa fa-adjust"></i></span></button>
  </div>
</div>
