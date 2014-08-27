<?php
$args = array(
	'show_option_all' => 'Select a category',
	'orderby' => 'NAME',
	'hierarchical' => 1,
	'depth' => 2
);
wp_dropdown_categories( $args );
?>
<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>
