<?php
/* template name:Full page
*/
get_header(); ?>

<!-- Full page wrapper Start -->
<div id="full_page_wrapper">

<div class="header">
<h2><span><?php bloginfo('name'); ?> //</span> <?php echo get_the_title(); ?> </h2>
</div>

<div id="post_wrapper">


<!-- Body Start -->
<div id="body">
<?php while ( have_posts() ) : the_post(); ?>


<?php the_content(); ?>


<?php endwhile; ?>
</div>
<!-- Body end -->

<div class="clear"></div>
</div>

</div>
<!-- Full page wrapper end -->

<?php get_footer(); ?>