<?php 


/* code for listing records */
$autoincrement = 1;
require('includes/myPagina.php');
if(empty($showlimit)){
	$showlimit=8;
}else{
	$showlimit;
	}
$galleryid= $id;
$pagina = new MyPagina();
$pagina->rows_on_page($showlimit);
if (isset($_POST['statusSA'])){
$statusSA=$_POST['statusSA'];}
$pagina->sql = "SELECT * FROM wp_images as WI inner join wp_gallery as WG using(gallery_id) where gallery_id=".$galleryid." order by WI.image_id desc";
$gallery_record = $pagina->get_page_result();
$showPaging = $pagina->navigation();

if (isset($_REQUEST['page'])){
if($_REQUEST['page'] > 0){
$autoincrement = ($_REQUEST['page'] * 20) + 1;
}} else {
$autoincrement = 1;
}


if(is_array($gallery_record) && count($gallery_record)>0){
foreach($gallery_record as $gallery_images){ ?>

<li><a class="shadowbox" href="<?php echo get_template_directory_uri(); ?>/gallery/uploads/images/<?php echo  $gallery_images['image']; ?>" rel="gallery" ><img alt="alt_example" src="<?php echo get_template_directory_uri(); ?>/gallery/uploads/front_thumbs/<?php echo  $gallery_images['image']; ?>" /></a></li>


<?php
}
}
?>
</ul>


<ul id="pager">
<?php  echo $showPaging = $pagina->navigation();
?>
</ul>
