<?php
/**
 * Realms — the portals of the site.
 *
 * Each realm is a regular WordPress category with a known slug. The theme
 * gives it a colour, an icon and a line of copy. Any other category still
 * works; it just renders in house gold.
 *
 * @package BradBear_Wonder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Realm definitions, keyed by canonical category slug.
 */
function bbw_realms() {
	return array(
		'workshop'    => array(
			'name'    => 'The Workshop',
			'slugs'   => array( 'workshop', 'the-workshop' ),
			'tagline' => 'AI, tools, and things built at 2 a.m.',
			'desc'    => 'Where the tinkering happens. AI that actually earns its keep, prototypes nobody asked for, and honest notes on what works.',
			'color'   => '#5fe0d0',
			'icon'    => 'wand',
		),
		'center-ring' => array(
			'name'    => 'Center Ring',
			'slugs'   => array( 'center-ring' ),
			'tagline' => 'Film, stages, and making a room light up.',
			'desc'    => 'Storytelling, production, and live experiences. The craft of making people feel something on purpose.',
			'color'   => '#ff7a8a',
			'icon'    => 'tent',
		),
		'main-street' => array(
			'name'    => 'Main Street',
			'slugs'   => array( 'main-street' ),
			'tagline' => 'Community, old theaters, and showing up.',
			'desc'    => 'Small-town address, big ambitions. Forgotten spaces, local organizations, and what a room can do when everybody gets a little smarter together.',
			'color'   => '#ffb468',
			'icon'    => 'lamp',
		),
		'observatory' => array(
			'name'    => 'The Observatory',
			'slugs'   => array( 'observatory', 'the-observatory' ),
			'tagline' => 'Big ideas, rabbit holes, and what\'s next.',
			'desc'    => 'Long looks at far-off things. Books I\'m arguing with, questions I can\'t shake, and the chapter that hasn\'t been written yet.',
			'color'   => '#a9b4ff',
			'icon'    => 'telescope',
		),
		'midway'      => array(
			'name'    => 'The Midway',
			'slugs'   => array( 'midway', 'the-midway' ),
			'tagline' => 'Play hard. Theme parks, travel, joy.',
			'desc'    => 'The fun stuff, taken seriously. Theme parks, oceans, music, movies, family, and anything that makes me grin for no good reason.',
			'color'   => '#ff9ad8',
			'icon'    => 'wheel',
		),
		'sandbox'     => array(
			'name'    => 'From the Sandbox',
			'slugs'   => array( 'from-the-sandbox', 'sandbox' ),
			'tagline' => 'Half-formed ideas, shared anyway.',
			'desc'    => 'Loose, experimental, and occasionally wrong. Here\'s a thing I tried.',
			'color'   => '#f0d88a',
			'icon'    => 'flask',
		),
	);
}

/**
 * Find the realm (if any) that a category term belongs to.
 *
 * @param WP_Term|null $term Category term.
 * @return array|null Realm array with 'key' and 'term' added.
 */
function bbw_realm_for_term( $term ) {
	if ( ! $term instanceof WP_Term ) {
		return null;
	}
	foreach ( bbw_realms() as $key => $realm ) {
		if ( in_array( $term->slug, $realm['slugs'], true ) ) {
			$realm['key']  = $key;
			$realm['term'] = $term;
			return $realm;
		}
	}
	return null;
}

/**
 * The realm for a post: its first category that is a realm. Falls back to
 * the first category, in house gold, so every post always has a label.
 *
 * @param int|WP_Post|null $post Post.
 * @return array|null
 */
function bbw_post_realm( $post = null ) {
	$cats = get_the_category( get_post( $post )->ID ?? 0 );
	foreach ( $cats as $cat ) {
		$realm = bbw_realm_for_term( $cat );
		if ( $realm ) {
			return $realm;
		}
	}
	foreach ( $cats as $cat ) {
		if ( 'uncategorized' !== $cat->slug ) {
			return array(
				'key'   => 'other',
				'name'  => $cat->name,
				'color' => '#f2c66d',
				'icon'  => 'star',
				'term'  => $cat,
			);
		}
	}
	return null;
}

/**
 * The category term that backs a realm, if it exists on this site.
 *
 * @param array $realm Realm definition.
 * @return WP_Term|null
 */
function bbw_realm_term( $realm ) {
	foreach ( $realm['slugs'] as $slug ) {
		$term = get_category_by_slug( $slug );
		if ( $term ) {
			return $term;
		}
	}
	return null;
}

/**
 * Create the realm categories the first time the theme is switched on.
 * Existing categories (matched by any known slug) are left untouched.
 */
function bbw_seed_realms() {
	foreach ( bbw_realms() as $key => $realm ) {
		if ( bbw_realm_term( $realm ) ) {
			continue;
		}
		wp_insert_term(
			$realm['name'],
			'category',
			array(
				'slug'        => $realm['slugs'][0],
				'description' => $realm['desc'],
			)
		);
	}
}
add_action( 'after_switch_theme', 'bbw_seed_realms' );

/**
 * Inline line icons. Decorative: always aria-hidden.
 *
 * @param string $name Icon name.
 * @return string SVG markup.
 */
function bbw_icon( $name ) {
	$paths = array(
		'wand'      => '<path d="M5 27 20 12"/><path d="m18 10 4 4"/><path d="M24 3v5M21.5 5.5h5"/><path d="M27 14v3M25.5 15.5h3"/><path d="M12 4v3M10.5 5.5h3"/>',
		'tent'      => '<path d="M16 4v4"/><path d="M16 4l5 1.5L16 7"/><path d="M4 16c6-1 10-4 12-8 2 4 6 7 12 8"/><path d="M6 16v11h20V16"/><path d="M16 27v-7"/><path d="M13 27c0-4 1-7 3-7s3 3 3 7"/><path d="M4 16c1.3 1.5 2.7 1.5 4 0 1.3 1.5 2.7 1.5 4 0 1.3 1.5 2.7 1.5 4 0 1.3 1.5 2.7 1.5 4 0 1.3 1.5 2.7 1.5 4 0 1.3 1.5 2.7 1.5 4 0"/>',
		'lamp'      => '<path d="M16 12v16"/><path d="M12 28h8"/><path d="M12 12h8l-1.5-6h-5z"/><path d="M14.5 6 16 3l1.5 3"/><path d="M13 16h6"/><path d="M5 9l2 1M27 9l-2 1M4 14h2M28 14h-2"/>',
		'telescope' => '<path d="m4 17 16-8 3 6-16 8z"/><path d="m20 9 4-2 3 6-4 2"/><path d="M13 20l-4 8M13 20l5 8M13 20v8"/><path d="M26 22v3M24.5 23.500h3"/>',
		'wheel'     => '<circle cx="16" cy="13" r="10"/><circle cx="16" cy="13" r="2"/><path d="M16 3v20M6 13h20M9 6l14 14M23 6 9 20"/><path d="M16 15 11 29M16 15l5 14M9 29h14"/>',
		'flask'     => '<path d="M12 4h8"/><path d="M13 4v8L6 25a2 2 0 0 0 1.8 3h16.400a2 2 0 0 0 1.8-3l-7-13V4"/><path d="M9.5 20h13"/><path d="M14 24h.01M18 22.500h.01"/>',
		'star'      => '<path d="M16 3c1 7 3 9 13 13-10 4-12 6-13 13-1-7-3-9-13-13 10-4 12-6 13-13z"/>',
		'arrow'     => '<path d="M5 16h21M19 9l7 7-7 7"/>',
		'search'    => '<circle cx="14" cy="14" r="8"/><path d="m20 20 7 7"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		$name = 'star';
	}
	return '<svg class="bbw-icon bbw-icon--' . esc_attr( $name ) . '" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}
