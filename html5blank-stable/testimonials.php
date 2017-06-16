<!-- Section Testimonials -->
<div class="section">
    <div class="widget-testimonials-carousel">
        <div class="wrapper-inner">
            <!-- Testimonials Title -->
            <div class="widget-title">
                <h5>АВРОРА</h5>
                <h2>Отзывы</h2>
                <p>Развлекательный комплекс "Аврора" приглашает любителей активного отдыха в бильярд, а тех, у кого «поёт душа» - выплеснуть свои эмоции в кафе-караоке.</p>
            </div>
            <!-- Testimonials Title End -->
            <!-- Testimonials Carousel -->
            <div class="widget-carousel owl-carousel owl-theme">
            <?php
                $args = array(
                  'post_type'=> 'otzivi',
                  'category' => '',
                  'posts_per_page' => 6,
                  'offset'=> 0,
                  'post_status' => 'publish'
                );

                $otzivi = get_posts($args);
                foreach ($otzivi as $post) { 
                    setup_postdata($post); 
                    $permalink = get_the_permalink();
                    $thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
                    ?>
                    <div class="testimonials-item">
                        <div class="item-comment"><p><?php echo get_the_content(); ?></p></div>
                        <div class="item-customer">
                            <div class="customer-photo" data-background="<?php echo $thumb; ?>"></div>
                            <h5><?php echo get_the_title(); ?></h5>
                            <h6><?php echo get_the_date(); ?></h6>
                        </div>
                    </div>

                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <p class="seeall">
                <a href="/otzivi" class="btn">ПОСМОТРЕТЬ ВСЕ ОТЗЫВЫ</a>
            </p>
            <!-- Testimonials Carousel End -->
        </div>
    </div>
</div>
<!-- Section Testimonials End -->