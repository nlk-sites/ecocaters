<?php
/*
Template Name: PPC (OLD)
*/
?>
<?php get_header(); ?>
           <div class="centerPageDiv">
		  <div class="rightPageDiv">
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    <div id="post-<?php the_ID(); ?>">
		      <h1 class="titlePage"><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		        <?php endwhile; endif; ?>
	            <?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>
	        </div>
	       </div>
		   <div class="leftPage">
				<div class="titleHome">get in touch with ecocaters</div>
				<div class="formDiv">
				<?php 
				$slug = get_slug();
				?>
				  <form action="<?php echo get_permalink('127').'?source='.$slug;?>" id="left_form" enctype="application/x-www-form-urlencoded" method="POST">
				  <input type="hidden" name="FormAction" id="FormAction"  value="">
				    <div><span>NAME</span><input type="text" class="textInp" id="lf_name" name="lf_name"/></div>
				    <div><span>PHONE</span><input type="text" class="textInp" id="lf_phone" name="lf_phone"/></div>
				    <div><span>EMAIL</span><input type="text" class="textInp" id="lf_email" name="lf_email"/></div>
				    <div><input type="submit" value="REQUEST QUOTE" class="subInp" /></div>
				  </form>
				</div>
				<div class="errorText"></div>
				<script type="text/javascript">
				$(function() {

				   $("#left_form").submit(function() {
					  if ($("#lf_name").val() != "" && $("#lf_phone").val() != "" && $("#lf_email").val() != "") {
					  
						if (echeck($("#lf_email").val()) == false){
							$("div.errorText").text("Not a valid email address!").show().fadeOut(2000);
							return false;
						} else {
							$("#FormAction").attr('value','submit');
							return true;
						}
					  }
					  $("div.errorText").text("Please fill all required fields!").show().fadeOut(2000);
					  return false;
					});

				});
				function echeck(str) {

						var at="@"
						var dot="."
						var lat=str.indexOf(at)
						var lstr=str.length
						var ldot=str.indexOf(dot)
						if (str.indexOf(at)==-1){
						   return false
						}

						if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
						   return false
						}

						if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
							return false
						}

						 if (str.indexOf(at,(lat+1))!=-1){
							return false
						 }

						 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
							return false
						 }

						 if (str.indexOf(dot,(lat+2))==-1){
							return false
						 }
						
						 if (str.indexOf(" ")!=-1){
							return false
						 }

						 return true					
					}
				</script>
				<div class="comDiv">"Thank you very much for helping me create such a memorable dinner. You were a big hit!"<br />
				  <font>-Maria D., Los Angeles</font>
				</div>	   
<?php include (TEMPLATEPATH . '/sidebar3.php'); ?>
		   </div>
           </div>

<?php get_footer(); ?>
