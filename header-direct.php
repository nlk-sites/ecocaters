<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged, $wp_query;
	$kw = '';
	if(isset($wp_query->query_vars['kw']) && $wp_query->query_vars['kw'] != '') {
		$kw = $wp_query->query_vars['kw'];
		$kw = ucwords(str_replace('-',' ',$kw));
		echo wp_kses($kw,array()) .' | ';
	} ?>EcoCaters</title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
$('.menu').hide();
$('.links-1 a').click(function() {
	$($(this).attr('href')).toggle('slow');
	return false;
});
});
</script>
<?php if (is_page_template('additional_questions.php')) { ?>
<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
  $("#datepicker").datepicker();
});
</script>

<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Avenir_500-Avenir_800.font.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$('.topMenuDiv .page-item-4').mouseenter(function(){
		$('.sub-menu').stop(true, true);
		$('.sub-menu').slideDown(100);
	}).mouseleave(function(){
		$('.sub-menu').stop(true, true);
		$('.sub-menu').delay(350).slideUp('fast');
	});
});

Cufon.replace('h1.titlePage, .titlePost h2, .farmsDiv h1, .home-content h1, .rightPageMenu h1');

</script>
<?php if (is_page_template('ppc.php')) { $bgImgDiv = 'ppc'; } else { $bgImgDiv = 'default'; } ?>
</head>
<body class="direct">
