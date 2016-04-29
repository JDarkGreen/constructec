<?php /* Template Name: Página Imagenes Plantilla */ ?>

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

<!-- Contenido Principal galeria de imagenes -->
<section class="pageImagenes">
	<div class="container">
		<section class="pageImagenes__content">
			<div class="row">
				<!-- Imagenes -->
				<?php  
					//query
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'galeria-images',
						'posts_per_page' => -1,
					);
					//query
					$query = new WP_Query( $args );

					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
					<?php if( has_post_thumbnail() ) : ?>
					<div class="col-xs-12 col-sm-4">
						<article class="pageImagenes__content__item">
							<a href="#">
								<?php the_post_thumbnail('full',array('class'=>'img-fluid') ); ?>
							</a>
						</article><!-- /.pageImagenes__content__item -->	
					</div><!-- /.col-xs-12 col-sm-4 -->
					<?php endif; ?>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- /.row -->
		</section>
	</div> <!-- /.container -->
</section><!-- /. pageImagenes-->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>