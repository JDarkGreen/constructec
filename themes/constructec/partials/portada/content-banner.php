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
	    	<?php if( has_post_thumbnail() ) : ?>
	    		<?php the_post_thumbnail('full', array('class'=>'img-fluid') ); ?>
	    	<?php else: ?>
	    		<img src="http://lorempixel.com/1920/682/business" alt="none" class="img-fluid" />
	    	<?php endif; ?>
				
				<div class="container">
		    	<!-- CAPTION O INFORMACION -->
		    	<div class="carousel-caption text-xs-left">
		    		<!-- Titulo -->
				    <h3 class="text-capitalize"><?php the_title(); ?></h3>
				    <!-- Get the content -->
				    <p><?= get_the_content(); ?></p>
				    <!-- Boton ver más -->
				    <a href="#" class="btn__show-more text-uppercase"><?php _e('ver más' , LANG ); ?></a>
				  </div> <!-- /carousel-caption -->
				</div><!-- /.container -->

	    </div> <!-- /carousel-item -->
		<?php $i++; endwhile; ?> 
  </div> <!-- /carousel-inner -->

  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</section> <!-- /.carousel-home -->

<?php endif; wp_reset_postdata(); ?>

