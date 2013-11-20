<?php 
global $wpdb;
$user_id= get_current_user_id();
global $gallery_name;

if(isset($_REQUEST['Submit'])) {
	
$gallery_name = $_POST['gallery_name'];
$sql="insert into wp_gallery set
gallery_name = '".$gallery_name."',
user_id      = '".$user_id."',
date         = now()";
$insert_record  = mysql_query($sql) or die(mysql_error().$sql);
$last_insert_id = mysql_insert_id();
echo "<script type='text/javascript'>window.location='admin.php?page=gallery'</script>";
//header("location:admin.php?page=gallery"); 

}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">


//  show div
function show_record() {
jQuery.noConflict();
jQuery(".all").hide();
jQuery("#addgallery").show('slow');
}

</script>

<div class="wrap">   
<?php    echo "<h2>" . __( 'Manage Gallery', 'cql_img' ) . "</h2>"; ?>  

<div class="tablenav top">
<div class="alignleft actions">
<input name="addform" class="button" type="button" onclick="return show_record();" value="Add new gallery">
</div>
</div>

<div id="addgallery" style="display:none;">   
<form name="gallegery" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  

<?php    echo "<h4>" . __( 'Add Gallery', 'cql_img' ) . "</h4>"; ?>  
<p><?php _e("Gallery Title: ", 'orizon' ); ?><input type="text" name="gallery_name" value="<?php echo $gallery_name; ?>" size="20"><?php _e(" ex: Gallery", 'orizon' ); ?></p>  


<p class="submit">  
<input type="submit" name="Submit" value="<?php _e('Submit', 'cql_img' ) ?>" />  
</p>  
</form> 
</div>

<?php  	
/* code for listing records */
$autoincrement = 1;
require('includes/adminmyPagina.php');

$pagina = new MyPagina();
$pagina->rows_on_page(10);
if(isset($_POST['statusSA'])){$statusSA=$_POST['statusSA'];}
$pagina->sql = "SELECT * FROM `wp_gallery`";
$resultsAll = $pagina->get_page_result();
$showPaging = $pagina->navigation();
if($_REQUEST['page'] > 0){
$autoincrement = ($_REQUEST['page'] * 20) + 1;
} else {
$autoincrement = 1;
}

//echo "<pre>";
//print_r($resultsAll);
?>  

<table class="wp-list-table widefat fixed" cellspacing="0">
<thead>
<tr>
<th scope="col"><?php _e("ID ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Name: ", 'orizon' ); ?></th>
</tr></thead>

<tfoot>
<tr>
<th scope="col"><?php _e("ID ", 'orizon' ); ?></th>
<th scope="col"><?php _e("Gallery Name: ", 'orizon' ); ?></th>

</tr>

</tfoot>
<tbody id="the-list">

<?php 
$img=count($resultsAll);
if($img > 0){
$i=0;
foreach($resultsAll as $gallery) {

echo "<tr><td>". $resultsAll[$i]['gallery_id']."</td><td>  ". $resultsAll[$i]['gallery_name'] ."</td></tr>";

$i++;
}
}
?>
</tbody>

</table>
<div><?php echo $showPaging; ?></div>
</div>  
