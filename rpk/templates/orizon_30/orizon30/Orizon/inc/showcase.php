<?php 
/**
 * Concept: Showcase group for front page
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>

				<?php if ( of_get_option('frontpage_showcase_only') ) : ?>
				
					<?php if (is_front_page()) { // front page showcase group			
						$slider_choice = of_get_option('slider_choice');
							switch ($slider_choice) {
							case "none":
								// load nothing
								break;
							case "image":
								get_template_part( 'inc/showcase/image' ); // image.php
								break;
							case "custom":
								get_template_part( 'inc/showcase/custom-slider' ); // custom-slider.php
								break;								
							case "wpheader":
								get_template_part( 'inc/showcase/wp-header' ); // wp-header.php
								break;
							case "easing":
								get_template_part( 'inc/showcase/easing-slider' ); // easing-slider.php
								break;
							case "accordion":
								get_template_part( 'inc/showcase/kwicks-slider' ); // vslider.php
								break;
							}			
						} 
						elseif (is_home()) {
						get_template_part( 'inc/showcase/blog-header' ); // blog-header.php
						}
						else
						   get_template_part( 'inc/showcase/page-headers' ); // page-headers.php
					?>	
									
			<?php else : // Show the WordPress Custom Headers only and on all pages ?>
				<?php get_template_part( 'inc/showcase/wp-header' ); ?>
			<?php endif; ?>