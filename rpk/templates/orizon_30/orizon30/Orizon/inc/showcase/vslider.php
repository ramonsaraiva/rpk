<?php 
/**
 * Concept: vSlider
 * Copyright: www.vibethemes.com
 * Theme: Incantation
 */
?> 

 

				<div id="showcase-slider">
					<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">
						<?php //if (function_exists('vslider')) { vslider('my_vslider'); }?>
						<?php if (function_exists('vslider')) { vslider(); } ?>					
					</div>
				</div>
