<?php
get_header();

if (have_posts()) : while (have_posts()) : the_post();
global $post;
//eco_bgimg();
set_query_var('show','home'); // revert default settings...
echo nggShowGallery(1, 'home');
?>
<div class="mrap home">
    <?php get_sidebar('bottom3'); ?>
    <div id="main">
        <div id="left">
            <div id="post-<?php the_ID(); ?>">
            	<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
                <?php endwhile; endif; ?>
                <?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
            </div>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('seen');
			?>
        </div>
<?php
get_footer();
?>