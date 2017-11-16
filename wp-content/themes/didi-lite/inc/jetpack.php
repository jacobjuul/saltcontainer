<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Didi Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function didi_lite_jetpack_setup() {
	add_theme_support( 'jetpack-responsive-videos' );

} // end function didi-lite_jetpack_setup
add_action( 'after_setup_theme', 'didi_lite_jetpack_setup' );