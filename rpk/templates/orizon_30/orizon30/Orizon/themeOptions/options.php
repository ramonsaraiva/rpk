<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */







function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme();
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {

	// Slider Options
	$slider_choice_array = array("none" => "No Showcase", "accordion" => "Accordion", "wpheader" => "WordPress Header", "image" => "Your Image", "easing" => "Easing Slider", "custom" => "Custom Slider");

	//select gallery category name
	global $wpdb;
	$galleryfoorter = $wpdb->get_results("SELECT gallery_name FROM wp_gallery");
	$row =count($galleryfoorter);
	if($row > 0){
	foreach($galleryfoorter as $galleryimages){
		$galleryname[$galleryimages->gallery_name] =$galleryimages->gallery_name;

	}
}else{

	$galleryname['']= '';

	}
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}





	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$radioimagepath =  get_stylesheet_directory_uri() . '/themeOptions/images/';
	// define sample image directory path
	$imagepath =  get_template_directory_uri() . '/images/demo/';

	$options = array();

	$options[] = array( "name" => "General  Settings",
						"type" => "heading");



	$options[] = array( "name" => "Upload Your Logo",
						"desc" => "Upload your logo. I recommend keeping it within reasonable size. Max 150px and minimum height of 90px but not more than 120px.",
						"id" => "logo",
						"type" => "upload");

			$options[] = array( "name" => "Upload Your Favicon",
						"desc" => "Upload your Favicon. I recommend keeping it within reasonable size. ",
						"id" => "favicon",
						"type" => "upload");

	$options[] = array( "name" => "Social sharing",

						"type" => "info");

		$options[] =      array( "name" => "Social sharing?",
				"desc" => "Show or hide social sharing.",
				"id" => "socail_sharing",
				"type" => "jqueryselect",
				"std" => "1");




// Colour Settings
	$options[] = array( "name" => "Colours",
						"type" => "heading");


	 $options[] =      array( "name" => "Colour Scheme",
				"desc" => "Select a colour scheme for your theme.",
				"id" => "color_scheme",
				"type" => "select",
				"options" => array("Select", "Red","Blue"),
				"std" => "0");


			$options[] =      array( "name" => "Background",
				"desc" => "Select a background for your theme.",
				"id" => "background_color",
				"type" => "select",
				"options" => array("Select", "Red","Blue","Space","Morning Blue","Carbon Fiber"),
				"std" => "0");





// Slider

	$options[] = array( "name" => " Slider ",
						"type" => "heading");




        $options[] =      array( "name" => "Turn slider on/off",
                "desc" => "Show slider on homepage.",
                "id" => "slider_show",
                "type" => "select",
                "std" => "1",
                 "type" => "jqueryselect");

     $options[] =      array( "name" => "Slider type",
				"desc" => "Select the slider type you want to show in the homepage.",
				"id" => "slider_scheme",
				"type" => "select",
				"options" => array("Select", "Parallax slider options"," Tab slider options"),
				"std" => "0");



	$options[] = array( "name" => "Slider post category",
						"desc" => "Select the category that will feed the posts in the slider.",
						"id" => "banner_fp_blog_category",
						"type" => "select",
						"options" => $options_categories);





	$options[] = array( "name" => "Parallax slider post Count",
						"desc" => "Number of images you want to show in the Parallax slider.",
						"id" => "slider_image_count",
						"std" => "",
						"class" => "mini",
						"type" => "text");




// Front Page Settings
	$options[] = array( "name" => "Home Page",
						"type" => "heading");


		$options[] = array( "name" => "Carousel",

						"type" => "info");

 $options[] =      array( "name" => "Activate?",
				"desc" => "Show or hide the homepage carousel.",
				"id" => "carousel_scheme",
				"type" => "jqueryselect",

				"std" => "0");





	$options[] = array( "name" => "Amount of posts to show",
						"desc" => "Maximum number of posts that the carousel will display.",
						"id" => "post_show",
						"std" => "4",
						"type" => "text");



	$options[] = array( "name" => "Category",
						"desc" => "Category of posts that will be displayed in the carousel.",
						"id" => "fp_blog_category",
						"type" => "select",
						"options" => $options_categories);


$options[] = array( "name" => "Title",
						"desc" => "Title of the carousel.",
						"id" => "orizon_title_text",
						"std" => "HOT NEWS",
						"type" => "text");


$options[] = array( "name" => "General news",

						"type" => "info");
	$options[] = array( "name" => "Amount of posts to show",
						"desc" => "Maximum number of posts that the main news will display.",
						"id" => "general_post_show",
						"std" => "3",
						"type" => "text");



	$options[] = array( "name" => "category",
						"desc" => "Category of posts that the main news will display.",
						"id" => "general_fp_blog_category",
						"type" => "select",
						"options" => $options_categories);

$options[] = array( "name" => "Title",
						"desc" => "Title of the main news.",
						"id" => "general_title_text",
						"std" => "GENERAL NEWS",
						"type" => "text");





//  end general news section


// Footer section start

	$options[] = array( "name" => "Footer", "type" => "heading");

               $options[] =      array( "name" => "Turn gallery on/off",
                "desc" => "Show gallery in footer.",
                "id" => "gallery_hide",
                "type" => "select",
                "std" => "1",
                 "type" => "jqueryselect");

            $options[] = array( "name" => "gallery Title",
						"desc" => "Enter the title for footer gallery.",
						"id" => "footer_title",
						"std" => "latest media",
						"type" => "text");
						$options[] = array( "name" => "gallery IMAGE COUNT ",
						"desc" => "Number of images you want to show in the footer gallery.",
						"id" => "footer_image",
						"std" => "5",
						"type" => "text");

				$options[] = array( "name" => "Gallery Category",
						"desc" => "Images category that feeds the footer gallery.",
						"id" => "footer_gallery",
						"type" => "select",
						"options" => $galleryname);





				$options[] = array( "name" => "Copyright",
						"desc" => "Enter your copyright text.",
						"id" => "copyright",
						"std" => "Made by Skywarrior Themes.",
						"type" => "textarea");



    			$options[] = array( "name" => "Copyright link",
						"desc" => "Enter your copyright link. Please include http://",
						"id" => "powered_by",
						"std" => "http://www.skywarriorthemes.com/",
						"type" => "text");




// contact page code
$options[] = array( "name" => "Contact",
						"type" => "heading");


	$options[] = array( "name" => "Enter admin email ID ",
						"desc" => " Enter your email id.",
						"id" => "contact_page_Email",
						"std" => "admin@gmail.com",
						"type" => "text");

$options[] = array( "name" => "Enter email Subject  ",
						"desc" => " Enter your email subject.",
						"id" => "contact_Email_subject",
						"std" => "Subject",
						"type" => "text");

// end contact page code




// Social Media
	$options[] = array( "name" => "Social Media",
						"type" => "heading");



// Social Network setup
	/*$options[] = array( "name" => "Facebook App ID",
						"desc" => "Add your Facebook App ID here",
						"id" => "facebook_app",
						"std" => "1234567890",
						"type" => "text");
*/
	$options[] = array( "name" => "Enable Twitter",
						"desc" => "Show or hide the Twitter icon that shows on the header section.",
						"id" => "twitter",
						"std" => "0",
						"type" => "jqueryselect");

	$options[] = array( "name" => "Twitter Link",
						"desc" => "Paste your twitter link here.",
						"id" => "twitter_link",
						"std" => "#",
						"type" => "text");

	$options[] = array( "name" => "Enable Facebook",
						"desc" => "Show or hide the Facebook icon that shows on the header section.",
						"id" => "facebook",
						"std" => "0",
						"type" => "jqueryselect");

	$options[] = array( "name" => "Facebook Link",
						"desc" => "Paste your facebook link here.",
						"id" => "facebook_link",
						"std" => "#",
						"type" => "text");

	$options[] = array( "name" => "Enable Google+",
						"desc" => "Show or hide the Google+ icon that shows on the header section.",
						"id" => "googleplus",
						"std" => "0",
						"type" => "jqueryselect");

	$options[] = array( "name" => "Google+ Link",
						"desc" => "Paste your google+ link here.",
						"id" => "google_link",
						"std" => "#",
						"type" => "text");

	$options[] = array( "name" => "Enable youtube",
						"desc" => "Show or hide the youtube icon that shows on the header section.",
						"id" => "youtube",
						"std" => "0",
						"type" => "jqueryselect");

	$options[] = array( "name" => "youtube Link",
						"desc" => "Paste your Youtube link here.",
						"id" => "youtube_link",
						"std" => "#",
						"type" => "text");


	$options[] = array( "name" => "Enable RSS",
						"desc" => "Show or hide the RSS icon that shows on the header section.",
						"id" => "rss",
						"std" => "0",
						"type" => "jqueryselect");

	$options[] = array( "name" => "RSS Link",
						"desc" => "Paste your RSS link here.",
						"id" => "rss_link",
						"std" => "#",
						"type" => "text");


// Advertising section
	$options[] = array( "name" => " Advertising  ",
						"type" => "heading");


						$options[] = array( "name" => "Add Text",
						"desc" => "Enter the code for the bottom advert.",
						"id" => "footer_text",
						"type" => "textarea");
						$options[] = array( "name" => "Enable advert",
						"desc" => "Show or hide the bottom advert.",
						"id" => "footer_textarea",
						"std" => "0",
						"type" => "jqueryselect");




	return $options;
}

?>