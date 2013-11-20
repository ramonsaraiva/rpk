<?php 
/**
 * Concept: Right Page sidebar
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
 ?>
<div id="sidebar-right">
	<aside>
		<?php if ( ! dynamic_sidebar( 'Page Right Column' ) ) : ?>
			<div class="widget">
				<h3>Right Column Sidebar</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vestibulum tortor vitae lectus posuere at consequat nulla dignissim. Suspendisse in orci quis enim gravida tincidunt sit amet vel erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id rutrum risus. Maecenas ultricies fermentum mi, et dapibus turpis varius et. Aenean ac est vel ante tempor bibendum at eget dui. Donec augue mi, tristique ac tristique eget, volutpat eget massa.</p>
			</div>
		<?php endif; ?>
	</aside>
</div><!-- #sidebar-right -->