<?php
/**
 * @package Eco Caters
 * @since Eco Caters 2.0
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php if ( wp_title( '', false ) ) { wp_title( '' ); } else { echo get_bloginfo( 'name' ) .' | '. get_bloginfo( 'description' ); } ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta property='og:locale' content='en_US' />
<meta property='og:site_name' content='EcoCaters'/>
<meta property='og:type' content='website'/>
<?php
if ( is_single() ) {
	echo '<meta property="og:url" content="'. get_permalink() .'" />';
	echo '<meta property="og:title" content="EcoCaters - '. get_the_title() .'" />'; 
	if ( has_post_thumbnail() ) {
		$imgid = get_post_thumbnail_id();
        $imgurl = wp_get_attachment_image_src( $imgid , 'large' );
        $imgurl = $imgurl[0];
		echo '<meta property="og:image" content="'. $imgurl .'" />'; 
	}
} else {
	echo '<meta property="og:title" content="'. esc_attr(wp_title( '', false ) ) .'" />'; 
}


wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="hdr">
	<div class="hinside">
        <a href="<?php bloginfo('url'); ?>" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/2/logo.gif" alt="Eco Caters" width="193" height="92" /></a>
        <div class="hright">
            <div id="tagline"><?php bloginfo('description'); ?></div>
            <p id="hlocs">Los Angeles <strong>310.202.0326</strong><br />Washington D.C. <strong>202.810.3262</strong><br />San Diego <strong>858.246.6129</strong></p>
        </div>
        <div class="hmid">GRASS-FED MEATS&nbsp;&nbsp;<span>|</span>&nbsp;&nbsp;LOCAL PRODUCE&nbsp;&nbsp;<span>|</span>&nbsp;&nbsp;SUSTAINABLE FOOD</div>
	</div>
<?php
wp_nav_menu( array(
                'container_id' => 'nav',
                'theme_location' => 'mainmenu',
                'menu_class' => false,
            ) );
?>
</div>
<div id="page">
