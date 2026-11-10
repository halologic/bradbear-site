<?php
/**
 * Footer.
 *
 * @package BradBear_Wonder
 */

$bbw_ventures = array(
	'Halo Logic'           => 'https://halologic.com',
	'Bear Media Services'  => 'https://bearmediaservices.com',
	'Reimagination Events' => '',
);
?>
</main>

<footer class="site-footer">
	<div class="valance" aria-hidden="true"></div>
	<div class="wrap site-footer__inner">
		<div class="site-footer__lead">
			<p class="site-footer__sign">The show goes on.</p>
			<p class="site-footer__blurb">One curious human, writing about the things worth staying up late for. Pull up a chair. There&rsquo;s usually something going on.</p>
		</div>

		<nav class="site-footer__col" aria-label="Portals">
			<h2 class="eyebrow">Portals</h2>
			<ul>
				<?php
				foreach ( bbw_realms() as $bbw_realm ) :
					$bbw_term = bbw_realm_term( $bbw_realm );
					if ( ! $bbw_term ) {
						continue;
					}
					?>
					<li><a href="<?php echo esc_url( get_category_link( $bbw_term ) ); ?>"><?php echo esc_html( $bbw_realm['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="site-footer__col">
			<h2 class="eyebrow">Out in the world</h2>
			<ul>
				<?php foreach ( $bbw_ventures as $bbw_name => $bbw_url ) : ?>
					<li>
						<?php if ( $bbw_url ) : ?>
							<a href="<?php echo esc_url( $bbw_url ); ?>"><?php echo esc_html( $bbw_name ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $bbw_name ); ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="site-footer__col">
			<h2 class="eyebrow">Find something</h2>
			<?php get_search_form(); ?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>
		</div>
	</div>
	<div class="wrap site-footer__base">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. Made with curiosity, caffeine, and a little stardust.</p>
		<p><a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>">RSS</a></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
