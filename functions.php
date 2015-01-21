<?php
/**
 * @package Eco Caters
 * @since Eco Caters 2.0
 */

$content_width = 629;

add_action( 'after_setup_theme', 'eco_setup' );
if ( ! function_exists( 'eco_setup' ) ):
function eco_setup() {
	
	$menus = array(
		'mainmenu' => 'Main Menu',
		'orgmenus' => 'Organic Menus side menu',
		'ftrlnx' => 'Footer Menu',
		'ppcmenu' => 'Optional PPC Page Menu?'
	);
	register_nav_menus( $menus );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'pagebg', 1920, 1920, true );
	add_image_size( 'featuredthm', 291, 194, true );
	
	add_action( 'widgets_init', 'eco_widgets' );
	
	add_action( 'wp_print_scripts', 'eco_scripts' );
	//add_action( 'wp_print_styles', 'progo_add_styles' );
	
}
endif;

if ( ! function_exists( 'eco_widgets' ) ):
function eco_widgets() {
	if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
	    'name' => 'Blog Sidebar',
		'id' => 'blogside',
		'description' => 'Additional Right column widget space for Blog area',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
    ));
	
	}
}
endif;
/**
 * Get post slug
 *
 * @return string 
 * @access public
 */
function get_slug() {
	global $post;	
	global $wpdb;
	if ($id = $post->ID) { 
		$slug = $wpdb->get_var("SELECT post_name FROM $wpdb->posts WHERE ID=" . (int)$id);
		return $slug;
	}
	else return;
}

/**
 * Generate select list
 *
 * @param string $ar Array of values
 * @param string $lb Value for label
 * @param string $nm Name
 * @param string $pnm Name for script
 * @param string $class Label class atribute
 * @return string 
 * @access public
 */
function generate_list($ar, $lb = '', $nm, $pnm = '', $class = '') {
	$selected = '';
	$option   = '';
	$list     = '';
	if (strlen($class)) { $class = 'class="' . $class . '"'; }
	if (is_array($ar) && count($ar)) {
		foreach ($ar as $key=>$value) {
			($pnm == $value) ? $selected = ' selected="selected"' : $selected = '';
			if ($key==0) {
				$option .= '<option value=""' . $selected . '>' . $value . '</option>';
			} else {
				$option .= '<option value="' . $value . '"' . $selected . '>' . $value . '</option>';
			}
			
		}
		$select_start = '<select name="' . $nm . '" id="' . $nm . '">';
		$select_end   = '</select>';
		$lb           = '<label ' . $class . ' for="' . $nm . '">' . $lb . '</label>';
		$list         = $lb . $select_start . $option . $select_end; 
		return $list;
	}
	else return;
}

//if ( !current_user_can('administrator') ) {
//    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
//    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
//	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
//}


add_filter('rewrite_rules_array','progo_insertrules');
add_filter('query_vars','progo_insertvars');
add_filter('init','progo_flushrules');

// Remember to flush_rules() when adding rules
function progo_flushrules() {
	global $wp_rewrite;
   	$wp_rewrite->flush_rules();
}

// Adding a new rule
function progo_insertrules($rules) {
	$newrules = array();
	
	$stubs = array();
	
	$templates = array('direct.php');
	foreach($templates as $t) {
		$pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $t
		));
		
		foreach ( $pages as $p ) {
			$stubs[] = $p->post_name;
		}
	}
	foreach ( $stubs as $s ) {
		$newrules['('. $s .'/)(.+?)$'] = 'index.php?pagename=$matches[1]&kw=$matches[2]';
		$newrules['('. $s .'/)(.+?)$'] = 'index.php?pagename=$matches[1]&keyword=$matches[2]';
	}
	
	return $newrules + $rules;
}

// Adding the id var so that WP recognizes it
function progo_insertvars($vars) {
    array_push($vars, 'kw');
    array_push($vars, 'keyword');
    return $vars;
}

if ( ! function_exists( 'eco_scripts' ) ):
function eco_scripts() {
	if ( ! is_admin() ) {
		wp_enqueue_script( 'ecojs', get_bloginfo('template_url') .'/js/eco.js', array('jquery'), '1.2' );
	}
}
endif;

function eco_bgimg($posthmfrom = null) {
	global $post;
	if ( $posthmfrom == null ) {
		$posthmfrom = false;
		if ( has_post_thumbnail() == false ) {
			if ( $post->post_parent != 0 ) {
				if ( has_post_thumbnail( $post->post_parent ) ) {
					$posthmfrom = $post->post_parent;
				}
			}
		} else {
			$posthmfrom = $post->ID;
		}
	}
	if ( $posthmfrom != false ) {
		echo '<!-- postthmfrom '. $posthmfrom .' -->';
		echo get_the_post_thumbnail($posthmfrom, 'pagebg', array(
			'id'=>'pagebg'
		));
	} else { // default
		echo '<img src="'. get_bloginfo('template_url') .'/images/2/bgs/blog.jpg" id="pagebg" />';
	}
}

function eco_catlist() {	
	$oot = get_the_category_list( __( ', ', 'twentyeleven' ) );
	$fposts = strpos($oot, 'Featured Posts</a>');
	//echo '<!-- fposts '. $fposts .' -->';
	if ( $fposts > 0 ) {
		$oot = substr( $oot, 0, $fposts ) . substr($oot, $fposts + 20);
	}
	echo $oot;
}

//add_action( 'ngg_show_imagebrowser_first', create_function('', 'return true;') );

// [ecomenus page="Organic Plated" name="Plated Wedding Menu"]
function eco_menus_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'page' => '',
		'name' => ''
	), $atts ) );
	
	$oot = '';
	$args = array('post_type' => 'page', 'numberposts' => -1, 'post_parent' => 2 );
	
	// transient here?
	$menupages = get_posts($args);
	
	$oot .= '<div class="menucollapser collapsed"><a href="#">'. ( $name != '' ? $name : $page ) .'</a></div>';
	foreach ( $menupages as $p ) {
		if ( $p->post_title == $page ) {
			$oot .= '<div class="menuinpage" style="display:none">';
			$pcontent = $p->post_content;
			$pcontent = wp_kses( $pcontent, array( 'h2'=>array(), 'ul'=>array(), 'li'=>array()));
			
			// go from start of 1st h2 to last </ul>
			$h2start = strpos( $pcontent, '<h2>' );
			$ulend = strrpos( $pcontent, '</ul>' ) + 5;
			$pcontent = substr( $pcontent, $h2start, $ulend - $h2start );
			
			// h2 to h4
			$pcontent = str_replace( 'h2>', 'h4>', $pcontent );
			
			$oot .= apply_filters('the_content', $pcontent);
			$oot .= '<p>*all dishes may change according to season</p>'; 
			$oot .= '</div>';
		}
	}
	
	return $oot;
}
add_shortcode( 'ecomenus', 'eco_menus_shortcode' );

// slight testimonials cleanups
function eco_testimonials_override_byline( $auth, $testimonial, $author, $fromwhere ) {
	$auth = '<div class="by">-'. wp_kses($author['auth'],array()) .', '. wp_kses($author['loc'],array()) .'</div>';
	return $auth;
}
add_filter( 'progo_testimonials_byline', 'eco_testimonials_override_byline', 10, 4 );

function eco_testimonials_override_postquote( $postquote ) {
	return '&rdquo;<br />';
}
add_filter( 'progo_testimonials_post_quote', 'eco_testimonials_override_postquote' );

add_action('pre_option_image_default_link_type', 'always_link_images_to_none');
function always_link_images_to_none() {
	return 'none';
}

function eco_cats() {
	echo '<div class="cats"><strong>Categories: </strong>';
	eco_catlist();
	echo '</div>';
}

function eco_post() {
	global $post;
	?>
	<div class="ecopost">
    <div class="date"><?php the_time('Md'); ?></div>
    <div class="auth">By <?php the_author(); edit_post_link(__('Edit this Post.', 'kubrick'), ' &nbsp;|&nbsp; ', ''); ?></div>
    <div class="shares">
    <?php
    $imgurl = '';
    if ( has_post_thumbnail() ) {
        $imgurl = 'YES';
        $imgid = get_post_thumbnail_id();
        $imgurl = wp_get_attachment_image_src( $imgid , 'large' );
        $imgurl = $imgurl[0];
        //echo '<pre style="display:none">'. $imgurl .'</pre>';
    }
	echo '<div class="shb fb"><a href="https://www.facebook.com/sharer/sharer.php?u='. urlencode( get_permalink() ) .'" target="_blank"><img src="'. get_bloginfo('template_url') .'/images/2/fbshare.gif" alt="Share" /></a></div>';
	
	echo '<div class="shb tw"><a href="https://twitter.com/share" class="twitter-share-button" data-via="ecocaters" data-count="none">Tweet</a></div>';
	
	echo '<div class="shb pin"><a href="//pinterest.com/pin/create/button/?url='. urlencode( get_permalink() ) .'%2F&media='. urlencode( $imgurl ) .'&description=EcoCaters.com%20-%20'. urlencode( get_the_title()) .'" data-pin-do="buttonPin" data-pin-config="none">Pin it</a></div>';
	?>
    </div>
    </div>
<?php
}

function eco_title() {
	global $post;
	$title = get_post_meta($post->ID, 'titleoverride', true);
	if ( $title == '' ) {
		$title = $post->post_title;
	}
	echo $title;
}



function google_additional_questions_tracking(){
	//if ( is_page('additional-questions') ) {
		?>

    	<!-- Google Code for Conversion Conversion Page -->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1063574838;
		var google_conversion_language = "en_US";
		var google_conversion_format = "1";
		var google_conversion_color = "ffffff";
		var google_conversion_label = "QInPCPThlAEQtrqT-wM";
		var google_conversion_value = 500.0;
		var google_remarketing_only = false;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1063574838/?value=500.0&amp;label=QInPCPThlAEQtrqT-wM&amp;guid=ON&amp;script=0"/>
		</div>
		</noscript>

		<!-- Google Code for Contact Form Conversion Page -->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1010807863;
		var google_conversion_language = "en";
		var google_conversion_format = "2";
		var google_conversion_color = "ffffff";
		var google_conversion_label = "XYR-CPG54AIQt-j-4QM";
		var google_conversion_value = 500.00;
		var google_remarketing_only = false;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1010807863/?value=500.00&amp;label=XYR-CPG54AIQt-j-4QM&amp;guid=ON&amp;script=0"/>
		</div>
		</noscript>

		<?php
	//}
}
//add_action('wp_footer', 'google_additional_questions_tracking'); // replaced with Tag Manager

function google_tag_manager(){

	?>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N4K7ZS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N4K7ZS');</script>
	<!-- End Google Tag Manager -->
	<?php

}
add_action('wp_footer', 'google_tag_manager');
