<?php

wp_enqueue_script( 'pinterest-pinit', '//assets.pinterest.com/js/pinit.js', array(), false, true );
wp_enqueue_script( 'twitter-widget', '//platform.twitter.com/widgets.js', array(), false, true );

get_header();

eco_bgimg(14);
?>
<div class="mrap">
	<div class="mainheader">
        <?php
if (have_posts()) : while (have_posts()) : the_post();
global $post;
?>
    	<div class="h1"><?php echo in_category('farms') ? 'Farms' : 'Blog'; ?></div>
    </div>
    <div id="main">
        <div id="left">
            <div id="post-<?php the_ID(); ?>">
            	<h1 class="blogtitle"><?php the_title(); ?></h1>
				<?php
				the_content('<p class="serif">' . __('Read the rest of this Post &raquo;', 'kubrick') . '</p>');
				
				eco_cats();
				eco_post();
				?>
            </div>
                <?php endwhile; endif; ?>
				</div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			if ( in_category('farms') ) {
				get_sidebar('farms');
			} else {
				get_sidebar('blogdrop');
				
				dynamic_sidebar('blogside');
				
				get_sidebar('quotes');
			}
			?>
        </div>
<?php
get_footer();
?>
