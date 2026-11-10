<?php
/**
 * A page.
 *
 * @package BradBear_Wonder
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'story' ); ?>>
		<header class="story__head wrap wrap--narrow">
			<?php bbw_ornament(); ?>
			<h1 class="story__title"><?php the_title(); ?></h1>
		</header>
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="story__image wrap"><?php the_post_thumbnail( 'bbw-feature' ); ?></figure>
		<?php endif; ?>
		<div class="page-sheet wrap wrap--narrow">
			<div class="prose"><?php the_content(); ?></div>
		</div>
		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</article>
	<?php
endwhile;

get_footer();
