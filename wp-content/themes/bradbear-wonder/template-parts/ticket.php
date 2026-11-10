<?php
/**
 * Ticket: the post card used in every listing.
 *
 * @package BradBear_Wonder
 */

$bbw_realm = bbw_post_realm();
?>
<article <?php post_class( 'ticket' ); ?><?php echo bbw_realm_style( $bbw_realm ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<div class="ticket__paper">
		<div class="ticket__stub">
			<?php if ( $bbw_realm ) : ?>
				<span class="ticket__realm"><?php echo bbw_icon( $bbw_realm['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo esc_html( $bbw_realm['name'] ); ?></span></span>
			<?php endif; ?>
			<span class="ticket__admit" aria-hidden="true">Admit one</span>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="ticket__image"><?php the_post_thumbnail( 'bbw-card', array( 'loading' => 'lazy' ) ); ?></div>
		<?php endif; ?>
		<div class="ticket__body">
			<h3 class="ticket__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="ticket__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<p class="ticket__meta"><?php bbw_meta(); ?></p>
		</div>
	</div>
</article>
