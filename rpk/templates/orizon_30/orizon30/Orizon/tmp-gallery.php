<?php
/* template name:Gallery
*/
get_header();
?>

<!-- Full page wrapper Start -->
<div id="full_page_wrapper">

<div class="header">
<h2><span><?php bloginfo('name'); ?> //</span> <?php echo get_the_title(); ?> </h2>
</div>

<!-- Gallery wrapper Start -->
<ul id="gallery_wrapper">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>




</ul>
<!-- Gallery wrapper end -->




<div class="clear"></div>
</div>
<!-- Full page wrapper end -->
<?php get_footer(); ?>