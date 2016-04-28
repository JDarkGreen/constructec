
<!-- Si existe el post  -->
<?php if( isset($post) ) : ?>
	
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
		<h2 class="pageCommon__banner__title text-uppercase">
			<strong> <?php _e(  $post->post_title , LANG ); ?></strong>
		</h2>

	</section> <!-- /.pageCommon__banner -->

<?php endif; ?>