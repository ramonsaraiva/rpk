<?php
get_header(); ?>

<div id="main_news_wrapper">
  <div id="row">
    <!-- Left wrapper Start -->
    <div id="left_wrapper">
      <div class="header">
        <h2> <span><?php bloginfo('name'); ?> //&nbsp;</span><?php if(strlen(get_the_title()) > 55){
echo mb_substr(get_the_title(), 0,55);echo '...';
}else{
echo mb_substr(get_the_title(), 0,55);
}  ?> </h2>
      </div>
      <div id="post_wrapper">
        <?php while ( have_posts() ) : the_post(); ?>

        <!-- Header Start -->
        <div id="header">
          <div class="info">
            <h2><?php echo the_title();?></h2>

       <div class="date_n_author">by <?php echo  get_the_author(); ?> in <?php $category = get_the_category();

       $result_names = '';
      foreach($category as $cat){
	  $result_names .='<a href="'.get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a>,';}
   echo rtrim($result_names, ',');?>
             - <?php the_time('j F  Y') ?>
            </div>
          </div>
          <div class="image">
            <div class="comments">
              <?php comments_popup_link( '' . __( '', 'orizon' ) . '0', _x( '1', 'comments number', 'orizon' ), _x( '%', 'comments number', 'orizon' ) ); ?>
            </div>
            <?php if ( has_post_thumbnail() or  get_post_meta($post->ID, 'inner-post-image')) { ?>
            <div class="img_in">
              <?php if( get_post_meta($post->ID, 'inner-post-image')){?> <img src="<?php $img = get_post_meta($post->ID, 'inner-post-image'); echo $img[0];  ?>" /> <?php  }else{ the_post_thumbnail();} ?>
              <?php }else{?>
               <div class="img_in">
              <img src="<?php echo get_template_directory_uri() ; ?>/images/nophoto.jpg">
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- Header end -->

        <!-- Body Start -->
        <div id="body">
          <?php
$overall_rating = get_post_meta($post->ID, 'my_meta_box_select', true);
$rating_one = get_post_meta($post->ID, 'creteria_1', true);
$rating_two = get_post_meta($post->ID, 'creteria_2', true);
$rating_three = get_post_meta($post->ID, 'creteria_3', true);
$rating_four = get_post_meta($post->ID, 'creteria_4', true);
$rating_five = get_post_meta($post->ID, 'creteria_5', true);
if($overall_rating=="0" or $rating_one=="0" && $rating_two=="0" && $rating_three=="0" && $rating_four=="0" && $rating_five=="0"){

}
else{

?>
      				<div class="post-review">
					<?php include('post-rating.php')
					?>
				</div>
				<?php }
				?>
				<p>
					<?php if (strpos($post->post_content,'[gallery') === false){
						$gallery = 0;
						}else{
						$gallery = 1;
						}
					?>
					<?php if($gallery == 1){ ?>
					<ul id="l_media_list">
						<?php the_content();
						?>
					</ul>
					<?php }else{ the_content(); }
					?>
				<p>
				</div>
        <!-- Body end -->

        <!-- Comments Start -->

        <div id="response">
          <div class="header">
            <?php
echo get_comments_number(). '  Comments';?>
            <span> ON " <span class="cyan"> <?php if(strlen(get_the_title()) > 50){
echo mb_substr(get_the_title(), 0,50);echo '...';
}else{
echo mb_substr(get_the_title(), 0,50);
} ?></span> "</span></div>
          <?php comments_template('',true); ?>
        </div>
        <!-- Leave a response end -->
        <div class="clear"></div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
    <div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>