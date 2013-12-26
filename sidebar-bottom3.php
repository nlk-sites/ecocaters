<?php

?>
<div id="b3">
	<?php
	$p3 = get_posts( array(
		'numberposts' => 3,
		'category' => 941 //feat
	));
	foreach ( $p3 as $p ) {
		echo '<pre style="display:none">'. print_r($p,true) .'</pre>';
		echo '<a href="'. get_permalink($p->ID) .'" class="b"><span class="txt">'. $p->post_title .'</span>'. get_the_post_thumbnail( $p->ID, 'featuredthm' ) .'<span class="rm">Read More</span></a>';
	}
	?>
</div>