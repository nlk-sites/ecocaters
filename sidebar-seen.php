<h4>Seen &amp; Noted in the Industry</h4>
<?php
$lnx = get_bookmarks( array(
	'category' => 940,
	'echo' => 0
));
if ( count($lnx) % 2 == 1 ) $lnx[] = 'blank';
echo '<table class="seen">';
$i = 0;
foreach ( $lnx as $k => $l ) {
	if ( $i % 2 == 0 ) {
		echo '<tr><td class="c1">';
	} else {
		echo '<td class="c2">';
	}
	if ( $l == 'blank' ) {
		echo '&nbsp;';
	} else {
		echo '<a href="'. $l->link_url .'" target="'. $l->link_target .'"><img src="'. $l->link_image .'" alt="'. $l->link_name .'" /></a>';
	}
	echo '</td>';
	if ( $i % 2 == 1 ) echo '</tr>';
	$i++;
}
echo '</table>';
?>