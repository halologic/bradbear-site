<?php
/**
 * Search form.
 *
 * @package BradBear_Wonder
 */

$bbw_id = wp_unique_id( 'search-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $bbw_id ); ?>">Search the show</label>
	<input type="search" id="<?php echo esc_attr( $bbw_id ); ?>" name="s" placeholder="Search the show&hellip;" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit"><?php echo bbw_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text">Search</span></button>
</form>
