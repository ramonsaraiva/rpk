<?php
/*  Get Multiple record array */
function query2Array($query) {
	$arrayAllRecords = array();
	$resQuery = mysql_query($query);
	while($rowQuery = mysql_fetch_assoc($resQuery)) {
				$arrayAllRecords[] = $rowQuery;
		}
	return $arrayAllRecords;
}


/*  Get single record array */
function query4SingleRecord($query) {
	$arrayAllRecords = array();
	$resQuery = mysql_query($query);
	if(mysql_num_rows($resQuery) > 0 ) {
		$rowQuery = mysql_fetch_assoc($resQuery);
	} else {
		$rowQuery ="";
	}				
	return $rowQuery;
}




/* Get Gallery Dropdown List*/
function getGalleryDropDown($gallery_id) {
	$html = "";
	$query="select * from wp_cqlimage_gallery";
	$result=query2Array($query);
	if(is_array($result) && count($result) > 0 ) {
		  foreach($result as $row) { 
			  if($gallery_id !=''){
				  if ($row['id'] == $gallery_id) {
						$selected="Selected='selected'";
					} else {
						$selected="";
					}
			  } else {
				 $selected="";
			 }
			@$html .='<option value="'.$row['id'].'" '.$selected.'>'.$row['gallery_name'].'</option>';
		  }  
	}
	return $html; 
}


/* Get Gallery Dropdown List*/
function getFolderDropDown($folder_name) {
	$html = "";
	$query="select * from wp_cqlimage_folders";
	$result=query2Array($query);
	if(is_array($result) && count($result) > 0 ) {
		  foreach($result as $row) { 
			  if($folder_name !=''){
				  if ($row['folder_name'] == $folder_name) {
						$selected="Selected='selected'";
					} else {
						$selected="";
					}
			  } else {
				 $selected="";
			 }
			@$html .='<option value="'.$row['folder_name'].'" '.$selected.'>'.$row['folder_name'].'</option>';
		  }  
	}
	return $html; 
}


?>