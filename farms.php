<?php
/*
 * Template Name: Farms
 */
 
wp_enqueue_script( 'pinterest-pinit', '//assets.pinterest.com/js/pinit.js', array(), false, true );
wp_enqueue_script( 'twitter-widget', '//platform.twitter.com/widgets.js', array(), false, true );

get_header();

if (have_posts()) : while (have_posts()) : the_post();
global $post;
eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1"><?php the_title(); ?></div>
    </div>
    <div id="main">
        <div id="left">
            <div id="post-<?php the_ID(); ?>">
				<?php //the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>');
				$args = array(
	'numberposts' => -1,
	'category' => 54,
	'order' => 'ASC'
);
$farms = get_posts( $args );
global $post;
$oldpost = $post;
foreach ( $farms as $post ) {
	echo '<div>';
	echo '<h1 class="blogtitle"><a href="'. get_permalink($p->ID) .'">'. esc_attr($p->post_title) .'</a></h1>';
	echo apply_filters('the_content', $p->post_content);
	eco_cats();
	eco_post();
	echo '</div>';
}
$post = $oldpost;
				?>
                <?php endwhile; endif; ?>
                <?php //edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
            </div>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('farms');
			?>
        </div>
<?php
get_footer();
?>
