var ecohcyc;

function submit_form(){
      if (jQuery("#top_form input[name=lf_name]").val() != "" && jQuery("#top_form input[name=lf_name]").val() != "name" && jQuery("#top_form input[name=lf_email]").val() != ""  && jQuery("#top_form input[name=lf_email]").val() != "email"  && jQuery("#top_form input[name=lf_phone]").val() != ""  && jQuery("#top_form input[name=lf_phone]").val() != "phone") {
	  
		if (echeck(jQuery("#top_form input[name=lf_email]").val()) == false){
	        jQuery("div.errorTop").text("Not a valid email address!").show().fadeOut(2000);
			return false;
		} else {
			jQuery("#top_form input[name=FormAction]").attr('value','submit');
			jQuery("#top_form").submit();
		}
      } else {
      jQuery("div.errorTop").text("Please fill all required fields!").show().fadeOut(2000);
      return false;
	}
}

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

function econextslide() {
	console.log('nextt');
	var onn = jQuery('.hslide.on');
	var nex = onn.next();
	if ( nex.hasClass('hslide') == false ) {
		nex = onn.parent().children('.hslide:eq(0)');
	}
	nex.trigger('slideon');
}

jQuery(function($) {
	$('#nav > ul > li > a').addClass('firstlink').parent().bind({
		mouseover: function() {
			$(this).addClass('over');
		},
		mouseleave: function() {
			$(this).removeClass('over');
		}
	});
	$('#nav li.quote a.firstlink').append('<span class="arr" />');
	$('#ftr ul.menu > li:first').addClass('first');
	
	if ( $('body').hasClass('home') ) {	
		if ( $('.homeslider .hslide').size() > 0 ) {
			var hpager = '<ul id="hpager">';
			$('.hslide').each(function(i) {
				hpager += '<li' + ( i==0 ? ' class="on"' : '' ) +'><a href="#'+ i+'"></a></li>';
				$(this).bind({
					'btnfx': function() {
						$('#hbtnfx').remove();
						$(this).children('a.cta').clone().attr('id','hbtnfx').appendTo('.mrap').show();
					},
					'slideon': function() {
						clearTimeout(ecohcyc);
						/*
						$(this).siblings('.on').removeClass('on').hide();
						$(this).addClass('on').show();
						*/
						var onn = $(this).siblings('.on');
						onn.css('z-index',2);
						$(this).css('z-index',1).addClass('on').show();
						
						$(this).trigger('btnfx');
						$('#hpager li:eq('+i+')').addClass('on').siblings('.on').removeClass();
						
						onn.fadeOut(1000, function() {
							$(this).removeClass('on').css('z-index',1).hide();
						});
						ecohcyc = setTimeout(econextslide, 6000);
					}
				});
				if ( i == 0 ) $(this).trigger('btnfx');
			});
			hpager += '</ul>';
			$('.mrap').append(hpager).children('#hpager').children('li').children('a').each(function(i) {
				$(this).click(function() {
					$('.hslide:eq('+i+')').trigger('slideon');
					return false;
				});
			});
			ecohcyc = setTimeout(econextslide, 4000);
		}
	} else {
		$('.h1').each(function() {
			var tw = $(this).width();
			var th = $(this).height();
			if ( ( th < 100 ) && ( tw > 660 ) ) {
				var tx = $(this).html();
				var lastspace = tx.lastIndexOf(' ');
				tx = tx.substr(0,lastspace) + '<br />'+ tx.substr(lastspace);
				$(this).html(tx);
			}
		});
	}
	$("#rt_form").submit(function() {
		if ($("#rt_form input[name=lf_name]").val() != "" && $("#rt_form input[name=lf_phone]").val() != "" && $("#rt_form input[name=lf_email]").val() != "") {
			if (echeck($("#rt_form input[name=lf_email]").val()) == false){
				$("#rt_form div.errorText").text("Not a valid email address!").show().fadeOut(2000);
				return false;
			} else {
				$("#rt_form input[name=FormAction]").attr('value','submit');
				return true;
			}
		}
		$("#rt_form div.errorText").text("Please fill all required fields!").show().fadeOut(2000);
		return false;
	});
	
	$('.menucollapser').each(function() {
		$(this).children('a').click(function() {
			$(this).parent().toggleClass('collapsed').next().slideToggle(900);
			return false;
		});
		if ( $(this).next().next().hasClass('menucollapser') ) {
			$(this).next().next().addClass('notopline');
		} else {
			$(this).addClass('bottomspace').next().addClass('bottomspace');
		}
	});

});
