<style type="">
.da-img{overflow:none;}


</style>

<div id="da-slider" class="da-slider">
<script src="<?php echo get_template_directory_uri() ; ?>/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<?php
$slider_image_count =  of_get_option('slider_image_count');
$baner_catgory_id = of_get_option('banner_fp_blog_category');
 wp_reset_query(); ?>
 <?php query_posts('cat='.$baner_catgory_id.'&showposts='.$slider_image_count.'&order=DSC&orderby=post_date'); ?>
 <?php 	if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post(); ?> 


<div class="da-slide">
<h2><a href="<?php the_permalink(); ?>" class="da-link"><?php if(strlen(get_the_title()) > 30){
echo mb_substr(get_the_title(), 0,30);echo '...';
}else{
echo mb_substr(get_the_title(), 0,30);	
} ?></a></h2>
<p><?php
//$limits_words = of_get_option('limits_character_slider');
$excerpt = get_the_excerpt();
echo string_limit_words($excerpt,40); ?>  </p>
<div class="da-img"><?php
 if ( has_post_thumbnail() ) {
the_post_thumbnail(); 
}else{
?><img src="<?php echo get_template_directory_uri() ; ?>/images/nophoto.jpg" height="290" width="600">
<?php } ?>
</div>
</div>

<?php endwhile;  ?>
<?php else : ?>  <?php endif; ?>
<?php wp_reset_query(); ?> 

<div class="da-arrows"> <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span> </div>

</div>
