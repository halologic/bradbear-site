<?php
/**
 * The blog index: the front of house.
 *
 * Page one opens with the hero, puts the newest (or sticky) story up in
 * lights, then the portals, then everything else as tickets.
 *
 * @package BradBear_Wonder
 */

get_header();

$bbw_first_page = ! is_paged();
$bbw_tagline    = get_bloginfo( 'description' );
$bbw_about      = get_page_by_path( 'about' );
?>

<?php if ( $bbw_first_page ) : ?>
<section class="hero">
	<div class="wrap hero__inner">
		<?php echo bbw_great_bear(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<p class="hero__bill"><span>Now showing</span><span>Nightly</span><span>No intermission</span></p>
		<h1 class="hero__title"><?php bloginfo( 'name' ); ?></h1>
		<p class="hero__presents" aria-hidden="true">presents</p>
		<p class="hero__motto">Play hard. Dream big. <em>Stay curious.</em></p>
		<p class="hero__lede"><?php echo esc_html( $bbw_tagline ? $bbw_tagline : 'One filmmaker, builder, and incurable asker of “okay, but what’s next?” writing about AI, stages, small towns, big ideas, and anything else worth staying up late for.' ); ?></p>
		<p class="hero__actions">
			<a class="button button--gold" href="#now-showing">Step right up</a>
			<a class="button button--ghost" href="#portals">Choose a portal</a>
		</p>
	</div>
</section>
<?php endif; ?>

<?php if ( have_posts() ) : ?>

	<?php
	if ( $bbw_first_page ) :
		the_post();
		$bbw_realm = bbw_post_realm();
		?>
	<section id="now-showing" class="wrap section">
		<article <?php post_class( 'marquee' ); ?><?php echo bbw_realm_style( $bbw_realm ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
			<div class="marquee__inner<?php echo has_post_thumbnail() ? ' has-image' : ''; ?>">
				<div class="marquee__copy">
					<p class="marquee__label">Now showing</p>
					<h2 class="marquee__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="marquee__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<p class="marquee__meta">
						<?php bbw_realm_chip( $bbw_realm ); ?>
						<span class="meta"><?php bbw_meta(); ?></span>
					</p>
					<p><a class="button button--gold" href="<?php the_permalink(); ?>" aria-label="Read: <?php the_title_attribute(); ?>">Take your seat <?php echo bbw_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a></p>
				</div>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="marquee__image"><?php the_post_thumbnail( 'bbw-feature' ); ?></div>
				<?php endif; ?>
			</div>
		</article>
	</section>

	<section id="portals" class="section portals">
		<div class="wrap">
			<header class="section__head">
				<p class="eyebrow">Six worlds, one curious human</p>
				<h2 class="section__title">Choose your portal</h2>
				<p class="section__sub">Everything here lives in one of these. Wander into whichever one is calling you.</p>
			</header>
			<ul class="portals__grid">
				<?php
				foreach ( bbw_realms() as $bbw_r ) :
					$bbw_term = bbw_realm_term( $bbw_r );
					$bbw_url  = $bbw_term ? get_category_link( $bbw_term ) : '';
					$bbw_n    = $bbw_term ? (int) $bbw_term->count : 0;
					?>
					<li class="portal"<?php echo bbw_realm_style( $bbw_r ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
						<<?php echo $bbw_url ? 'a href="' . esc_url( $bbw_url ) . '"' : 'div'; ?> class="portal__link">
							<span class="portal__arch"><?php echo bbw_icon( $bbw_r['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
							<span class="portal__name"><?php echo esc_html( $bbw_r['name'] ); ?></span>
							<span class="portal__tagline"><?php echo esc_html( $bbw_r['tagline'] ); ?></span>
							<span class="portal__count"><?php echo esc_html( $bbw_n ? sprintf( _n( '%d story', '%d stories', $bbw_n, 'bradbear-wonder' ), $bbw_n ) : 'Opening soon' ); ?></span>
						</<?php echo $bbw_url ? 'a' : 'div'; ?>>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
	<section class="wrap section">
		<header class="section__head">
			<p class="eyebrow"><?php echo $bbw_first_page ? 'Fresh off the press' : 'Page ' . esc_html( get_query_var( 'paged' ) ); ?></p>
			<h2 class="section__title"><?php echo $bbw_first_page ? 'Latest dispatches' : 'More dispatches'; ?></h2>
		</header>
		<div class="tickets">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/ticket' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination( array( 'prev_text' => '&larr; Newer', 'next_text' => 'Older &rarr;' ) ); ?>
	</section>
	<?php endif; ?>

<?php else : ?>
	<section class="wrap section empty">
		<?php bbw_ornament(); ?>
		<h2 class="section__title">The curtain rises soon</h2>
		<p class="section__sub">First story is still in rehearsal. Check back shortly.</p>
	</section>
<?php endif; ?>

<?php if ( $bbw_first_page ) : ?>
<section class="ringmaster">
	<div class="valance valance--paper" aria-hidden="true"></div>
	<div class="wrap ringmaster__inner">
		<div class="ringmaster__copy">
			<p class="eyebrow eyebrow--ink">Your ringmaster</p>
			<h2 class="ringmaster__title">Hi, I&rsquo;m Brad.</h2>
			<p>Filmmaker by training, creative by nature, and the kind of person who gets an idea at 11 p.m. and has a working prototype, three logo concepts, and a domain name by 2 a.m.</p>
			<p>I run an AI company, a media company, and an events company. This site isn&rsquo;t any of those. This is where I get to be a whole person: the curious, playful, theme-park-loving, small-town, big-dreaming whole show.</p>
			<?php if ( $bbw_about ) : ?>
				<p><a class="button button--ink" href="<?php echo esc_url( get_permalink( $bbw_about ) ); ?>">The full story <?php echo bbw_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a></p>
			<?php endif; ?>
		</div>
		<dl class="playbill">
			<div><dt>Regional Emmys</dt><dd>6</dd></div>
			<div><dt>Production awards</dt><dd>60+</dd></div>
			<div><dt>Years making things</dt><dd>25+</dd></div>
			<div><dt>Projects going at once</dt><dd>17<small>ish</small></dd></div>
		</dl>
	</div>
</section>
<?php endif; ?>

<?php
get_footer();
