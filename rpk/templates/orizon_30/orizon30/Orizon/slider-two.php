<style>
.banner_postimg{width:79px;height:63px;float:left;overflow:hidden;padding:0 0 10px 0;border:1px solid #E50505;margin:7px 15px 0 12px}

</style>


   <div id="homepage-carousel">
<?php
$baner_catgory_id = of_get_option('banner_fp_blog_category');
//$baner_post_show  = of_get_option('banner_post_show');
if($baner_catgory_id!=""){
query_posts('cat='.$baner_catgory_id.'&showposts=3&order=DSC&orderby=post_date');
}else {
query_posts('cat=1&showposts=3&order=DSC&orderby=post_date');
}
if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post();
?>
<div class="homepage-news-item" style="display:block;">
<div class="hpn-image"><?php if ( has_post_thumbnail() ) {  the_post_thumbnail();} else{ ?><img src="<?php echo get_template_directory_uri() ; ?>/images/nophoto.jpg" height="290" width="600"><?php } ?> </div>
<div class="hpn-info"> <a href="<?php the_permalink(); ?>" class="news-title">
<?php if(strlen(get_the_title()) > 50){
echo mb_substr(get_the_title(), 0,50);echo '...';
}else{
echo mb_substr(get_the_title(), 0,50);	
} ?></a> </div>
</div>
<?php endwhile;  ?>
<?php else : ?>  <?php endif; ?>
<?php wp_reset_query(); ?> 
</div>


<!-- #homepage-carousel -->

<div id="homepage-tab-carousel"> 
<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
<img alt="alt_example" id="btd" src="<?php echo get_template_directory_uri() ; ?>/css/red_css/images/banner_title_dent.png" /> <!-- Image that completes the title ribon - Do not delete -->
<?php } ?>
<?php if (of_get_option('color_scheme')=="2") {?>
<img alt="alt_example" id="btd" src="<?php echo get_template_directory_uri() ; ?>/css/blue_css/images/banner_title_dent.png" /> 
<?php } ?>
<?php
$banner_catgory_id = of_get_option('banner_fp_blog_category');
$banner_post_show  = of_get_option('banner_post_show');
if($banner_catgory_id!=""){
query_posts('cat='.$banner_catgory_id.'&showposts=3&order=DSC');
}else {
query_posts('cat=1&showposts=8&order=DSC');
}
if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post();
?>


<div class="tabs"> 
<div class="banner_postimg">
 
<?php 
 if ( has_post_thumbnail() ) {
the_post_thumbnail( array(79,63) ); 
}else{
?>
<img src="<?php echo get_template_directory_uri() ; ?>/images/nophoto.jpg" width="63" height="79">
<?php } ?>
</div>
<h2><?php if(strlen(get_the_title()) > 25){
echo mb_substr(get_the_title(), 0,25);echo '...';
}else{
echo mb_substr(get_the_title(), 0,25);	
} ?></h2>
<p>
<?php
//$limits_words = of_get_option('banner_post_limits_character');
$excerpt = get_the_excerpt();
if(strlen($excerpt) > 90){
echo mb_substr($excerpt, 0,90);echo '...'; 
}else{
echo mb_substr($excerpt, 0,90);	
}?>
<!-- echo string_limit_words($excerpt,10); ?> -->
</p>
</div>
<?php endwhile;  ?>
<?php else : ?>  <?php endif; ?>
<?php wp_reset_query(); ?> 
</div>



<div id="da-slider" class="da-slider hidden">
<?php
$slider_image_count =  of_get_option('slider_image_count');
$baner_catgory_id = of_get_option('banner_fp_blog_category');
 wp_reset_query(); ?>
 <?php query_posts('cat='.$baner_catgory_id.'&showposts='.$slider_image_count.'&order=DSC&orderby=post_date'); ?>
 <?php 	if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post(); ?> 


<div class="da-slide">
<h2><a href="<?php the_permalink(); ?>" class="da-link"><?php the_title(); ?></a></h2>
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

