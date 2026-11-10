<?php
/**
 * A single story.
 *
 * @package BradBear_Wonder
 */

get_header();

while ( have_posts() ) :
	the_post();
	$bbw_realm = bbw_post_realm();
	?>
	<article <?php post_class( 'story' ); ?><?php echo bbw_realm_style( $bbw_realm ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
		<header class="story__head wrap wrap--narrow">
			<?php bbw_realm_chip( $bbw_realm ); ?>
			<h1 class="story__title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="story__dek"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<p class="meta"><?php bbw_meta(); ?></p>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="story__image wrap"><?php the_post_thumbnail( 'bbw-feature' ); ?></figure>
		<?php endif; ?>

		<div class="page-sheet wrap wrap--narrow">
			<div class="prose">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<nav class="page-links" aria-label="Pages">Pages: ', 'after' => '</nav>' ) ); ?>
			</div>
			<?php bbw_ornament(); ?>
			<?php the_tags( '<p class="story__tags"><span class="screen-reader-text">Tagged </span>', ' ', '</p>' ); ?>
		</div>

		<nav class="story__nav wrap wrap--narrow" aria-label="More stories">
			<?php
			previous_post_link( '<div class="story__nav-item story__nav-item--prev"><span class="eyebrow">Previously</span>%link</div>' );
			next_post_link( '<div class="story__nav-item story__nav-item--next"><span class="eyebrow">Up next</span>%link</div>' );
			?>
		</nav>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</article>
	<?php
endwhile;

get_footer();
