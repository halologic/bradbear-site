<?php
/**
 * Listings: realm (category) archives, tags, dates, search, and fallback.
 *
 * @package BradBear_Wonder
 */

get_header();

$bbw_realm   = is_category() ? bbw_realm_for_term( get_queried_object() ) : null;
$bbw_eyebrow = 'The archive';
$bbw_title   = get_the_archive_title();
$bbw_sub     = get_the_archive_description();

if ( $bbw_realm ) {
	$bbw_eyebrow = 'Portal';
	$bbw_title   = $bbw_realm['name'];
	$bbw_sub     = $bbw_sub ? $bbw_sub : $bbw_realm['desc'];
} elseif ( is_search() ) {
	$bbw_eyebrow = 'Search';
	$bbw_title   = 'Results for “' . get_search_query() . '”';
	$bbw_sub     = '';
} elseif ( is_category() || is_tag() ) {
	$bbw_eyebrow = is_tag() ? 'Tagged' : 'Collection';
	$bbw_title   = single_term_title( '', false );
}
?>

<header class="page-head wrap"<?php echo bbw_realm_style( $bbw_realm ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $bbw_realm ) : ?>
		<span class="portal__arch portal__arch--head"><?php echo bbw_icon( $bbw_realm['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
	<?php endif; ?>
	<p class="eyebrow"><?php echo esc_html( $bbw_eyebrow ); ?></p>
	<h1 class="page-head__title"><?php echo wp_kses_post( $bbw_title ); ?></h1>
	<?php if ( $bbw_sub ) : ?>
		<div class="page-head__sub"><?php echo wp_kses_post( wpautop( $bbw_sub ) ); ?></div>
	<?php endif; ?>
</header>

<section class="wrap section section--tight">
	<?php if ( have_posts() ) : ?>
		<div class="tickets">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/ticket' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination( array( 'prev_text' => '&larr; Newer', 'next_text' => 'Older &rarr;' ) ); ?>
	<?php else : ?>
		<div class="empty">
			<?php bbw_ornament(); ?>
			<p class="section__sub"><?php echo is_search() ? 'Nothing under that tent. Try another word?' : 'This portal is opening soon. The first story is still in rehearsal.'; ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</section>

<?php
get_footer();
