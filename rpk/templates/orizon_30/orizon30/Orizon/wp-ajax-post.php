<?php
require ('wp-blog-header.php');
query_posts('paged=' . $_GET['p']);
$paged = $_GET['p'];


/* COPY AND PASTE BELOW THE CODE FROM THE INDEX.PHP FILE OF YOUR CURRENT TEMPLATE
* MAY VARY ON EACH TEMPLATE
* ON THE TEMPLATES INDEX PAGE, WRAP THE SAME INSIDE
* <div id="ajaxcontent"></div>
*/
?>




<div id="content">

<?php if (have_posts()):
	while (have_posts()):
		the_post(); ?>

<div class="post">

<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<div class="postmeta">

<p class="postdate">Posted on <?php the_time('F d, Y'); ?> by <?php the_author(); ?></p>

<p class="postcats">

Filed Under

<?php the_category(', '); ?>

</p>

</div> <!-- end .postmeta -->



<div class="entry">

<?php if (get_post_meta($post->ID, 'simplegeek_thumbimage', true)) { ?>

<img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo
			get_post_meta($post->ID, "simplegeek_thumbimage", $single = true); ?>&amp;h=60&amp;w=60&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" />

                            </a>

						<?php } ?>

<?php the_excerpt(''); ?>



<div class="clear"></div>

<p class="read-more"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">Read Full Article &raquo;</a>

<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>

</p>

</div> <!-- end .entry -->

</div> <!-- end .post -->



<?php endwhile;
endif; ?>

<?php pagenavi(); ?> 

</div> <!-- end #content -->
