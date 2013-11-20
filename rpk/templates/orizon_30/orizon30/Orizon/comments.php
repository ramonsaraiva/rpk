<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to orizon_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'Orizon' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		
		

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'orizon' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Orizon' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Orizon' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ul>
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use orizon_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define orizon_comment() and that will be used instead.
				 * See orizon_comment() in orizon/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'Orizon_comment' ) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'orizon' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Orizon' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Orizon' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'orizon' ); ?></p>
	<?php endif; ?>

	<?php //comment_form(); ?>
	
	<?php if ('open' == $post->comment_status) : ?>
 
<div id="respond">
 <div class="header">
<?php comment_form_title( 'leave a response', 'leave a response to  %s' ); ?></div>
 
<div class="cancel-comment-reply" style="margin-top:50px;margin-right:20px;" align="center">
    <small><?php cancel_comment_reply_link(); ?></small>
</div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
<?php if ( $user_ID ) : ?>
 
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
 
<?php else : ?>
 <div class="form_left">
                           
<label>Name <small><em><?php if ($req) echo "(required)"; ?></em></small></label>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"class="validate[required,custom[onlyLetter],length[0,100]] text-input" />

 <label>Email  <small><?php if ($req) echo "(required)"; ?></small></label>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2"class="validate[required,custom[email]] text-input" />

 <label>Website</label>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

 </div>
                           
<?php endif; ?>
 
<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
  <div class="form_right">
	  <p class="text">
     <label>Your Message <small><em>(required)</em></small></label>
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" class="validate[required,length[6,300]] text-input"></textarea></p></div>
 
<div class="form_submit"><input name="submit" type="submit" id="submit" tabindex="5" value="post" class="read_more2" />
<?php comment_id_fields(); ?>
</div>
<?php do_action('comment_form', $post->ID); ?>
 
</form>
 
<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>

</div><!-- #comments -->
