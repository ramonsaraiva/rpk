<?php 
/**
 * Credit to: jeremy martin for the original jquery kwicks slider
 * Modified by GradientPixels.ca
 **/ 
?>
 <?php
//Retrieve all the slide posts from the database. You may want to limit this to a
//specific number. Using the value -1 for 'numberposts' sets it to retrieve all slides
$acc_count = of_get_option('acc_count');
$args = array(
'numberposts'     => $acc_count,
'orderby'         => 'post_date',
'order'           => 'ASC',
'post_type'       => 'slideshow',
'post_status'     => 'publish',

);
$slides = get_posts($args);
//The Markup - Here's the html for our slider
?>


<div id="showcase-slider">
	<div style="margin:auto; width:960px; border:1px solid <?php echo of_get_option('showcase_border'); ?>; position:relative;">
					
<div id="kwicks-showcase" style="height:<?php echo of_get_option('acc_height'); ?>px; width:960px; background-color:<?php echo of_get_option('acc_bgcolour'); ?>;">
	<ul class="kwicks horizontal" >	
		<!-- Begin the slides loop -->
		<?php foreach($slides as $post) : setup_postdata($post); ?>
			<?php if( has_post_thumbnail() ) : // First Check if a post thumbnail has been added, if not, skip this one ?>
				<?php // Custom Fields Kwicks Accordion slider ?>
					<?php $slidelink = get_post_meta($post->ID,'Slide Link', true); // Add a link to the slide or button. ?>	
					<?php $slidealt = get_post_meta($post->ID,'Slide ALT', true); // Add an ALT tag to each slide. ?>				
					<?php $slidecaption = get_post_meta($post->ID,'Slide Caption', true); // Add a small caption to your kwicks slide. ?>
					<?php $slidelinktitle = get_post_meta($post->ID,'Slide Link Title', true); // Add a title to your slide link. ?>					
			<li style="height:<?php echo of_get_option('acc_height'); ?>px; width:<?php echo of_get_option('acc_width'); ?>px;">
				<div>				
					<div class="kwicks-shadow" style="height:<?php echo of_get_option('acc_height'); ?>px;"> </div>
					<!-- Setup your slide image with a link -->
						<a href="<?php echo $slidelink; ?>" title="<?php echo $slidelinktitle; ?>">
						
	<?php // Image sizing for 1 column Portfolio
	$theight = of_get_option('acc_height');
	$thumb = get_post_thumbnail_id(); 
	$postimage = vt_resize($thumb, '', 960, $theight, true );
	?>							
							
	<img src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>" width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" class="slideimage" />						
		</a>
					<!-- Title with a small Caption when slide closed -->
					<p class="minicaption" style="width:<?php echo of_get_option('acc_mini_width'); ?>px;"><span class="minicaptiontitle"><?php the_title(); // you can change this to the $kwickstitle cfield ?></span><?php echo $slidecaption; ?></p>			
					<!-- Title with a full intro on Hover -->
					<div class="slidecaption"><span class="slidecaptiontitle"><?php the_title();?></span>
						<?php the_content(); ?>
					</div>
					
				</div>
			</li>
			<?php endif; ?>
  		<?php endforeach; ?>
	</ul>
</div>
	</div>
				</div>
<!-- slider image bottom border -->

