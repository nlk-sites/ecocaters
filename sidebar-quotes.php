<?php
echo '<div class="quotes">';
global $post;
$test = '[testimonials order=rand]';
if ( is_page() ) {
	// check for override
	$metacheck = get_post_meta($post->ID, 'testimonials', true);
	if ( $metacheck != '' ) $test = $metacheck;
}
echo do_shortcode($test);
echo '</div>';
?>