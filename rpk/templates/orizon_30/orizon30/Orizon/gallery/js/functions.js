
function showgalleryform() {
	jQuery("#addgallery").toggle('slow');

}
function showfolderform() {
	jQuery("#addfolder").toggle('slow');

}



var config = {
// Valid file formats
support : "image/jpg,image/png,image/bmp,image/jpeg,image/gif", 
form: "demoFiler", // Form ID
dragArea: "dragAndDropFiles", // Upload Area ID
uploadUrl: "upload.php" // Server side file url
}
//Initiate file uploader.
jQuery(document).ready(function()
{
initMultiUploader(config);
});
