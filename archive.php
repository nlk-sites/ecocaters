<?php

wp_enqueue_script( 'pinterest-pinit', '//assets.pinterest.com/js/pinit.js', array(), false, true );
wp_enqueue_script( 'twitter-widget', '//platform.twitter.com/widgets.js', array(), false, true );

get_header();

eco_bgimg(14);
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1"><?php
if( have_posts() ):

$post = $posts[0]; // Hack. Set $post so that the_date() works.
/* If this is a category archive */ if (is_category()) {
single_cat_title('');
/* If this is a tag archive */ } elseif( is_tag() ) {
single_tag_title('');
/* If this is a daily archive */ } elseif (is_day()) {
echo get_the_time('F jS, Y');
/* If this is a monthly archive */ } elseif (is_month()) {
echo get_the_time('F, Y');
/* If this is a yearly archive */ } elseif (is_year()) {
echo get_the_time('Y') . ' Blogs';
/* If this is an author archive */ } elseif (is_author()) {
_e('Author Archive', 'kubrick');
/* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
_e('Blog', 'kubrick');
} ?></div>
    </div>
    <div id="main">
        <div id="left">
<?php
while (have_posts()) : the_post();
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
                <?php endwhile;
				global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="pagenav">
			<div class="nav-previous"><?php next_posts_link( '&lt; '. __( 'Previous' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Next' ) .' &gt;' ); ?></div>
		</div><!-- #nav-above -->
	<?php endif;
	
	endif;
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

