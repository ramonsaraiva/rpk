<?php
// Register Custom Post Types - Slides 

function register_slideshow_post_type(){
	register_post_type('slideshow', array(
		'labels' => array(
			'name' => _x('Slider Items', 'post type general name', 'gp'),
			'singular_name' => _x('Slider Item', 'post type singular name', 'gp'),
			'add_new' => _x('Add New', 'slideshow', 'gp'),
			'add_new_item' => __('Add New Slider Item', 'gp'),
			'edit_item' => __('Edit Slider Item', 'gp'),
			'new_item' => __('New Slider Item', 'gp'),
			'view_item' => __('View Slider Item', 'gp'),
			'search_items' => __('Search Slider Items', 'gp'),
			'not_found' =>  __('No slider item found', 'gp'),
			'not_found_in_trash' => __('No slider items found in Trash', 'gp'), 
			'parent_item_colon' => ''
		),
		'singular_label' => __('slideshow', 'gp'),
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'supports' => array('title','editor','custom-fields','thumbnail','revisions') //specify what items the post type supports.
	));
}
add_action('init','register_slideshow_post_type');

function slideshow_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'slideshow' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'slideshow_context_fixer' );

// Slideshow admin columns
function edit_slideshow_columns($slideshow_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Slider Item Title', 'column name', 'gp' ),
		"description" => __('Description', 'gp' ),
		"author" => __('Author', 'gp' ),
		"date" => __('Date', 'gp' ),
		"thumbnail" => __('Thumbnail', 'gp' )
	);

	return $columns;
}
add_filter('manage_edit-slideshow_columns', 'edit_slideshow_columns');

function manage_slideshow_columns($column) {
	global $post;
	
	if ($post->post_type == "slideshow") {
		switch($column){
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
			case "description":
				the_excerpt();
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_slideshow_columns', 10, 2);

// Add image size for slideshow 
if ((isset($_REQUEST['post_id']) && get_post_type($_REQUEST['post_id']) == 'slideshow') || 
	(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete')) {
	add_image_size('slideshow', 960, 500, true);
}


?>