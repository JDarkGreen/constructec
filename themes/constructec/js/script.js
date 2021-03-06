
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home = j("#carousel-home").carousel({
			interval : 5000,
		});

		var i = 1;

		//eventos
		var i = 1;

		//eventos
		carousel_home.on('slid.bs.carousel', function ( e ) {
			if( i > 2 ){ i = 1 };
			
			var current_item = j(this).find('.active');
  			//imagen actual
  			var image_carousel = current_item.find('img');
  			//animacion de la imagen
  			if( i == 1 ){
  				image_carousel.addClass('box-expand');
  			}else{
  				image_carousel.addClass('box-contract');
  			}

  			i++;

  			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title
  				.css('opacity',0)
  				.animate({ 'opacity' : '1' }, 2000 );

  			var k    = 1;
  			var text = current_item.find('p');

  			text.each( function(){

  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.addClass('box-contract--fast')
	  					.animate({ 'opacity' : '1' }, 1000 );
  				}else{
  					j(this).animate({'left':'0','opacity':'1'}, 1100 );
  				}
	  			
	  			//aumentar k 
	  			k++;
  			});
		});

		carousel_home.on('slide.bs.carousel', function ( e ) {
			var current_item = j(this).find('.active');
  			var k    = 1;
  			var text = current_item.find('p');

  			text.each( function(){
  				
  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.css('opacity',0)
	  					.removeClass('box-contract--fast');
  				}else{
  					j(this).css({'left':'50%','opacity':0});
  				}
	  			//aumentar k 
	  			k++;
  			});
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
			smartSpeed     : 2000,
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
				responsiveClass:true,
			    responsive:{
			        0:{
			            items: 2,
			       	},
			        600:{
			            items: 7,
			        },
			    }
			});
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL EMPRESA  ------|*/
		/*|----------------------------------------------------------------------|*/

		var carousel_empresa = j("#carousel-gallery-empresa");

		if( carousel_empresa.length ){
			carousel_empresa.owlCarousel({
				items          : 1,
				loop           : true,
				nav            : false,
				autoplay       : true,
				responsiveClass: true,
				mouseDrag      : false,
				autoplayTimeout: 2200,
				smartSpeed     : 900,
				dots           : true,
			});
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL PAGINA SERVICIOS ------|*/
		/*|----------------------------------------------------------------------|*/

		var carousel_page_service = j(".js-carousel-gallery-service");

		if( carousel_page_service.length && carousel_page_service.find('.item').length ){
			carousel_page_service.owlCarousel({
				items          : 1,
				lazyLoad       : false,
				loop           : true,
				nav            : false,
				autoplay       : true,
				responsiveClass: true,
				mouseDrag      : false,
				autoplayTimeout: 2500,
				smartSpeed     : 1500,
				dots           : true,
			});

			//prev carousel
			j("#arrow-carousel-page-service--left").on('click',function(e){ 
				carousel_page_service.trigger('prev.owl.carousel' , [900] );
			});
			//next carousel
			j("#arrow-carousel-page-service--right").on('click',function(e){ 
				carousel_page_service.trigger('next.owl.carousel' , [900] );
			});
			
		}

		/*|-------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIA DE IMAGENES  ------|*/
		/*|--------------------------------------------------------------|*/
		j(".js-gallery-item").fancybox({
			openEffect : 'elastic',
			closeEffect: 'elastic',
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/
		if( j('#form-contacto').length )
		{
			j('#form-contacto').parsley();

			j("#form-contacto").submit( function(e){
				e.preventDefault();
				//Subir el formulario mediante ajax
				j.post( url + '/email/enviar.php', 
				{ 
					name   : j("#input_name").val(),
					address: j("#input_address").val(),
					email  : j("#input_email").val(),
					message: j("#input_consulta").val(),
					//phone  : j("#input_phone").val(),
					//subject: j("#input_subject").val(),
				},function(data){
					alert( data );

					j("#input_name").val("");
					j("#input_address").val("");
					j("#input_email").val("");
					//j("#input_phone").val("");
					//j("#input_subject").val("");
					j("#input_consulta").val("");

					window.location.reload(false);
				});			
			}); 
		} /* end conditional */


		/*|-------------------------------------------------------------|*/
		/*|-----  SLIDE OUT   ------|*/
		/*|--------------------------------------------------------------|*/
		
		//SlideOut para Menu de Navegación
		var slideout = new Slideout({
			'panel'    : document.getElementById('slideout-container-panel'),
			'menu'     : document.getElementById('slideout-menu-mobile'),
			'padding'  : 256,
			'tolerance': 70,
			'touch'    : false,
		});

		document.querySelector('.toggle-button').addEventListener('click', function() {
        	slideout.toggle();
      	});

      	slideout.on('beforeopen', function() {
		  document.querySelector('.fixed').classList.add('fixed-open');
		});

		slideout.on('beforeclose', function() {
		  document.querySelector('.fixed').classList.remove('fixed-open');
		});

		/**
		* @Abrir Contenedores toggle
		***/

		if( j(".js-toggle-display-container").length )
		{

			j(".js-toggle-display-container").on('click' , function(){

				var btn_toggle       = j(this);	
				var target_container = j('#'+ btn_toggle.attr('data-target') );

				//Remover clase de ocultar y hacer un slide
				if( target_container.hasClass('open-container') )
				{
					target_container
					.removeClass('open-container')
					.slideUp();

				}else{
					target_container
					.removeClass('hidden-xs-down hide hidden')
					.css('display','none')
					.addClass('open-container')
					.slideDown();
				}

				
			});
		}
		



	});
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);