<?php
/**
 * Title: Video Embed Section
 * Slug: bradbear-elegant/video-embed
 * Categories: bradbear-elegant
 * Description: A centered video embed with title and description, styled for the editorial layout.
 * Keywords: video, embed, youtube, film
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"64px","bottom":"64px","left":"24px","right":"24px"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group" style="padding-top:64px;padding-right:24px;padding-bottom:64px;padding-left:24px">

	<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"32px","fontFamily":"var(--wp--preset--font-family--display)","fontWeight":"700","lineHeight":"1.2"}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="font-family:var(--wp--preset--font-family--display);font-size:32px;font-weight:700;line-height:1.2">Featured Film</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"}},"textColor":"mid-gray"} -->
	<p class="has-text-align-center has-mid-gray-color has-text-color" style="font-size:16px">A brief description of this film or video project.</p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"24px"} -->
	<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:embed {"providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
	<figure class="wp-block-embed is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
		<div class="wp-block-embed__wrapper">
			https://www.youtube.com/watch?v=YOUR_VIDEO_ID
		</div>
	</figure>
	<!-- /wp:embed -->

</div>
<!-- /wp:group -->
