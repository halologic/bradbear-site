<?php
/**
 * Comments.
 *
 * @package BradBear_Wonder
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments wrap wrap--narrow">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments__title"><?php echo esc_html( sprintf( _n( '%d voice from the crowd', '%d voices from the crowd', get_comments_number(), 'bradbear-wonder' ), get_comments_number() ) ); ?></h2>
		<ol class="comments__list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 44,
				)
			);
			?>
		</ol>
		<?php the_comments_pagination(); ?>
	<?php endif; ?>
	<?php comment_form( array( 'title_reply' => 'Join the conversation' ) ); ?>
</section>
