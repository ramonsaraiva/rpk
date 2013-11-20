<?php 

	add_theme_support( 'header_style', 'admin_header_style', array(
     
    // Header text display default
    'header-text'           => false,
    // Header text color default
    'default-text-color'        => '000',
    // Header image width (in pixels)
    'width'             => define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 960 ) ),
    // Header image height (in pixels)
    'height'            => define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 340 ) ),
    // Header image random rotation default
    'random-default'        => false,
  
) );

// Turn on random header image rotation by default.
	add_theme_support( 'custom-header', array( 'random-default' => true ) );
	add_theme_support( 'custom-background', array( 'random-default' => true ) );

	
	// gets included in the site header
function header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
}
// gets included in the admin header
function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style><?php
} 
?>