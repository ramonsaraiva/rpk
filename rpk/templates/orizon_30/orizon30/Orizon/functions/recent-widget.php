<?php
/**
 * Widget Name: Recent Posts with a Thumbnail Widget
 * Description: A Recent Posts widget that displays a thumbnail from your article.
 * Version: 1.0
 */

add_action( 'widgets_init', 'latest_posts_load_widgets' );

/**
 * Register our widget.
 */
function latest_posts_load_widgets() {
	register_widget( 'Latest_Posts_Widget' );
}

/**
 * Custom Category Widget class.
 * Special thanks to
 */
class Latest_Posts_Widget extends WP_Widget {

/**
 * Widget setup.
 */
	function Latest_Posts_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-latest-posts', 'description' => esc_html__('Display your latest posts and thumbnail from all categories or from a specific category', 'gp') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'latest-posts-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'latest-posts-widget', esc_html__('GP Recent Posts', 'gp'), $widget_ops, $control_ops );
	}

/**
 * How to display the widget on the screen.
 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$category_id = $instance['category_id'];
		$num_posts = absint( $instance['num_posts'] );
		$post_offset =  absint( $instance['post_offset'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
		    echo $before_title . $title . $after_title;

		/* Display the Latest Posts accordinly... */
		echo '<div class="widget-latest-posts">';
		$cats_to_include = ( $category_id ) ? "cat={$category_id}&": '';
		$num_posts_query = new WP_Query( "{$cats_to_include}showposts={$num_posts}&offset={$post_offset}" );
		if( $num_posts_query->have_posts()) : ?>
		
			<ul>
				<?php while( $num_posts_query->have_posts()) : $num_posts_query->the_post(); update_post_caches($posts); ?>
					<?php // resize thumbnail using method from Victor Teixeira
					$thumb = get_post_thumbnail_id(); 
					$postimage = vt_resize($thumb, '', 60, 60, true );
					?>
				<li>
					<div class="rp-wrap clearfix">
					<?php if (has_post_thumbnail()) : ?>
						
							<a href="<?php the_permalink(); ?>"><img class="imageborder" src="<?php echo $postimage[url]; ?>" width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" alt="<?php the_title(); ?>" /></a>
						
					<?php else : ?>
						
							<a href="<?php the_permalink(); ?>"><img class="imageborder" src="<?php get_template_directory_uri(); ?>/images/noimage.png" width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" alt="<?php the_title(); ?>"/></a>
						
					<?php endif; ?>
					<h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
						<?php // excerpt('10'); ?>
						<p class="rp-meta">Posted: <?php echo get_the_date(); ?><br />
						<?php comments_popup_link( __('No Comments', '1 Comment', '% Comments') ); ?></p>
						</div>
				</li>
				<?php endwhile; ?>
			</ul>
			
			<?php endif;
			echo '</div><!-- #widget-latest-posts -->';
			
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_posts'] = strip_tags( $new_instance['num_posts'] );
		$instance['post_offset'] = strip_tags( $new_instance['post_offset'] );
		/* No need to strip tags for dropdowns and checkboxes. */
		$instance['category_id'] = $new_instance['category_id'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Latest Posts', 'gp'), 'category_id' => '', 'num_posts' => 3, 'post_offset' => 0);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'gp'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>

		<!-- Show Categories -->
		<p>
			<label for="<?php echo $this->get_field_id( 'category_id' ); ?>"><?php esc_html_e('Pick a category:', 'gp'); ?></label>
			<?php wp_dropdown_categories('show_option_all=All&hierarchical=1&orderby=name&selected='.$instance['category_id'].'&name='.$this->get_field_name( 'category_id' ).'&class=widefat'); ?>
		</p>

		<!-- Number of Posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num_posts' ); ?>"><?php esc_html_e('Number of posts to show:', 'gp'); ?></label>
			<input id="<?php echo $this->get_field_id( 'num_posts' ); ?>" type="text" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" value="<?php echo $instance['num_posts']; ?>" size="2" maxlength="2" />
			<br />
			<small><?php esc_html_e('(Recommend no more than 10)', 'gp'); ?></small>
		</p>

		<!-- Post Offset: Example: if you have your blog configured to show just one post on the front page, but also want to list links to the previous five posts in category ID 1, you can use this -->
		<p>
			<label for="<?php echo $this->get_field_id( 'post_offset' ); ?>"><?php esc_html_e('Number of posts to skip:', 'gp'); ?></label>
			<input id="<?php echo $this->get_field_id( 'post_offset' ); ?>" type="text" name="<?php echo $this->get_field_name( 'post_offset' ); ?>" value="<?php echo $instance['post_offset']; ?>" size="2" maxlength="2" />
			<br />
			<small><?php esc_html_e('(offset from latest)', 'gp'); ?></small>
		</p>

<?php
	}
}


