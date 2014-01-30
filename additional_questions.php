<?php

/*

Template Name: Additional Questions

*/

//session_start();



include("contact_config.php");

/* echo '<pre>';

print_r($_POST);

echo '</pre>'; */

$sError_second = '';

$sSuccess_second = 0;



$FormAction_second = get_param("FormAction_second");

$source = get_param("source");

$fldcontact_name = urldecode(get_param("contact_name"));

$fldcontact_email = urldecode(get_param("contact_email"));

$fldcontact_phone = urldecode(get_param("contact_phone"));

//$fldcontact_comment = urldecode(get_param("contact_comment"));

  

if ($FormAction_second == "submit") {

	

	$source = get_param("from");

	$fldcontact_name = get_param("contact_name");

	$fldcontact_email = get_param("contact_email");

	$fldcontact_phone = get_param("contact_phone");

	$fldcontact_second_occasion = get_param("contact_second_occasion");

	$fldcontact_second_event = get_param("contact_second_event");

	$fldcontact_second_quests = get_param("contact_second_quests");

	$fldcontact_second_place = get_param("contact_second_place");

	// location OTHER check ...

	if ( $fldcontact_second_place == 'other' ) $fldcontact_second_place = get_param("otherLocation");

	// and then...

	$fldcontact_second_address = get_param("contact_second_address");

	$fldcontact_second_service_type = get_param("contact_second_service_type");

	$fldcontact_second_particular_type = get_param("contact_second_particular_type");

	$fldcontact_second_food_restrictions = get_param("contact_second_food_restrictions");

	$fldcontact_second_beverage = get_param("contact_second_beverage");

	$fldcontact_second_rentals = get_param("contact_second_rentals");

	$fldcontact_second_kitchen = get_param("contact_second_kitchen");

	$fldcontact_second_budget_for_catering = get_param("contact_second_budget_for_catering");

	$fldcontact_second_need = get_param("contact_second_need");

    $fldcontact_second_hear = get_param("contact_second_hear");

	$fldcontact_second_other_details = get_param("contact_second_other_details");

	 

	/* if (!strlen($fldcontact_second_occasion)) {$sError_second .= '<b>What is the occasion?</b> is required field.<br>'; }

	if (!strlen($fldcontact_second_event)) { $sError_second .= '<b>When is your event?</b> is required field.<br>';}

	if (!strlen($fldcontact_second_quests)) { $sError_second .= '<b>How many guests are you expecting?</b> is required field.<br>';}

	if (!strlen($fldcontact_second_place)) { $sError_second .= '<b>Where is your event (venue & address)?</b> is required field.<br>'; }

	if (!strlen($fldcontact_second_service_type)) {$sError_second .= '<b>Type of Service</b> is required field.<br>'; } */



	if ($sError_second == '') {



		$email_to = get_option('admin_email');

		$message  = 'Name: '.toemail($fldcontact_name).EMAIL_EOL;

		$message .= 'Email Address: '.toemail($fldcontact_email).EMAIL_EOL;

		$message .= 'Phone: '.toemail($fldcontact_phone).EMAIL_EOL;

		//$message .= 'Comment: '.EMAIL_EOL;

		//$message .= toemail($fldcontact_comment).EMAIL_EOL;

		$message .= EMAIL_EOL;

		$message .= 'What is the occasion? :'.EMAIL_EOL;

		$message .= toemail($fldcontact_second_occasion).EMAIL_EOL.EMAIL_EOL;

		$message .= 'When is your event? : '.EMAIL_EOL.toemail($fldcontact_second_event).EMAIL_EOL.EMAIL_EOL;

		$message .= 'How many guests are you expecting? : '.EMAIL_EOL.toemail($fldcontact_second_quests).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Where is your event? :'.EMAIL_EOL;

		$message .= toemail($fldcontact_second_place).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Venue Address :'.EMAIL_EOL;

		$message .= toemail($fldcontact_second_address).EMAIL_EOL.EMAIL_EOL;

		$message .= 'What type of service would you like (buffet, plated, family style, hors d\'oeuvres)? : '.EMAIL_EOL.toemail($fldcontact_second_service_type).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Is there any particular type of cuisine you are looking for? : '.EMAIL_EOL.toemail($fldcontact_second_particular_type).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Are there any food restrictions we need to be aware of? : '.EMAIL_EOL.toemail($fldcontact_second_food_restrictions).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Would you like us to provide beverage (alcoholic or non-alcoholic)? : '.EMAIL_EOL.toemail($fldcontact_second_beverage).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Would you like us to provide the rentals such as tables, chairs, linens, plates, etc? : '.EMAIL_EOL.toemail($fldcontact_second_rentals).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Does the venue have a commercial kitchen we can use? : '.EMAIL_EOL.toemail($fldcontact_second_kitchen).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Do you have a budget for catering? : '.EMAIL_EOL.toemail($fldcontact_second_budget_for_catering).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Do you need event planning or design? : '.EMAIL_EOL.toemail($fldcontact_second_need).EMAIL_EOL.EMAIL_EOL;

        $message .= 'Where did you hear about us? : '.EMAIL_EOL.toemail($fldcontact_second_hear).EMAIL_EOL.EMAIL_EOL;

		$message .= 'Please tell us any other important details about your event :'.EMAIL_EOL;

		$message .= toemail($fldcontact_second_other_details).EMAIL_EOL.EMAIL_EOL;

		wp_mail('emily@ecocaters.com, anna@ecocaters.com, adam@ecocaters.com, angela@ecocaters.com, staci@ecocaters.com, john@ecocaters.com, lauren@ecocaters.com', $fldcontact_name.' contact us request', $message);

		$sSuccess_second = 1;

	}

	else {

		$fldcontact_name = strip(get_param("contact_name"));

		$fldcontact_email = strip(get_param("contact_email"));

		$fldcontact_phone = strip(get_param("contact_phone"));

		//$fldcontact_comment = strip(get_param("contact_comment"));

		$fldcontact_second_occasion = strip(get_param("contact_second_occasion"));

		$fldcontact_second_event = strip(get_param("contact_second_event"));

		$fldcontact_second_quests = strip(get_param("contact_second_quests"));

		$fldcontact_second_place = strip(get_param("contact_second_place"));

		$fldcontact_second_service_type = strip(get_param("contact_second_service_type"));

		$fldcontact_second_particular_type = strip(get_param("contact_second_particular_type"));

		$fldcontact_second_food_restrictions = strip(get_param("contact_second_food_restrictions"));

		$fldcontact_second_beverage = strip(get_param("contact_second_beverage"));

		$fldcontact_second_rentals = strip(get_param("contact_second_rentals"));

		$fldcontact_second_kitchen = strip(get_param("contact_second_kitchen"));

		$fldcontact_second_budget_for_catering = strip(get_param("contact_second_budget_for_catering"));

		$fldcontact_second_need = strip(get_param("contact_second_need"));

        $fldcontact_second_hear = strip(get_param("contact_second_hear"));

		$fldcontact_second_other_details = strip(get_param("contact_second_other_details"));

	}

}





if ($sSuccess_second == 1) { 

	wp_redirect(get_option('siteurl') . '/thank-you?source='.$source);

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

				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>

			<?php if ($sError_second != '') { ?>

			<div class="erros"><?php echo($sError_second); ?></div> 

			<?php } ?>

			<div class="formCon contactleft fullw">

			<form enctype="application/x-www-form-urlencoded" name="contact_form_second" id="contact_form_second" method="POST" action="<?php the_permalink(); ?>">	

				<input type="hidden" name="FormAction_second" value="">
				<input type="hidden" name="contact_name" value="<?php echo(tovalue($fldcontact_name)); ?>"/>
				<input type="hidden" name="contact_email" value="<?php echo(tovalue($fldcontact_email)); ?>"/>
				<input type="hidden" name="contact_phone" value="<?php echo(tovalue($fldcontact_phone)); ?>"/>
				<input type="hidden" name="from" value="<?php echo(tovalue($source)); ?>"/>

				<p>
					<label for="contact_second_occasion">What is the occasion?</label>
					<textarea id="contact_second_occasion" name="contact_second_occasion" cols="" rows=""><?php echo(tovalue($fldcontact_second_occasion)); ?></textarea>
				</p>

                <p>
                	<label for="contact_second_event">When is your event?</label>
					<input class="small inputPost" type="text" id="datepicker" name="contact_second_event" value="<?php echo(tovalue($fldcontact_second_event)); ?>"  />
				</p>

				<p>
					<label for="contact_second_quests">How many guests are you expecting?</label>
					<input class="small inputPost" type="text" id="contact_second_quests" name="contact_second_quests" value="<?php echo(tovalue($fldcontact_second_quests)); ?>"  />
				</p>

				<p>
					<label for="contact_second_place">Where is your event?</label>
                	<input type="radio" style="width:auto; height:auto" name="contact_second_place" value="San Diego" />  San Diego<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_place" value="Los Angeles" />  Los Angeles<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_place" value="Orange County" />  Orange County<br />
					<input type="radio" style="width:auto; height:auto" name="contact_second_place" value="Washington D.C." />  Washington D.C.<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_place" id="otherRadio" value="other" />  
                    <input type="text" value="Enter Location" name="otherLocation" id="otherLocation" class="inputPost inline" />
                </p>

                    <p>
                    	<label for="contact_second_address">Please provide your Venue Address</label>
						<textarea id="contact_second_address" name="contact_second_address" cols="" rows=""><?php echo(tovalue($fldcontact_second_address)); ?></textarea>
					</p>

                    

				<?php 

					$name = 'contact_second_service_type';

					$label = 'What type of service would you like (buffet, plated, family style, hors d\'oeuvres, tapas)?';

					$values = array('Choose Service Type', 'Buffet', 'Plated', 'Family Style', 'Hors d\'Oeuvres', 'Tapas', 'I Don\'t Know');

					echo generate_list($values, $label, $name, $fldcontact_second_service_type); 

				?>

				<p>
					<label for="contact_second_particular_type">Is there any particular type of cuisine you are looking for?</label>
					<input type="text" class="inputPost" id="contact_second_particular_type" name="contact_second_particular_type" value="<?php echo(tovalue($fldcontact_second_particular_type)); ?>"  />
				</p>

				<p>
					<label for="contact_second_food_restrictions">Are there any food restrictions we need to be aware of?</label>
					<input type="text" class="inputPost" id="contact_second_food_restrictions" name="contact_second_food_restrictions" value="<?php echo(tovalue($fldcontact_second_food_restrictions)); ?>"  />
				</p>

                <p>
                	<label for="contact_second_beverage">Would you like us to provide beverage (alcoholic or non-alcoholic)?</label>
					<input type="text" class="inputPost" id="contact_second_beverage" name="contact_second_beverage" value="<?php echo(tovalue($fldcontact_second_beverage)); ?>"  />
				</p>

                    <p><label for="contact_second_rentals">Would you like us to provide the rentals such as tables, chairs, linens, plates, etc?</label>

					<input type="text" class="inputPost" id="contact_second_rentals" name="contact_second_rentals" value="<?php echo(tovalue($fldcontact_second_rentals)); ?>"  /></p>

				<p><label for="contact_second_kitchen">Does the venue have a commercial kitchen we can use?</label>

					<input type="text" class="inputPost" id="contact_second_kitchen" name="contact_second_kitchen" value="<?php echo(tovalue($fldcontact_second_kitchen)); ?>"  /></p>

                    <p><label for="contact_second_budget_for_catering">What is your budget for catering?</label>

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$500 - $1,000" />  $500 - $1,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$1,000 - $2,000" />  $1,000 - $2,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$2,000 - $4,000" />  $2,000 - $4,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$4,000 - $6,000" />  $4,000 - $6,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$6,000 - $8,000" />  $6,000 - $8,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$8,000 - $10,000" />  $8,000 - $10,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$10,000 - $15,000" />  $10,000 - $15,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$15,000 - $20,000" />  $15,000 - $20,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$20,000 - $30,000" />  $20,000 - $30,000<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$30,000 - $40,000" />  $30,000 - $40,000<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$40,000 - $50,000" />  $40,000 - $50,000<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$50,000 - $75,000" />  $50,000 - $75,000<br />
                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$75,000 - $100,000" />  $75,000 - $100,000<br />

                    <input type="radio" style="width:auto; height:auto" name="contact_second_budget_for_catering" value="$100,000+" />  $100,000+</p>

                    <p><label for="contact_second_need">Do you need wedding coordination, event planning or event design services?</label>

					<input type="text" class="inputPost" id="contact_second_need" name="contact_second_need" value="<?php echo(tovalue($fldcontact_second_need)); ?>"  /></p>

					<p><label for="contact_second_hear">Where did you hear about us?</label>

                    <select name="contact_second_hear">

                    	<option value="" selected="selected">Please Choose</option>

                    	<option value="Google">Google</option>

                        <option value="Venue List">Venue List</option>

                        <option value="Referral">Referral</option>

                        <option value="The Knot">The Knot</option>

                        <option value="Style Me Pretty">Style Me Pretty</option>

                        <option value="Yelp">Yelp</option>

                        <option value="Spork Foods">Spork Foods</option>

                        <option value="Past Client">Past Client</option>

                        <option value="Other Search Engine">Other Search Engine</option>

                        <option value="Other">Other</option>

                    </select></p>



				<p><label class="last" for="contact_second_other_details">Please tell us any other important details about your event.</label>

					<textarea id="contact_second_other_details" name="contact_second_other_details" cols="" rows=""><?php echo(tovalue($fldcontact_second_other_details)); ?></textarea></p>

                    <p><br /></p>

				<p><input type="submit" value="Submit" class="submitPos" onclick="document.contact_form_second.FormAction_second.value='submit';"/></p>

			</form>

			</div>

						

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

<script type="text/javascript">

$('#otherLocation').focus(function(){

	if(this.value == 'Enter Location'){

		this.value = '';

		$('#otherRadio').attr("checked", "checked");

	}

}).blur(function(){

	if(this.value == ''){

		$('#otherLocation').value = 'Enter Location';

		$('#otherRadio').val('other');

		$('#otherRadio').attr("checked", false);

	}else{

		$('#otherRadio').val(this.value);

	}

});

$('#otherRadio').focus(function(){

	$('#otherLocation').focus();

});

</script>


<?php

get_footer();

?>
