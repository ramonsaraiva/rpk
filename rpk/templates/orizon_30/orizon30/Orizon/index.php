<?php get_header();

if(of_get_option('slider_show') == "1"){
 if (of_get_option('slider_scheme')=="0" or of_get_option('slider_scheme')=="1") {
 include('slider.php');
 }

 if (of_get_option('slider_scheme')=="2") {
include('slider-two.php');
 }

 echo '<div class="top_shadow"></div>';

  if (of_get_option('carousel_scheme')=="1") {
include('carousel.php');
 }
}

 ?>
<div id="main_news_wrapper">

<div id="row">
<!-- Left wrapper Start -->
<div id="left_wrapper">
<div class="header">

<?php if(of_get_option('general_title_text')!="") { ?>
<h2> <span><?php bloginfo('name'); ?> //&nbsp;</span><?php echo  of_get_option('general_title_text') ?> </h2>
<?php } else { ?>
<h2><span><?php bloginfo('name'); ?> //&nbsp;</span> <?php echo get_the_title(); ?> </h2>
<?php } ?>



</div>

<?php include('main-post.php') ?>
<div class="clear"></div>
</div>
<!-- Left wrapper end -->

<?php get_sidebar(); ?>

<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/javascript/jquery.bxSlider.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/javascript/getTweet.js" type="text/javascript" ></script>




</div>
<!--******* Javascript Code for the Main banner *******-->
<script type="text/javascript">
jQuery(function ($) {
$('#homepage-carousel').bxSlider({
'prev': false
,	'next': false
,    mode : 'fade'
,	pager: true
});
$('.homepage-news-item').show();
var x = $('div.tabs');
$.each(x, function (i) {
var f = i + 1;
$('.pager-' + f).empty();
$(this).appendTo('.pager-' + f);
});
});
</script>




