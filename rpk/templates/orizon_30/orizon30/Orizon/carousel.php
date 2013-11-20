
<div id="hot_news">
<div class="header">

<?php if(of_get_option('orizon_title_text')!="") { ?>
<h2 id="hot_news_title"><span><?php bloginfo('name'); ?> //&nbsp;</span>  <?php echo  of_get_option('orizon_title_text') ?> </h2> 
<?php } else { ?>
<h2 id="hot_news_title"><span><?php bloginfo('name'); ?> //&nbsp;</span> Hot News</h2>
<?php } ?>
</div>

<!-- Previous and next selector --> 
<a id="prev" class="prev" href="#"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="21" height="33" border="0" /></a> 

<a id="next" class="next" href="#"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="21" height="33" border="0" /></a>


<ul id="hot_news_box">
<?php
$catgory_id = of_get_option('fp_blog_category');
$post_show  = of_get_option('post_show');

if($catgory_id!=""){
 query_posts('cat='.$catgory_id.'&showposts='.$post_show.'&order=DSC');
}else {
query_posts('cat=1&showposts=8&order=DSC');
}
if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post();
?>


<li>
<h2><a href="<?php the_permalink(); ?>"><?php 
if(strlen(get_the_title()) > 30){
echo mb_substr(get_the_title(), 0,30);echo '...';
}else{
echo mb_substr(get_the_title(), 0,30);	
} ?>

</a></h2>
<?php if ( has_post_thumbnail() ) { ?>
<div class="image">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(120,120)); ?></a></div>
<?php }else{ ?>
<div class="image">
<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/nophoto.jpg"></a></div>
<?php } ?>
<div class="content">


<p><?php
//$limits_words = of_get_option('post_limits_character');
$excerpt = get_the_excerpt();
if(strlen($excerpt) > 150){
echo mb_substr($excerpt, 0,150);echo '...'; 
}else{
echo mb_substr($excerpt, 0,150);	
}?>
</p>
<div class="info">
<span class="comment_count" >

<a href="<?php the_permalink() ?>#comments"><?php comments_number('0 comment','1 comment','% comments')?></a> </span> 


<a href="<?php the_permalink(); ?>" class="read_more" >Read more</a> 

</div>
</div>
</li>

<?php endwhile;  ?>
<?php else : ?>  <?php endif; ?>
<?php wp_reset_query(); ?> 

</ul>
</div>
