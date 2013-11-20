<?php
include('gallery/includes/commonfunction.php');
include('widget/latest_twitter_widget.php');
include('themeOptions/rating.php');
$options_path = get_template_directory() . '/themeOptions/';
$functions_path = get_template_directory() . '/functions/';
$widgets_path = get_template_directory() . '/widgets/';

// Get Theme functions
require_once ($functions_path . 'menus.php'); 		 		// Define available menus
require_once ($functions_path . 'theme-comments.php'); 		// Custom comments
require_once ($functions_path . 'imageresize.php'); 		// Image Sizing using VT
require_once ($functions_path . 'sidebar-setup.php'); 		// Setup sidebars

require_once ($functions_path . 'popular-widget.php');  	// Popular widget with thumbnails

require_once ($functions_path . 'gp-text-widget.php');  		// Recent Posts with thumbnails


// Get Theme Settings
require_once ($options_path . 'functions.php'); 			// This loads the theme option settings


// Establish content width
if ( ! isset( $content_width ) )
$content_width = 960;

/*
// Load theme scripts
if ( !is_admin() ) :

// PrettyPhoto Lightbox
function wpse49339_enqueue_styles() {
   wp_enqueue_style('css-prettyphoto', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'wpse49339_enqueue_styles' );
function my_scripts_method_first() {
// register your script location, dependencies and version
wp_register_script('custom_script',
get_template_directory_uri() . '/js/custom_script.js',
array('jquery'),
'1.0' );
// enqueue the script
wp_enqueue_script('scripts-prettyphoto', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.js',array('jquery'),'3.1.3',true);
}
add_action('wp_enqueue_scripts', 'my_scripts_method_first');
// Kwicks Accordion Slider
function my_scripts_method_second() {
// register your script location, dependencies and version
wp_register_script('custom_script',
get_template_directory_uri() . '/js/custom_script.js',
array('jquery'),
'1.0' );
// enqueue the script
wp_enqueue_script('scripts-kwicks', get_template_directory_uri() . '/js/jquery.kwicks.min.js',array('jquery'),'2.1.2',true);
}
add_action('wp_enqueue_scripts', 'my_scripts_method_second');

function my_scripts_method_third() {
// register your script location, dependencies and version
wp_register_script('custom_script',
get_template_directory_uri() . '/js/custom_script.js',
array('jquery'),
'1.0' );
// enqueue the script
wp_enqueue_script('kwicks-settings', get_template_directory_uri() . '/js/kwicks-settings.js',array('jquery'),'1.0',true);
}
add_action('wp_enqueue_scripts', 'my_scripts_method_third');

function my_scripts_method() {
// register your script location, dependencies and version
wp_register_script('custom_script',
get_template_directory_uri() . '/js/custom_script.js',
array('jquery'),
'1.0' );
// enqueue the script
wp_enqueue_script('custom_script');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');
endif;
*/

if ( !is_admin() ) :

// PrettyPhoto Lightbox
wp_enqueue_style('css-prettyphto', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.css',false,'1.1','all');
wp_enqueue_script('scripts-prettyphoto', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.js',array('jquery'),'3.1.3',true);
// Kwicks Accordion Slider
wp_enqueue_script('scripts-kwicks', get_template_directory_uri() . '/js/jquery.kwicks.min.js',array('jquery'),'2.1.2',true);
wp_enqueue_script('kwicks-settings', get_template_directory_uri() . '/js/kwicks-settings.js',array('jquery'),'1.0',true);
endif;



// When this theme is activated send the user to the theme options
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
// Call action that sets
add_action('admin_head','gp_setup');
// Do redirect
header( 'Location: '.admin_url().'themes.php?page=options-framework' ) ;
}

//This enables post-thumbnail support for a theme.
add_theme_support('post-thumbnails', array('post', 'page', 'portfolio', 'slideshow', 'testimonial'));


// Add support for custom backgrounds
if(function_exists('add_theme_support')) {
 add_theme_support('custom-set_theme_background');
function set_theme_background() {
$bgimage = get_background_image();
$bgcolor = get_background_color();
$themeurl = get_template_directory_uri();
echo "<style type='text/css'>\n";
if(!empty($bgimage)) {
$background_styles = 'background-image: url(\'' . get_theme_mod('background_image', '') . '\');'
. ' background-repeat: ' . get_theme_mod('background_repeat', 'repeat') . ';'
. ' background-position: top ' . get_theme_mod('background_position_x', 'left') .  ';' . 'background-attachment: '. get_theme_mod('background_attachment', 'scroll');
echo "body { ".$background_styles."); } \n";
}

echo "</style>";
}
}

// Add custom css to the editor
add_editor_style();

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Standard Excerpt length
function gp_excerpt_length($length) {
return 60;
}
add_filter('excerpt_length', 'gp_excerpt_length');

// Special excerpt length per instance ie showcase column excerpts
function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)."...";
echo $excerpt;
}

// change the excerpt ending
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Remove styles when the gallery shortcode is used.
function remove_gallery_css( $css ) {
return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'remove_gallery_css' );

// Make this theme language capable
load_theme_textdomain( 'gp', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
require_once( $locale_file );

// Stops WordPress from going to middle of full post view - very irrating. Thanks to http://digwp.com
function remove_more_jump_link($link) {
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/**
* Custom WordPress Search Results
* Default wordpress search will search everything so this keeps a cleaner results page with posts only
* Credit to www.bavotasan.com
**/

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');


// lets remove that irritating tags list after the comment form
function mytheme_init() {
add_filter('comment_form_defaults','mytheme_comments_form_defaults');

}
add_action('after_setup_theme','mytheme_init');

function mytheme_comments_form_defaults($default) {
unset($default['comment_notes_after']);
return $default;
}

/**
* Display navigation to next/previous pages when applicable
*/
function gp_content_nav( $nav_id ) {
global $wp_query;

if ( $wp_query->max_num_pages > 1 ) : ?>

<nav id="<?php echo $nav_id; ?>">
  <h4 class="assistive-text">
    <?php _e( 'More Articles', 'gp' ); ?>
  </h4>
  <div class="nav-previous">
    <?php next_posts_link( __( '<span class="meta-nav">&raquo;</span> Next Page', 'gp' ) ); ?>
  </div>
  <div class="nav-next">
    <?php previous_posts_link( __( '<span class="meta-nav">&laquo;</span> Previous Page ', 'gp' ) ); ?>
  </div>
</nav>
<!-- #nav-above -->
<?php endif;
}


// Menu Fix for CPT
function remove_parent($var)
{
// check for current page values, return false if they exist.
if ($var == 'current_page_item' || $var == 'current_page_parent' || $var == 'current_page_ancestor'  || $var == 'current-menu-item') { return false; }

return true;
}

function add_class_to_cpt_menu($classes)
{
// your custom post type name
if (get_post_type() == 'portfolio')
{
// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
$classes = array_filter($classes, "remove_parent");

// add the current page class to a specific menu item.
if (in_array('menu-item-17', $classes)) $classes[] = 'current_page_parent';
}
return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_cpt_menu');

function string_limit_words($string, $word_limit){$words = explode(' ', $string, ($word_limit + 1));if(count($words) > $word_limit)array_pop($words);return implode(' ', $words);}


// function for create a pages when we install a theme
function create_initial_pages() {
require( get_template_directory() . '/inc/page_content.php' );
$pages = array(
'Home'                  => "$Home",
'About us'              => "$About_us",
'Services'              => "$Services",
'Contact'               => "$Contact",
);



foreach($pages as $key => $value) {
$id = get_page_by_title($key);
$page = array(
'post_type'   => 'page',
'post_title'  => $key,
'post_status' => 'publish',
'post_author' => 1,
'post_parent' => '',
'post_content'=> $value
);
if (!isset($id)) wp_insert_post($page);
};
}

// end function

// Create a Two new table wp_images and wp_gallery.




if ( ! function_exists( 'orizon_setup' ) ):
global $orizon_db_version;
$orizon_db_version = "1.0";
function orizon_setup() {

//update post per page Number install this theme.


global $wpdb;


global $orizon_db_version;

$table_name = $wpdb->prefix . "images";

$sql = "CREATE TABLE IF NOT EXISTS $table_name  (
`image_id` int(55) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`image` varchar(255) NOT NULL,
`gallery_id` varchar(255) NOT NULL,
`date` varchar(255) NOT NULL,
PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;


require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

$table = $wpdb->prefix . "gallery";

$qry=  "CREATE TABLE IF NOT EXISTS $table (
`gallery_id` int(55) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`gallery_name` varchar(255) NOT NULL,
`date` date NOT NULL,
PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";



require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($qry);
add_option("jal_db_version", $orizon_db_version);

}
endif;
add_action( 'after_setup_theme', 'orizon_setup' );

// end function

// Pagination fucntion
function kriesi_pagination($pages = '', $range = 1)
{

$showitems = ($range * 1)+1;
$general_show_page  = of_get_option('general_post_show');
global $paged;
global $paginate;


if(empty($paged)) $paged = 1;

if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}

if(1 != $pages)
{
$url= get_template_directory_uri();

if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") {
$leftpager= $url.'/css/red_css/images/left_pager.jpg';
$rightpager= $url.'/css/red_css/images/right_pager.jpg';
}
if (of_get_option('color_scheme')=="2") {
$leftpager= $url.'/css/blue_css/images/left_pager.jpg';
$rightpager= $url.'/css/blue_css/images/right_pager.jpg';
}

if($paged > 2 && $paged > $range+1 && $showitems < $pages) $paginate.=  "";
if($paged > 1 ) $paginate.=  "<a href='".get_pagenum_link($paged - 1)."'>

<img src=".$leftpager.">
</a>";

for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
$paginate.=  ($paged == $i)? "<li><a href='".get_pagenum_link($i)."'  class='active'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
}
}

if ($paged < $pages ) $paginate.=  "<li><a href='".get_pagenum_link($paged + 1)."' >
<img src=".$rightpager.">
</a></li>";

}

return $paginate;

}

// end function

// Add Theme option menu in admin
function orizon_create_menu()
{
$themeicon1 = get_template_directory_uri()."/images/orizon.png";
add_menu_page("Theme Options", "Theme Options", 'edit_theme_options', 'options-framework', 'optionsframework_page',$themeicon1 );


}
add_action( 'admin_menu', 'orizon_create_menu' );

// end function

// Add Gallery Menus in admin
function manage_gallery()
{
 add_menu_page( 'BoiteAWeb.fr', 'Gallery', 'manage_options', 'gallery','gallery');

add_submenu_page( 'gallery', 'Manage Gallery', 'Manage Gallery' , 'manage_options', 'gallery', 'gallery' );

add_submenu_page( 'gallery', 'Manage Gallery Images', 'Manage Gallery Images' , 'manage_options', 'gallery_images', 'gallery_images' );

add_submenu_page( 'gallery', 'Add Image', 'Add Image' , 'manage_options', 'add_images', 'add_images' );
}

add_action( 'admin_menu', 'manage_gallery' );



// add Images in gallery page by admin
function add_images()
{
include('gallery/images.php');
}
// Dispaly Gallery images in admin
function gallery_images()
{
include('gallery/gallery_images.php');
}

//Display gallery name in admin Manage Gallery menu.
function gallery()
{
include('gallery/gallery.php');
}

//Create shortcode for Show gallery on Front end.
function Get_Galley_shortcode($att){
extract(shortcode_atts(array(

'id' => '',
'showlimit'      => '',

), $att));

include('gallery/gallery-shortcode.php');
}
add_shortcode( 'gallery', 'Get_Galley_shortcode' );


// Create Shortcode for Show Blog post by category name.
function cat_func($atts) {

extract(shortcode_atts(array(

'totalposts'    => '',
'category_name'      => '',
'thumbnail_height' => '220',
'thumbnail_width' => '300',
'orderby'       => 'post_date',
'order'         => 'DSC'
), $atts));


$output = '<ul id="general_news" >';

?>
<?php

global $paged,$post;
$tmp_post = $post;
$category_id = get_cat_ID($category_name);

$myposts = get_posts("showposts=$totalposts&category_name=$category_name&orderby=$orderby&order=$order&paged=$paged");

foreach($myposts as $post) {
setup_postdata($post);
$output .= '<li>';
$thumb_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
if ( has_post_thumbnail() ) {
$output .= '<div class="image"><a href="'.get_permalink().'"><img height="'.$thumbnail_height.'" width="'.$thumbnail_width.'" src="'.$thumb_image.'"  /></a></div>';
}else{
$output .= '<div class="image"><a href="'.get_permalink().'"><img height="'.$thumbnail_height.'" width="'.$thumbnail_width.'" src=" '.get_bloginfo('template_directory').'/images/nophoto.jpg" /></a></div>';

}
if (of_get_option('socail_sharing')=="1") {

$output .= '<ul class="social_share">';

if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") {
$url =get_bloginfo('template_directory');

//$facebook_app_id=of_get_option('facebook_app');
$output .= '<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><img alt="alt_example" src="'.$url.'/css/red_css/images/fbk.png" border="0" /></a></li>';


$output .= '<li><a target="_blank" href="https://twitter.com/share?url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"><img alt="alt_example" src="'.$url.'/css/red_css/images/twitter.png" border="0" /></a></li>';




$output .= '<li><a href="https://plus.google.com/share?url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"><img alt="alt_example" src="'.$url.'/css/red_css/images/more.png" border="0" /></a></li>';

}
if (of_get_option('color_scheme')=="2") {
$url =get_bloginfo('template_directory');


$output .= '<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><img alt="alt_example" src="'.$url.'/css/blue_css/images/fbk.png" border="0" /></a></li>';


$output .= '<li><a href="https://twitter.com/share?url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"  target="_blank"><img alt="alt_example" src="'.$url.'/css/blue_css/images/twitter.png" border="0" /></a></li>';



$output .= '<li><a href="https://plus.google.com/share?url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"><img alt="alt_example" src="'.$url.'/css/blue_css/images/more.png" border="0" /></a></li>';



}
$output .= '</ul>';
}
$commentlink= get_comment_link();
$commentscount = get_comments_number();

$output .= '<div class="info">';


$output .= '<div class="comments">';
$output .= '<a href="'.$commentlink.'">'.$commentscount.'</a>';
$output .= '</div>';

if(strlen(get_the_title()) > 30){

			$nas = mb_substr(get_the_title(), 0,30);
			$arr = array($nas,'...');
			$nasl  = join(" ",$arr);
			}else{
			$nasl = mb_substr(get_the_title(), 0,30);
			}
$output .= '<h2><a href="'.get_permalink().'">'.$nasl.'</a></h2>';

$output .= '<div class="date_n_author">'.get_the_date().', by '.get_the_author().'</div>';
//$limits_words = of_get_option('blog_post_limits_character');

//$limits_words = of_get_option('general_post_limits_character');

	if(strlen(get_the_excerpt()) > 350){

			$teks = mb_substr(get_the_excerpt(), 0,350);
			$arr = array($teks,'...');
			$tekst  = join(" ",$arr);
			}else{
			$tekst = mb_substr(get_the_excerpt(), 0,350);
			}

$output .= '<p>'.$tekst.'</p>';

$output .= '<a href=" '.get_permalink().'" class="read_more2">Read more</a> </div>
<div class="clear"></div>
</li>';
};

$additional_loop = new WP_Query("cat='.$category_id.'&paged=$paged.'&posts_per_page=$totalposts");

if($additional_loop->max_num_pages>1) {
$output .= '<ul id="pager">';
$output .= '<li>';
$output .=kriesi_pagination($additional_loop->max_num_pages);
$output .= '</li>';
$output .= '</ul>';}
$output .= '</ul>';

$post = $tmp_post;
wp_reset_query();
return $output;
}

add_shortcode('post', 'cat_func');


add_filter('widget_text', 'do_shortcode');


add_shortcode('gallery_footer', 'footer_gallery');


//Comment form and Comment Text  Display with function.

function Orizon_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
?>
<li class="post pingback">
  <p>
    <?php _e( 'Pingback:', 'Orizon' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( 'Edit', 'orizon' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
  <?php
break;
default :
?>
<li> <img alt="alt_example" class="indent" src="<?php echo get_template_directory_uri();?>/css/red_css/images/post/indent.jpg" />
  <div class="avatar">
    <?php
$avatar_size = 68;
if ( '0' != $comment->comment_parent )
$avatar_size = 39;

echo get_avatar( $comment, $avatar_size );?>
  </div>
  <div class="comment">
    <p><?php printf( '<strong >%s</strong> ', get_comment_author_link() ); ?><small>
      <?php
printf( sprintf( __( '%1$s at %2$s', 'Orizon' ), get_comment_date(), get_comment_time()));?>
      -
      <?php
comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply ', 'Orizon' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
?>
      </a></small></p>
    <?php edit_comment_link( __( 'Edit', 'Orizon' ), '<span class="edit-link">', '</span>' ); ?>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation">
    <?php _e( 'Your comment is awaiting moderation.', 'Orizon' ); ?>
    </em> <br />
    <?php endif;



comment_text(); ?>
  </div>
  <?php
break;
endswitch;
}
$metas = $wpdb->get_results( "SELECT meta_key FROM wp_postmeta where meta_key='inner-post-image'" );
if (($wpdb->num_rows)>0) {}else{
$wpdb->insert(
    'wp_postmeta',
    array(
        'meta_id' => -1,
        'post_id' => -1,
        'meta_key' => 'inner-post-image',
        'meta_value' => 'custom'
    )
);}
?>