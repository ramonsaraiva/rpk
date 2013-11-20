<?php 
/**
 * Concept: Single image for your inner pages
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>
<?php // For static image page headers ?>
<?php $pageheader = get_post_meta($post->ID,'Page Header', true); // Enable this header. ?>	
	<?php $pageheaderalt = get_post_meta($post->ID,'Page Header ALT', true); // Add an ALT tag to your image. ?>				
		<?php $pageheadertitle = get_post_meta($post->ID,'Page Header Title', true); // Add a title. ?>
			<?php $pageheadercaption = get_post_meta($post->ID,'Page Header Caption', true); // Add an page intro. ?>

<?php if ( $pageheader ) : ?>
	<div id="showcase-slider">
		<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">

		<?php if ( $pageheadertitle ) : ?>
			<div id="header-caption">
				<h1 style="color:<?php echo of_get_option('page_photo_title_colour'); ?>; "><?php echo $pageheadertitle; ?></h1>
					<?php if ( $pageheadercaption ) : ?>
						<p style="color:<?php echo of_get_option('page_photo_caption_colour'); ?>; "><?php echo $pageheadercaption; ?></p>
					<?php endif; ?>
			</div>
		<?php endif; ?>
		
	<?php // Image sizing for 1 column Portfolio
	$hdrheight = of_get_option('page_header_height');
	$thumb = get_post_thumbnail_id(); 
	$postimage = vt_resize($thumb, '', 960, $hdrheight, true );
	?>											
	<img src="<?php echo $postimage[url]; ?>" alt="<?php echo $pageheaderalt; ?>" width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>"  />

		</div>
	</div>
<?php endif; ?>