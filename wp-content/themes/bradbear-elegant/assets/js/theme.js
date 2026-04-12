/**
 * BradBear Elegant — Theme JavaScript
 *
 * Sticky header scroll behavior and minor UI enhancements.
 *
 * @package BradBear_Elegant
 * @since   1.0.0
 */

( function () {
	'use strict';

	/**
	 * Add scroll class to header for shadow effect.
	 */
	function initStickyHeader() {
		const header = document.querySelector(
			'.wp-block-template-part[data-area="header"]'
		);
		if ( ! header ) return;

		const onScroll = () => {
			if ( window.scrollY > 10 ) {
				header.classList.add( 'is-scrolled' );
			} else {
				header.classList.remove( 'is-scrolled' );
			}
		};

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll(); // initial check
	}

	/**
	 * Smooth scroll-to-top when clicking the site title (optional).
	 */
	function initSiteTitleScroll() {
		const siteTitle = document.querySelector( '.wp-block-site-title a' );
		if ( ! siteTitle ) return;

		siteTitle.addEventListener( 'click', function ( e ) {
			// Only intercept if already on the homepage.
			if (
				window.location.pathname === '/' ||
				window.location.pathname === ''
			) {
				e.preventDefault();
				window.scrollTo( { top: 0, behavior: 'smooth' } );
			}
		} );
	}

	// Initialize on DOM ready.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', function () {
			initStickyHeader();
			initSiteTitleScroll();
		} );
	} else {
		initStickyHeader();
		initSiteTitleScroll();
	}
} )();
