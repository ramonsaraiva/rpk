<?php 
/**
 * Concept: Sidebar for the footer area
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 *
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then show nothing.
 * Based on the WordPress twenty eleven theme
 */
	if (   ! is_active_sidebar( 'footer-1'  )
		&& ! is_active_sidebar( 'footer-2' )
		&& ! is_active_sidebar( 'footer-3'  )
		&& ! is_active_sidebar( 'footer-4'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<aside>
	<div id="sidebar-footer" <?php gp_footer_sidebar_class(); ?>>
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div id="first" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- #first .widget-area -->
		<?php endif; ?>
	
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div id="second" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- #second .widget-area -->
		<?php endif; ?>
	
		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div id="third" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- #third .widget-area -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="fourth" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- #third .widget-area -->
		<?php endif; ?>
		
	</div><!-- #sidebar-footer -->
</aside>