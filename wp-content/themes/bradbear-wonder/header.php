<?php
/**
 * Header.
 *
 * @package BradBear_Wonder
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0a0f24">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<canvas class="sky" aria-hidden="true"></canvas>

<header class="site-header">
	<div class="wrap site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php echo bbw_icon( 'star' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span class="brand__name"><?php bloginfo( 'name' ); ?></span>
		</a>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">
			<span class="nav-toggle__bars" aria-hidden="true"></span>
			<span class="nav-toggle__label">Menu</span>
		</button>
		<nav id="site-nav" class="site-nav" aria-label="Primary">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu',
					'depth'          => 2,
					'fallback_cb'    => 'bbw_fallback_menu',
				)
			);
			?>
		</nav>
	</div>
</header>

<main id="main" class="site-main">
