<?php
/**
 * Not found.
 *
 * @package BradBear_Wonder
 */

get_header();
?>
<section class="wrap wrap--narrow section empty">
	<?php echo bbw_great_bear(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<p class="eyebrow">Error 404</p>
	<h1 class="page-head__title">You&rsquo;ve wandered off the map</h1>
	<p class="section__sub">Honestly, some of my best ideas started that way. This page doesn&rsquo;t exist, but plenty of others do.</p>
	<?php get_search_form(); ?>
	<p><a class="button button--gold" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to the show</a></p>
</section>
<?php
get_footer();
