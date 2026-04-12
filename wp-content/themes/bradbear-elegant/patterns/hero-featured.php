<?php
/**
 * Title: Hero Featured Post
 * Slug: bradbear-elegant/hero-featured
 * Categories: bradbear-elegant
 * Description: Full-width hero section with featured image, title, excerpt, and category label.
 * Keywords: hero, featured, banner
 */
?>

<!-- wp:group {"className":"hero-section","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group hero-section" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px">

	<!-- wp:cover {"useFeaturedImage":true,"dimRatio":40,"overlayColor":"ink-black","minHeight":500,"contentPosition":"bottom left","isDark":true,"style":{"spacing":{"padding":{"top":"64px","bottom":"64px","left":"40px","right":"40px"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-cover is-dark" style="padding-top:64px;padding-right:40px;padding-bottom:64px;padding-left:40px;min-height:500px">
		<span aria-hidden="true" class="wp-block-cover__background has-ink-black-background-color has-background-dim-40 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"11px","fontWeight":"700","textTransform":"uppercase","letterSpacing":"2px"}},"textColor":"light-gray"} -->
			<p class="has-light-gray-color has-text-color" style="font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase">Featured</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"42px","fontFamily":"var(--wp--preset--font-family--display)","fontWeight":"700","lineHeight":"1.15"}},"textColor":"white"} -->
			<h1 class="wp-block-heading has-white-color has-text-color" style="font-family:var(--wp--preset--font-family--display);font-size:42px;font-weight:700;line-height:1.15">Your Featured Post Title Here</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px","lineHeight":"1.7"}},"textColor":"off-white"} -->
			<p class="has-off-white-color has-text-color" style="font-size:17px;line-height:1.7">A brief excerpt or introduction that draws readers in and sets the tone for the story.</p>
			<!-- /wp:paragraph -->

		</div>
	</div>
	<!-- /wp:cover -->

</div>
<!-- /wp:group -->
