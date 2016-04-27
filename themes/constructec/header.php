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
	
	<?php 
		$options = get_option('constructec_custom_settings'); 
		global $post;
	?>

<!-- Header -->
<header class="mainHeader">
	<!-- Seccion redes sociales -->
	<div class="container">
		<!-- Seccion de redes sociales -->
		<section class="mainHeader__social-link">
			<ul class="list-inline">
				<li>Síguenos en: </li>
				<!-- Facebook -->
				<li><a href="#">fb</a></li>
				<!-- Twitter -->
				<li><a href="#">tw</a></li>
				<!-- Youtube -->
				<li><a href="#">yt</a></li>
			</ul>
		</section> <!-- /.mainHeader__social-link -->

		<div class="row">
			<!-- Logo  -->
			<div class="col-xs-12 col-sm-5">
				<h1 class="logo">
					<a href="<?= site_url() ?>">
						<?php if( !empty($options['logo']) ) : ?>
							<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php else: ?>
							<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php endif; ?>
					</a>
				</h1><!-- /logo -->
			</div><!-- /.col-xs-12 col-sm-5 -->

			<div class="col-xs-12 col-sm-7">
				<div class="col-xs-6">
					<!-- Icono --> <i></i>
					<!-- Texto --> ( 511 ) 3512089 <br/> 993 726 026 / 958 640 790
				</div> <!-- /.col-xs-6 --> 
				<div class="col-xs-6">
					<!-- Icono --> <i></i>
					<!-- Texto --> proyectos@constructec.com.pe
				</div>  <!-- /.col-xs-6 -->
			</div><!-- /.col-xs-12 col-sm-7 -->
		</div><!-- /.row -->

	</div><!-- /.container -->
</header> <!-- /.mainHeader -->

<!-- Navegacion Principal -->
<nav class="mainNavigation">
	<div class="container">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'list-inline text-center',
				'theme_location' => 'main-menu'
			));
		?>
	</div> <!-- /container -->
</nav> <!-- /.mainNavigation -->



