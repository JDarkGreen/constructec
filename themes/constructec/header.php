<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
<?php $options = get_option('constructec_custom_settings'); global $post; ?>

<!-- Menu Para Navegación Mobile -->
<aside id="slideout-menu-mobile" class="sidebarMobile">
	
	<!-- Logo -->
	<h1 class="logo">
		<a href="<?= site_url() ?>">
			<?php if( !empty($options['logo']) ) : ?>
				<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php else: ?>
				<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php endif; ?>
		</a>
	</h1><!-- /logo -->

	<?php 
		$tel = $options['contact_tel']; $cel = $options['contact_cel'];
		if( !empty($tel) || !empty($cel) ) : 
	?>
	    <article class="mainHeader__content__article">
			<!-- Icono -->
			<i class="fa fa-phone" aria-hidden="true"></i>
			<!-- Texto --> 
			<?php if( !empty($tel) ) { echo $tel . "<br/>"; } ?> 
			<?php if( !empty($cel) ) { echo $cel; } ?> 
		</article> <!-- /.mainHeader__content__article -->
	<?php endif; ?>

	<!-- Espacio --> <br />

    <!-- Título -->
    <h2 class="sidebar-title"> Menú </h2>

    <?php include( locate_template('partials/main-menu-nav.php') ); ?>
</aside>

<!-- Header Mobile -->
<header class="mainHeader hidden-sm-up fixed">
	
	<!-- Botón abrir navegación -->
	<button class="toggle-button">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</button>
	
	<!-- Logo -->
	<h1 class="logo">
		<a href="<?= site_url() ?>">
			<?php if( !empty($options['logo']) ) : ?>
				<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php else: ?>
				<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php endif; ?>
		</a>
	</h1><!-- /logo -->

</header> <!-- /.mainHeader hidden-sm-up -->


<!-- Contenedor Para Navegación Mobile -->
<main id="slideout-container-panel">

	<!-- Header -->
	<header class="mainHeader hidden-xs-down">

		<!-- Seccion redes sociales -->
		<section class="mainHeader__social-link">
			<div class="container">
				<ul class="list-inline">
					<li>Síguenos en: </li>
					<!-- Facebook -->
					<?php $fb = $options['red_social_fb']; if( !empty($fb)): ?>
						<li><a target="_blank" href="<?= $fb ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<!-- Twitter -->
					<?php $tw = $options['red_social_twitter']; if( !empty($tw)): ?>
						<li><a target="_blank" href="<?= $tw ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<!-- Youtube -->
					<?php $ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
						<li><a target="_blank" href="<?= $ytube ?>"><i class="fa fa-youtube" aria-hidden="true"></i>
						</a></li>
					<?php endif; ?>
				</ul>
			</div> <!-- /.container -->
		</section> <!-- /.mainHeader__social-link -->
		
		<!-- Seccion Principal-->
		<section class="mainHeader__content">
			<!-- Container -->
			<div class="container">
				<div class="row flex container-flex-center">
					<!-- Logo  -->
					<div class="col-xs-12 col-sm-5">
						<h1 class="logo">
							<a href="<?= site_url() ?>">
								<?php if( !empty($options['logo']) ) : ?>
									<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
								<?php else: ?>
									<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
								<?php endif; ?>
							</a>
						</h1><!-- /logo -->
					</div><!-- /.col-xs-12 col-sm-5 -->

					<div class="col-xs-12 col-sm-7">
						<?php 
							$tel = $options['contact_tel']; $cel = $options['contact_cel'];
							if( !empty($tel) || !empty($cel) ) : 
						?>
							<div class="col-xs-6">
								<article class="mainHeader__content__article">
									<!-- Icono -->
									<i class="fa fa-phone" aria-hidden="true"></i>
									<!-- Texto --> 
									<?php if( !empty($tel) ) { echo $tel . "<br/>"; } ?> 
									<?php if( !empty($cel) ) { echo $cel; } ?> 
								</article> <!-- /.mainHeader__content__article -->
							</div> <!-- /.col-xs-6 --> 
						<?php endif; ?>
						
						<!-- Email -->
						<?php 
							$email = $options['contact_email']; if( !empty($email) ) : 
						?>
						<div class="col-xs-6">
							<article class="mainHeader__content__article">
							<!-- Icono -->
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<!-- Texto --> <?= $email ?>
						</div>  <!-- /.col-xs-6 -->
						<?php endif; ?>
					</div><!-- /.col-xs-12 col-sm-7 -->
				</div><!-- /.row -->

			</div><!-- /.container -->
		</section> <!-- /.mainHeader__content -->

	</header> <!-- /.mainHeader -->

	<!-- Navegacion Principal -->
	<nav class="mainNavigation hidden-xs-down">
		<div class="container">

			<?php include( locate_template('partials/main-menu-nav.php') ); ?>
			
		</div> <!-- /container -->
	</nav> <!-- /.mainNavigation -->



