<?php 
/**
 * Concept: Single image for the front page
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>

				<div id="showcase-slider">
					<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">
					
<?php if ( of_get_option('fp_intro_show') ) { // Shows or hides this group ?>
	<div id="header-caption"><h1 style="color:<?php echo of_get_option('fp_photo_title_colour'); ?>; "><?php echo of_get_option('fp_header_title'); ?></h1><p style="color:<?php echo of_get_option('fp_photo_caption_colour'); ?>; "><?php echo of_get_option('fp_header_caption'); ?></p>
		<?php if ( of_get_option('showcase_button_show') ) { // Shows or hides this group ?>
			<a class="showcase-button" href="<?php echo of_get_option('fp_photo_link'); ?>"><?php echo of_get_option('fp_photo_link_text'); ?></a>
		<?php } ?>
	</div>
<?php } ?>
		
<?php 
 $fpih = of_get_option('fp_photo_height');
 $path = of_get_option('fp_photo'); 
 $image = vt_resize( '', $path, 960, $fpih, true );
?>
<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php echo of_get_option('fp_photo_alt'); ?>" align="middle" />	

					</div>
				</div>
		