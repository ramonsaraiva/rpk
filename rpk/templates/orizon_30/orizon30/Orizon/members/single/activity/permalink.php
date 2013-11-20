<?php get_header( 'buddypress' ); ?>

<div id="main_news_wrapper">

<div id="row"> 
<!-- Left wrapper Start -->
<div id="left_wrapper">
<div class="header">

<?php if(of_get_option('general_title_text')!="") { ?>
<h2> <span><?php bloginfo('name'); ?> //&nbsp;</span><?php _e( 'Members Directory', 'buddypress' ); ?></h2>
<?php } else { ?>
<h2><span><?php bloginfo('name'); ?> //&nbsp;</span> <?php echo get_the_title(); ?> </h2>
<?php } ?>

</div>
<div id="post_wrapper">
<?php do_action( 'template_notices' ); ?>

<div class="activity no-ajax" role="main">
	<?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

		<ul id="activity-stream" class="activity-list item-list">
		<?php while ( bp_activities() ) : bp_the_activity(); ?>

			<?php locate_template( array( 'activity/entry.php' ), true ); ?>

		<?php endwhile; ?>
		</ul>

	<?php endif; ?>
</div>

</div>


<div class="clear"></div>
</div>
<!-- Left wrapper end --> 

	<?php get_sidebar( 'buddypress' ); ?>

<div class="clear"></div>
</div>
</div>

<?php get_footer( 'buddypress' ); ?>