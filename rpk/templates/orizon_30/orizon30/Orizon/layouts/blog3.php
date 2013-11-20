<?php 
/**
 * Concept: blog 3 style
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
 ?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="b3-post-wrapper">	
<?php if (has_post_thumbnail()) : ?>
	<?php
    $thumb = get_post_thumbnail_id(); 
    $postimage = vt_resize($thumb, '', 160, 180, true );
?>    
<div class="b3-image-wrapper" style="background-color:<?php echo of_get_option('post_image_background'); ?>;">
	<span class="b3-overlay"></span>
		<?php if ( is_home() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<img class="border" src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>" /></a>
	<?php else : ?>		
		<a rel="prettyPhoto" href="<?php $thumbnail_id=get_the_post_thumbnail($post->ID); preg_match ('/src="(.*)" class/',$thumbnail_id,$link); echo $link[1]; ?>" title="<?php the_title(); ?>">
			<img class="border" src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>" />
		</a>	
	<?php endif; ?>
</div><!-- .b3-image-wrapper -->
<?php endif; ?>

	<header class="entry-header">
		<?php if ( is_sticky() ) : ?>
				<hgroup>
				<span class="entry-format sticky"><?php _e( 'Featured', 'gp' ); ?></span>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'gp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</hgroup>
			<?php else : ?>
			<h1 class="b3-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'gp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>
			
<div class="b3-entry-meta">
<?php echo get_the_date(); ?> &nbsp; &nbsp;<?php printf( __( 'Author: ', 'gp' ) ); echo get_the_author(); ?>&nbsp; &nbsp;
<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'gp' ) );
				if ( $categories_list ):
			?>
			
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'gp' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			
			<?php endif; // End if categories ?>
			&nbsp; &nbsp;<?php //comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
<?php comments_number( __( 'No Comments', 'gp'), __( '1 Comment', 'gp' ), __( '% Comments', 'gp' ) ); ?>
		&nbsp; &nbsp; <?php edit_post_link( __( 'Edit', 'gp' ), '<span class="b3-edit-link">', '</span>' ); ?>
</div>			
						
	</header><!-- .entry-header -->



	<div class="b3-entry-summary b3">
			<?php if ( is_home() || is_category() || is_archive() ) : ?>				
			<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Continue Reading...', 'gp' ); ?></a>			
		<?php elseif (is_single()) : // if this is the full single article ?>
			<?php the_content(); ?>
							
		<?php endif; ?>
	</div><!-- .entry-summary -->

	
	<footer></footer>
</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->

<div class="articlespacer"></div>