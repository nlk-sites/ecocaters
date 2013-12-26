<?php
/*
Template Name: Direct
*/

global $post, $wp_query;
if(isset($wp_query->query_vars['keyword'])) {
	$wp_query->query_vars['kw'] = $wp_query->query_vars['keyword'];
}
$kw = '';
if(isset($wp_query->query_vars['kw']) && $wp_query->query_vars['kw'] != '') {
	$kw = $wp_query->query_vars['kw'];
	$kw = ucwords(str_replace('-',' ',$kw));
}

get_header('direct');
?>
<div id="dwrap">
<div id="dpage">
<div id="dtop">
<div id="logo">EcoCaters</div>
<h1><?php
if($kw != '') {
				echo wp_kses($kw,array());
			} else {
				bloginfo( 'description' );
			}
?></h1>
<h2>LA's Organic, Seasonal, &amp; Fresh Catering Provider</h2>
<img src="<?php bloginfo('template_url'); ?>/images/direct-imgs.jpg" width="649" height="143" alt="EcoCaters" class="imgs" />
<div id="dar">CALL TODAY : (310) 728-6005 &nbsp;<span>-OR-</span></div>
<img src="<?php bloginfo('template_url'); ?>/images/direct-recs.jpg" alt="EcoCaters Recommendations" class="recs" width="609" height="102" border="0" usemap="#recMap" />
</div>
		    <div id="dcontent">
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1>Local, Organic Catering</h1>
				<?php the_content(); ?>
		        <?php endwhile; endif; ?>
	            <?php edit_post_link(__('Edit this entry.'), '<p>', '</p>'); ?>
			</div>
                
		   <div id="dright">
				<div class="rq">Request a Quote</div>
				<div class="rh">Pricing Your Event<br />is Fast &amp; Easy</div>
				<div class="formDiv">
				<?php 
				$slug = get_slug();
				?>
				  <form action="<?php echo get_permalink('127').'?source='.$slug;?>" id="left_form" enctype="application/x-www-form-urlencoded" method="POST">
				  <input type="hidden" name="FormAction" id="FormAction"  value="">
				    <div><label>NAME</label><input type="text" class="txt" id="lf_name" name="lf_name"/></div>
				    <div><label>PHONE</label><input type="text" class="txt" id="lf_phone" name="lf_phone"/></div>
				    <div><label>EMAIL</label><input type="text" class="txt" id="lf_email" name="lf_email"/></div>
				    <div><input type="image" value="submit" src="<?php bloginfo('template_url'); ?>/images/direct-sub.jpg" class="sub" /></div>
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
                <div class="quote">
                &ldquo;I really enjoyed your wonderful creations of delicious flavors.&rdquo; <span class="by">Ginger C., San Diego</span>
                </div>
            </div>
</div>
<div id="dft">
<strong><a href="<?php echo get_permalink(15); ?>">Contact us</a> today for a FREE event consultation!</strong><br />
EcoCaters 2011 - all rights reserved
</div>
</div>
<map name="recMap" id="recMap">
  <area shape="rect" coords="0,0,137,80" href="http://kgtv.cityvoter.com/eco-caters/biz/141348" target="_blank" />
  <area shape="rect" coords="160,0,305,77" href="http://seafoodforthefuture.org/partners/" target="_blank" />
  <area shape="rect" coords="337,0,415,78" href="http://wedding.theknot.com/local-wedding-vendors/los-angeles-weddings/articles/best-los-angeles-wedding-vendors-2010.aspx" target="_blank" />
  <area shape="rect" coords="462,5,605,75" href="http://www.herecomestheguide.com/service/detail/eco-caters/" target="_blank" />
</map>
<?php get_footer('direct'); ?>
