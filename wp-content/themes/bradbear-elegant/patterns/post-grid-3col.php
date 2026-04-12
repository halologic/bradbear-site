<?php
/**
 * Title: Post Grid — 3 Columns
 * Slug: bradbear-elegant/post-grid-3col
 * Categories: bradbear-elegant
 * Description: A 3-column grid of recent posts with featured images, category labels, titles, and excerpts.
 * Keywords: grid, posts, cards, blog
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"64px","bottom":"64px","left":"24px","right":"24px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group" style="padding-top:64px;padding-right:24px;padding-bottom:64px;padding-left:24px">

	<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"11px","fontWeight":"700","textTransform":"uppercase","letterSpacing":"2.5px"}},"textColor":"light-gray"} -->
	<h2 class="wp-block-heading has-light-gray-color has-text-color" style="font-size:11px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase">Latest Stories</h2>
	<!-- /wp:heading -->

	<!-- wp:spacer {"height":"24px"} -->
	<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query {"queryId":10,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date"},"className":"post-grid-query"} -->
	<div class="wp-block-query post-grid-query">

		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

			<!-- wp:group {"className":"post-card","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group post-card" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"border":{"radius":"0px"}},"className":"post-card-image"} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","bottom":"16px"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="padding-top:16px;padding-bottom:16px">

					<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"11px","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1.5px"}},"textColor":"light-gray"} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"20px","fontFamily":"var(--wp--preset--font-family--display)","fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"top":"6px","bottom":"8px"}}}} /-->

					<!-- wp:post-excerpt {"moreText":"","excerptLength":18,"style":{"typography":{"fontSize":"14px","lineHeight":"1.6"}},"textColor":"mid-gray"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"48px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
