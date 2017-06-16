<?php get_header( 'inner' ); ?>

<!-- Site Main -->
<div class="site-main">
    <!-- Section Page Title -->
    <div class="section">
        <div class="widget-page-title">
            <div class="widget-background" data-background="assets/img/photo-title.jpg"></div>
            <div class="wrapper-inner">
                <!-- Title -->
                <h5>АВРОРА</h5>
                <h1><?php post_type_archive_title(); ?></h1>
                <!-- Title End -->
                <!-- Breadcrumb -->
                <div class="widget-breadcrumb custom">
                   <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </div>
                <!-- Breadcrumb End -->
            </div>
        </div>
    </div>
    <!-- Section Page Title End -->

    <!-- Section Rooms -->
    <div class="section">
        <div class="wrapper-inner">
            <!-- Rooms List -->
            <div class="widget-rooms-list">
               <?php
                    $args = array(
                      'post_type'=> 'room',
                      'category' => '',
                      'posts_per_page' => -1,
                      'offset'=> 0,
                      'post_status' => 'publish',
                      'post_parent' => 35
                    );
                
                    $rooms = get_posts($args);
                    foreach ($rooms as $post) { 
                            setup_postdata($post); 
                            $permalink = get_the_permalink();
                            $thumb = get_the_post_thumbnail_url($post->ID, array(600, 600), false, false);
                ?>
                <div class="rooms-item">
                    <div class="item-photo">
                        <a href="<?php echo $permalink; ?>" data-background="<?php echo $thumb; ?>"></a>
                    </div>
                    <div class="item-desc">
                        <h2><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h2>
                        <div class="desc-features">
                            <ul>
                               <?php
                                if( have_rows('privileges') ):
                                    while ( have_rows('privileges') ) : the_row(); ?>
                                        <li><i class="fa fa-check"></i> <?php the_sub_field('privilege'); ?></li>
                                    <?php endwhile;
                                else :
                                    // no rows found
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                        <div class="item-price">
                            <div class="price-inner">
                                <?php /*<i class="fa fa-star"></i> */ ?>
                                <?php if( get_field('price') ): ?>
                                    <h3>от <?php echo get_field('price') ?> руб.</h3>
                                <?php endif; ?>
                                <a href="<?php echo $permalink; ?>" class="btn">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                </div>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- Rooms List End -->
            <!-- Pager -->
            
            <!-- Pager End -->
        </div>
    </div>
    <!-- Section Rooms End -->
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>