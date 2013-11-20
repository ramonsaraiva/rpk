<?php 
/**
 * Concept: Single image header for your blog home page
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>
<?php if ( of_get_option('blog_header_show') ) { // Shows or hides this group ?>
	<div id="showcase-slider">
		<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">
			<?php if ( of_get_option('blog_caption_show') ) { // Shows or hides this group ?>
				<div id="header-caption"><h1 style="color:<?php echo of_get_option('blog_photo_title_colour'); ?>; "><?php echo of_get_option('blog_header_title'); ?></h1><p style="color:<?php echo of_get_option('blog_photo_caption_colour'); ?>; "><?php echo of_get_option('blog_header_caption'); ?></p></div>
			<?php } ?>

<?php 
$fpih = of_get_option('blog_photo_height');
$path = of_get_option('blog_photo'); 
$image = vt_resize( '', $path, 960, $fpih, true );
?>
<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="<?php echo of_get_option('blog_photo_alt'); ?>" align="middle" />	


		</div>
	</div>
<?php } ?>