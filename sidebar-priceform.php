<?php 
$slug = get_slug();
?>
<form action="<?php echo get_permalink('127').'?source='.$slug;?>" id="rt_form" enctype="application/x-www-form-urlencoded" method="POST">
<div class="ftxt">Pricing your<br />event is fast<br />and easy</div>
<input type="hidden" name="FormAction" id="FormAction"  value="">
<input type="text" class="textInp" id="lf_name" name="lf_name" value="name" onfocus="if(this.value=='name')this.value=''" onblur="if(this.value=='')this.value='name'" />
<input type="text" class="textInp" id="lf_phone" name="lf_phone" value="phone" onfocus="if(this.value=='phone')this.value=''" onblur="if(this.value=='')this.value='phone'" />
<input type="text" class="textInp" id="lf_email" name="lf_email" value="email" onfocus="if(this.value=='email')this.value=''" onblur="if(this.value=='name')this.value='email'" />
<input type="image" value="submit" src="<?php bloginfo('template_url'); ?>/images/request.png" class="sub" />
<div class="errorText"></div>
</form>