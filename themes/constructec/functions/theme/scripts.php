<?php  

/* Archivo que solo se encargara de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{
	wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js', false, '1.11.2');
  wp_enqueue_script('jquery');

	//jsCarousellite /
	wp_enqueue_script('jscarousel', THEMEROOT . '/js/jquery.jcarousellite.min.js', array('jquery'), false , true);

	//owl carousel /
	wp_enqueue_script('owl-carousel', THEMEROOT . '/js/owl.carousel.min.js', array('jquery'), false , true);

	//cargar tether /
	wp_enqueue_script('tether', THEMEROOT . '/js/tether.min.js', array('jquery'), '1.1.0', true);

	//cargar bootstrap v4
	wp_enqueue_script('bootstrap', THEMEROOT . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

	//script
	wp_enqueue_script('custom_script', THEMEROOT . '/js/script.js', array('jquery'), false, true);

}

add_action('wp_enqueue_scripts', 'load_custom_scripts');


/*
* Cargar los archivos JS pero del administrador WP
*/

/* Add the media uploader script */
function load_admin_custom_enqueue() {
  //upload gallery banner  
	wp_enqueue_script('upload-banner-page', THEMEROOT . '/js/admin/media-lib-banner.js', array('jquery'), '', true);  
	//upload gallery a todas la paginas
	wp_enqueue_script('upload-gallery', THEMEROOT . '/js/admin/metabox-gallery.js', array('jquery'), '', true);

}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');

?>