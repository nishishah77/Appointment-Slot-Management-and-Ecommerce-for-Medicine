
	
		(function () {
				"use strict";
					
					
					
					/* ------------------------------------------------------------------------ */
					/* LOADER *///
					/* ------------------------------------------------------------------------  */

					 
							jQuery(window).load(function() { // makes sure the whole site is loaded
								jQuery('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
								jQuery('body').delay(350).css({'overflow':'visible'});
							});
			
			
					
					
					/* ------------------------------------------------------------------------ 
					   PARALLAX
					------------------------------------------------------------------------ */
					jQuery.stellar({
						horizontalScrolling: false,
						verticalOffset: 0
					});
					

					
					
					
					/* ------------------------------------------------------------------------ 
					   DATE PICKER
					------------------------------------------------------------------------ */
					jQuery("#datepicker").datepicker({
						inline: true
					});
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TEAM CAROUSEL
					------------------------------------------------------------------------ */
					jQuery("#team-carousel").owlCarousel({
						navigation : true
					});
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TESTIMONIALS CAROUSEL
					------------------------------------------------------------------------ */
					jQuery("#carousel-testimonials, #meet-doctors-carousel, #main-banner, #carousel-testimonials2, .image-carousel").owlCarousel({
						singleItem : true,
						pagination : true
					});
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TESTIMONIALS CAROUSEL
					------------------------------------------------------------------------ */
					jQuery("#shop-slider").owlCarousel({
						singleItem : true,
						pagination : true
					});
					
					
					
					/* ------------------------------------------------------------------------ 
					   OUR CLINIC
					------------------------------------------------------------------------ */
					jQuery("#our-clinic, #our-hospital, #meet-specialist-carousel").owlCarousel({
						singleItem : true,
						navigation : true
					});
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   DOCTORS LIST
					------------------------------------------------------------------------ */
					jQuery("#our-doctors-list").owlCarousel({
						items : 2,
						itemsDesktop : [1199,2],
						itemsDesktopSmall : [979,1],
						itemsTablet : [768,1],
						itemsMobile : [479,1],
						navigation : true
					});
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TEXT CAROUSEL
					------------------------------------------------------------------------ */
					jQuery(".text-carousel").owlCarousel({
						singleItem : true
					});
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   MEET THE PERFECT TEAM CAROUSEL
					------------------------------------------------------------------------ */
					jQuery("#meet-the-team").owlCarousel();
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   FORM STYLING
					------------------------------------------------------------------------ */
					jQuery("select").uniform();
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   FORMS
					------------------------------------------------------------------------ */
					$("input[type='radio']").uniform();
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TABS
					------------------------------------------------------------------------ */
					jQuery('#horizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TABS
					------------------------------------------------------------------------ */
					jQuery('.fancybox').fancybox({
						maxWidth	: 600,
						maxHeight	: 800,
						fitToView	: false,
						width		: '100%',
						height		: '70%',
						autoSize	: false,
						autoHeight : true,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none'
					});
					
					jQuery('.fancybox-media').fancybox({
						openEffect  : 'none',
						closeEffect : 'none',
						helpers : {
							media : {}
						}
					});
				
				
				
				
				
				
					/* ------------------------------------------------------------------------ 
					   ITEM COUNTER
					------------------------------------------------------------------------ */
				    var itemcount= 0;
		
					$('#pluss-item').on("click", function() { 
						itemcount++;
					$('#total-items').val(itemcount);
					});
				
					$('#less-item').on("click", function() { 
						itemcount--;
					$('#total-items').val(itemcount);
					});
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   GALLERY
					------------------------------------------------------------------------ */
					jQuery('#Container-gallery').mixItUp();
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TOP TOGGLE SECTION
					------------------------------------------------------------------------ */
					jQuery("#toggle-btn").click(function(e) {
						jQuery("#top-sec-detail").slideToggle();
						jQuery("#toggle-btn i").toggleClass("fa-minus");
					});
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   TEAM DESCRIPTION BOX
					------------------------------------------------------------------------ */
					jQuery(".team-des-btn").click(function(){			
						jQuery(this).parent('.team-member-description').find('div.team-desc').fadeToggle();
						jQuery(this).parent('.team-member-description').siblings('.team-member-description').find('div.team-desc').fadeOut();
						jQuery(this).parent('.team-member-description').siblings('.team-member-description').find('a.team-des-btn i').removeClass("fa-minus");
						jQuery(this).parent('.team-member-description').siblings('.team-member-description').find('a.team-des-btn').removeClass("active");
						jQuery(this).parent('.team-member-description').find('a.team-des-btn i').toggleClass("fa-minus");
						jQuery(this).parent('.team-member-description').find('a.team-des-btn').toggleClass("active");
					});
			
					
				
					/* ------------------------------------------------------------------------ 
					   DOCTORS LIST VERTICAL
					------------------------------------------------------------------------ */
					jQuery('#doctors-list').jcarousel({
						scroll :1
					});
					
					
					/* ------------------------------------------------------------------------ 
					   LATEST NEWS CAROUSEL
					------------------------------------------------------------------------ */
					jQuery('#latest-news-carousel').jcarousel({
						vertical: true,
						scroll :1
					});
					
					
					
					
					
					/* ------------------------------------------------------------------------ 
					   PIECHARTS
					------------------------------------------------------------------------ */
					jQuery('#pie-charts').waypoint(function(direction) {			
						jQuery('.chart').easyPieChart({
							easing: 'easeOutBounce',
							onStep: function(from, to, percent) {
								$(this.el).find('.percent').text(Math.round(percent));
							}
						});
						}, {
						offset: function() {
							return jQuery.waypoints('viewportHeight') - jQuery(this).height() + 100;
						}
					});
					
					
					
					/* ------------------------------------------------------------------------ */
					/* BACK TO TOP 
					/* ------------------------------------------------------------------------ */


						$(window).scroll(function(){
							if($(window).scrollTop() > 200){
								$("#back-to-top").addClass('to-top');
							} else{
								$("#back-to-top").removeClass('to-top');
							}
						});
						
						$('#back-to-top, .back-to-top, .navbar-brand').click(function() {
							  $('html, body').animate({ scrollTop:0 }, '800');
							  return false;
						});

						
						
						
						/* ------------------------------------------------------------------------ */
						/* ACCORDIAN ACTIVE CLASS
						/* ------------------------------------------------------------------------ */
						
						jQuery('#accordion .panel-title, #accordion2 .panel-title').click(function(e) { 
							jQuery(this).toggleClass('active');
							jQuery(this).parent(".panel-heading").parent(".panel-default").siblings(".panel-default").find('.panel-title').removeClass('active');
						});
						
						
						
						
						
						/* ------------------------------------------------------------------------ */
						/* ACCORDIAN ICONS
						/* ------------------------------------------------------------------------ */
						jQuery('#accordion .panel-title a').click(function(e) { 
							jQuery(this).parent().find('span i').toggleClass('fa-minus');
							jQuery(this).parent(".panel-title").parent(".panel-heading").parent(".panel-default").siblings(".panel-default").find('.panel-title a span i').removeClass('fa-minus');
						});
						
						
						
						
						
						/* ------------------------------------------------------------------------ */
						/* FOR ACCORDIAN2 UP AND DOWN ARROW
						/* ------------------------------------------------------------------------ */
						jQuery('#accordion2 .panel-title a').click(function(e) { 
							jQuery(this).toggleClass('active');
							jQuery(this).parent().find('i.pull-right').toggleClass('fa-angle-up');
							jQuery(this).parent().find('i.pull-right').toggleClass('fa-angle-down');
							jQuery(this).parent(".panel-title").parent(".panel-heading").parent(".panel-default").siblings(".panel-default").find('.panel-title a i.pull-right').removeClass('fa-angle-up');
							jQuery(this).parent(".panel-title").parent(".panel-heading").parent(".panel-default").siblings(".panel-default").find('.panel-title a i.pull-right').addClass('fa-angle-down');
						});
						
						
						
						
						
						/* ------------------------------------------------------------------------ */
						/* FOR ACCORDIAN3 ACTIVE CLASS
						/* ------------------------------------------------------------------------ */
						jQuery('#accordion3 .panel-title a').click(function(e) { 
							jQuery('#accordion3 .panel-title').removeClass('active');
							jQuery(this).parent('.panel-title').addClass('active');
						});
						
						
						
						
						/* ------------------------------------------------------------------------ */
						/* FIXED HEADER
						/* ------------------------------------------------------------------------ */
						jQuery(window).scroll(function() {    
							var scroll = jQuery(window).scrollTop();	
							if (scroll >= 40) {
								jQuery(".fixed-header").addClass("small-header");
							}
							else {
								jQuery(".fixed-header").removeClass("small-header");
							}
						});
						
						
						
						
						
					
			
		})(jQuery);

