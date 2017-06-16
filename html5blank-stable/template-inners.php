<?php /* Template Name: Внутренняя страница */
 get_header(); ?>
<!-- Site Main -->
<div class="site-main">
    <!-- Section Slider -->
    <div class="section">
        <div class="widget-slider">
            <div class="wrapper-full">
                <!-- Slider Carousel -->
                <div class="widget-carousel owl-carousel owl-theme">
                <?php

					// check if the repeater field has rows of data
					if( have_rows('slider-main') ):

					 	// loop through the rows of data
					    while ( have_rows('slider-main') ) : the_row();?>
							<div class="slider-item" data-background="<?php echo get_sub_field('slider-image')['url'];?>">
		                        <div class="wrapper">
		                            <div class="item-inner">
		                                <h1><?php the_sub_field('text-slider'); ?></h1>
		                            </div>
		                        </div>
		                    </div>
		                    <?php
					        // display a sub field value
					        // the_sub_field('slider-image');
					        // the_sub_field('text-slider');

					    endwhile;

					else :

					    // no rows found

					endif;

				?>
                </div>
                <!-- Slider Carousel End -->
                <!-- Slider Booking -->
                
                <!-- Slider Booking End -->
            </div>
        </div>
    </div>
    <!-- Section Slider End -->

    <!-- Section Rooms -->
    <div class="section">
        <div class="widget-rooms-carousel top-over">
            <div class="wrapper-inner">
                <!-- Rooms Title -->
                <div class="widget-title">
                    <h5>OUR ROOMS</h5>
                    <h2>Experience The Freedom</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget commodo orci. Integer varius nibh eu mattis porta. Pellentesque dictum sem eget cursus semper. Nullam quis blandit lorem.</p>
                </div>
                <!-- Rooms Title End -->
                <!-- Rooms Carousel -->
               
                <div class="widget-carousel owl-carousel owl-theme">
                 	<?php
					$args = array(
					  'post_type'=> 'room',
					  'category' => '',
					  'posts_per_page' => -1,
					  'offset'=> 0,
					  'post_status' => 'publish'
					);

					$rooms = get_posts($args);
					foreach ($rooms as $post) { 
						setup_postdata($post); 
			          	$permalink = get_the_permalink();
			          	$thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
						?>
						<div class="rooms-item">
	                        <div class="item-inner">
	                            <div class="item-photo">
	                                <a href="<?php echo $permalink; ?>" data-background="<?php echo $thumb; ?>"></a>
	                            </div>
	                            <div class="item-desc">
	                                <h2><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h2>
	                            </div>
	                        </div>
	                    </div>
						
					<?php } ?>
					  <?php wp_reset_postdata(); ?>
                    
                </div>
                <!-- Rooms Carousel End -->
            </div>
        </div>
    </div>
    <!-- Section Rooms End -->

    <!-- Section About Promo -->
    <div class="section">
        <div class="widget-about-promo" data-background="<?php echo get_template_directory_uri() ?>/img/photo-about.jpg">
            <div class="wrapper-inner">
                <div class="widget-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <?php the_post();
                            	$block3text = get_field('text_3_block');
                            	echo $block3text;
                            ?>
                            <a href="aboutus.html" class="btn">СВЯЗАТЬСЯ С НАМИ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section About Promo End -->

    <!-- Section Features -->
    <div class="section">
        <div class="widget-features-grid">
            <div class="wrapper-inner">
                <!-- Features Title -->
                <div class="widget-title">
                <?php the_post();
                	$textUslugi = get_field('uslugi-text');
                	echo $textUslugi;
                ?>
                </div>

                <!-- Features Title End -->
                <!-- Features Content -->
                <div class="widget-inner">
                    <div class="row">
	                    <?php
							$args = array(
							  'post_type'=> 'room',
							  'category' => '',
							  'posts_per_page' => -1,
							  'offset'=> 0,
							  'post_status' => 'publish'
							);

							$rooms = get_posts($args);
							foreach ($rooms as $post) { 
								setup_postdata($post); 
					          	$permalink = get_the_permalink();
					          	$thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
								?>
								<div class="col-lg-4 col-sm-6">
		                            <div class="features-item" data-background="<?php echo get_field('image-mini')['url']; ?>">
		                                <a href="#">
		                                    <h3><?php echo get_the_title(); ?></h3>
		                                    <p><?php echo get_the_content(); ?></p>
		                                </a>
		                            </div>
		                        </div>
						<?php } ?>
					  <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <!-- Features Content End -->
            </div>
        </div>
    </div>
    <!-- Section Features End -->

    <!-- Section Gallery -->
    <div class="section">
        <div class="widget-gallery-carousel">
            <div class="wrapper-full-inner">
                <!-- Gallery Title -->
                <div class="widget-title">
                    <?php the_post();
                    echo get_field('gallery-title');?>
                </div>
                <!-- Gallery Title End -->
                <!-- Gallery Carousel -->
                <div class="widget-carousel owl-carousel owl-theme">
                <?php
                	the_post();
					// check if the repeater field has rows of data
					if( have_rows('gallery') ):
					    while ( have_rows('gallery') ) : the_row();?>
							<div class="gallery-item">
		                        <a href="<?php echo get_sub_field('image-gallery')['url'];?>" data-background="<?php echo get_sub_field('image-gallery')['url'];?>" title="<?php the_sub_field('text-gallery');?>" class="popup-gallery">
		                            <span class="item-text"><?php the_sub_field('text-gallery');?></span>
		                        </a>
		                    </div>
		                    <?php
					    endwhile;
					else :
					endif;
				?>
                </div>
                <!-- Gallery Carousel End -->
            </div>
        </div>
    </div>
    <!-- Section Gallery End -->

    <!-- Section Offers -->
    <div class="section">
        <div class="widget-offers-grid" data-background="<?php echo get_template_directory_uri() ?>/img/photo-offers.jpg">
            <div class="wrapper-inner">
                <!-- Offers Title -->
                <div class="widget-title">
                    <h5>Аврора</h5>
                    <h2>Акции</h2>
                </div>
                <!-- Offers Title End -->
                <!-- Offers Content -->
                <div class="widget-inner">
                    <?php
					$args = array(
					  'post_type'=> 'akcii',
					  'category' => '',
					  'posts_per_page' => -1,
					  'offset'=> 0,
					  'post_status' => 'publish'
					);

					$akcii = get_posts($args);
					foreach ($akcii as $post) { 
						setup_postdata($post); 
			          	$permalink = get_the_permalink();
			          	$thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
						?>

	                    <div class="offers-item">
                        <div class="item-inner">
                            <div class="item-photo" data-background="<?php echo $thumb; ?>"></div>
	                            <div class="item-desc">
	                                <h3><?php echo get_the_title(); ?></h3>
	                                <p><?php echo get_the_content(); ?></p>
	                                <a href="<?php echo $permalink; ?>" class="btn-link">Читать далее</a>
	                            </div>
	                        </div>
	                    </div>
						
					<?php } ?>
					<?php wp_reset_postdata(); ?>

                    
                  
                </div>
                <!-- Offers Content End -->
            </div>
        </div>
    </div>
    <!-- Section Offers End -->

    <?php get_template_part( 'testimonials' ); ?>
</div>
<!-- Site Main End -->


</body>



<?php get_footer(); ?>