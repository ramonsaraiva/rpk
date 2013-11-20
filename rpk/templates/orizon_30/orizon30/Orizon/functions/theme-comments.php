<?php if ( ! function_exists( 'gp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own gp_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function gp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'gp' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'gp' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		
			<div class="comment-wrapper">
				<div class="comment-avatar" style="background-color:<?php echo of_get_option('avatar_bottom'); ?>;">
					<?php
						$avatar_size = 70;
						if ( '0' != $comment->comment_parent )
						$avatar_size = 40;
						echo get_avatar( $comment, $avatar_size );
					?>
				</div>
				<div class="comment-author vcard"><?php printf(__('<span class="name">%s</span>'), get_comment_author_link()) ?>
				<span class="comment-date"><?php printf(__('%1$s at %2$s','gp'), get_comment_date(),  get_comment_time()) ?></span>				
				</div>
			</div><!-- .comment-wrapper -->
		
		<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'gp' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			
			<footer class="comment-meta">
			<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'gp' ); ?></em>
					<br />
				<?php endif; ?>
			</footer>

			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for gp_comment()

?>