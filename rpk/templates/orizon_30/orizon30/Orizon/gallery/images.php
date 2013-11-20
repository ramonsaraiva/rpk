<?php 
global $wpdb;
require_once("includes/thumbnail_images.class.php");
$user_id= get_current_user_id();
$themename =get_current_theme();
	
if(isset($_REQUEST['Submit'])) {


if($_FILES['image_1']['name'] != '') {
$fn=$_FILES['image_1']['name'];
$ext=explode(".",$fn);
$ext2=strtolower(end($ext));
if ($ext2 !='jpg' &&  $ext2 !='jpeg' &&  $ext2 !='png' ) {
$errorMsg[] ='Please Upload only jpg,jpeg,png file .';
} 
}

if($_FILES['image_1']['name'] != '')  {
 $maind_path=TEMPLATEPATH;
//$maind_path=ABSPATH;
$uploaddir = $maind_path.'/gallery/uploads/images/'; 
$tmp_file = $_FILES['image_1']['tmp_name'];

$image_1 = date("mdHis").".".$ext2;
$uploadfile = $uploaddir.$image_1;

if (@move_uploaded_file($tmp_file, $uploadfile)) { 

 $uploaddir = $maind_path.'/gallery/uploads/thumbs/'; 
$newtarget = $uploaddir.$image_1;	
$obj_img = new thumbnail_images();
$obj_img->PathImgOld = $uploadfile;
$obj_img->PathImgNew = $newtarget;
$obj_img->NewWidth = 70;
$obj_img->NewHeight = 70;
$obj_img->create_thumbnail_images();

 $uploaddir = $maind_path.'/gallery/uploads/front_thumbs/'; 
$newtarget = $uploaddir.$image_1;	
$obj_img = new thumbnail_images();
$obj_img->PathImgOld = $uploadfile;
$obj_img->PathImgNew = $newtarget;
$obj_img->NewWidth = 204;
$obj_img->NewHeight = 160;
$obj_img->create_thumbnail_images();

}
}
$uploadedP = "image='".$image_1."' , ";

$gallery_id = $_POST['gallery_id'];
$sql="insert into wp_images set
user_id         = '".$user_id."',
$uploadedP
gallery_id      = '".$gallery_id."',
date         = now()";

$insert_record  = mysql_query($sql) or die(mysql_error().$sql);
$last_insert_id = mysql_insert_id();
//echo "<script type='text/javascript'>window.location='admin.php?page=add_images'</script>";

?>
<style>
.success{
	color: #14AFD6;
	margin-top: 5px;
	padding: 20px;
	background: #E7FFF8;
	width: 190px;
	border: 1px solid #CCC;
	border-radius: 5px;
	margin-top: 15px;
}
</style>



<div class="success"> Sucessfully Upload Gallery Image</div>
<?php
}


?>



<div id="addgallery" >   
<form action="" method="post" id="picture_form"  class="standard-form" enctype="multipart/form-data">

<?php    echo "<h4>" . __( 'Gallery Image', 'cql_img' ) . "</h4>"; ?>  
<p><?php _e("Gallery Image: ", 'orizon' ); ?>
<input type="file" name="image_1" id="image_1"/>
</p>  


<p><?php _e("Gallery Image: ", 'orizon' ); ?>

<select name="gallery_id" id="gallery_id">
<?php
$sql = mysql_query("SELECT * FROM `wp_gallery`");
while($gallery=mysql_fetch_array($sql)){
?>
<option value="<?php echo $gallery['gallery_id'] ?>"><?php echo $gallery['gallery_name'] ?>
<?php } ?>
</option>
</select>
</p>  
<p class="submit">  
<input type="submit" name="Submit" value="<?php _e('Submit', 'cql_img' ) ?>" />  
</p>  
</form> 
</div>
