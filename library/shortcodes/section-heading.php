<?php
add_shortcode( 'section_heading', 'bs_section_heading' );
function bs_section_heading( $atts ) {
	$args = shortcode_atts( array(
		'title' => '',
		'html_tag' => 'h2',
		'align' => 'none',
		'icon' => '',
		'color' => '#003a71',
	), $atts, 'bs_section_heading' );
  ob_start();

	$section_title = $args['title'];
	$section_html_tag = $args['html_tag'];
	$section_heading_align = $args['align'];
	$section_icon = $args['icon'];
	$section_title_color = $args['color'];
	?>

	<<?php echo $section_html_tag; ?> class="section-heading align<?php echo $section_heading_align; ?>"><span class="section-heading-inner" style="color: <?php echo $section_title_color;?>;"><?php if( $section_icon ) { ?><span class="<?php echo $section_icon; ?>"></span> <?php } ?><?php echo $section_title; ?></span></<?php echo $section_html_tag; ?>>

  <?php $bssectionheading = ob_get_clean(); return $bssectionheading;
}
