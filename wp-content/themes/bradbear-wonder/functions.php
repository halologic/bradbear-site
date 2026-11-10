<?php
/**
 * BradBear Wonder — functions and definitions.
 *
 * A standalone classic theme: no parent, no page builder. Everything the
 * design needs lives in this folder.
 *
 * @package BradBear_Wonder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/inc/realms.php';

/**
 * Theme setup.
 */
function bbw_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_editor_style( array( bbw_fonts_url(), 'editor-style.css' ) );

	add_image_size( 'bbw-card', 900, 560, true );
	add_image_size( 'bbw-feature', 1400, 900, true );

	register_nav_menus(
		array(
			'primary' => 'Primary navigation',
			'footer'  => 'Footer navigation',
		)
	);
}
add_action( 'after_setup_theme', 'bbw_setup' );

/**
 * Readable content width for embeds.
 */
function bbw_content_width() {
	$GLOBALS['content_width'] = 720;
}
add_action( 'after_setup_theme', 'bbw_content_width', 0 );

/**
 * Google Fonts: Playfair Display (show type), Cinzel (engraved labels),
 * Source Serif 4 (reading).
 */
function bbw_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Playfair+Display:ital,wght@0,500;0,700;0,900;1,500;1,700&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;1,8..60,400&display=swap';
}

/**
 * Front-end assets.
 */
function bbw_assets() {
	$dir = get_template_directory();
	$uri = get_template_directory_uri();

	wp_enqueue_style( 'bbw-fonts', bbw_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	wp_enqueue_style( 'bbw-style', get_stylesheet_uri(), array( 'bbw-fonts' ), filemtime( $dir . '/style.css' ) );
	wp_enqueue_script( 'bbw-wonder', $uri . '/assets/js/wonder.js', array(), filemtime( $dir . '/assets/js/wonder.js' ), array( 'strategy' => 'defer', 'in_footer' => true ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bbw_assets' );

/**
 * Preconnect to the font hosts.
 *
 * @param array  $urls          URLs.
 * @param string $relation_type Relation.
 * @return array
 */
function bbw_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'bbw_resource_hints', 10, 2 );

/**
 * Shorter, tidier excerpts for cards.
 */
add_filter(
	'excerpt_length',
	function () {
		return 30;
	}
);
add_filter(
	'excerpt_more',
	function () {
		return '&hellip;';
	}
);

/**
 * Estimated reading time in minutes.
 *
 * @param int|WP_Post|null $post Post.
 * @return int
 */
function bbw_reading_time( $post = null ) {
	$words = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post ) ) );
	return max( 1, (int) ceil( $words / 225 ) );
}

/**
 * Inline style attribute carrying a realm colour.
 *
 * @param array|null $realm Realm.
 * @return string
 */
function bbw_realm_style( $realm ) {
	if ( empty( $realm['color'] ) ) {
		return '';
	}
	return ' style="--realm:' . esc_attr( $realm['color'] ) . '"';
}

/**
 * Realm chip: icon + linked realm name.
 *
 * @param array|null $realm Realm.
 * @param bool       $link  Whether to link to the realm archive.
 */
function bbw_realm_chip( $realm, $link = true ) {
	if ( ! $realm ) {
		return;
	}
	$inner = bbw_icon( $realm['icon'] ) . '<span>' . esc_html( $realm['name'] ) . '</span>';
	if ( $link && ! empty( $realm['term'] ) ) {
		printf( '<a class="realm-chip" href="%s"%s>%s</a>', esc_url( get_category_link( $realm['term'] ) ), bbw_realm_style( $realm ), $inner ); // phpcs:ignore WordPress.Security.EscapeOutput
	} else {
		printf( '<span class="realm-chip"%s>%s</span>', bbw_realm_style( $realm ), $inner ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}

/**
 * Post meta line: date and reading time.
 */
function bbw_meta() {
	printf(
		'<time datetime="%1$s">%2$s</time><span aria-hidden="true"> &#10022; </span><span>%3$s min read</span>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_html( bbw_reading_time() )
	);
}

/**
 * Fallback primary menu when none is assigned in Appearance > Menus.
 */
function bbw_fallback_menu() {
	$items = array(
		home_url( '/' )          => 'The Show',
		home_url( '/#portals' )  => 'Portals',
	);
	$about = get_page_by_path( 'about' );
	if ( $about ) {
		$items[ get_permalink( $about ) ] = 'About';
	}
	echo '<ul id="primary-menu" class="menu">';
	foreach ( $items as $url => $label ) {
		printf( '<li class="menu-item"><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * The Great Bear. Ursa Major, drawn as the site's signature constellation.
 *
 * @return string SVG markup.
 */
function bbw_great_bear() {
	$stars = array(
		array( 40, 86, 3.2 ),   // Alkaid.
		array( 122, 104, 3.4 ), // Mizar.
		array( 190, 128, 3.6 ), // Alioth.
		array( 258, 158, 2.8 ), // Megrez.
		array( 372, 124, 4 ),   // Dubhe.
		array( 362, 208, 3.4 ), // Merak.
		array( 272, 226, 3.2 ), // Phecda.
		array( 452, 92, 2.4 ),
		array( 512, 132, 2.8 ), // Muscida, the nose.
		array( 438, 262, 2.4 ),
		array( 486, 322, 2.8 ),
		array( 520, 300, 2.2 ),
		array( 246, 292, 2.4 ),
		array( 196, 340, 2.8 ),
		array( 160, 318, 2.2 ),
	);
	$lines = 'M40 86 122 104 190 128 258 158 372 124 362 208 272 226 258 158M372 124 452 92 512 132 372 124M362 208 438 262 486 322M438 262 520 300M272 226 246 292 196 340M246 292 160 318';
	$svg   = '<svg class="great-bear" viewBox="0 0 560 380" fill="none" aria-hidden="true" focusable="false"><path class="great-bear__lines" d="' . $lines . '"/>';
	foreach ( $stars as $i => $s ) {
		$svg .= sprintf( '<circle class="great-bear__star" style="--i:%d" cx="%s" cy="%s" r="%s"/>', $i, $s[0], $s[1], $s[2] );
	}
	return $svg . '</svg>';
}

/**
 * Four-point star ornament used in dividers.
 */
function bbw_ornament() {
	echo '<div class="ornament" aria-hidden="true"><span></span>' . bbw_icon( 'star' ) . '<span></span></div>'; // phpcs:ignore WordPress.Security.EscapeOutput
}

/**
 * Body classes.
 *
 * @param array $classes Classes.
 * @return array
 */
function bbw_body_class( $classes ) {
	$classes[] = 'bbw';
	return $classes;
}
add_filter( 'body_class', 'bbw_body_class' );
