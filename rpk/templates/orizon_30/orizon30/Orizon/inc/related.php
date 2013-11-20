<?php // displays related posts based on tags used in each article ?>

<div id="related" class="clearfix">

<h3><?php _e( 'Related Articles', 'gp' ); ?></h3>

<?php 
$backup = $post; 
$tags = wp_get_post_tags($post->ID);
$tagIDs = array();
if ($tags) {
$tagcount = count($tags);
for ($i = 0; $i < $tagcount; $i++) {
$tagIDs[$i] = $tags[$i]->term_id;
}
$args=array(
'tag__in' => $tagIDs,
'post__not_in' => array($post->ID),
'showposts'=>4,
'ignore_sticky_posts'=>1
);
$my_query = new WP_Query($args);

$count = 1;

if ( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post();
$thumb = get_post_thumbnail_id(); 
$postimage = vt_resize($thumb, '', 145, 90, true );
?> 
<div class="related-posts <?php if($count  % 4 == 0) echo 'last' ?>">
<?php if (has_post_thumbnail()) : ?>

<div class="related-wrap" style=" border-bottom:.7em solid <?php echo of_get_option('post_image_background'); ?>;">
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
	<img class="bordersm" src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>"  width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" /></a>
	
</div>

<?php else : ?>
<div class="imagewrap" style="width:120px;" >
<a href="<?php the_permalink() ?>">
<img class="bordersm" src="<?php echo get_template_directory_uri(); ?>/images/noimage.png"  width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" /></a>
</div>
<?php endif; ?>
<h4><a class="rplink" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
</div>

<?php $count++; ?>

<?php endwhile; } else { ?>
<h2><?php _e( 'No related posts found!', 'gp' ); ?></h2>
<?php }
}
$post = $backup;
wp_reset_query();
?>
</div>