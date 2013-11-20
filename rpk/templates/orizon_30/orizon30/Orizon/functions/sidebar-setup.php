<?php // Register sidebars

// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/

      function is_sidebar_active( $index = 1){
       $sidebars = wp_get_sidebars_widgets();
       $key  = (string) 'sidebar-'.$index;
       return (isset($sidebars[$key]));
      }
// Lets layout the sidebars for widgets
function gp_widgets_init() {
	// Footer One
if(function_exists('register_sidebar'))
	register_sidebar(array(
	'name' => __( 'Right sidebar ', 'gp' ),
	'description'   => __( 'Right side widget area', 'gp' ),
	'id' => 'right-1',
	'before_widget' => '<div class="right_navi">',
	'after_widget' => '<div class="bootom_image"></div></div>',
	'before_title' => '<div class="latest_text"><h1>',
	'after_title' => '</h1></div>',
));



// right sidebar column two
/*
if(function_exists('register_sidebar'))
	register_sidebar(array(
	'name' => __( 'right sidebar column two', 'gp' ),
	'description'   => __( 'right sidebar column two', 'gp' ),
	'id' => 'rightsidebar-2',
	'before_widget' => '<div class="foot_navi">',
	'after_widget' => '</div>',
	'before_title' => '<div class="text_pro"><h1 style="height: 14px;">',
	'after_title' => '</h1></div>',
));

*/


// footer  column one
if(function_exists('register_sidebar'))
	register_sidebar(array(
	'name' => __( 'Footer widget-1 widget only', 'gp' ),
	'description'   => __( 'Please use only one widget', 'gp' ),
	'id' => 'footerwidget-1',
	'before_widget' => '<div class="foot_navi">',
	'after_widget' => '</div>',
	'before_title' => '<div class="text_pro"><h1 style="height: 14px;">',
	'after_title' => '</h1></div>',
));

/*
// footer  column two
if(function_exists('register_sidebar'))
	register_sidebar(array(
	'name' => __( 'footer column two', 'gp' ),
	'description'   => __( 'footer column two', 'gp' ),
	'id' => 'footer-2',
	'before_widget' => '<div class="foot_navi">',
	'after_widget' => '</div>',
	'before_title' => '<div class="text_pro"><h1 style="height: 14px;">',
	'after_title' => '</h1></div>',
));


*/

// Lets register widget sidebars
}
add_action( 'widgets_init', 'gp_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for creating resizable widgets
 * Based on the classes from the twentyeleven theme
 */

function gp_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'footer-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-3' ) )
		$count++;

	if ( is_active_sidebar( 'footer-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

function gp_top_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'top-1' ) )
		$count++;

	if ( is_active_sidebar( 'top-2' ) )
		$count++;

	if ( is_active_sidebar( 'top-3' ) )
		$count++;

	if ( is_active_sidebar( 'top-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . ' clearfix"';
}

function gp_bottom_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'bottom-1' ) )
		$count++;

	if ( is_active_sidebar( 'bottom-2' ) )
		$count++;

	if ( is_active_sidebar( 'bottom-3' ) )
		$count++;

	if ( is_active_sidebar( 'bottom-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . ' clearfix"';
}
?>