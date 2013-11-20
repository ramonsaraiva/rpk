<?php
/* template name:Page with sidebar
*/
get_header(); ?>


<div id="main_news_wrapper">
  <div id="row">
    <!-- Left wrapper Start -->
    <div id="left_wrapper">
      <div class="header">
        <h2><span>
          <?php bloginfo('name'); ?>
          //</span> <?php echo get_the_title(); ?> </h2>
      </div>
      <div id="post_wrapper">
          <div id="psidebar">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                  <?php the_content(); ?>

                  <?php endwhile; endif; ?>
           </div>
        <div class="clear"> </div>
      </div>
    </div>
    <!-- Left wrapper end -->

    <?php get_sidebar(); ?>
    <div class="clear"> </div>
  </div>
</div>
<?php get_footer(); ?>