<?php /* Template Name: Página Empresa Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('sbg_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- BANNER DE LA PAGINA -->
<section class="pageCommon__banner relative">
	<figure>
		<!-- Conseguir el banner por defecto -->
		<?php $img_banner = get_post_meta($post->ID, 'input_img_banner_'.$post->ID , true); 
			if( !empty($img_banner) && $img_banner != -1 ) :
		?>
			<img src="<?= $img_banner ?>" alt="banner-nosotros-empresa-pbg" class="img-fluid" />
		<?php else: ?>
			<img src="<?= IMAGES ?>/pages/banner_default.jpg" alt="banner-nosotros-empresa-pbg" class="img-fluid" />
		<?php endif; ?>
	</figure>

	<!-- Título de la pagina posicion absoluta -->
	<h2 class="pageCommon__banner__title">
		<strong> <?php _e(  $post->post_title , LANG ); ?></strong>
	</h2>

</section> <!-- /.pageCommon__banner -->

<!-- SECCION DE INFORMACION DE LA EMPRESA -->
<section class="pageEmpresa pageEmpresa__content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<!-- Titulo -->
				<h2 class="pageEmpresa__title text-uppercase"><?php _e('Empresa', LANG ); ?></h2>
				<!-- texto -->
				<?php $info_empresa = $post->post_content; if( !empty($info_empresa) ) : ?>
					<?= apply_filters('the_content', $info_empresa ); ?>
				<?php endif; ?>
			</div> <!-- /.col-xs-12 col-sm-6 -->
			<div class="col-xs-12 col-sm-6">
				<!-- Imagenes Galeria -->
				<section id="carousel-gallery-empresa" class="pageEmpresa__gallery">
					<?php  
						//Obtener imagenes de la galería
						$input_ids_img = -1;
						$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
						$array_images  = explode(',', $input_ids_img );
						
						$args  = array(
						'post_type'      => 'attachment',
						'post__in'       => $array_images,
						'posts_per_page' => -1,
						);
						$attachment = get_posts($args);		
						
						foreach( $attachment as $atta ) :				
					?>
						<div class="item">
							<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="" />
						</div><!-- /.item -->
					<?php endforeach; ?>
				</section> <!-- ./pageEmpresa__gallery -->
			</div> <!-- /.col-xs-12 col-sm-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageEmpresa -->

<!-- SECCION MISION Y VISION DE LA EMPRESA -->
<section class="pageEmpresa pageEmpresa__mision">
	<div class="container">
		<div class="row">
			<!-- VISION -->
			<div class="col-xs-12 col-sm-6">
				<!-- Titulo -->
				<h2 class="pageEmpresa__title text-uppercase"><?php _e('visión', LANG ); ?></h2>
				<?php $vision = $options['text_mision']; if( !empty($vision) ) : ?>
					<article class="article-box-information">
						<?= apply_filters('the_content' , $vision ); ?>
					</article> <!-- /.article-box-information -->
				<?php endif; ?>
			</div> <!-- /.col-xs-6 -->
			<!-- MISION -->
			<div class="col-xs-12 col-sm-6">
				<!-- Titulo -->
				<h2 class="pageEmpresa__title text-uppercase"><?php _e('misión', LANG ); ?></h2>
				<?php $mision = $options['text_mision']; if( !empty($mision) ) : ?>
					<article class="article-box-information">
						<?= apply_filters('the_content' , $mision ); ?>
					</article> <!-- /.article-box-information -->
				<?php endif; ?>
			</div> <!-- /.col-xs-6 -->
		</div> <!-- /.row -->
	</div><!-- /.container -->
</section> <!-- /.pageEmpresa pageEmpresa__mision -->

<!-- Linea Separadora -->
<div class="container">
	<div class="line-separator"></div>
</div>

<!-- Incluir Plantilla Miscelaneo -->
<?php include( locate_template("partials/miscelaneo.php") ); ?>

<!-- Get Header -->
<?php get_footer(); ?>