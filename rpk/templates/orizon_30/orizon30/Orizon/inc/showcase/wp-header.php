<?php 
/**
 * Concept: Default WordPress Header
 * Based on the Twenty Eleven theme
 * Theme: Incantation
 */

// Check to see if the header image has been removed
$header_image = get_header_image();
	if ( ! empty( $header_image ) ) :
		?>
<div id="showcase-slider">
	<div id="headimg" style="width:960px; margin:auto; border:1px solid <?php echo of_get_option('showcase_border'); ?>;">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php // Check if this is a post or page, if it has a thumbnail, and if it's a big one
			if ( is_singular() &&
			has_post_thumbnail( $post->ID ) &&
			( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
			$image[1] >= HEADER_IMAGE_WIDTH ) :
			// Houston, we have a new header image!
			echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
			else : ?>
			<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
			<?php endif; // end check for featured image or standard header ?>
			</a>
	</div>
</div>
<?php endif; // end check for removed header image ?>