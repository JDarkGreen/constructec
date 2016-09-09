<?php /* Obtener la pagina de contacto */ 
	$page_redirect = get_page_by_path("contacto");
?>

<!-- Incluir Seccion banner de servicios -->
<section class="sectionCommonBanner__services text-xs-center">
	<div class="container">
		<!-- Texto -->
		<p class="text-uppercase"><?php _e( 'consulte acerca de nuestros servicios' , LANG ); ?></p>
		<!-- Boton ver más -->
		<a href="<?= get_permalink( $page_redirect->ID ); ?>" class="btn__show-more text-uppercase"><?php _e( 'click aquí' , LANG ); ?></a>
	</div><!-- /.container -->
</section><!-- /.sectionCommonBanner__services -->