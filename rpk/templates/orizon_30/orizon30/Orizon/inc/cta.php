<?php 
/**
 * Concept: Call to Action
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
 ?>

<div id="cta-outer" style="border-bottom:1px solid <?php echo of_get_option('cta_bg'); ?>;">
	<div id="cta-inner" style="background-color:<?php echo of_get_option('cta_bg'); ?>; color:<?php echo of_get_option('cta_colour'); ?>;">
		<div class="w960">
			<?php echo of_get_option('cta_text'); ?>
			
			
			
			<?php if ( of_get_option('show_cta_button') ) { // Shows or hides this group ?>
				<div id="cta-button"><a class="button" style="background-color:<?php echo of_get_option('cta_button_bg'); ?>; color:<?php echo of_get_option('cta_button_colour'); ?>;" href="<?php echo of_get_option('cta_button_link'); ?>" title="my title"><?php echo of_get_option('cta_button_text'); ?></a></div>
				<?php } ?>
			
			
			
			
			
			
			
		</div>
	</div>
</div>
