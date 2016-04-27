
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>

<!-- Incluir Banner de Servicios -->
<?php  
	//template
	include(locate_template('partials/banner-services.php'));
?>

<!-- Seccion Servicios portada -->
<section class="pageInicio__services">
	<div class="container">
		<div class="pageInicio__services__content relative">
			<!-- Titulo -->
			<h2 class="sectionCommon__subtitle text-uppercase">
				<strong><?php _e('servicios' , LANG ); ?></strong>
			</h2>

			<!-- Contenido Carousel OWL de servicios -->
			<section id="carousel-service-home" class="pageInicio__services__carousel">
				<?php  
					//El query
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'servicio',
						'posts_per_page' => -1,
					);

					$query = new WP_Query( $args );

					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
				<article class="item">
					<a href="<?php the_permalink(); ?>">
						<!-- Imagen -->
						<figure>
							<?php if( has_post_thumbnail() ) : the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
							<?php else: ?>
								<img src="http://lorempixel.com/g/245/143" alt="<?= "imagen" . get_the_title(); ?>" class="img-fluid" />
							<?php endif; ?>
						</figure>
						<!-- El titulo -->
						<h2 class="item-title text-uppercase"><?php _e( get_the_title() , LANG ); ?></h2>
					</a>
				</article><!-- /.item -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</section> <!-- /.pageInicio__services__carousel -->

			<!-- Flechas del Carousel -->
			<a id="arrow-carousel-service--left" href="#" class="arrow-carousel-common arrow-carousel-service arrow-carousel-service--left">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</a><!-- /.arrow-carousel-service--left -->
			<a id="arrow-carousel-service--right" href="#" class="arrow-carousel-common arrow-carousel-service arrow-carousel-service--right">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a><!-- /.arrow-carousel-service--right -->

		</div><!-- /.pageInicio__services__content -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__services -->

<!-- Seccion Bienvenidos portada -->
<section class="pageInicio__welcome">
	<div class="container">
		<div class="row container-flex container-flex-center">
			<!-- Seccion texto -->
			<div class="col-xs-8">
				<!-- Titulo -->
				<h2 class="sectionCommon__subtitle sectionCommon__subtitle--white text-uppercase">
					<strong><?php _e( 'bienvenida' , LANG ); ?></strong>
				</h2>
				<!-- Texto -->
				<?php $welcome_text = $options['widget_nosotros']; if( !empty($welcome_text) ) : ?>
					<?= apply_filters('the_content', $welcome_text ); ?>
				<?php endif; ?>
			</div><!-- /.col-xs-8 -->
			<!-- Seccion Imagen -->
			<div class="col-xs-4">
				<?php $welcome_img = $options['image_nosotros']; if( !empty($welcome_img) ) : ?>
					<figure>
						<img src="<?= $welcome_img ?>" alt="nosotros-bienvenida-portada-constructec" class="img-fluid" />
					</figure>
				<?php endif; ?>
			</div> <!-- /.col-xs-4 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section> <!-- /.pageInicio__welcome -->

<!-- Seccion Contenido Trabajos realizados y facebook -->
<section class="pageInicio__miscelaneo">

	<section class="container">
		<div class="row">
			<div class="col-xs-7">
				<!-- Seccion Trabajos Realizados -->
				<section class="pageInicio__projects">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
						<strong><?php _e('trabajos realizados' , LANG ); ?></strong>
					</h2>

					<!-- Seccion con posicion relativa -->
					<section class="relative">
						<!-- Contenedor de carousel de trabajos realizadso -->
						<section id="carousel-trabajos-home" class="pageInicio__projects__carousel">
							<?php  
								//El query
								$args = array(
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'post_status'    => 'publish',
									'post_type'      => 'works',
									'posts_per_page' => -1,
								);

								$query = new WP_Query( $args );

								if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
							?>
								<article class="item-carousel-project">
									<figure>
										<!-- Imagen -->
										<?php if( has_post_thumbnail() ) : the_post_thumbnail('full', array('class'=>'img-fluid') ); ?>
										<?php else:  ?>
											<img src="" alt="<?= "image-" . get_the_title(); ?>" class="img-fluid" />
										<?php endif; ?>
									</figure>
									<!-- Titulo -->
									<h2 class="item-carousel-project__title text-uppercase">
										<?php _e( get_the_title() , LANG ); ?>
									</h2>
								</article> <!-- /.item-carousel-project -->
							<?php endwhile; endif; wp_reset_postdata(); ?>
						</section> <!-- /.pageInicio__projects__carousel -->

						<!-- Flechas del Carousel -->
						<a id="arrow-carousel-project--left" href="#" class="arrow-carousel-common arrow-carousel-project arrow-carousel-project--left">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</a><!-- /.arrow-carousel-project--left -->
						<a id="arrow-carousel-project--right" href="#" class="arrow-carousel-common arrow-carousel-project arrow-carousel-project--right">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a><!-- /.arrow-carousel-project--right -->

					</section> <!-- /.relative -->

				</section> <!-- /.pageInicio__projects -->
			</div> <!-- /.col-xs-7 -->
			<div class="col-xs-5">
				<!-- Facebook -->
			</div> <!-- /.col-xs-5 -->
		</div>
	</section>

</section> <!-- /. pageInicio__miscelaneo-->


<!-- Footer -->
<?php get_footer(); ?>