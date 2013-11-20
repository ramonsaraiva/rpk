<?php
get_header(); ?>

<div id="main_news_wrapper">
  <div id="row"> 
    <!-- Left wrapper Start -->
    <div id="left_wrapper">
      <div class="header">
        <h2> <span><?php bloginfo('name'); ?> //&nbsp;</span>
		
		<?php if ( is_day() ) : ?>
							<?php printf( __( '%s', 'orizon' ), '' . get_the_date() . '' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( '%s', 'orizon' ), '' . get_the_date( _x( 'F Y', 'monthly archives date format', 'orizon' ) ) . '' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( '%s', 'orizon' ), '' . get_the_date( _x( 'Y', 'yearly archives date format', 'orizon' ) ) . '' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'orizon' ); ?>
						<?php endif; ?>
						</h2>
      </div>
        <?php
        
    global $paged;
         while ( have_posts() ) : the_post(); ?>
        
            <ul id="general_news">
            <li>
              <div class="image"><a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) {  the_post_thumbnail(); }else{?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/nophoto.jpg">
				<?php } ?>
                </a></div>
               <?php if (of_get_option('socail_sharing')=="1") { ?> 
              <ul class="social_share">
                <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/fbk.png" border="0" /></a></li>
                <li><a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/twitter.png" border="0" /></a></li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/more.png" border="0" /></a></li>
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
                <?php if(of_get_option('general_read_more_home')!="" ){ ?>
                <a href="<?php the_permalink(); ?>" class="read_more2"><?php echo of_get_option('general_read_more_home'); ?></a>
                <?php } else { ?>
                <a href="<?php the_permalink(); ?>" class="read_more2">read more</a>
                <?php } ?>
              </div>
              <div class="clear"> </div>
            </li>
          </ul>
        <?php endwhile; ?>
        <ul id="pager">
        <li>
          <?php 
echo kriesi_pagination();

?>
        </li>
      </ul>
<div class="clear"></div>
    </div>
    <?php get_sidebar(); ?>
    <div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>
</div>
