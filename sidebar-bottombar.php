<div id="reg-bar">    
<div class="errorTop"></div>
<?php 
$slug = get_slug();
?>
<form action="<?php echo get_permalink('127').'?source='.$slug;?>" method="post" name="top_form" id="top_form">
<input type="hidden" name="FormAction" id="FormAction"  value="">
<div class="txt">get in touch with eco caters</div>
<input class="required text" minlength="2" value="name (first and last)" id="lf_name" name="lf_name" onfocus="if(this.value=='name (first and last)') this.value=''" onblur="if(this.value=='') this.value='name (first and last)'" />
<input class="required text" size="8" value="phone" id="lf_phone" name="lf_phone" onfocus="if(this.value=='phone') this.value=''" onblur="if(this.value=='') this.value='phone'" />
<input class="required email text" value="email" id="lf_email" name="lf_email" onfocus="if(this.value=='email') this.value=''" onblur="if(this.value=='') this.value='email'" />
<div id="reg-bar-submit"><span onclick="submit_form();" style="cursor:pointer">REQUEST QUOTE<img src="<?php bloginfo('template_url'); ?>/images/sp5.gif" /></span></div>
</form>
</div>
