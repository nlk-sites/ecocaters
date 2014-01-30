<?php
get_header();

eco_bgimg(14);
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1">Blog</div>
    </div>
    <div id="main">
        <div id="left">
        <?php		
if (have_posts()) : while (have_posts()) : the_post();
global $post;
?>
            <div id="post-<?php the_ID(); ?>">
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
                <?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
            </div>
                <?php endwhile; endif; ?>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('seen');
			
			get_sidebar('quotes');
			?>
        </div>
<?php
get_footer();
?>
