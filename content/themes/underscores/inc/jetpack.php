<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Angelina Allen Portfolio
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function angelina_allen_portfolio_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'angelina_allen_portfolio_jetpack_setup' );
