/**
 * BradBear Wonder: the night sky and the mobile menu.
 * No dependencies. Honors prefers-reduced-motion.
 */
( function () {
	'use strict';

	document.documentElement.classList.add( 'js' );

	// --- Mobile menu ------------------------------------------------------
	var toggle = document.querySelector( '.nav-toggle' );
	var nav = document.getElementById( 'site-nav' );
	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			var open = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );
		document.addEventListener( 'keydown', function ( e ) {
			if ( 'Escape' === e.key && nav.classList.contains( 'is-open' ) ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
				toggle.focus();
			}
		} );
	}

	// --- Night sky --------------------------------------------------------
	var canvas = document.querySelector( '.sky' );
	if ( ! canvas || ! canvas.getContext ) {
		return;
	}
	var ctx = canvas.getContext( '2d' );
	var still = window.matchMedia( '(prefers-reduced-motion: reduce)' );
	var stars = [];
	var comet = null;
	var w = 0;
	var h = 0;
	var raf = 0;
	var TINTS = [ '255,255,255', '255,234,181', '190,205,255' ];

	function resize() {
		var dpr = Math.min( window.devicePixelRatio || 1, 2 );
		w = window.innerWidth;
		h = window.innerHeight;
		canvas.width = w * dpr;
		canvas.height = h * dpr;
		ctx.setTransform( dpr, 0, 0, dpr, 0, 0 );

		var count = Math.min( 220, Math.round( ( w * h ) / 7000 ) );
		stars = [];
		for ( var i = 0; i < count; i++ ) {
			stars.push( {
				x: Math.random() * w,
				y: Math.random() * h,
				r: Math.random() * 1.2 + 0.25,
				a: Math.random() * 0.6 + 0.25,
				s: Math.random() * 0.0016 + 0.0004,
				p: Math.random() * Math.PI * 2,
				c: TINTS[ Math.floor( Math.random() * TINTS.length ) ],
			} );
		}
		draw( 0 );
	}

	function draw( t ) {
		ctx.clearRect( 0, 0, w, h );
		for ( var i = 0; i < stars.length; i++ ) {
			var s = stars[ i ];
			var a = s.a * ( 0.6 + 0.4 * Math.sin( s.p + t * s.s ) );
			ctx.fillStyle = 'rgba(' + s.c + ',' + a.toFixed( 3 ) + ')';
			ctx.beginPath();
			ctx.arc( s.x, s.y, s.r, 0, 6.2832 );
			ctx.fill();
		}
		if ( comet ) {
			var k = ( t - comet.t0 ) / comet.dur;
			if ( k >= 1 ) {
				comet = null;
			} else {
				var x = comet.x + comet.dx * k;
				var y = comet.y + comet.dy * k;
				var g = ctx.createLinearGradient( x, y, x - comet.dx * 0.16, y - comet.dy * 0.16 );
				g.addColorStop( 0, 'rgba(255,240,200,' + ( Math.sin( k * Math.PI ) * 0.9 ).toFixed( 3 ) + ')' );
				g.addColorStop( 1, 'rgba(255,240,200,0)' );
				ctx.strokeStyle = g;
				ctx.lineWidth = 1.6;
				ctx.beginPath();
				ctx.moveTo( x, y );
				ctx.lineTo( x - comet.dx * 0.16, y - comet.dy * 0.16 );
				ctx.stroke();
			}
		}
	}

	function loop( t ) {
		if ( ! comet && Math.random() < 0.0016 ) {
			comet = { t0: t, dur: 1100, x: Math.random() * w * 0.7, y: Math.random() * h * 0.35, dx: w * 0.42, dy: h * 0.24 };
		}
		draw( t );
		raf = window.requestAnimationFrame( loop );
	}

	function start() {
		window.cancelAnimationFrame( raf );
		if ( ! still.matches && ! document.hidden ) {
			raf = window.requestAnimationFrame( loop );
		}
	}

	var resizeTimer;
	window.addEventListener( 'resize', function () {
		window.clearTimeout( resizeTimer );
		resizeTimer = window.setTimeout( resize, 150 );
	} );
	document.addEventListener( 'visibilitychange', start );
	if ( still.addEventListener ) {
		still.addEventListener( 'change', start );
	}

	resize();
	start();
}() );
