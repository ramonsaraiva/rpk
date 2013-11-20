<div class="bottom_shadow"></div>
<div class="main_advert">
  <?php if( of_get_option('footer_textarea')==1){

echo of_get_option('footer_text');

 } ?>
</div>
<div id="footer">
  <div class="row">
    <div class="footer_widget">
          <?php  if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer widget-1 widget only') ) : ?>
          <?php endif; ?>
    </div>


    <?php if( of_get_option('gallery_hide')==0){}else{ ?>
    <div class="divider_footer"></div>
    <div id="latest_media">
      <h1><?php echo of_get_option('footer_title');?></h1>
      <div class="body">
      <ul id="l_media_list" style="margin-top:10px;margin-left:10px;">
<?php
if(of_get_option('footer_gallery')!=""){
global $wpdb;
$galleryname=of_get_option('footer_gallery');
$gallerynum =of_get_option('footer_image');
$galleryfoorter = $wpdb->get_results("SELECT * FROM wp_images as WI inner join wp_gallery as WG using(gallery_id) Where gallery_name ='$galleryname'order by WI.image_id desc limit 0,$gallerynum");

foreach($galleryfoorter as $galleryimages){ ?>
        <li><a class="shadowbox" href="<?php echo get_template_directory_uri() ; ?>/gallery/uploads/images/<?php echo  $galleryimages->image; ?>" rel="gallery" ><img alt="alt_example" src="<?php echo get_template_directory_uri() ; ?>/gallery/uploads/front_thumbs/<?php echo  $galleryimages->image; ?>" /></a></li>
        <?php }} ?>
        </div>
      </ul>
    </div>
    <?php } ?>
  

    <div class="clear"></div>
  </div>
</div>
<!--********************************************* Footer end *********************************************-->
<div class="clear"></div>

<!--********************************************* Main_in end *********************************************-->
<?php if( of_get_option('powered_by')!=""){ ?>
<a id="cop_text" href="<?php echo of_get_option('powered_by'); ?>">
<?php } ?>
<?php
if(of_get_option('copyright')!=""){
echo of_get_option('copyright');
}
?>
</a>
</div>
</div>
<!--********************************************* Main wrapper end *********************************************-->
<script src="<?php echo get_template_directory_uri() ; ?>/js/global.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ; ?>/js/javascript/jquery.carouFredSel-6.1.0.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ; ?>/js/javascript/jquery.cslider.js" type="text/javascript" ></script>
<script src="<?php echo get_template_directory_uri() ; ?>/js/javascript/modernizr.custom.28468.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ; ?>/js/javascript/getTweet.js" type="text/javascript" ></script>
<script src="<?php echo get_template_directory_uri() ; ?>/js/javascript/jquery.fancybox.js?v=2.1.3" type="text/javascript" ></script>

<!--******* Javascript Code for the Hot news carousel *******-->
<script type="text/javascript">
$(document).ready(function() {

// Using default configuration
$("#sd").carouFredSel();

// Using custom configuration
$("#hot_news_box").carouFredSel({
items				: 1,
direction			: "right",
prev: '#prev',
next: '#next',
scroll : {
items			: 1,
height			: 250,
easing			: "quadratic",
duration		: 2000,
pauseOnHover	: true
}
});
})
</script>

<!--******* Javascript Code for the Main banner *******-->
<script type="text/javascript">
$(function() {

$('#da-slider').cslider({
autoplay	: true,
bgincrement	: 450
});

});
</script>

<!--******* Javascript Code for the image shadowbox *******-->
<script type="text/javascript">
$(document).ready(function() {
/*
*  Simple image gallery. Uses default settings
*/

$('.shadowbox').fancybox();
});
</script>

<!--******* Javascript Code for the menu *******-->

<script type="text/javascript">
$(document).ready(function() {
$('#menu li').bind('mouseover', openSubMenu);
$('#menu li').bind('mouseout', closeSubMenu);

function openSubMenu() {
$(this).find('ul').css('visibility', 'visible');
};

function closeSubMenu() {
$(this).find('ul').css('visibility', 'hidden');
};
});
</script>
<script type="text/javascript">
$(function() {
var pull    = $('#pull');
menu 		= $('ul#menu');

$(pull).on('click', function(e) {
e.preventDefault();
menu.slideToggle();
});

$(window).resize(function(){
var w = $(window).width();
if(w > 767 && $('ul#menu').css('visibility', 'hidden')) {
$('ul#menu').removeAttr('style');
};
var menu = $('#menu_wrapper').width();
$('#pull').width(menu - 20);
});
});
</script>
<script type="text/javascript">
$(function() {
var menu = $('#menu_wrapper').width();
$('#pull').width(menu - 20);
});
</script>

<?php wp_footer(); ?>
</body>

</html><a href="http://www.wplocker.com">shared on wplocker.com</a>
