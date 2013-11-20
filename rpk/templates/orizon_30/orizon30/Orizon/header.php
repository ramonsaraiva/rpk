<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/general.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/buddypress.css" />
<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" />
<!-- Included CSS Files -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/main.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/devices.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/paralax_slider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/bxSlider.css" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/ie.css"> 
<![endif]-->
<?php } ?>
<?php if (of_get_option('color_scheme')=="2") { ?>
<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" />
<!-- Included CSS Files -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/main.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/devices.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/paralax_slider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/bxSlider.css" />

<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/ie.css"> 
<![endif]-->
<?php }
 ?>

<style>
<?php if(of_get_option('background_color')=="2" ) {
?>  html {
 background: url("<?php echo get_template_directory_uri(); ?>/css/blue_css/images/background_loop.jpg") repeat scroll left top transparent;
}
 body {
background: url("<?php echo get_template_directory_uri(); ?>/css/blue_css/images/top_light.jpg") no-repeat scroll center top transparent;
}
 #footer_image {
 background: url("<?php echo get_template_directory_uri(); ?>/css/blue_css/images/footer_bg.jpg") no-repeat scroll center bottom transparent;
}

@media only screen and (min-width: 768px) and (max-width: 959px) {
body{
	 background:url(<?php echo get_template_directory_uri(); ?>/css/blue_css/images/tablet_top_light.jpg) no-repeat center top;
}
#footer_image {
	background: url(<?php echo get_template_directory_uri(); ?>/css/blue_css/images/tablet_footer_bg.jpg) no-repeat center bottom ;
}
}
 @media only screen and (max-width: 767px) {
 body {
 background:url(<?php echo get_template_directory_uri(); ?>/css/blue_css/images/mobile_top_light.jpg) no-repeat center top ;
}
 #footer_image {
 background: url(<?php echo get_template_directory_uri(); ?>/css/blue_css/images/mobile_footer_bg.jpg) no-repeat center bottom;
}
}

 <?php
}
?>  <?php if(of_get_option('background_color')=="1" ) {
?>  html {
background:none repeat scroll 0 0 #000000 !important;
}
 body {
background: url("<?php echo get_template_directory_uri(); ?>/css/red_css/images/top_light.jpg") no-repeat scroll center top transparent ;
}
 #footer_image {
 background: url("<?php echo get_template_directory_uri(); ?>/css/red_css/images/footer_bg.jpg") no-repeat scroll center bottom transparent;
}
@media only screen and (min-width: 768px) and (max-width: 959px) {
body{
	 background:url(<?php echo get_template_directory_uri(); ?>/css/red_css/images/tablet_top_light.jpg) no-repeat center top;
}
#footer_image {
	background: url(<?php echo get_template_directory_uri(); ?>/css/red_css/images/tablet_footer_bg.jpg) no-repeat center bottom ;
}
}
 @media only screen and (max-width: 767px) {
 body {
 background:url(<?php echo get_template_directory_uri(); ?>/css/red_css/images/mobile_top_light.jpg) no-repeat center top ;
}
 #footer_image {
 background: url(<?php echo get_template_directory_uri(); ?>/css/red_css/images/mobile_footer_bg.jpg) no-repeat center bottom ;
}
}

 <?php
}
?>  
 <?php if(of_get_option('background_color')=="3" ) {
?>  html {
background:url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/loop.jpg) repeat scroll 0 0 #000000 !important;
}
 body {
background: url("<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/top.jpg") no-repeat scroll center top transparent ;
}
 #footer_image {
 background: url("<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/bottom.jpg") no-repeat scroll center bottom transparent;
}
@media only screen and (min-width: 768px) and (max-width: 959px) {
body{
	 background:url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/tablet_top.jpg) no-repeat center top;
}
#footer_image {
	background: url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/tablet_bottom.jpg) no-repeat center bottom ;
}
}
 @media only screen and (max-width: 767px) {
 body {
 background:url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/mobile_top.jpg) no-repeat center top ;
}
 #footer_image {
 background: url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/space/mobile_bottom.jpg) no-repeat center bottom ;
}
}

 <?php
}
?>  
<?php if(of_get_option('background_color')=="4" ) {
?>  html {
background:url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/morning_light.jpg) no-repeat scroll 0 0 #000 !important;
background-attachment: fixed !important;
}
 body {
background: none !important;
}
 #footer_image {
background: none !important;
}
@media only screen and (min-width: 768px) and (max-width: 959px) {
body{
	background: none !important;
}
#footer_image {
background: none !important;
}
}
 @media only screen and (max-width: 767px) {
 body {
background: none !important;
}
 #footer_image {
background: none !important;
}
}

 <?php
}
?> 

<?php if(of_get_option('background_color')=="5" ) {
?>  html {
background:url(<?php echo get_template_directory_uri(); ?>/css/backgrounds/carbon_fiber.jpg) repeat scroll 0 0 #000000 !important;
}
 body {
background: none !important;
}
 #footer_image {
background: none !important;
}
@media only screen and (min-width: 768px) and (max-width: 959px) {
body{
background: none !important;
}
#footer_image {
background: none !important;
}
}
 @media only screen and (max-width: 767px) {
 body {
background: none !important;
}
 #footer_image {
background: none !important;
}
body { background:#43576a url(http://localhost/orizon3/wp-content/themes/orizon/images/backgrounds/bg1.png) repeat; }

}

 <?php
}
?>  

#menu-item-98 {
	margin:0 0 0 -20px !important;
}
#menu-item-98 a {
	padding:20px 20px 0 0 !important;
}
.comments a {
	color:#fff !important;
}

</style>

<?php

add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

function my_deregister_javascript() {
	wp_deregister_script( 'dtheme-ajax-js' );
}
 ?>
<?php wp_head(); ?>


</head>

<body  <?php body_class(); ?>>
<?php 

$general_post_show  = of_get_option('general_post_show');
	if((is_home()) || (is_front_page())){
update_option('posts_per_page',$general_post_show);	
} else { 
update_option('posts_per_page',5);	

}

?>
<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/red_css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<?php } ?>


<?php if (of_get_option('color_scheme')=="2") { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blue_css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<?php } ?>
<!--********************************************* Main wrapper Start *********************************************-->
<div id="footer_image">
<div id="main_wrapper">

<!--********************************************* Logo Start *********************************************-->
<div id="logo">
  <?php if (of_get_option('logo')!=""){ ?>
  <a href="<?php  echo home_url(); ?>"> <img src="<?php echo of_get_option('logo'); ?>" alt="logo"  /> </a>
  <?php } else { ?>
  <a href="<?php  echo home_url(); ?>"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/logo.png"  /></a>
  <?php } ?>
  <div id="social_ctn">
    <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/social_tleft.png" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="2") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/social_tleft.png" /></a>
    <?php } ?>
    <?php if ( of_get_option('rss') ) { ?>
    <a href="<?php echo of_get_option('rss_link'); ?>" id="rss"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('facebook') ) { ?>
    <a href="<?php echo of_get_option('facebook_link'); ?>" id="facebook"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('twitter') ) { ?>
    <a href="<?php echo of_get_option('twitter_link'); ?>" id="twitter"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('googleplus') ) { ?>
    <a href="<?php echo of_get_option('google_link'); ?>" id="google_plus"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if ( of_get_option('youtube') ) { ?>
    <a href="<?php echo of_get_option('youtube_link'); ?>" id="you_tube"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/blank.gif" width="100%" height="37px" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/red_css/images/social_tright.png" /></a>
    <?php } ?>
    <?php if (of_get_option('color_scheme')=="2") { ?>
    <a class="social_t"><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/css/blue_css/images/social_tright.png" /></a>
    <?php } ?>
  </div>
</div>
<!--********************************************* Logo end *********************************************--> 

<!--********************************************* Main_in Start *********************************************-->
<div id="main_in">

<!--********************************************* Mainmenu Start *********************************************-->
<div id="menu_wrapper">
	
  <div id="menu_left"></div>
  <ul id="menu">
    <li><a href="<?php  echo home_url(); ?>">Home</a></li>
    <?php wp_nav_menu(); ?>
  </ul>
  <a href="#" id="pull">Menu</a>
  <div id="menu_right"></div>
  <div class="clear"></div>
</div>
