<?php
/**
 * BradBear child theme functions.
 *
 * @package BradBear
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue parent and child theme stylesheets.
 */
function bradbear_enqueue_styles() {
	wp_enqueue_style(
		'twentytwentyfive-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'twentytwentyfive' )->get( 'Version' )
	);

	wp_enqueue_style(
		'bradbear-style',
		get_stylesheet_uri(),
		array( 'twentytwentyfive-style' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'bradbear_enqueue_styles' );

/**
 * Register custom block pattern category.
 */
function bradbear_register_pattern_category() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'bradbear',
			array( 'label' => __( 'BradBear', 'bradbear' ) )
		);
	}
}
add_action( 'init', 'bradbear_register_pattern_category' );
