<?php
/*
Template Name: Thank you
*/
//session_start();

include("contact_config.php");

$sError = '';
$sSuccess = 0;

$FormAction = get_param("FormAction");
if ($FormAction == "submit") {
  $fldcontact_name = get_param("lf_name");
  $fldcontact_email = get_param("lf_email");
  $fldcontact_phone = get_param("lf_phone");
  $phone_not_required = get_param("two_field");
  $fldcontact_source = get_param("source");
  

  if (!strlen($fldcontact_name)) {
    $sError .= '<b>name</b> is required field.<br>';
  }
  if (!strlen($fldcontact_email)) {
    $sError .= '<b>email address</b> is required field.<br>';
  }
  else if (!ereg("^[a-zA-Z0-9\.\_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $fldcontact_email)) {
	$sError .= '<b>email address</b> is incorrect.<br>';
  }
  if (!strlen($fldcontact_phone)) {
    $sError .= '<b>phone</b> is required field.<br>';
  }


/*  
  if(!isset($_SESSION['captcha_keystring']) || $_SESSION['captcha_keystring'] != $_POST['keystring']){  
    $sError .= '<b>code</b> is wrong.<br>'; 
  }
  unset($_SESSION['captcha_keystring']);
*/  
  if ($sError == '') {

	$email_to = get_option('admin_email');
    $message  = 'Name: '.toemail($fldcontact_name).EMAIL_EOL;
    $message .= 'Email Address: '.toemail($fldcontact_email).EMAIL_EOL;
    $message .= 'Phone: '.toemail($fldcontact_phone).EMAIL_EOL;
    wp_mail('emily@ecocaters.com, anna@ecocaters.com, adam@ecocaters.com, angela@ecocaters.com, staci@ecocaters.com, john@ecocaters.com, lauren@ecocaters.com', $fldcontact_name.' contact request', $message);
	
	$sSuccess = 1;
  }
  else {
    $fldcontact_name = strip(get_param("contact_name"));
    $fldcontact_email = strip(get_param("contact_email"));
    $fldcontact_phone = strip(get_param("contact_phone"));
    $fldcontact_comment = strip(get_param("contact_comment"));
  }
}
if ($sSuccess == 1) { 
	wp_redirect(get_option('siteurl') . '/additional-questions?source='.$fldcontact_source.'&contact_name='.urlencode($fldcontact_name).'&contact_email='.urlencode($fldcontact_email).'&contact_phone='.urlencode($fldcontact_phone));
}
?>

<?php get_header();

if (have_posts()) : while (have_posts()) : the_post();
global $post;
eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1"><?php eco_title(); ?></div>
    </div>
    <div id="main">
        <div id="left">
            <div id="post-<?php the_ID(); ?>">
<?php   if ($sSuccess == 1 || strlen(get_param("source"))) { ?>
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
<?php 	} else { ?>
<?php	 if ($sError != '') { ?>

	  <div class="erros"><?php echo($sError); ?></div>
	  
<?php	} ?>			  
			  
			  
<?php 	} ?>
	<?php endwhile; endif; ?>
	<?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
            </div>
        </div>
        <div id="right">
			<?php
			get_sidebar('seen');
			
			get_sidebar('quotes');
			?>
        </div>

<?php get_footer(); ?>
