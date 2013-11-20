<?php

// Register Custom Post Types - Portfolios
function register_portfolio_post_type(){
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => _x('Portfolio', 'post type general name', 'gp' ),
			'singular_name' => _x('Portfolio', 'post type singular name', 'gp' ),
			'add_new' => _x('Add New', 'portfolio', 'gp' ),
			'add_new_item' => __('Add New Portfolio', 'gp' ),
			'edit_item' => __('Edit Portfolio', 'gp' ),
			'new_item' => __('New Portfolio', 'gp' ),
			'view_item' => __('View Portfolio', 'gp' ),
			'search_items' => __('Search Portfolio', 'gp' ),
			'not_found' =>  __('No portfolio found', 'gp' ),
			'not_found_in_trash' => __('No portfolio found in Trash', 'gp' ),
			'parent_item_colon' => ''
		),
		'singular_label' => __('portfolio', 'gp' ),
		'public' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'portfolio' ),
		'query_var' => true,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments')
	));

// register taxonomy for portfolio categories
	register_taxonomy('portfolio_category','portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Portfolio Categories', 'taxonomy general name', 'gp' ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name', 'gp' ),
			'search_items' =>  __( 'Search Categories', 'gp' ),
			'popular_items' => __( 'Popular Categories', 'gp' ),
			'all_items' => __( 'All Categories', 'gp' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'gp' ),
			'update_item' => __( 'Update Portfolio Category', 'gp' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'gp' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'gp' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'gp' ),
			'add_or_remove_items' => __( 'Add or remove portfolio category', 'gp' ),
			'choose_from_most_used' => __( 'Choose from the most used portfolio category', 'gp' )
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
}
add_action('init','register_portfolio_post_type');

function portfolio_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'portfolio' ) {
		global $wp_query;
		$wp_query->is_home = false;
	}
	if ( get_query_var( 'taxonomy' ) == 'portfolio_category' ) {
		global $wp_query;
		$wp_query->is_404 = true;
		$wp_query->is_tax = false;
		$wp_query->is_archive = false;
	}
}
add_action( 'template_redirect', 'portfolio_context_fixer' );

// Portfolio admin columns
function edit_portfolio_columns($gallery_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Portfolio Name', 'column name', 'gp' ),
		"portfolio_categories" => __('Categories',  'gp' ),
		"description" => __('Description',  'gp' ),
		"thumbnail" => __('Thumbnail',  'gp' )
	);

	return $columns;
}
add_filter('manage_edit-portfolio_columns', 'edit_portfolio_columns');

function manage_portfolio_columns($column) {
	global $post;

	if ($post->post_type == "portfolio") {
		switch($column){
			case "description":
				the_excerpt();
				break;
			case "portfolio_categories":
				$terms = get_the_terms($post->ID, 'portfolio_category');

				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=portfolio&portfolio_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('portfolio_category');
					$output = "No $t->label";
				}

				echo $output;
				break;

			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_portfolio_columns', 10, 2);

// Add image size for Portfolio
if ((isset($_REQUEST['post_id']) && get_post_type($_REQUEST['post_id']) == 'portfolio') ||
	(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete')) {
	add_image_size('portfolio', 960, 950, true);
}



?>