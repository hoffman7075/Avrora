<?php /* Template Name: Страница о нас */
 get_header('inner'); ?>
<style>
    .site-header .header-bottom .header-nav ul li a {
        color: #fff !important;
    }
</style>
 
<!-- Site Main -->
<div class="site-main">
    <!-- Section Page Title -->
    <div class="section">
        <div class="widget-page-title">
            <div class="widget-background" data-background="<?php echo get_template_directory_uri() ?>/img/otzivi.jpg"></div>
            <div class="wrapper-inner">
                <!-- Title -->
                <h5>АВРОРА</h5>
                <h1><?php the_post(); echo get_the_title() ?></h1>
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
    
    <!-- Section About Promo -->
    <div class="section">
        <div class="widget-about-promo" data-background="/wp-content/themes/html5blank-stable/img/photo-about.jpg">
            <div class="wrapper-inner">
                <div class="widget-inner">
                    <div class="row">
                        <div class="col-md-8">
<!--                            <h2>Заголовок</h2>-->
                            <?php echo get_field('text1') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section About Promo End -->

    <!-- Section Features -->
    <div class="section">
        <div class="widget-features-carousel">
            <div class="wrapper-inner">
                <!-- Features Title -->
                <div class="widget-title otstup">
                    <h2>Наши преимущества</h2>
                    <p><?php echo get_field('text2') ?></p>
                </div>
                <!-- Features Title End -->
                <!-- Features Carousel -->
                <div class="widget-carousel owl-carousel owl-theme">
                    
                       <?php 
                        $images = get_field('privilege');
                        if( $images ): ?>
                            <?php foreach( $images as $image ): ?>
                               <div class="features-item">
                                <div class="item-inner" data-background="<?php echo $image['url']; ?>">
                                   <h5><?php echo $image['title']; ?></h5>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    
                </div>
                <!-- Features Carousel End -->
            </div>
        </div>
    </div>
    <!-- Section Features End -->

    <?php get_template_part( 'testimonials' ); ?>
    
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>