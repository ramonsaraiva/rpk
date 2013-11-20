<?php
get_header(); ?>

<div id="main_news_wrapper">
  <div id="row"> 
    <!-- Left wrapper Start -->
    <div id="left_wrapper">
      <div class="header">
        <h2><span><?php bloginfo('name'); ?> //&nbsp;</span> <?php echo get_the_title(); ?> </h2>
      </div>
      <?php while ( have_posts() ) : the_post(); ?>
      
      <!-- Body Start -->
      <?php the_content(); ?>
      <?php endwhile;  ?>

    </div>
  

    <?php get_sidebar(); ?>
    <div class="clear"> </div>
  </div>
</div>
<?php get_footer(); ?>
 </div>
