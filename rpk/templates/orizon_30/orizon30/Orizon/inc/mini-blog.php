<?php
/**
 * Concept: Mini Blog for the front page
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>

<?php if ( of_get_option('fp_blog_area') ) { // Shows or hides the blog group ?>
<!-- Begin Mini Blog -->
			<div class="fp-hdbg1" style="border-bottom:1px solid <?php echo of_get_option('fp_centeredheading_lines'); ?>;">
				<div class="fp-hdbg2" style="background-color:<?php echo of_get_option('fp_centeredheading_lines'); ?>;">
					<div class="fp-hd">
						<h1><span class="title"><?php echo of_get_option('mb_heading'); ?></span></h1>
					</div>
				</div>
			</div>
<div id="mini-blog-wrapper" class="clearfix">
<div id="mini-blog-3">

<?php
$fpblogcat = of_get_option('fp_blog_category');
$showpost = 3;
$my_query = new WP_Query( 'cat='.$fpblogcat.'&showposts='.$showpost.'' );
?>

<?php $count = 1; ?>

<?php if($my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); ?>
  	<div class="mb-wrap column-<?php echo $count; ?> <?php if($count  % 3 == 0) echo 'last' ?>">

			<?php if (has_post_thumbnail()) : // If the post has a Featured Image ?>
				<?php
				$thumbheight = of_get_option('mb_thumbnail_height');
				$thumb = get_post_thumbnail_id();
				$postimage = vt_resize($thumb, '', 294, $thumbheight, true );
				?>
				<div class="mb-imagewrap" style="height:<?php echo of_get_option('mb_thumbnail_height'); ?>px;" >
					<div class="mb-overlay"></div>
					<a href="<?php the_permalink(); ?>">
					<img src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>" width="<?php echo $postimage[width]; ?>"
					height="<?php echo $postimage[height]; ?>" style="border-bottom:6px solid <?php echo of_get_option('mb_img_bottom'); ?>;" />
					</a>
				</div>
			<?php endif; ?>

   <h3><?php the_title(); ?></h3>
    <?php global $more; $more = FALSE; ?>
	<p><?php excerpt('20'); ?>
		<?php if ( of_get_option('show_mb_button') ) : // display the Read More text link or button?>
			</p><span><a class="button" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'gp' ); ?></a></span>
		<?php else : ?>
			<a style="font-style:italic;" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'gp' ); ?></a></p>
		<?php endif; ?>


</div><!-- .mb-wrap column count -->


<?php $count++;  ?>
<?php endwhile; } ?>
<?php wp_reset_query() ?>
</div><!-- #mini-blog-3 -->

<!--<div id="mini-blog-widget"><h3>Mini Blog Widget</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis euismod metus, ut cursus nunc tempor et. Duis bibendum metus eget odio euismor.</p></div>-->

</div><!-- #mini-blog-wrapper -->

<?php } ?><!-- End Mini Blog -->