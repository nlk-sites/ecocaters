<div class="topPageMenu">
<ul class="menu">
<?php
$args = array(
	'numberposts' => -1,
	'category' => 54,
	'order' => 'ASC'
);
$farms = get_posts( $args );
global $post;
foreach ( $farms as $p ) {
	echo '<li';
	if ( $post->ID == $p->ID ) echo ' class="current-menu-item"';
	echo '><a href="'. get_permalink($p->ID) .'">'. esc_attr($p->post_title) .'</a></li>';
}
?>
</ul>
</div>