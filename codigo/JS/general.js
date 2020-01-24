// JavaScript Carrousel

jQuery(document).ready(function strict (){
	'use strict';
	 jQuery('#slider-home').carousel({
		
		interval: 2000,
		pause: "hover"
		

	});
		
});
// JavaScript navigator responsive
$(".submenu").click(function(){
	$(this).children("ul").slideToggle();
})

