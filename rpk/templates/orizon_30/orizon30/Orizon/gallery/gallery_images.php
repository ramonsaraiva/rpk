<?php 

if (isset($_POST['submit']))
{
 $del_id =$_POST['del_id'];
if($del_id!="" && is_numeric($del_id)){
$resultsDelete = mysql_query("delete from wp_images where image_id=" . $del_id);
$msg = "Successfully deleted!!";
}
echo "<script type='text/javascript'>window.location='admin.php?page=gallery_images'</script>";
}

?>

<script language="javascript">
//function checkDelete() {
//if(confirm("Do you really want to delete this record")){
//}
//}

</script>
<div class="wrap">   
<?php    echo "<h2>" . __( 'Manage Gallery Images', 'cql_img' ) . "</h2>"; ?>  
<div class="tablenav top">
<div class="alignleft actions">

</div>
</div>



<?php  	
/* code for listing records */
$autoincrement = 1;
require('includes/adminmyPagina.php');

$pagina = new MyPagina();
$pagina->rows_on_page(10);
$statusSA=$_POST['statusSA'];
$pagina->sql = "SELECT * FROM wp_images as WI inner join wp_gallery as WG using(gallery_id) order by WI.image_id desc";
$resultsAll = $pagina->get_page_result();
$showPaging = $pagina->navigation();
if($_REQUEST['pageno'] > 0){
$autoincrement = ($_REQUEST['pageno'] * 20) + 1;
} else {
$autoincrement = 1;
}


?>  

<table class="wp-list-table widefat fixed" cellspacing="0">
<thead>
<tr>
<th scope="col"><?php _e("S.No ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Image: ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Name: ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Auction", 'orizon' ); ?></th>

</tr></thead>

<tfoot>
<tr>
<th scope="col"><?php _e("S.No ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Image: ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Name: ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Auction", 'orizon' ); ?></th>
</tr>

</tfoot>
<tbody id="the-list">

<?php $img=count($resultsAll); 
if($img >0){
$i=1;
foreach($resultsAll as $gallery_image) { ?>

<tr><td><?php echo $i; ?></td>
<td><img src="<?php echo get_template_directory_uri(); ?>/gallery/uploads/thumbs/<?php echo  $gallery_image['image']; ?>"></td>
<td><?php echo  $gallery_image['gallery_name']; ?></td>

<td>
<form name="registration" method="post">
<input type="hidden" name="del_id" value="<?php echo $gallery_image['image_id']; ?>">
<input type="submit" name="submit" value="Delete" >
</form>
</td>
</tr>
<?php $i++;
}
}
?>
</tbody>

</table>
<div><?php echo $showPaging; ?></div>
</div>  
