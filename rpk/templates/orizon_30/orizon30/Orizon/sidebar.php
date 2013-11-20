<style type="">
<?php if (of_get_option('top_sidebar_heading_show')	){ ?>
.info a{display:none;}
<?php } ?>


<?php if (of_get_option('color_scheme')=="0" or of_get_option('color_scheme')=="1") { ?>


<?php } ?>
<?php if (of_get_option('color_scheme')=="2") { ?>

<?php } ?>






</style>

<div id="right_wrapper">
  <div id="search">
    <form method="get" id="searchform" action="<?php  echo home_url(); ?>">
      <input type="text" onblur="if(this.value =='') this.value='search'" onfocus="if (this.value == 'search') this.value=''" value="search" name="s" class="required" id="s" />
      <input type="submit" value=""/>
    </form>
  </div>
  
    <?php  if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right sidebar ') ) : ?>
    <?php endif; ?>
  
  <!-- Right wrapper end --> 
  
</div>
