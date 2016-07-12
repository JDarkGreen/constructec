
<!-- Extraer opciones  -->
<?php $options = get_option('constructec_custom_settings'); ?>

	<footer class="mainFooter">
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<!-- Informacion del footer -->
					<section class="mainFooter__content">
						<!-- Titulo -->
						<h2 class="mainFooter__content__title text-uppercase">
							<strong><?php _e('empresa', LANG ); ?></strong>
						</h2>

						<!-- Limpiar Floats --> <div class="clearfix"></div>
						
						<div class="row"> 

							<!-- Contenido -->
							<div class="col-xs-4">
								<!-- Imagen -->
								<figure>
									<img src="<?= IMAGES ?>/footer/logo_constructec_blanco.png" alt="logo-footer-constructec" class="img-fluid" />
								</figure> <!-- /.figure -->
							</div> <!-- /.col-xs-6 -->

							<div class="col-xs-8">
								<?php  
									$footer_text = $options['widget_footer']; 
									if( !empty($footer_text) ) :
								?>
									<?= apply_filters('the_content', $footer_text ); ?>
								<?php endif; ?>
							</div> <!-- /.col-xs-6 -->

							<div class="col-xs-12">
								<ul class="mainFooter__social-link">
									<li>Síguenos en: </li>
									<!-- Youtube -->
									<?php $ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
										<li><a target="_blank" href="<?= $ytube ?>"><i class="fa fa-youtube" aria-hidden="true"></i>
										</a></li>
									<?php endif; ?>
									<!-- Twitter -->
									<?php $tw = $options['red_social_twitter']; if( !empty($tw)): ?>
										<li><a target="_blank" href="<?= $tw ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<!-- Facebook -->
									<?php $fb = $options['red_social_fb']; if( !empty($fb)): ?>
										<li><a target="_blank" href="<?= $fb ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php endif; ?>
								</ul> <!-- /.mainFooter__social-link -->
							</div> <!-- /. -->

						</div> <!-- /.row -->

					</section> <!-- /.mainFooter__content -->
				</div> <!-- /.col-xs-8 -->
				<div class="col-xs-4">
					<!-- Informacion de Contacto -->
					<section class="mainFooter__content mainFooter__content--no-border">
						<!-- Titulo -->
						<h2 class="mainFooter__content__title text-uppercase">
							<strong><?php _e('contacto', LANG ); ?></strong>
						</h2>

						<!-- Limpiar Floats --> <div class="clearfix"></div>

						<!-- Lista de contacto -->
						<ul class="mainFooter__menu-contacto">
							<!-- Telefono -->
							<?php $tel = $options['contact_tel']; if( !empty($tel)): ?>
								<li><i class="fa fa-phone" aria-hidden="true"></i>
									<?= "T: " . $tel; ?>
								</li>
							<?php endif; ?>
							<!-- Celular -->
							<?php $cel = $options['contact_cel']; if( !empty($cel)): ?>
								<li><i class="fa fa-mobile" aria-hidden="true"></i>
									<?= "C: " .$cel; ?>
								</li>
							<?php endif; ?>
							<!-- Email -->
							<?php $email = $options['contact_email']; if( !empty($email)): ?>
								<li><i class="fa fa-envelope" aria-hidden="true"></i>
									<?= "E-mail: " .$email; ?>
								</li>
							<?php endif; ?>
						</ul> <!-- /.mainFooter__menu-contacto -->
						
					</section> <!-- /.mainFooter__content -->					
				</div> <!-- ./col-xs-4 -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<!-- Seccion Desarrollo -->
		<section class="mainFooter__developer text-xs-center">
			<a href="http://www.construtec.com.pe" > www.construtec.com.pe </a>
			<?php _e("&copy;" . " " . date('Y') , LANG ); ?>
			
			<!-- Limpiar floats --> <div class="clearfix"></div>

			<!-- Desarrollado por IngenioArt and JDarkgreen -->
			<section class="container">
				<p class="text-developer pull-xs-right">Desarrollado por: <a href="http://ingenioart.com/" target="_blank">INGENIOART</a></p>
			</section>

		</section> <!-- /.mainFooter__developer -->
	</footer><!-- /.mainFooter -->

	<?php wp_footer(); ?>
</body>
</html>

