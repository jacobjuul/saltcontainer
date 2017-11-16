<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Colorskin
 */
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar widget-area col-md-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
