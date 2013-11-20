// JavaScript Document
jQuery(window).bind("load", function() {
	//Preload the kwicks
	var slidenos = jQuery('.slideimage').length;
		jQuery('.slideimage:hidden').fadeIn(800);
		jQuery(".kwicks.horizontal li").css('background', '#000');		
		jQuery('.minicaption').show();
		jQuery('.minicaptiontitle').show();
		jQuery('.slidecaption').show();
		jQuery('.slidecaptiontitle').show();
		jQuery('.kwicks').kwicks({
			max : 820,
			spacing : 0,
			duration: 800
		});
		
	jQuery(function(){
		//Hide all Captions and show Mini Captions
		jQuery(".slidecaption").fadeTo(1, 0);
		jQuery(".minicaption").fadeTo(1, 0.8);

		//On hover of a Kwick Panel
		jQuery(".kwicks").each(function () {
			jQuery(".kwicks").hover(function() {
			jQuery('.slidecaption').stop().animate({opacity: 0.8, left: '350'}, 250 );
			jQuery(".minicaption").stop().animate({opacity: 0, left: '480'}, 250 );
			},function(){
			jQuery('.slidecaption').stop().animate({opacity: 0, right: '0'}, 50 );
			jQuery(".minicaption").stop().animate({opacity: 0.8, left: '0'},1200 );
			});
		});
	});

});