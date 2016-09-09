<?php  
	// The Query
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_type'      => 'banner',
		'posts_per_page' => -1,
	);

	$the_query = new WP_Query( $args );

	$i = 0; 
	// The Loop
	if ( $the_query->have_posts() ) : 

?>
<section id="carousel-home" class="pageInicio__slider carousel slide" data-ride="carousel">
  
  <div class="carousel-inner" role="listbox">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?> 
	    <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
			
			<!-- Imagen destacada -->
	    	<?php $feat_img = has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : 'http://lorempixel.com/1920/682/business'; ?>
	    	
	    	<img src="<?= $feat_img; ?>" alt="<?= get_the_title(); ?>" class="img-fluid m-x-auto d-block hidden-xs-down" />

	    	<!-- Figure O Imágen Para Mobile -->
	    	<figure class="image-featured" style="background-image : url( <?= $feat_img; ?> )">	
	    	</figure>
				
				<div class="container">
		    	<!-- CAPTION O INFORMACION -->
		    	<div class="carousel-caption">
		    		<!-- Titulo -->
				    <h3 class="text-uppercase"><?php the_title(); ?></h3>
				    <!-- Get the content -->
				    <?= apply_filters( 'the_content' , get_the_content() ); ?>
				  </div> <!-- /carousel-caption -->
				</div><!-- /.container -->

	    </div> <!-- /carousel-item -->
		<?php $i++; endwhile; ?> 
  </div> <!-- /carousel-inner -->
	
	<!-- FLECHAS DEL CAROUSEL -->
  <a class="arrowCarouselHome arrowCarouselHome--left" href="#carousel-home" role="button" data-slide="prev">
   <i class="fa fa-chevron-left" aria-hidden="true"></i>
  </a>

  <a class="arrowCarouselHome arrowCarouselHome--right" href="#carousel-home" role="button" data-slide="next">
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
  </a>

</section> <!-- /.carousel-home -->

<?php endif; wp_reset_postdata(); ?>

