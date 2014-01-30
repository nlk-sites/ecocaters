<?php
get_header();

eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1">404</div>
    </div>
    <div id="main">
        <div id="left">
            <div id="post">
				<p>Looking for something?</p>
            </div>
        </div>
        <div id="right">
			<?php
			get_sidebar('priceform');
			
			get_sidebar('seen');
			
			get_sidebar('quotes');
			?>
        </div>
<?php
get_footer();
?>
