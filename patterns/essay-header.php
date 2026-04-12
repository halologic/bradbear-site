<?php
/**
 * Title: Essay Header
 * Slug: bradbear/essay-header
 * Categories: bradbear, text
 * Description: A title, subtitle, and byline for essay-style posts.
 */
?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"},"padding":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--50)">

	<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(2.25rem, 5vw, 3.5rem)","lineHeight":"1.05"}}} -->
	<h1 class="wp-block-heading" style="font-size:clamp(2.25rem, 5vw, 3.5rem);line-height:1.05">Essay title goes here</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.25rem","fontStyle":"italic","fontWeight":"400"},"color":{"text":"var:preset|color|tide"}}} -->
	<p style="color:var(--wp--preset--color--tide);font-size:1.25rem;font-style:italic;font-weight:400">A short subtitle that sets the scene.</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","textTransform":"uppercase","letterSpacing":"0.08em"},"color":{"text":"var:preset|color|driftwood"}}} -->
	<p style="color:var(--wp--preset--color--driftwood);font-size:0.875rem;letter-spacing:0.08em;text-transform:uppercase">By Brad Bear · April 2026</p>
	<!-- /wp:paragraph -->

</header>
<!-- /wp:group -->
