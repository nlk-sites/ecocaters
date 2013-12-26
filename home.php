<?php

wp_enqueue_script( 'pinterest-pinit', '//assets.pinterest.com/js/pinit.js', array(), false, true );
wp_enqueue_script( 'twitter-widget', '//platform.twitter.com/widgets.js', array(), false, true );

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
            	<h1 class="blogtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php
				the_content('<p class="serif">' . __('Read the rest of this Post &raquo;', 'kubrick') . '</p>');
				
				eco_cats();
				eco_post();
				?>
            </div>
                <?php endwhile; endif;
				global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="pagenav">
			<div class="nav-previous"><?php next_posts_link( '&lt; '. __( 'Previous' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Next' ) .' &gt;' ); ?></div>
		</div><!-- #nav-above -->
	<?php endif;
				?>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('blogdrop');
			
			dynamic_sidebar('blogside');
			
			get_sidebar('quotes');
			?>
        </div>
<?php
get_footer();
?>