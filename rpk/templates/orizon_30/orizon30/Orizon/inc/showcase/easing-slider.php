<?php 
/**
 * Concept: Easing Slider plugin
 * Copyright http://matthewruddy.com/
 * Theme: Incantation
 */
?>

				<div id="showcase-slider">
					<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">
						<?php if (function_exists("easing_slider")){ easing_slider(); }; ?>
					</div>
				</div>