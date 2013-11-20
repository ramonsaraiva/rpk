<?php
/**
 * Concept: menu setup
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */

// This theme offers more than one menu location
add_action( 'init', 'register_navmenus' );
	function register_navmenus() {
		register_nav_menus( array(
			'primary' => __( 'Main Menu' , 'gp')
			)
		);
	}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function gp_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'gp_page_menu_args' );

?>