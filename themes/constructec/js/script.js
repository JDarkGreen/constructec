
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME -----|*/
		/*|----------------------------------------------------------------------|*/
		j("#carousel-home").carousel({
			interval : 3000,
		});

		/*|°°------------- Flechas del carousel COMUNES ---------------°°|*/
		j(".arrow-carousel-common").on('click',function(e){ e.preventDefault(); });

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL SERVICIOS - PORTADA   ------|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_servicios = j("#carousel-service-home").owlCarousel({
			items          : 3,
			lazyLoad       : false,
			loop           : true,
			margin         : 26,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			fluidSpeed     : 2000,
			responsive:{
		        320:{
		            items:1
		        },
		      	640:{
		            items: 3
		        },
	    	}
		});

		/*|°°------------- Flechas del carousel ---------------°°|*/
		//prev carousel
		j("#arrow-carousel-service--left").on('click',function(e){ 
			carousel_servicios.trigger('prev.owl.carousel' , [900] );
		});
		//next carousel
		j("#arrow-carousel-service--right").on('click',function(e){ 
			carousel_servicios.trigger('next.owl.carousel' , [900] );
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL PROJECTOS - PORTADA  ------|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_projectos = j("#carousel-trabajos-home").owlCarousel({
			items          : 1,
			lazyLoad       : false,
			loop           : true,
			nav            : false,
			autoplay       : true,
			responsiveClass: true,
			mouseDrag      : false,
			autoplayTimeout: 2500,
			smartSpeed     : 1500,
		});
		//prev carousel
		j("#arrow-carousel-project--left").on('click',function(e){ 
			carousel_projectos.trigger('prev.owl.carousel' , [900] );
		});
		//next carousel
		j("#arrow-carousel-project--right").on('click',function(e){ 
			carousel_projectos.trigger('next.owl.carousel' , [900] );
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL CLIENTES - SECCIONES COMUNES  ------|*/
		/*|----------------------------------------------------------------------|*/		

		var carousel_clientes = j("#carousel-clientes");

		if( carousel_clientes.length ){ 
			carousel_clientes.owlCarousel({
				items          : 7,
				lazyLoad       : false,
				loop           : true,
				nav            : false,
				autoplay       : true,
				responsiveClass: true,
				mouseDrag      : false,
				autoplayTimeout: 2500,
				smartSpeed     : 1500,
			});
		}
		



	});
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);