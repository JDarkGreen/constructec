<?php /* Template Name: Página Servicios Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
	
	$banner  = $post;
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenido principal -->
<section class="pageServicio">
	<div class="container">

		<!-- Botón Mobile de Servicios -->
		<button type="button" class="btn btn-danger hidden-sm-up js-toggle-display-container" data-target="toggle-container-services">
			<?= __("Servicios" , "LANG" ); ?>			
		</button>

		<!-- Espacios --> <p class="hidden-sm-up" ></p>

		<div class="row">

			<div id="toggle-container-services" class="col-xs-12 col-sm-4 hidden-xs-down">
				<!-- aside de proyectos -->
				<aside class="pageServicio__projects">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle sectionCommon__subtitle--orange text-uppercase">
						<strong><?php _e( 'servicios' , LANG ); ?></strong>
					</h2>
					<!-- Contenedor de proyectos y servicios -->
					<?php  
						//Argumentos y query
						$args = array(
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'post_status'    => 'publish',
							'post_type'      => 'servicio',
							'posts_per_page' => -1,
						);
						$query = new WP_Query( $args );

						//control 
						$i = 0;
						if( $query->have_posts() ) :
					?>
					<ul class="pageServicio__projects__menu">
						<?php while( $query->have_posts() ) : $query->the_post(); ?>
							<li><a class="<?= $i == 0 ? 'active' : '' ?> text-uppercase" href="<?php the_permalink(); ?>">
								<strong> <?= get_the_title(); ?></strong>
							</a></li>
						<?php $i++; endwhile; ?>
					</ul> <!-- /.pageServicio__projects__menu -->
					<?php endif; wp_reset_postdata(); ?>
				</aside> <!-- /.pageServicio__projects -->
				
				<!-- Espacio --> <br class="hidden-sm-up" />

			</div> <!-- /.col-xs-4 -->

			<div class="col-xs-12 col-sm-8">
				<!-- Conseguir el primer servicio -->
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'servicio',
						'posts_per_page' => -1,
					);
					$servicios       = get_posts( $args ); 
					$primer_servicio = $servicios[0]; #var_dump($primer_servicio);					
				?>
				<article class="pageServicio__article">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
						<strong><?php _e( $primer_servicio->post_title , LANG ); ?></strong>
					</h2>

					<!-- Carousel De Servicio -->
					<section class="relative">

						<!-- Imagenes Galeria -->
						<section id="carousel-gallery-service" class="js-carousel-gallery-service pageServicio__gallery">
							<?php  
								//Obtener imagenes de la galería
								$input_ids_img  = get_post_meta( $primer_servicio->ID, 'imageurls_'.$primer_servicio->ID , true);
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
								
								if( !empty($attachment) ) :
								foreach( $attachment as $atta ) : 

								/* Datos de la imgen */
								$contenido = $atta->post_content;		
							?>
								<div class="item">
									<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-fluid" />
									
									<?php /*if( !empty($contenido) ) : ?>
										<p class="item__content text-uppercase"><?= $contenido; ?></p>
									<?php else: ?>
										<p class="item__content text-uppercase"><?= $primer_servicio->post_title; ?></p>
									<?php endif; */?>

								</div><!-- /.item -->
							<?php endforeach; else: ?>
								<p><?php _e( 'No imágenes para mostrar' , LANG ); ?></p>
							<?php endif;  ?>
						</section> <!-- ./pageEmpresa__gallery -->

						<!-- Flechas del Carousel -->
						<a id="arrow-carousel-page-service--left" href="#" class="arrow-carousel-common arrow-carousel-page-service arrow-carousel-page-service--left">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</a><!-- /.arrow-carousel-page-service--left -->
						<a id="arrow-carousel-page-service--right" href="#" class="arrow-carousel-common arrow-carousel-page-service arrow-carousel-page-service--right">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a><!-- /.arrow-carousel-page-service--right -->

					</section> <!-- /.relative -->
					
					<!-- Contenido -->
					<div class="pageServicio__article__text">
						<?= apply_filters('the_content', $primer_servicio->post_content ); ?>
					</div> <!-- /.pageServicio__article__text -->

				</article> <!-- /.pageServicio__article -->
			</div> <!-- /.col-xs-12 col-sm-8 -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageServicio -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>