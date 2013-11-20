<?php
$general_catgory_id = of_get_option('general_fp_blog_category');
$general_post_show  = of_get_option('general_post_show');

if($general_catgory_id!=""){
//query_posts('cat='.$general_catgory_id.'&showposts='.$general_post_show.'&order=ASC');
global $paged;

$wp_query = new WP_Query();
$wp_cat =  $wp_query->query('cat='.$general_catgory_id.'&showposts='.$general_post_show.'&order=DSC&orderby=post_date&paged='.$paged.'');
}

else {
query_posts('cat=1&showposts=8&order=DSC');
}
?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>

<ul id="general_news">
  <li>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="image"><a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>
      </a></div>
    <?php }else{ ?>
    <div class="image"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/nophoto.jpg"></a></div>
    <?php } ?>
    <?php if (of_get_option('socail_sharing')=="1") { ?>
    <ul class="social_share">
      <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
      <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/fbk.png" border="0" /></a></li>
      <li><a target="_blank" href="https://twitter.com/share?url=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/twitter.png" border="0" /></a></li>
      <li><a href="https://plus.google.com/share?url=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/more.png" border="0" /></a></li>
      <?php } ?>
      <?php if (of_get_option('color_scheme')=="2") { ?>
      <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/fbk.png" border="0" /></a></li>
      <li><a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/twitter.png" border="0" /></a></li>
      <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/more.png" border="0" /></a></li>
      <?php } ?>
    </ul>
    <?php } ?>

    <div class="info">
      <div class="comments">
        <?php comments_popup_link( '' . __( '0', 'orizon' ) . '', _x( '1', 'comments number', 'orizon' ), _x( '%', 'comments number', 'orizon' ) ); ?>
      </div>
      <h2><a href="<?php the_permalink(); ?>">
        <?php if(strlen(get_the_title()) > 30){
			echo mb_substr(get_the_title(), 0,30);echo '...';
			}else{
			echo mb_substr(get_the_title(), 0,30);
			}  ?>
        </a></h2>
      <div class="date_n_author">
        <?php the_time('j F  Y') ?>
        , by <?php echo  get_the_author(); ?></div>
      <p>
        <?php
//$limits_words = of_get_option('general_post_limits_character');
$excerpt = get_the_excerpt();
if(strlen($excerpt) > 350){
echo mb_substr($excerpt, 0,350);echo '...';
}else{
echo mb_substr($excerpt, 0,350);
}?>
      </p>
      <a href="<?php the_permalink(); ?>" class="read_more2">Read more</a> </div>
    <div class="clear"> </div>
  </li>
</ul>
<?php endwhile;  ?>

<ul id="pager">
  <li>
    <?php
$additional_loop = new WP_Query("cat='.$general_catgory_id.'&paged=$paged.'&posts_per_page=$general_post_show");
 $page=$additional_loop->max_num_pages;

echo kriesi_pagination($additional_loop->max_num_pages);

?>
<?php wp_reset_query(); ?>
  </li>
</ul>
