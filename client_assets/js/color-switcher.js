	jQuery(document).ready(function($) {
	
		  jQuery("#blue" ).click(function(){
			  jQuery("#color" ).attr("href", "css/blue.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo.png");
			  return false;
		  });
		  
		  jQuery("#green" ).click(function(){
			  jQuery("#color" ).attr("href", "css/green.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-green.png");
			  return false;
		  });
		  
		  jQuery("#red" ).click(function(){
			  jQuery("#color" ).attr("href", "css/red.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-red.png");
			  return false;
		  });
		  
		  
		  jQuery("#yellow" ).click(function(){
			  jQuery("#color" ).attr("href", "css/yellow.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-yellow.png");
			  return false;
		  });
		  
		  jQuery("#brown" ).click(function(){
			  jQuery("#color" ).attr("href", "css/brown.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-brown.png");
			  return false;
		  });
		  
		  jQuery("#cyan" ).click(function(){
			  jQuery("#color" ).attr("href", "css/cyan.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-cyan.png");
			  return false;
		  });
		  
		  jQuery("#purple" ).click(function(){
			  jQuery("#color" ).attr("href", "css/purple.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-purple.png");
			  return false;
		  });
		  
		  jQuery("#sky-blue" ).click(function(){
			  jQuery("#color" ).attr("href", "css/sky-blue.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-sky-blue.png");
			  return false;
		  });
		  
		  jQuery("#theme-dark" ).click(function(){
			  jQuery("#choose-theme" ).attr("href", "css/dark.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo-white.png");
			  jQuery("#footer img" ).attr("src", "images/footer-logo-dark.jpg");
			  jQuery(".lady1" ).attr("src", "images/appointment-img-dark.jpg");
			  return false;
		  });
		  jQuery("#theme-light" ).click(function(){
			  jQuery("#choose-theme" ).attr("href", "css/light.css");
			  jQuery(".navbar-brand img" ).attr("src", "images/logo.png");
			  jQuery("#footer img" ).attr("src", "images/footer-logo.jpg");
			  jQuery(".lady1" ).attr("src", "images/appointment-img.jpg");
			  return false;
		  });
		  
		  
		  
		  
		  
		  jQuery(".layouts #boxed" ).click(function(){
			  jQuery("#wrapper" ).addClass("boxed-layout");
			  jQuery("body" ).addClass("bg1");
			  jQuery(".rev-banner-container").show();
			  jQuery("#container-banner").show();
			  jQuery("#slider").hide();
		  });
		  jQuery(".layouts #wide" ).click(function(){
			  jQuery("#wrapper" ).removeClass("boxed-layout");
			  jQuery("body" ).removeClass("bg1");
			  jQuery("#slider").hide();
			  jQuery("#full-banner").show();
		  });
		  
		  
		  jQuery("#headerNormal" ).click(function(){
			  jQuery("body" ).removeClass("fixed-header");
		  });
		  jQuery("#headerFixed" ).click(function(){
			  jQuery("body" ).addClass("fixed-header");
		  });
		  
		  //add backgrounds
		  jQuery("#bg-one" ).click(function(){
			  jQuery("body" ).addClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-two" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).addClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-three" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).addClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-four" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).addClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-five" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).addClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-six" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).addClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-seven" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).addClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-eight" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).addClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-nine" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).addClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-ten" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).addClass("bg10");
		  });
		  jQuery("#bg-one, #bg-two, #bg-three, #bg-four, #bg-five, #bg-six, #bg-seven, #bg-eight, #bg-nine, #bg-ten").click(function(){
			  jQuery("#wrapper").addClass("boxed-layout");
		  });
		  jQuery("#wide").click(function(){
			  jQuery("body").removeClass("bg1 bg2 bg3 bg4 bg5 bg6 bg7 bg8 bg9 bg10");
		  });
		  
		  
		  jQuery("#light").click(function(){
			  	jQuery("#footer").addClass("light");
				jQuery("#footer").removeClass("dark");
				jQuery("#footer img" ).attr("src", "images/footer-logo.jpg");
		   });
		   jQuery("#dark").click(function(){
			  	jQuery("#footer").addClass("dark");
				jQuery("#footer").removeClass("light");
				jQuery("#footer img" ).attr("src", "images/footer-logo-dark.jpg");
		   });
		   
		   jQuery("#header-n").click(function(){
			  	jQuery("body").removeClass("fixed-header");
		   });
		   jQuery("#header-f").click(function(){
				jQuery("body").addClass("fixed-header");
		   });
		  
		  
		  
		  // picker buttton
		  jQuery(".picker_close").click(function(){
			  
			  	jQuery("#choose_color").toggleClass("position");
			  
		   });
		   
		   
		  
	});