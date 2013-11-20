<?php 
/**
 * Concept: Portfolio Page with 3 columns
 * Copyright 2011 www.gradientpixels.ca
 * Theme: Incantation
 */
?>

<h1 style="margin-bottom:15px;"><?php echo of_get_option('portfolio_title'); ?></h1>
<p style="margin-bottom:40px;"><?php echo of_get_option('portfolio_intro'); ?></p>

<?php if ( of_get_option('portfolio_filter') ) { // Shows or hides this group ?>
	<div id="portfolio-sortable">
		<h5>SHOW by CATEGORY: &nbsp;
			<span><a class="pfsort" href="<?php echo add_query_arg(array ('paged' => '1',  'filter' => ''));?>">Show All Items</a></span>
			<?php
			$categories=  get_categories('taxonomy=portfolio_category&title_li='); 
			foreach ($categories as $category){ ?>
			<span><a class="pfsort" href="<?php echo add_query_arg(array ('paged' => '1',  'filter' => $category->category_nicename));?>" title="Filter by <?php echo $category->name;?>"><?php echo $category->name;?></a></span>
			<?php }?>
		</h5>			
	</div>
<?php } ?>	

<div id="gp-portfolio">
	<ul id="gp-portfolio3" class="clearfix">
	
		<?php
		$query = 'post_type=portfolio&portfolio_category='.$_GET['filter'].'&orderby='.$_GET['orderby'].'&order='.$_GET['order'].'&meta_key='.$_GET['meta_key'].'&posts_per_page=-1&paged='.$paged;
		$count = 1;
		query_posts($query);
		if (have_posts()) : while (have_posts()) : the_post();
		$custom = get_post_custom(get_the_ID());		  
		?>	
	
		<?php // Image sizing for 1 column Portfolio
		$thumbheight = of_get_option('portfolio_thumbnail_height');
		$thumb = get_post_thumbnail_id(); 
		$postimage = vt_resize($thumb, '', 294, $thumbheight, true );
		$pfdesc = get_post_meta($post->ID,'Image Description', true); // this is a custom field for the prettyPhoto popup
		?>
		
<li class="pf-itemwrap glow column-<?php echo $count; ?> <?php if($count  % 3 == 0) echo 'last' ?>">
	<div class="pf-imagewrap" style="height:<?php echo of_get_option('portfolio_thumbnail_height'); ?>px;" >
	<div class="pf-overlay"></div>
		<a rel="prettyPhoto" href="<?php $thumbnail_id=get_the_post_thumbnail($post->ID); preg_match ('/src="(.*)" class/',$thumbnail_id,$link); echo $link[1]; ?>" title="<?php echo $pfdesc; ?>" ><img src="<?php echo $postimage[url]; ?>" alt="<?php the_title(); ?>" width="<?php echo $postimage[width]; ?>" height="<?php echo $postimage[height]; ?>" style="border-bottom:6px solid <?php echo of_get_option('portfolio_img_bottom'); ?>;" /></a>
	</div><!-- .imagewrap -->

<div class="itemcontent">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php global $more; $more = FALSE; ?>
		<p><?php excerpt('25'); ?></p>
	<p style="margin-bottom:0;"><a href="<?php the_permalink(); ?>" class="button"><?php _e( 'See More', 'gp' ); ?></a></p>
</div>
</li>
<?php if($count  % 3 == 0) echo '<div class="clearfix"></div>' ?>
<?php $count++;  ?>

		<?php endwhile; ?>
		<?php endif;?>
		
	</ul><!-- #gp-portfolio3 -->
	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gp' ) . '</span>', 'after' => '</div>' ) ); ?>
</div><!-- #gp-portfolio -->