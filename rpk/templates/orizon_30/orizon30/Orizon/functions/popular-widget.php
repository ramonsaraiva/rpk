<?php
/**
 * Widget Name: Popular Posts with a Thumbnail
 * Description: A Popular Posts widget that displays a thumbnail from your blog.
 * Version: 1.0
 */

class PopularWidget extends WP_Widget {

    function PopularWidget() {
        parent::WP_Widget(false, $name = 'Popular Posts');
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $nopost=$instance['nopost'];
        ?>

	<?php //echo $before_widget; ?>
		<div class="review">
    <div class="header"> <?php echo  $instance['title'] ; ?></div>
    <ul>

<?php $pc = new WP_Query('orderby=comment_count&cat='.$instance['cat'].'&posts_per_page='.$nopost);
if ( $pc->have_posts() ) : ?>
<?php while ($pc->have_posts()) : $pc->the_post(); ?>


      <li>
		  <?php if ( has_post_thumbnail() ) { ?>
        <div class="img"><a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
          </a></div>
         <?php }else{ ?>
          <div class="img"><a href="<?php the_permalink(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/images/nophoto.jpg">
          </a></div>
          <?php } ?>
        <div class="info"> <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a><br/>
          <small>
          <?php the_time('j F  Y') ?>
          ,
          <?php comments_popup_link( '' . __( '0', 'orizon' ) . '', _x( '1', 'comments number', 'orizon' ), _x( '%', 'comments number', 'orizon' ) ); ?>
          Comments</small><br/>
          <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
          <?php
// overall stars
$postid=$pc->post->ID;
$overal_rating_1 = get_post_meta($postid, 'my_meta_box_select', true);
if($overal_rating_1!="0" && $overal_rating_1=="0.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/half_star.png" />
          <?php } ?>
          <?php $overall_rating_2 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_2!="0" && $overall_rating_2=="1"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/01stars.png" />
          <?php } ?>
          <?php $overal_rating_3 = get_post_meta($postid, 'my_meta_box_select', true);
if($overal_rating_3!="0" && $overal_rating_3=="1.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/1.5stars.png" />
          <?php } ?>
          <?php $overall_rating_4 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_4!="0" && $overall_rating_4=="2"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/02stars.png" />
          <?php } ?>
          <?php $overall_rating_5 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_5!="0" && $overall_rating_5=="2.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/2.5stars.png" />
          <?php } ?>
          <?php $overall_rating_6 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_6!="0" && $overall_rating_6=="3"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/03stars.png" />
          <?php } ?>
          <?php $overall_rating_7 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_7!="0" && $overall_rating_7=="3.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/3.5stars.png" />
          <?php } ?>
          <?php $overall_rating_8 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_8!="0" && $overall_rating_8=="4"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/04stars.png" />
          <?php } ?>
          <?php $overall_rating_9 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_9!="0" && $overall_rating_9=="4.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/4..5stars.png" />
          <?php } ?>
          <?php $overall_rating_10 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_10!="0" && $overall_rating_10=="5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/05stars.png" />
          <?php } ?>
          <?php  } ?>
          <?php if (of_get_option('color_scheme')=="2") {
// overall stars
global $post;
$postid=$pc->post->ID;
$overal_rating_1 = get_post_meta($post->ID, 'my_meta_box_select', true);
if($overal_rating_1!="0" && $overal_rating_1=="0.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/half_star.png" />
          <?php } ?>
          <?php $overall_rating_2 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_2!="0" && $overall_rating_2=="1"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/01stars.png" />
          <?php } ?>
          <?php $overal_rating_3 = get_post_meta($postid, 'my_meta_box_select', true);
if($overal_rating_3!="0" && $overal_rating_3=="1.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/1.5stars.png" />
          <?php } ?>
          <?php $overall_rating_4 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_4!="0" && $overall_rating_4=="2"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/02stars.png" />
          <?php } ?>
          <?php $overall_rating_5 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_5!="0" && $overall_rating_5=="2.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/2.5stars.png" />
          <?php } ?>
          <?php $overall_rating_6 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_6!="0" && $overall_rating_6=="3"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/03stars.png" />
          <?php } ?>
          <?php $overall_rating_7 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_7!="0" && $overall_rating_7=="3.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/3.5stars.png" />
          <?php } ?>
          <?php $overall_rating_8 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_8!="0" && $overall_rating_8=="4"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/04stars.png" />
          <?php } ?>
          <?php $overall_rating_9 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_9!="0" && $overall_rating_9=="4.5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/4.5stars.png" />
          <?php } ?>
          <?php $overall_rating_10 = get_post_meta($postid, 'my_meta_box_select', true);
if($overall_rating_10!="0" && $overall_rating_10=="5"){ ?>
          <img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/05stars.png" />
          <?php } ?>
          <?php  } ?>
        </div>
      </li>
      <?php endwhile;  ?>
      <?php else : ?>
      <div>NO Popular Post</div>
      <?php endif; ?>

    </ul>
  </div>
              <?php //echo $after_widget; ?>
        <?php
    }

/** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
	$instance = $old_instance;

	$instance['title'] = strip_tags($new_instance['title']);
	$instance['cat'] = strip_tags($_POST['cat']);
	$instance['nopost'] = strip_tags($new_instance['nopost']);

        return $instance;
    }

/** @see WP_Widget::form */
    function form($instance) {
        $title = esc_attr($instance['title']);
        $category = esc_attr($instance['cat']);
        $nopost = esc_attr($instance['nopost']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category:', 'gp'); ?></label>
         <?php wp_dropdown_categories('selected='. $category); ?>
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('nopost'); ?>"><?php _e('No. of Posts:', 'gp'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('nopost'); ?>" name="<?php echo $this->get_field_name('nopost'); ?>" type="text" value="<?php echo $nopost; ?>" />
        </p>
        <?php
    }

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("PopularWidget");'));
?>