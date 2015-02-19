// Description: ATOM Theme

"use strict";

jQuery(document).ready(function($) {
  
	/* ----------------------------------------------------
		Functions
	---------------------------------------------------- */
	var totalCountTimerId = '';
	
	// ---------------------------------------
	//	init menu
	// ---------------------------------------
	function menuInit(){
		//add arrow
		$('ul.atom-nav-menu > li > ul').each(function() {
			if($('.site-header-style-1 ').length > 0 || $('.site-header-style-4 ').length > 0){
				$(this).parent().children('a').append('<i class="fa fa-angle-down"></i>');
			}

			$(this).find('ul').each(function() {
				$(this).parent().children('a').append('<i class="fa fa-angle-right"></i>');
			});
		});
		
		//mobile menu
		$('.header-responsive-menu-btn').click(function() {
			if($('#wpadminbar').length > 0){
				$('#mobile-menu').css('top',$('#wpadminbar').height());
				$('#mobile-menu').css('height',$(window).height()-$('#wpadminbar').height());
			}else{
				$('#mobile-menu').css('height',$(window).height());
			}
            $('#mobile-menu').animate({'right':0});
			return false;
        });
		
		$('.mobile-menu-close-btn').click(function() {
             $('#mobile-menu').animate({'right':'-300px'});
			$('.wrapper').css('height','auto');
			return false;
        });
		
	}
	// ---------------------------------------
	//	init mega menu
	// ---------------------------------------
	function megaMenuInit(){
		// add arrow
		$('ul.atom-nav-menu > li .mega-menu > ul').each(function() {
			if($('.site-header-style-1').length > 0){
				$(this).parent().parent().children('a').append('<i class="fa fa-angle-down"></i>');
			}
			
			if($(this).parent().hasClass('mega-horizontal') && $(this).parent().hasClass('mega-wide')){
				var column = $(this).children('li').length;
				$(this).children('li').addClass('mega-menu-column-'+column);
			}
			
			if($(this).parent().hasClass('mega-vertical')){
				$(this).children('li').children('ul').each(function() {
                    $(this).parent().children('a').prepend('<i class="fa fa-angle-right"></i>');
                });
			}
		});
		
		// disable mega menu for header style 2, 3
		if($('.site-header-style-2').length > 0 || $('.site-header-style-3').length > 0 || $('.site-header-style-4').length > 0){
			$('.mega-menu-main .mega-menu.mega-vertical').each(function() {
                $(this).parent().append($(this).html());
				$(this).remove();
            });
		}
		
		$('.mega-menu-main .mega-menu.mega-wide.mega-vertical > ul > li').mouseover(function() {
			var current_megamenu_width = 0;
			var current_megamenu_height = 0;
			var current_menu_top = $(this).position().top;
			var current_menu_height = $(this).outerHeight();
			var items = $(this).children('ul').children('li');
			//var megamenu_item_max_width = 0;
			for(var i=0; i<items.length;i++){
				current_megamenu_width += $(items[i]).outerWidth();
				if($(items[i]).outerHeight() > current_megamenu_height){
					current_megamenu_height = $(items[i]).outerHeight();
				}
			}
			
			$(this).children('ul').css({'width':(current_megamenu_width + 2) + 'px'});
			
			if((current_menu_top - 6 +current_menu_height) > current_megamenu_height){
				$(this).children('ul').css({'margin-top':( - current_megamenu_height + current_menu_height) + 'px'});
			}else{
				$(this).children('ul').css({'margin-top':( - current_menu_top + 6) + 'px'});
			}
		});
		
		var megamenu_main_width =0;
		
		$('.mega-menu-main .mega-menu.mega-horizontal').parent().mouseover(function() {
			
			if($(this).find('.mega-menu.mega-wide').length > 0){
				if($('.site-header-style-2').length > 0 || $('.site-header-style-3').length > 0 || $('.site-header-style-4').length > 0){
					megamenu_main_width = $('#atom-header').children('.container').width();
					$(this).find('.mega-menu').css('width',megamenu_main_width);
					$(this).find('.mega-menu').css('left', -($(this).parent().offset().left - $('#atom-header').children('.container').offset().left -15));
				}
				
				clearMegaWidgetOver(this);
				
				return;
			}
			
			megamenu_main_width = $(this).parent().width();
			var current_menu_width = $(this).width();
            var current_menu_left = $(this).position().left;
			var current_megamenu_width = 0;
			var items = $(this).find('.mega-menu > ul > li');
			var target_position = 0;
			var megamenu_item_max_width = 0;

			for(var i=0; i<items.length;i++){
				current_megamenu_width += $(items[i]).outerWidth();
				if($(items[i]).outerWidth() > megamenu_item_max_width){
					megamenu_item_max_width = $(items[i]).outerWidth();
				}
			}
			
			$(items).css('width',megamenu_item_max_width);
			current_megamenu_width = items.length * megamenu_item_max_width;
			
			if($('.site-header-style-2').length > 0 || $('.site-header-style-4').length > 0){
				
				if(current_megamenu_width > megamenu_main_width){
					$(this).find('.mega-menu').css({'left': -(current_megamenu_width - megamenu_main_width),'width':current_megamenu_width + 2});
				}else{
					var p_l = $(this).position().left + $('.atom-nav-menu').offset().left - $('#atom-header').children('.container').offset().left - 15;
					
					if( ($('#atom-header').children('.container').width() - p_l) > current_megamenu_width){
						$(this).find('.mega-menu').css({'left': $(this).position().left ,'width':current_megamenu_width + 2});
					}else{
						$(this).find('.mega-menu').css({'right': 0 ,'width':current_megamenu_width + 2});
					}
				}
				
				//$(items).css('width',(current_megamenu_width - 30 * items.length - 2)/items.length);
				clearMegaWidgetOver(this);
				return;
			}else if($('.site-header-style-3').length > 0){
				if(current_megamenu_width > megamenu_main_width){
					$(this).find('.mega-menu').css({'left': -((current_megamenu_width - megamenu_main_width)/2),'width':current_megamenu_width + 2});
				}else{
					var p_l2 = $(this).position().left + $('.atom-nav-menu').offset().left - $('#atom-header').children('.container').offset().left - 15;
					
					if( ($('#atom-header').children('.container').width() - p_l2) > current_megamenu_width){
						$(this).find('.mega-menu').css({'left': $(this).position().left ,'width':current_megamenu_width + 2});
					}else{
						$(this).find('.mega-menu').css({'right': 0 ,'width':current_megamenu_width + 2});
					}
				}
				
				//$(items).css('width',(current_megamenu_width - 30 * items.length - 2)/items.length);
				clearMegaWidgetOver(this);
				return;
			}
			
			
			
			if(current_megamenu_width > megamenu_main_width){
				$(this).find('.mega-menu').css({'left':'0','width':'100%'});
			}else if(current_megamenu_width > 3*current_menu_width){
				target_position = current_megamenu_width/2;
				target_position = target_position - current_menu_width/2;
				if(current_menu_left-target_position > 0){
					$(this).find('.mega-menu').css('left', current_menu_left-target_position +'px');
				}else{
					$(this).find('.mega-menu').css('left', '0');
				}
			}else{
				if(current_menu_left + current_megamenu_width < megamenu_main_width){
					$(this).find('.mega-menu').css('left',current_menu_left +'px');
				}else{
					$(this).find('.mega-menu').css('left',(megamenu_main_width-current_megamenu_width) +'px');
				}
			}
			clearMegaWidgetOver(this);
        });
		
		function clearMegaWidgetOver(element){
			$('.mega-custom-widget-content').removeClass('over');
			$(element).find('.mega-custom-widget-content').addClass('over');
		}
	}
	// ---------------------------------------
	//	title line menu
	// ---------------------------------------
	function titleLineInit(){
		$('.line').each(function() {
			if( $(this).children('.left-line').length === 0 ) {
				$(this).append('<span class="left-line"></span>');
			}
			if( $(this).children('.right-line').length === 0 ) {
				$(this).append('<span class="right-line"></span>');
			}
		});
	}
	// ---------------------------------------
	//	quickly search tools
	// ---------------------------------------
	function quicklySearchToolsInit(){
		var mouse_over = false;
		
		$('.header-search-btn').click(function() {
			if($(this).hasClass('open')){
				$(this).removeClass('open');
				hideNormalSearch();
			}else{
				$(this).addClass('open');
				$('.atom-form-search').fadeIn();
				$('.atom-form-search').find('input').focus();
				$(window).bind("click", hideNormalSearch );
			}
			return false; 
		});
		
		$('.atom-form-search').mouseleave(function() { mouse_over = false; });
		$('.atom-form-search').mouseenter(function() { mouse_over = true; });

		function hideNormalSearch(){
			if(!mouse_over){
				$('.header-search-btn').removeClass('open');
				$('.atom-form-search').fadeOut();
				$(window).unbind("click", hideNormalSearch );
			}
		}
		
		// change product search submit button
		$('.widget_product_search #searchsubmit').each(function() {
            $(this).parent().append('<button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>');
			$(this).remove();
        });
	}
	// ---------------------------------------
	//	cart init
	// ---------------------------------------
	function cartInit(){
		if($(window).width() > 700){
			$('.atom-cart-list').mouseenter(function() {
				$('.cart-list-contents-container').show();
			});
			$('.atom-cart-list').mouseleave(function() {
				$('.cart-list-contents-container').hide();
			});
		}
		
	}
	// ---------------------------------------
	//	wishlist init
	// ---------------------------------------
	function wishlistInit(){
		if($(window).width() > 700){
			$('.atom-wish-list').mouseenter(function() {
				$('.wish-list-contents').show();
			});
			$('.atom-wish-list').mouseleave(function() {
				$('.wish-list-contents').hide();
			});
		}
		
	}
	// ---------------------------------------
	//	login init
	// ---------------------------------------
	function loginInit(){
		if($(window).width() > 700){
			$('.atom-wc-login').mouseenter(function() {
				$('.user-contents-container').show();
			});
			$('.atom-wc-login').mouseleave(function() {
				$('.user-contents-container').hide();
			});
		}
		
	}
	// ---------------------------------------
	//	run animation elements
	// ---------------------------------------	
	function animationRun(){
		// check all single animate element
		$('.animate').each(function(){
			if($(this).hasClass('animated')){
				return false;
			}
			if (checkPosition(this)) {
				$(this).removeClass('animate');
				exAnimate(this);
			}
		});
		
		// check all animate list element
		$('.animate-list').each(function() {
            var items = $(this).find('.animate-item');
			var count = 0;			
			for(var i=0;i<items.length;i++){
				if($(items[i]).hasClass('animating') || $(items[i]).hasClass('animated')){
					if(!$(items[i]).hasClass('animated')){
						count++;
					}else{
						$(items[i]).removeClass('animating');
						$(items[i]).removeClass('animate-item');
					}
					continue;
				}
				if (checkPosition(items[i])) {
					listItemDelayEx(items[i],count);
					count++;
				}
			}			
        });
		
		// list item delay time and execute
		function listItemDelayEx(element,count){
			$(element).addClass('animating').delay(300*count).queue(function(){exAnimate(this);});
		}
		
		// check element position
		function checkPosition(element){
			var imagePos = $(element).offset().top;
			var topOfWindow = $(window).scrollTop();
			var heightOfWindow = $(window).height();
			if (imagePos < topOfWindow+heightOfWindow - 50) {
				return true;
			}
			return false;
		}
		
		// add class for element run animation
		function exAnimate(element){
			var effect = 'fadeIn';
			if($(element).attr('data-effect') && $(element).attr('data-effect') !== ""){
				effect = $(element).attr('data-effect');
			}
			$(element).addClass('animated '+effect);
		}
	}
	
	// ---------------------------------------
	//	ajax get posts
	// ---------------------------------------
	function ajaxGetPostsInit(){
		// check all ajax module
		$('.ajax-main-area').each(function() {
			
			if($(this).children('.ajax-isotope').length === 0){
				return;
			}
			
			var layout_mode = "masonry";
			var iso = $(this).children('.ajax-isotope');
			
			if($(this).children('.portfolio-ajax-type').length > 0){
				var layoutMode = iso.attr('data-layoutmode');
				if(!layoutMode || layoutMode === ""){
					layout_mode = 'fitRows';
				}else{
					layout_mode = layoutMode;
				}
			}
			
			iso.isotope({
				itemSelector: '.post-ajax-element',
				layoutMode : layout_mode ,
				transitionDuration : '0.8s',
			});

			iso.find('img').load(function() {
				iso.isotope('layout');
			});
			 
			// have no more posts
			if($(this).find('.ajax-load-content').length === 0){
				return false;
			}

			var ajax_main = $(this);
			var ajax_load_content = $(ajax_main).find('.ajax-load-content');
			var ajax_paged = parseInt(ajax_load_content.attr('data-page'));
			var ajax_max_paged = parseInt(ajax_load_content.attr('data-max'));
			var ajax_next_link = ajax_load_content.attr('data-link');
			var ajax_loading	= false;
			
			// auto load posts
			if($(ajax_main).find('.post-ajax-load-btn').length === 0){
				$(window).scroll(function() {
					if(ajax_loading || ajax_paged > ajax_max_paged) {return false;}
					var imagePos = $(ajax_main).find('.ajax-load-btn-container').offset().top;
					var topOfWindow = $(window).scrollTop();
					var heightOfWindow = $(window).height();
					if (imagePos < topOfWindow+heightOfWindow - 50) {
						loadPostsContent();
					}
				});
			}
			
			// load post content
			function loadPostsContent(){
				ajax_loading = true;
				
				$(ajax_main).find('.post-ajax-load-btn').hide();
				$(ajax_main).find('.post-ajax-scroll-load').hide();
				$(ajax_main).find('.post-ajax-loading').show();
				
				ajax_load_content.load(ajax_next_link + ' .post-ajax-element' , function(responseText, textStatus, XMLHttpRequest){
					
					if ( textStatus == "error" ) {
						$(ajax_main).find('.post-ajax-loading').hide();
						$(ajax_main).find('.post-ajax-load-btn').show();
						$(ajax_main).find('.post-ajax-scroll-load').show();

						ajax_loading = false;
						return false;
					}
					
					var new_elements = $($(ajax_load_content).html());
					
					ajax_load_content.html('');
					
					new_elements.find('.atom-fl').flexslider({slideshow:false,
						start: function(){
							iso.isotope( 'layout' );
						}
					});

					new_elements.find('img').load(function() { iso.isotope('layout');	});
					
					iso.append(new_elements).isotope( 'appended',new_elements);
					
					ajax_paged++;
					
					if(ajax_paged <= ajax_max_paged) {
						ajax_next_link = ajax_next_link.replace(/\/page\/[0-9]*/, '/page/'+ ajax_paged);
						ajax_next_link = ajax_next_link.replace(/paged=[0-9]*/, 'paged='+ ajax_paged);
						$(ajax_main).find('.post-ajax-loading').hide();
						$(ajax_main).find('.post-ajax-load-btn').show();
						$(ajax_main).find('.post-ajax-scroll-load').show();
						ajax_loading = false;
					}else{
						$(ajax_main).find('.ajax-load-btn-container').remove();
					}
				
				});
			}
			
			// button click load posts
			$(ajax_main).find('.post-ajax-load-btn').click(function() {
				if(ajax_loading || ajax_paged > ajax_max_paged) {return false;}
				loadPostsContent();
            });
        });
	}
	
	// ---------------------------------------
	//	post comment submit check
	// ---------------------------------------
	function postCommentCheck(){
		checkElement("#comment-form", postCommentFieldCheck);
		
		function postCommentFieldCheck(params){
			if($(params).find('#comment-alert-error').length > 0){
				$(params).find('#comment-submit button[type=submit]').click(function() {
					$(params).find('#comment-alert-error').removeClass('show');
					$(params).find('#comment-alert-error span').removeClass('show');
							
					if($(params).find('.comment-alert-error-name').length > 0){
						if($(params).find('#author').attr('value').length === 0){
							$(params).find('#comment-alert-error').addClass('show');
							$(params).find('.comment-alert-error-name').addClass('show');
							return false;
						}
					}
					if($(params).find('.comment-alert-error-email').length > 0){
						if($(params).find('#email').attr('value').length === 0){
							$(params).find('#comment-alert-error').addClass('show');
							$(params).find('.comment-alert-error-email').addClass('show');
							return false;
						}
						var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
						
						if(!reg.test($(params).find('#email').attr('value'))){
							$(params).find('#comment-alert-error').addClass('show');
							$(params).find('.comment-alert-error-email').addClass('show');
							return false;
						}
					}
					if($(params).find('.comment-alert-error-message').length > 0){
						if($(params).find('#comment').attr('value').length === 0){
							$(params).find('#comment-alert-error').addClass('show');
							$(params).find('.comment-alert-error-message').addClass('show');
							return false;
						}
					}
					return true;
				});
			}
		}
	}
	
	// ---------------------------------------
	//	button init
	// ---------------------------------------
	function buttonsInit(){
		$('.btn-custom').each(function() {
			if( $(this).attr('data-txtcolor') ) {
				$(this).css('color',$(this).attr('data-txtcolor'));
			}
			if( $(this).attr('data-bgcolor') ) {
				$(this).css('background',$(this).attr('data-bgcolor'));
			}
			
			if( !$(this).hasClass('disabled') ){
			
				$(this).hover(function(){
					if( $(this).attr('data-txthovercolor') ) {
						$(this).css('color',$(this).attr('data-txthovercolor'));
					}
					if( $(this).attr('data-bghovercolor') ) {
						$(this).css('background',$(this).attr('data-bghovercolor'));
					}
				},function(){
					if( $(this).attr('data-txtcolor') ) {
						$(this).css('color',$(this).attr('data-txtcolor'));
					}
					if( $(this).attr('data-bgcolor') ) {
						$(this).css('background',$(this).attr('data-bgcolor'));
					}
					
				});
			}else{
				$(this).click(function() {
					return false;
				});
			}
		});
	}
	
	// ---------------------------------------
	//	tooltip 
	// ---------------------------------------
	function tooltipInit(){
		checkElement(".show-tooltip", tooltipCheck);
		if($('.tagcloud a').length > 0){
			$('.tagcloud a').tooltip();
		}
		function tooltipCheck(params){
			var obj = {};
			if($(params).attr('data-trigger') && $(params).attr('data-trigger') !== ""){
				obj.trigger = $(params).attr('data-trigger');
			}
			if($(params).attr('data-placement') && $(params).attr('data-placement') !== ""){
				obj.placement = $(params).attr('data-placement');
			}
			$(params).tooltip(obj);
		}
	}
	// ---------------------------------------
	//	popover 
	// ---------------------------------------
	function popoverInit(){
		checkElement(".atom-popover", popoverCheck);
		checkElement(".show-popover", popoverCheck);
		
		function popoverCheck(params){
			var obj = {};
			if($(params).attr('data-trigger') && $(params).attr('data-trigger') !== ""){
				obj.trigger = $(params).attr('data-trigger');
			}
			if($(params).attr('data-placement') && $(params).attr('data-placement') !== ""){
				obj.placement = $(params).attr('data-placement');
			}
			if($(params).attr('title') && $(params).attr('title') !== ""){
				obj.title = $(params).attr('title');
			}
			if($(params).find('.atom-popover-content').length > 0){
				obj.html = true;
				obj.content = $(params).find('.atom-popover-content').html();
			}
			$(params).popover(obj);
		}
	}
	// ---------------------------------------
	//	Total Count 
	// ---------------------------------------
	
	function totalcountInit(){
		checkElement(".totalcount", totalcountCheck);
		
		function totalcountCheck(params){
			if( $(params).hasClass('totalcount-complete') || $(params).hasClass('totalcount-run')){
				return;
			}
			var currentValue = parseInt($(params).attr('data-from'));
			var endValue = parseInt($(params).attr('data-end'));
			
			if(currentValue >= endValue){return;}
			
			var pos = $(params).offset().top;
			var topOfWindow = $(window).scrollTop();
			var heightOfWindow = $(window).height();
			
			if (pos < topOfWindow+heightOfWindow - 60) {
				$(params).addClass('totalcount-run');
				$(params).find('.totalnumber').text(milliFormat(String(currentValue)));
				if(totalCountTimerId === ""){
					totalCountTimerId = setInterval( totalcountTimerCheck ,100);
				}
			}
		}
	}
	
	function totalcountTimerCheck(){
		var items = $('.totalcount-run');
		for(var i=0; i<items.length;i++){
			var currentValue = parseInt($(items[i]).attr('data-from'));
			var stepValue = parseInt($(items[i]).attr('data-step'));
			var endValue = parseInt($(items[i]).attr('data-end'));
			currentValue += stepValue;
			if(currentValue >= endValue){
				currentValue = endValue;
				$(items[i]).addClass('totalcount-complete');
				$(items[i]).removeClass('totalcount-run');
			}
			$(items[i]).attr('data-from', currentValue);
			$(items[i]).find('.totalnumber').text(milliFormat(String(currentValue)));
		}
		if($('.totalcount-run').length === 0){
			clearInterval(totalCountTimerId);
			totalCountTimerId = "";
		}
	}
	function milliFormat(s){
		if(/[^0-9\.]/.test(s)) return "invalid value";  
		s=s.replace(/^(\d*)$/,"$1.");  
		s=(s+"00").replace(/(\d*\.\d\d)\d*/,"$1");  
		s=s.replace(".",",");  
		var re=/(\d)(\d{3},)/;  
		while(re.test(s)){  
			s=s.replace(re,"$1,$2");  
		}  
		s=s.replace(/,(\d\d)$/,".$1");  
		s=s.replace(/^\./,"0.");
		s=s.replace(".00","");
		return s;
	}
	
	// ---------------------------------------
	//	accordion
	// ---------------------------------------
	function accordionInit(){
		$('.atom-accordion-main .accordion-toggle').click(function() {
			if($(this).hasClass('collapsed')){
				$($(this).attr('href')).parent().prevAll().find('.accordion-toggle').addClass('collapsed');
				$($(this).attr('href')).parent().nextAll().find('.accordion-toggle').addClass('collapsed');
			}
		});
	}
	
	// ---------------------------------------
	//	one page Navigation
	// ---------------------------------------
	function onepageNavInit(){
		checkElement(".atom-pagenav", pageNavCheck);
		
		function pageNavCheck(params){
			var items = $(params).find('a');
			if( $(params).hasClass('right')){
				$(params).find('a').tooltip({placement:'left'});
				$(params).css({ 'margin-top': -($(params).outerHeight()/2) });
			}else if( $(params).hasClass('left')){
				$(params).find('a').tooltip({placement:'right'});
				$(params).css({ 'margin-top': -($(params).outerHeight()/2) });
			}else{
				$(params).find('a').tooltip({placement:'top'});
				$(params).css({ 'margin-right': -($(params).outerWidth()/2) });
			}
			
			$(items).click(function() {
                if($(this).hasClass('current')){ return false; }
				
				if($(this).attr('href') == '#home'){
					
					$('body,html').animate({
						scrollTop: 0
					}, 800 , '', refreshPageNav);
				}else if($($(this).attr('href')).length > 0){
					var pos = $($(this).attr('href')).offset().top;
					var target_position = pos -100;
					$('body,html').animate({
						scrollTop: target_position
					}, 800 , '', refreshPageNav);
				}
				return false;
            });
		}
		
		//add one page scroll
		$('.atom-nav-menu > li > a').each(function() {
			menuItemClick(this);
		});
		
		$('.atom-nav-mobile-menu > li > a').each(function() {
			menuItemClick(this);
		});
		
		function menuItemClick(element){
			var str = $(element).attr('href');
			if(str !== "" && String(str).substring(0,1) == "#" && ($(element).attr('href') == "#home" || $($(element).attr('href')).length > 0)){
				$(element).click(function() {
					if($(element).attr('href') == "#home"){
						$('body,html').animate({
							scrollTop: 0
						}, 800 , '', refreshPageNav);
					}else{
						var pos = $($(element).attr('href')).offset().top;
						var target_position = pos -100;
						$('body,html').animate({
							scrollTop: target_position
						}, 800 , '', refreshPageNav);
					}
					return false;
				});
			}
		}
		
		refreshPageNav();
	}
	function refreshPageNav(){
		var navitems = $('.atom-pagenav');
		var topOfWindow = $(window).scrollTop();
		for(var i=0; i<navitems.length; i++){
			var index = 0;
			var items = $(navitems[i]).find('a');
			for(var j=0;j<items.length;j++){
				if($($(items[j]).attr('href')).length > 0 && $($(items[j]).attr('href')).offset().top -100 <= topOfWindow){
					index = j;
				}
			}
			$(items).removeClass('current');
			$(items[index]).addClass('current');
		}
	}
	// ---------------------------------------
	//	services
	// ---------------------------------------
	function servicesInit(){
		$('.services').each(function() {
			
			var max_screen_width = $(this).width();
			var items = $(this).children('li');
			var item_width = max_screen_width/items.length;
			var count = items.length;
			var max_height = 0;
			
			if(item_width < 170){
				for(var i=0;i<items.length;i++){
					count--;
					if(max_screen_width/count > 170){
						break;
					}
				}
			}
			
			$(items).css('width',max_screen_width/count);
			
			for(var j=0; j<items.length; j++){
				if($(items[j]).outerHeight() > max_height){
					max_height = $(items[j]).outerHeight();
				}
			}
			$(items).css('height',max_height);
			
        });
	}
	// ---------------------------------------
	//	client
	// ---------------------------------------
	function clientsInit(){
		$('.clients').each(function() {
			var client =  $(this);
			var max_screen_width = $(this).width();
			var items = $(this).find('li');
			var item_width = 60;
			var count = 5;
			var index = 0;

			if($(window).width() > 900){
				count = 5;
			}else if($(window).width() > 700){
				count = 4;
			}else if($(window).width() > 400){
				count = 2;
			}else{
				count = 1;
			}
			
			item_width = max_screen_width/count;
			
			refreshItem(client, items, item_width);
			refreshArrowEvent(client, index, count, items.length);
			
			$(this).find('.client-arrow-left').click(function() {
				index--;
				moveClientItems(client, index, item_width);
				refreshArrowEvent(client, index, count, items.length);
            });
			
			$(this).find('.client-arrow-right').click(function() {
				index++;
				moveClientItems(client, index, item_width);
				refreshArrowEvent(client, index, count, items.length);
            });
			
			$(window).resize(function() {
				if($(window).width() > 900){
					count = 5;
				}else if($(window).width() > 700){
					count = 4;
				}else if($(window).width() > 400){
					count = 2;
				}else{
					count = 1;
				}
				
				index = 0;
				
				item_width = $(client).width()/count;
			
				refreshItem(client, items, item_width);
				moveClientItems(client, index, item_width);
				refreshArrowEvent(client, index, count, items.length);
			
			});
			
        });
		
		//refresh item width, height 
		function refreshItem(element,items, width){
			var max_height = 70;
			$(items).css('width',width);
			for(var j=0;j<items.length;j++){
				$(items[j]).css('left',j*width);
			}
			for(var i=0;i<items.length;i++){
				if($(items[i]).find('.a').height() > max_height){
					max_height = $(items[i]).find('.a').outerHeight();
				}
			}
			$(element).find('ul').css('height',max_height);
		}
		
		//refresh items
		function moveClientItems(element, index, width){
			$(element).find('ul').animate({'margin-left':-index*width});
		}
		// change arrow
		function refreshArrowEvent(element, index,count, length){
			if(index <= 0){
				$(element).find('.client-arrow-left').hide();
			}else{
				$(element).find('.client-arrow-left').show();
			}
			if(index+count > length-1){
				$(element).find('.client-arrow-right').hide();
			}else if(index + length > count){
				$(element).find('.client-arrow-right').show();
			}
		}
	}
	// ---------------------------------------
	//	testimonials
	// ---------------------------------------
	function testimonialsInit(){
		
		checkElement(".testimonials",openFeedback);

		function openFeedback(params){
			
			var testimonial = $(params);
			var cfb_items = $(params).find(".testimonials-item");
			var nav = $(params).find(".testimonials-nav a");
			var cfb_id = 0;
			var cfb_max = cfb_items.length;
			var run = false;
			var intervalObj = null;
			var auto = false;
			var delay = 5000;
			var cur_index = 0;
			
			function showPrevElement(){
				if(run)	{return false;}
				run = true;
				closeInterval();
				hideElement($(cfb_items[cfb_id]),prevElement);
			}
			
			function showNextElement(){
				if(run) {return false;}
				run = true;
				closeInterval();
				hideElement($(cfb_items[cfb_id]),nextElement);
			}
			
			function prevElement(){
				cfb_id--;
				if(cfb_id < 0)	{
					cfb_id = cfb_max-1;
				}
				showElement();
			}
			
			function nextElement(){
				cfb_id++;
				if(cfb_id >= cfb_max)	{
					cfb_id = 0;
				}
				showElement();
			}
			
			if(cfb_max <= 1){
				$(params).find(".testimonials-nav").css('display','none');
			}else{
				$(params).find(".testimonials-prev").click(function() {
					showPrevElement();
				});
				$(params).find(".testimonials-next").click(function() {
					showNextElement();
				});
				$(params).find(".testimonials-nav a").click(function() {
					if(run || $(this).index() == cfb_id) {return false;}
					run = true;
					closeInterval();
					cur_index = cfb_id;
                    cfb_id = $(this).index();
					hideElement($(cfb_items[cur_index]),showElement);
                });
				
				// auto play
				if( $(params).hasClass('testimonials-auto') ){
					auto = true;
					if(parseInt(testimonial.attr('data-delay')) > 0){
						delay = parseInt(testimonial.attr('data-delay'));
					}
				}
			}
			
			showElement();
			
			function showElement(){
				if($(cfb_items[cfb_id]).css("display") !== "block"){
					$(cfb_items[cfb_id]).fadeIn("fast");
				}
				if(nav.length > 0){
					$(nav).removeClass('current');
					$(nav[cfb_id]).addClass('current');
				}
				run = false;
				if(auto) { startInterval(); }
			}
			
			//hide text slider elements effect
			function hideElement(params,nextElement){
				if($(params).css("display") === "block"){
					$(params).fadeOut("fast","",nextElement);
				}
			}
			
			function startInterval(){
				intervalObj = setInterval(showNextElement , delay);
			}
			
			function closeInterval(){
				if(intervalObj !== null) { clearInterval(intervalObj); }
				intervalObj = null;
			}
		}
	}
	
	// ---------------------------------------
	//	Carousel Auto Play
	// ---------------------------------------
	function carouselInit(){
		$('.carousel-auto').each(function() {
			if($(this).attr('data-delay')){
				$(this).carousel({interval: $(this).attr('data-delay')});
			}
		});
		$('.carousel-stop').each(function() {
			$(this).carousel({interval: false});
		});
	}
	
	// ---------------------------------------
	//	skills animation run
	// ---------------------------------------
	function skillsAnimationRun(){
		$(".skills").each(function() {
			if($(this).hasClass('skill-animation-complete')){
				return;
			}
			if($(this).children('li').length == $(this).find('.skill-animation-run').length){
				$(this).addClass('skill-animation-complete');
				$(this).find('.skill-animation-run').removeClass('skill-animation-run');
				return;
			}
			var items = $(this).children('li');
			var count = 0;
			for(var i=0;i<items.length;i++){
				if($(items[i]).find('.skill-cover').hasClass('.skill-animation-run')){
					continue;
				}
				var pos = $(this).offset().top;
				var topOfWindow = $(window).scrollTop();
				var heightOfWindow = $(window).height();
				if (pos < topOfWindow+heightOfWindow - 60) {
					$(items[i]).find('.skill-cover').addClass('skill-animation-run').animate({width:$(items[i]).find('.skill-cover').attr('data-percent')},{duration:(400*count + 500)});
				}
				count++;
			}
           
        });
	}
	
	// ---------------------------------------
	//	Tabs & SideTabs
	// ---------------------------------------
	function tabsInit(){
			
		/* tabs */
		checkElement(".tabs",tabsBack);
		
		/* side tabs */
		checkElement(".sidetabs",sideTabsBack);
		
		/* back fun */
		function tabsBack(params){
			openTabs(params,".tabs-nav li",".tabs-content");
		}
		
		function sideTabsBack(params){
			openTabs(params,".sidetabs-nav li",".sidetabs-content");
		}
		
		function openTabs(params,pname1,pname2){
			var ot_items = $(params).find(pname1);
			var citems = $(params).find(pname2);
			var ot_s1 = 0;
			var ot_sm = ot_items.length;
			var ot_new;
			
			$(ot_items).click(function() {
				if(ot_s1 === $(this).index()) {
					return false;
				}
				
				$(citems[ot_s1]).stop(true,true);
				$(citems[ot_s1]).css("opacity",1);
				
				ot_new = $(this).index();
				
				$(ot_items[ot_s1]).removeClass("current");
				$(ot_items[ot_new]).addClass("current");
				
				if($(citems[ot_s1]) !== null) {
					$(citems[ot_s1]).fadeOut("fast","",runNewTabs);
				}
			});
			
			function runNewTabs(){
				ot_s1 = ot_new;
				showElement(ot_s1,citems);
			}
			
			for(var k=0; k<ot_sm;k++) {
				if(ot_s1 === k){
					if($(ot_items[k]).hasClass("current") === false) {
						$(ot_items[k]).addClass("current");
					}
					showElement(k,citems);
				}else{
					if($(ot_items[k]).hasClass("current") === true)	{
						$(ot_items[k]).removeClass("current");
					}
					hideElement(k,citems);
				}
			}
		}
		
		function showElement(k,citems){
			if($(citems[k]) !== null)	{
				$(citems[k]).fadeIn("fast");
			}
		}
		
		function hideElement(k,citems){
			if($(citems[k]) !== null)	{
				$(citems[k]).fadeOut("fast");
			}
		}
	}/* end tabs */
	
	// ---------------------------------------
	//	minibarInit
	// ---------------------------------------
	function minibarInit(){
		
		if($('.atom-mini-bar').length == 0){
			return;
		}
		
		if($('.atom-mini-bar').hasClass('open')){
			$('.atom-mini-bar').animate({'left':0},300);
		}else{
			$('.mini-bar-open').animate({'left':0},300);
		}
		
		var run = false;
		$('.mini-bar-open').click(function() {
			if(run){return;}
			run = true;
			$('.mini-bar-open').animate({'left':-36},300);
            $('.atom-mini-bar').delay(300).animate({'left':0},300,'',function(){run = false;});
        });
		
		$('.mini-bar-close').click(function() {
			if(run){return;}
			run = true;
            $('.atom-mini-bar').animate({'left':-36},300);
            $('.mini-bar-open').delay(300).animate({'left':0},300,'',function(){run = false;});
        });
		
		$('.atom-mini-bar-btns').css('margin-top',-$('.atom-mini-bar-btns').height()/2);
		
		$('.atom-mini-bar-btns > ul > li').mouseenter(function() {
            $(this).find('.minibar-content').show();
			var top = $(this).offset().top - $(window).scrollTop();
			var screen_height = $(window).height();
			if( $(this).find('.minibar-content').outerHeight() + top > screen_height){
				var move_value = screen_height - $(this).find('.minibar-content').outerHeight() - top;
				if(move_value + top < 0){
					move_value = -top;
					$(this).find('.minibar-content').css({'overflow-y':'scroll','height':screen_height});
				}else{
					$(this).find('.minibar-content').css({'overflow-y':'hidden','height':'auto'});
				}
			$(this).find('.minibar-content').css('margin-top', move_value);
			}
			return false;
        });
		
		$('.atom-mini-bar-btns > ul > li').mouseleave(function() {
              $(this).find('.minibar-content').hide();
			  $(this).find('.minibar-content').css({'overflow-y':'hidden','height':'auto','margin-top':0});
			  return false;
        });
	}
	
	// ---------------------------------------
	//	Scroll & Resize Window 
	// ---------------------------------------
	function scrollResizeInit(){
		$("body").append('<a id="back-top" href="#top" ><i class="fa fa-arrow-up"></i></a>');
			
		$(window).resize(function() {
			// service resize
			servicesInit();
			// isotope
			refreshIsotope();
			if($('.header-fixed-support').length > 0)	{fixedHeader();}
			$('#mobile-menu').css('height',$(window).height());
		});
			
		$(window).scroll(function() {
			// fixed header
			if($('.header-fixed-support').length > 0)	{fixedHeader();}
			// skills bar
			skillsAnimationRun();
			// total count
			totalcountInit();
			// one page nav 
			if($('.atom-pagenav').length > 0){refreshPageNav();}
			// animation element
			animationRun();
			// back top button
			if($(window).scrollTop() > 200){
				$("#back-top").fadeIn("slow");
			}else{
				$("#back-top").fadeOut("slow");
			}
		});
		
		// scroll body to 0px on click
		$('#back-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
		
		// refresh fixed menu style
		function fixedHeader(){
			var top_height = $('#header-wrap').outerHeight();
			if($(window).width() > 979 && $(window).scrollTop() > top_height) {
				if($('.header-fixed-support').hasClass('fixed-enabled')){
					return;
				}
				$('.header-fixed-support').addClass('fixed-enabled');
				if($('#wpadminbar').length > 0){
					if($('#atom-nav').length > 0){
						$('#atom-nav').stop(true,true).animate({'top':$('#wpadminbar').height()},500);
					}else{
						$('#site-header').stop(true,true).animate({'top':$('#wpadminbar').height()},300);
					}
				}else{
					if($('#atom-nav').length > 0){
						$('#atom-nav').stop(true,true).css('top','-100px').animate({'top':'0px'},500);
					}else{
						$('#site-header').stop(true,true).css('top','-100px').animate({'top':'0px'},300);
					}
				}

			}else{
				if(!$('.header-fixed-support').hasClass('fixed-enabled') && $('#atom-nav').css('top') === 0){
					return;
				}
				$('.header-fixed-support').removeClass('fixed-enabled');
				if($('#atom-nav').length > 0){
					$('#atom-nav').stop(true,true).css({'top':0});
				}else{
					$('#site-header').stop(true,true).css({'top':0});
				}
			}
		}
	} 
	// ---------------------------------------
	//	Touch Hover Effect -----------
	// ---------------------------------------
	function touchHoverSolve(){
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
			$('.post-tip').remove();
			$('.post-mask-content').remove();
			$('.atom-fl').addClass('touch');
			
			$('#header-topbar .wpml').click(function() {
				if($(this).hasClass('touch')){
					$(this).removeClass('touch');
				}else{
					$(this).addClass('touch');
				}
			});
		}
	}
	// ---------------------------------------
	//	headerBannerInit -----------
	// ---------------------------------------
	function headerBannerInit(){
		if(navigator.cookieEnabled){
			if($('#header-banner').length > 0){
				var cookie = getCookie("atom-header-banner");
				//show header banner
				if(cookie === null || cookie !== $('#header-banner').attr('data-id') ){
					$('#header-banner').css({marginTop:-($('#header-banner').height() + 1), display:'block'});
					$('#header-banner').animate({marginTop:0},600);
					$('#header-banner .close-btn').click(function() {
						$('#header-banner').animate({marginTop:-($('#header-banner').height() + 1)},600,'',function(){ $('#header-banner').remove(); });
						addCookie("atom-header-banner", $('#header-banner').attr('data-id') , 24);
						return false;
					});
				}else{
					$('#header-banner').remove();
				}
			}
		}
	}
	// ---------------------------------------
	//	COMMON -----------  check element and ex fun
	// ---------------------------------------
	function checkElement(params,fun){
		var list = $(params);
	
		if(list.length <= 0) {return false;}
		
		for (var w=0; w<list.length; w++)	{
			fun(list[w]);
		}
	}
	// ---------------------------------------
	//	Cookie ----------- save ,delete ,get cookie
	// ---------------------------------------
	function addCookie(name,value,hours){
		var str = name + "=" + value; 
		if(hours > 0){
			var date = new Date();
			var ms = hours*3600*1000;
			date.setTime(date.getTime() + ms);
			str += "; expires=" + date.toGMTString();
		}
		document.cookie = str;
	}
	function getCookie(name){
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		if(arr !== null) {
			return arr[2]; 
		}
		return null;
	}
	
	menuInit();
	megaMenuInit();
	titleLineInit();
	quicklySearchToolsInit();
	ajaxGetPostsInit();
	postCommentCheck();
	buttonsInit();
	accordionInit();
	testimonialsInit();
	servicesInit();
	clientsInit();
	carouselInit();
	tooltipInit();
	popoverInit();
	totalcountInit();
	tabsInit();
	onepageNavInit();
	skillsAnimationRun();
	cartInit();
	wishlistInit();
	loginInit();
	minibarInit();
	touchHoverSolve();
	animationRun();
	scrollResizeInit();
	headerBannerInit();

	// flexslide
	$('.atom-fl').each(function() {
		$(this).addClass('atom-fl-init');
		if($(this).attr('data-delay')){
			$(this).flexslider({slideshow: true , slideshowSpeed:$(this).attr('data-delay') });
		}else{
			$(this).flexslider({slideshow: false });
		}
	});
	
	//fancybox
	if($.fn.fancybox !== null)	{
		$("a[class^='fancyBox']").fancybox();
		$("a[class^='fancybox-thumb']").fancybox({helpers: {title: {type: 'outside'},thumbs: {width: 50,height	: 50}}});
	}

	// isotope filters
	$('.portfolio-main-area').each(function() {
		if($(this).find('.portfolio-isotope').length === 0){return false;}
		var portfolio = $(this);
		var cat_ul = '';
		var cat_select = '';
		
		$(portfolio).find('.portfolio-filters-cats a').click(function() {
			if($(this).hasClass('active'))	{return false;}
			$(this).addClass('active');
			$(this).parent().prevAll().find('a').removeClass('active');
			$(this).parent().nextAll().find('a').removeClass('active');
			var filters = $(this).attr('data-filters');
			if(filters != '*'){
				cat_ul = filters;
			}else{
				cat_ul = "";
			}
			if(cat_select !== ''){
				if(filters == "*"){
					filters = "";
				}
				filters += cat_select;
			}
			$(portfolio).find('.portfolio-isotope').isotope({ filter: filters });
		});
		
		$(portfolio).find('.portfolio-filters-cats-select select').change(function() {
			var filters = $(this).find('option').get($(this).get(0).selectedIndex).getAttribute('value');
			if(filters != '*'){
						cat_select = filters;
			}else{
					cat_select = "";
			}
			if(cat_ul !== ''){
				if(filters == "*"){
					filters = "";
				}
				filters += cat_ul;
			}
			$(portfolio).find('.portfolio-isotope').isotope({ filter: filters });
		});
	});

	$('.portfolio-isotope').each(function() {
		var layoutMode = $(this).attr('data-layoutmode');
		if(!layoutMode || layoutMode === ""){
			layoutMode = 'fitRows';
		}
        $(this).isotope({
			itemSelector: '.portfolio-element',
			layoutMode : layoutMode,
			transitionDuration : '0.8s'
		});
    });
	
	$('.portfolio-isotope').find('img').load(function() {
        refreshIsotope();
    });
	
});

jQuery(window).on("load", function() {
	refreshIsotope();
});

function refreshIsotope(){
	jQuery('.portfolio-isotope').isotope( 'layout' );
	jQuery('.ajax-isotope').isotope( 'layout' );
}

// Description: ATOM Theme for WooCommerce
(function($) {
	
	var atompreviewInit = false;
	var MxPreview = function(){

		if(!$('.product .woocommerce-main-image') || atompreviewInit){
			return false;
		}
		
		atompreviewInit = true;
		
		// sort list
		
		$('.woocommerce-ordering .orderby-list > li > .list-name').click(function() {
            if($(this).parent().hasClass('open')){
				$(this).parent().removeClass('open');
			}else{
				$(this).parent().addClass('open');
			}
        });
		
		$('.woocommerce-ordering .orderby-list li li').click(function() {
			if($(this).hasClass('select')){return false;}
			
            $('.woocommerce-ordering input.orderby-name').attr('value',$(this).attr('data-value'));
			
			$('.woocommerce-ordering').submit();
        });
		
		$('.orderby-list-page-number li li').click(function() {
            if($(this).hasClass('select')){return false;}
			if($('.woocommerce-ordering input[name=woo-per-page-num]').length === 0){
				$('.woocommerce-ordering').append('<input type="hidden" name="woo-per-page-num" value="'+ $(this).attr('data-value') + '" />');
			}else{
				$('.woocommerce-ordering input[name=woo-per-page-num]').attr('value',$(this).attr('data-value'));
			}
			if($('.woocommerce-ordering input[name=paged]').length !== 0){
				$('.woocommerce-ordering input[name=paged]').attr('value','1');
			}
			
			$('.woocommerce-ordering').submit();
        });
		
		$('.woocommerce-ordering-listorder a').click(function() {
            if($(this).hasClass('select') && $(this).find('i').length === 0){
				return false;
			}
			
			if($(this).hasClass('listorder-price')){
				if($(this).hasClass('up')){
					$('.woocommerce-ordering input.orderby-name').attr('value','price-desc');
				}else{
					$('.woocommerce-ordering input.orderby-name').attr('value','price');
				}
				
			}else if($(this).hasClass('listorder-popularity')){
				
				$('.woocommerce-ordering input.orderby-name').attr('value','popularity');
				
			}else if($(this).hasClass('listorder-rate')){
				$('.woocommerce-ordering input.orderby-name').attr('value','rating');
			}
			
			$('.woocommerce-ordering').submit();
			
        });
		
		
		// image move 
		
		var supportMove = true;
		
		if($(window).width() < 768){
			supportMove = false;
		}
		
		
		var moveLeave = true;
		var canMove = false;
		var percent = 1;
		var main_x;
		var main_y;
		var main_w;
		var main_h;
		var cover_w;
		var cover_h;
		var e_x;
		var e_y;
		var had_load = false;
		
		if( $('.thumbnails-ul li').length > 0 ){
			$('.product .woocommerce-main-image').click(function() {
				$($('.thumbnails-ul li').get(0)).find('a').click();
				return false;
			});
			$($('.thumbnails-ul li').get(0)).find('a').addClass('current');
		}
		
		if(supportMove){
			// support zoom effect
			$('.product .woocommerce-main-image').addClass('move');

			// mouse enter
			$('.product .woocommerce-main-image').mouseenter(function(e) {
				
				checkImageRefresh();
				
				removeAllElement();
				e_x = e.pageX;
				e_y = e.pageY;
				moveLeave = false;
				had_load = false;
				$('.preview_loading').addClass('show');
				$('.preview_zoom').append('<img src="'+ $('.product .woocommerce-main-image').attr('data-url') + '" alt="" />');
				$('.preview_zoom').css({width:$(this).width(),height:$(this).height(),'left':$(this).width() + 5});
				if($('.preview_zoom').find('img').width() > 0){
					$('.preview_zoom').addClass('show');
					imgLoaded();
					had_load = true;
				}else{
					$('.preview_zoom').addClass('show');
					$('.preview_zoom').find('img').bind('load', imgLoaded);
					had_load = true;
				}
			});
			
			// mouse move
			$('.product .woocommerce-main-image').mousemove(function(e) {
				e_x = e.pageX;
				e_y = e.pageY;
				
				if(canMove || had_load){
					refreshCoverPosition($('.preview_cover'),$('.preview_zoom').find('img'));
				}
				
				return false;
			});
			
			// mouse out
			$('.product .woocommerce-main-image').mouseleave(function() {
				removeAllElement();
			});
		}else{
			// mouse enter
			$('.product .woocommerce-main-image').mouseenter(function() {
				checkImageRefresh();
			});
		}
		
		// thumbnails items mouse over
		$('.thumbnails-ul li a').mouseenter(function() {
			if( $(this).hasClass('current') ){return false;}
			mouseEnterThumbs($(this));
			return false;
		});
		
		// thumbnails mouse over fun
		function mouseEnterThumbs(element){
			$('.thumbnails-ul li a').removeClass('current');
			$(element).addClass('current');
			$('.product .woocommerce-main-image img').attr('src',$(element).attr('data-single'));
			$('.product .woocommerce-main-image').attr('data-url',$(element).attr('href'));
		}
		
		// delete element as not need show
		function removeAllElement(){
			$('.preview_loading').removeClass('show');
			$('.preview_cover').removeClass('show');
			$('.preview_zoom').removeClass('show');
			$('.preview_zoom').children('img').remove();
			canMove = false;
			moveLeave = true;
		}
		
		// image load show zoom
		function imgLoaded(){
			$('.preview_loading').removeClass('show');
			if(moveLeave){
				removeAllElement();
				return;
			}
			percent = $('.preview_zoom').find('img').width()/$('.preview_zoom').width();
			main_x = $('.product .woocommerce-main-image').offset().left;
			main_y = $('.product .woocommerce-main-image').offset().top;
			main_w = $('.product .woocommerce-main-image').width();
			main_h = $('.product .woocommerce-main-image').height();
			cover_w = main_w/ percent;
			cover_h = main_h/ percent;
			$('.preview_cover').css({'width':cover_w , 'height': cover_h});
			$('.preview_cover').addClass('show');
			refreshCoverPosition($('.preview_cover'),$('.preview_zoom').find('img'));
			canMove = true;
		}
		
		//refresh image position
		function refreshCoverPosition(target,target2){
			var c_x = e_x - main_x;
			var c_y = e_y - main_y;
			var p_x = c_x - cover_w/2;
			var p_y = c_y - cover_h/2;
			if(p_x <= 0){ 
				p_x = 0;
			}else if(p_x+cover_w >= main_w){
				p_x = main_w - cover_w;
			}
			if(p_y <= 0){ 
				p_y = 0;
			}else if(p_y+cover_h >= main_h){
				p_y = main_h - cover_h;
			}
			$(target).css({'left':p_x , 'top': p_y});
			$(target2).css({'margin-left':-p_x*percent , 'margin-top':-p_y*percent});
		}

		// product variations change
		function checkImageRefresh(){
			if($('.product .woocommerce-main-image img').attr('src') != $('.thumbnails-ul li a.current').attr('data-single')){
				var items = $('.thumbnails-ul li a');
				for(var i=0;i<items.length;i++){
					if($(items[i]).attr('data-single') == $('.product .woocommerce-main-image img').attr('src')){
						mouseEnterThumbs($(items[i]));
						break;
					}
				}
			}
		}
	};
	
	$.fn.atompreview = function(){
      var atompre = new MxPreview();
	};

})(jQuery);
