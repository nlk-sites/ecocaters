<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>
           <div class="centerPageDiv">
	        <div class="leftPost">
<?php include (TEMPLATEPATH . '/sidebar5.php'); ?>
		    </div>
		  <div class="rightArchives">

<h2><?php _e('Links:', 'kubrick'); ?></h2>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>

	       </div>
           </div>

<?php get_footer(); ?>
