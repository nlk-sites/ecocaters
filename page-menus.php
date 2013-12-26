<?php
/*
Template Name: Organic Menus
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
global $post;
eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1">Organic Menus</div>
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
			
			/* organic sidenav */
            wp_nav_menu( array(
				'container_class' => 'topPageMenu',
				'theme_location' => 'orgmenus',
            ) );
			
			get_sidebar('seen');
			
			if ( is_page(2) == false ) {
				echo '<div class="quotes">';
				echo do_shortcode('[testimonials order=rand cat=150]');
				echo '</div>';
			}
			
            ?>
        </div>
<?php get_footer(); ?>
