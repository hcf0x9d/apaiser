<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area grid_3 alpha" role="complementary">
			<h3 class="page-title">Blog</h3>
            <p>apaiser transforms the bathroom into an oasis of refined elegance and calm. Designed with high performance in mind all apaiser’s stunning stone bathware exemplifies quality contemporary design and unmatched attention to detail.</p>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>