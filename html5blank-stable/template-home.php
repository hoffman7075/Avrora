<?php /* Template Name: Главная страница */

get_header();
?>

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
                <a href="/kontaktyi" class="btn absolute">СВЯЗАТЬСЯ С НАМИ</a>
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
                <!-- Section Features -->
                <div class="section">
                    <div class="widget-features-grid">
                        <div class="wrapper-inner">
                            <!-- Features Content -->
                            <div class="widget-inner">
                                <div class="row">
                                    <?php
                                        $args = array(
                                          'post_type'=> 'room',
                                          'category' => '',
                                          'posts_per_page' => -1,
                                          'offset'=> 0,
                                          'post_status' => 'publish',
                                          'post_parent' => 0
                                        );

                                        $rooms = get_posts($args);
                                        foreach ($rooms as $post) { 
                                            setup_postdata($post); 
                                            $permalink = get_the_permalink();
                                            $thumb = get_the_post_thumbnail_url($post->ID, array(670, 690), false, false);
                                            ?>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="features-item" data-background="<?php echo $thumb; ?>">
                                                    <a href="<?php echo get_permalink(); ?>">
                                                        <h3><?php echo get_the_title(); ?></h3>
                                                        <p><?php echo get_the_content(); ?></p>
                                                    </a>
                                                </div>
                                            </div>
                                    <?php } ?>
                                  <?php wp_reset_postdata(); ?>
                                  <?php
                                        $args = array(
                                          'post_type'=> 'uslugi',
                                          'category' => '',
                                          'posts_per_page' => -1,
                                          'offset'=> 0,
                                          'post_status' => 'publish',
                                          'post_parent' => 0
                                        );

                                        $rooms = get_posts($args);
                                        foreach ($rooms as $post) { 
                                            setup_postdata($post); 
                                            $permalink = get_the_permalink();
                                            $thumb = get_the_post_thumbnail_url($post->ID, array(670, 690), false, false);
                                            ?>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="features-item" data-background="<?php echo $thumb; ?>">
                                                    <a href="<?php echo get_permalink(); ?>">
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
            </div>
        </div>
    </div>
    <!-- Section Rooms End -->

    <!-- Section About Promo -->
    <div class="section">
        <div class="widget-about-promo parallax" data-background="<?php echo get_template_directory_uri() ?>/img/photo-about.jpg">
            <div class="wrapper-inner">
                <div class="widget-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <?php the_post();
                            	$textLeft = get_field('text_left');
                            	echo $textLeft;
                            ?>
                            <a href="/kontaktyi" class="btn">СВЯЗАТЬСЯ С НАМИ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section About Promo End -->

    <!-- Section Gallery -->
    <div class="section">
        <div class="widget-gallery-carousel">
            <div class="wrapper-full-inner">
                <!-- Gallery Title -->
                <div class="widget-title">
                    <h5>АВРОРА</h5>
                    <h2 class="otstup">Фотогалерея</h2>
                </div>
                <!-- Gallery Title End -->
                <!-- Gallery Carousel -->
                <div class="widget-carousel owl-carousel owl-theme">
                <?php 
                    the_post();
                    $images = get_field('gallery');

                    if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                            <div class="gallery-item">
                                <a href="<?php echo $image['sizes']['large']; ?>" class="popup-gallery owl-lazy" data-src="<?php echo $image['sizes']['large']; ?>" title="<?php echo $image['title']; ?>">
                                    <span class="item-text"><?php echo $image['title']; ?></span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- Gallery Carousel End -->
            </div>
        </div>
    </div>
    <!-- Section Gallery End -->

    <!-- Section Offers -->
    <div class="section">
        <div class="widget-offers-grid parallax" data-background="<?php echo get_template_directory_uri() ?>/img/photo-offers.jpg">
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
					  'post_status' => 'publish',
					);

					$akcii = get_posts($args);
					foreach ($akcii as $post) { 
						setup_postdata($post); 
			          	$permalink = get_the_permalink();
			          	$thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
						?>

	                    <div class="offers-item">
                        <div class="item-inner">
                            <a href='<?php echo $permalink; ?>' class="item-photo lazy" data-src="<?php echo $thumb; ?>"></a>
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
    
    <!-- Section Blog -->
    <div class="section">
        <div class="widget-blog-carousel">
            <div class="wrapper-full-inner">
                <!-- Blog Title -->
                <div class="widget-title">
                    <h5>Аврора</h5>
                    <h2 class="otstup">Банкет-холлы</h2>
                </div>
                <!-- Blog Title End -->
                <!-- Blog Carousel -->
                <div class="tabs">
                    <ul class="tabs__caption">
                        <?php 
                            $args = array(
                                'post_type'=> 'room',
                                'category' => '',
                                'posts_per_page' => -1,
                                'offset'=> 0,
                                'post_status' => 'publish',
                                'post_parent' => 35   
                            );

                            $holl = get_posts($args);
                            $iter1 = 0;
                            foreach ($holl as $post) { 
                                $iter1++;
                                setup_postdata($post);
                                if($iter1 == 1) { ?>
                                    <li class="active"><?php echo get_the_title(); ?><svg>
        <rect rx="20" ry="20" x="0" y="0" fill="none" width="100%" height="100%"></rect>
      </svg></li>
                                <?php }
                                else { ?>
                                    <li><?php echo get_the_title(); ?><svg>
        <rect rx="20" ry="20" x="0" y="0" fill="none" width="100%" height="100%"></rect>
      </svg></li>
                                <?php }
                            } ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    <?php
					$iter = 0;
					foreach ($holl as $post) { 
						setup_postdata($post);
                        $images = get_field('gallery-room',$post->ID);
			          	$permalink = get_the_permalink();
			          	$thumb = get_the_post_thumbnail_url($post->ID, array(319, 319), false, false); ?>
			          	<div class="tabs__content <?php if($iter == 0) { ?>active<?php } ?> widget-carousel owl-carousel owl-theme">
                            <?php 
                            $iter++;
                            $photo_count = 0;
                            if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                   <?php if ($photo_count > 5) {
                                    break; ?>
                                    <?php } ?>
                                    <div class="blog-item">
                                        <div class="item-media">
                                            <div class="media-photo">
                                                <span class="lazy" data-src="<?php echo $image['sizes']['large']; ?>"></span>    
                                            </div>
                                        </div>
                                    </div>
                                <?php $photo_count++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
						</div>
					<?php } ?>
					<?php wp_reset_postdata(); ?>

					</div>
                <!-- Blog Carousel End -->
            </div>
        </div>
    </div>
    <!-- Section Blog End -->


    <?php get_template_part( 'testimonials' ); ?>
</div>
<!-- Site Main End -->


<?php get_footer(); ?>