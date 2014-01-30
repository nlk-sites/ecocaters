<?php
/*
Template Name: Book
*/
//session_start();

include("contact_config.php");

$sError = '';
$sSuccess = 0;

$FormAction = get_param("FormAction");
if ($FormAction == "submit") {
  $fldcontact_name = get_param("contact_name");
  $fldcontact_email = get_param("contact_email");
  $fldcontact_phone = get_param("contact_phone");
  $fldcontact_comment = get_param("contact_comment");

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
// if (!strlen($fldcontact_comment)) {
//   $sError .= '<b>comment</b> is required field.<br>';
//  }

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
    $message .= 'Comment: '.EMAIL_EOL;
    $message .= toemail($fldcontact_comment);
    wp_mail('emily@ecocaters.com, anna@ecocaters.com, adam@ecocaters.com, angela@ecocaters.com, staci@ecocaters.com, john@ecocaters.com, lauren@ecocaters.com', $fldcontact_name.' book an event', $message);
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
	wp_redirect(get_option('siteurl') . '/additional-questions?source=book-an-event&contact_name='.urlencode($fldcontact_name).'&contact_email='.urlencode($fldcontact_email).'&contact_phone='.urlencode($fldcontact_phone));
}	

get_header();
if (have_posts()) : while (have_posts()) : the_post();
global $post;
eco_bgimg();
?>
<div class="mrap">
	<div class="mainheader">
    	<div class="h1"><?php the_title(); ?></div>
    </div>
    <div id="main">
        <div id="left">
<?php   if ($sSuccess == 1) { 
	//wp_redirect(get_option('siteurl') . '/thank-you?source=book-an-event');

?>
	<div class="success">Your information was successfully sent. Thank You.</div>
<?php  } else {?>			  
		<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
<?php   if ($sError != '') { ?>
	  <div class="erros"><?php echo($sError); ?></div>
<?php   } ?>	
			<div class="formCon contactleft">
			  <form enctype="application/x-www-form-urlencoded" name="contact_form" method="POST" action="<?php the_permalink(); ?>">
			  <input type="hidden" name="FormAction" value="">
			    <label for="contact_name" title="required">name*</label><input  type="text" class="inputPost" name="contact_name" value="<?php echo(tovalue($fldcontact_name)); ?>" />
				<label for="contact_email" title="required">email*</label><input type="text" class="inputPost" name="contact_email" value="<?php echo(tovalue($fldcontact_email)); ?>" />
				<label for="contact_phone" title="required">phone*</label><input type="text" class="inputPost" name="contact_phone" value="<?php echo(tovalue($fldcontact_phone)); ?>" />
				<!--<div class="nameInput">EVENT DETAILS / COMMENTS<sup>*</sup></div><textarea class="textareaPost" name="contact_comment"><?php echo(tovalue($fldcontact_comment)); ?></textarea><br />-->
				<div class="reqdisc">* Required Fields</div>
				<input type="submit" value="SUBMIT" class="submitPos" />
			  </form>
			</div>
            <div class="contactmid">
            <h4>Events</h4>
            <p><a href="mailto:info@ecocaters.com">info@ecocaters.com</a></p>
            <h4>Employment</h4>
            <p><a href="mailto:employement@ecocaters.com">employement@ecocaters.com</a></p>
            <h4>Franchise</h4>
            <p><a href="mailto:franchise@ecocaters.com">franchise@ecocaters.com</a></p>
            </div>
<?php  } ?>				
		        <?php endwhile; endif; ?>
	            <?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
        </div>
        <div id="right">
			<?php get_sidebar('seen'); ?>
        </div>
<?php
get_footer();
?>
