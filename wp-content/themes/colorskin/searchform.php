<?php
/**
 * Displays the searchform of the theme.
 *
 * @package Colorskin
 */
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form searchform cf" method="get">
	<div class="search-wrap">
		<input type="text" placeholder="<?php esc_attr_e( 'Search', 'colorskin' ); ?>" class="s field" name="s">
		<button class="search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form><!-- .searchform -->