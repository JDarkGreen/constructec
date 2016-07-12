<?php /* Template Name: Página Mantenimiento Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenido Principal -->
<section class="pageMantenimiento">
	<div class="container">
		<!-- Titulo -->
		<h2 class="sectionCommon__subtitle text-uppercase">
			<strong><?php _e( 'Mantenimiento y' . "<br/>" . 'servicios generales' , LANG ); ?></strong>
		</h2> <!-- /. -->

		<!-- Contenido -->
		<div class="pageMantenimiento__content">
			<?= apply_filters('the_content' , $post->post_content ); ?>

			<!-- Imagen -->
			<?php $thumbnail = get_the_post_thumbnail( $post->ID, 'full' , array('class'=>'img-fluid'));
				if( !empty($thumbnail) ) :
			?>
			<figure class="pageMantenimiento__content__image">
				<?= $thumbnail; ?>
			</figure> <!-- /.pageMantenimiento__content__image -->
			<?php endif; ?>

			<!-- Espacio de separación --> <br/>

			<!-- Incluir Galería de Imágenes -->
			<section class="pageMantenimiento__gallery">
					<?php  
						//Obtener imagenes de la galería
						$input_ids_img  = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true );

						//convertir en arreglo
						$input_ids_img  = explode(',', $input_ids_img );
						//eliminar valores duplicados - sigue siendo array
						$input_ids_img  = array_unique( $input_ids_img );
						//colocar en una sola cadena para el input
						$string_ids_img = "";
						$string_ids_img = implode(',', $input_ids_img);

						$args  = array(
							'post_type'      => 'attachment',
							'post__in'       => $input_ids_img,
							'posts_per_page' => -1,
						);
						$attachment = get_posts($args);

						/* Variable de control para asignar filas */
						$control_row = 0;	
						
						if( !empty($attachment) ) :
						foreach( $attachment as $atta ) :

						if( $control_row % 4 == 0 ) : 
					?>
						<!-- Fila  -->
						<div class="row">
						<?php endif; ?>
						
						<!-- Columnas -->
						<div class="col-xs-12 col-md-3">
							<div class="item">
								<!-- Fancybox -->
								<a href="<?= $atta->guid; ?>" class="js-gallery-item" rel="group">
									<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-fluid" />
								</a> <!-- /.js-gallery-item -->
							</div><!-- /.item -->
						</div> <!-- /.col-xs-12 col-md-3 -->

						<!-- Cerrar Fila -->
						<?php if( ($control_row == 3) || ($control_row >= 7 && ($control_row-7) % 2 == 0  ) ) : ?> </div><!-- /end row --> <?php endif; ?>

					<?php $control_row++; endforeach; else: ?>
						<p><?php _e( 'No imágenes para mostrar' , LANG ); ?></p>
					<?php endif;  ?>
			</section> <!-- ./pageMantenimiento__gallery -->			

		</div> <!-- /.pageMantenimiento__content -->

	</div> <!-- /.container -->
</section> <!-- /.pageMantenimiento -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>