<?php
/**
 * BradBear Elegant — Functions and Definitions
 *
 * @package BradBear_Elegant
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Google Fonts: Playfair Display + Source Sans Pro.
 */
function bradbear_elegant_fonts() {
	wp_enqueue_style(
		'bradbear-elegant-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'bradbear_elegant_fonts' );
add_action( 'enqueue_block_editor_assets', 'bradbear_elegant_fonts' );

/**
 * Enqueue parent and child theme stylesheets.
 */
function bradbear_elegant_styles() {
	// Parent theme stylesheet.
	wp_enqueue_style(
		'twentytwentyfive-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'twentytwentyfive' )->get( 'Version' )
	);

	// Child theme stylesheet.
	wp_enqueue_style(
		'bradbear-elegant-style',
		get_stylesheet_uri(),
		array( 'twentytwentyfive-style' ),
		wp_get_theme()->get( 'Version' )
	);

	// Custom CSS overrides.
	wp_enqueue_style(
		'bradbear-elegant-custom',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array( 'bradbear-elegant-style' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'bradbear_elegant_styles' );

/**
 * Enqueue custom JavaScript for hover overlays and sticky nav.
 */
function bradbear_elegant_scripts() {
	wp_enqueue_script(
		'bradbear-elegant-scripts',
		get_stylesheet_directory_uri() . '/assets/js/theme.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bradbear_elegant_scripts' );

/**
 * Register block patterns category for BradBear Elegant.
 */
function bradbear_elegant_register_pattern_category() {
	register_block_pattern_category(
		'bradbear-elegant',
		array(
			'label' => __( 'BradBear Elegant', 'bradbear-elegant' ),
		)
	);
}
add_action( 'init', 'bradbear_elegant_register_pattern_category' );

/**
 * Add editor styles so the block editor matches the front end.
 */
function bradbear_elegant_editor_styles() {
	add_editor_style( 'assets/css/custom.css' );
}
add_action( 'after_setup_theme', 'bradbear_elegant_editor_styles' );
