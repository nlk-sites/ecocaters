<?php
/*
Template Name: Weddings
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
global $post;
eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1"><?php eco_title(); ?></div>
    </div>
    <div id="main">
        <div id="left">
            <div id="post-<?php the_ID(); ?>">
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
                <?php endwhile; endif; ?>
                <?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
            </div>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('seen');
			
			get_sidebar('quotes');
			?>
        </div>
<?php
get_sidebar('bottom3');
get_footer();
?>