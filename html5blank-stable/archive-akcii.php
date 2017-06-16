<?php get_header('inner'); ?>

<!-- Site Main -->
<div class="site-main">
    <!-- Section Page Title -->
    <div class="section">
        <div class="widget-page-title">
            <div class="widget-background" data-background="<?php echo get_template_directory_uri() ?>/img/otzivi.jpg"></div>
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

    <!-- Section Blog -->
    <div class="section">
        <div class="wrapper-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- Blog List -->
                    <div class="widget-blog-list">
                       <?php
                            $args = array(
                              'post_type'=> 'akcii',
                              'category' => '',
                              'posts_per_page' => -1,
                              'offset'=> 0,
                              'post_status' => 'publish',
                              'post_parent' => 0
                            );

                            $akcii = get_posts($args);
                            foreach ($akcii as $post) { 
                                    setup_postdata($post); 
                                    $permalink = get_the_permalink();
                                    $thumb = get_the_post_thumbnail_url($post->ID, array(600, 600), false, false);
                        ?>
                        <div class="blog-item">
                            <div class="item-media">
                                <div class="media-photo">
                                    <a href="<?php echo $permalink; ?>" data-background="<?php echo $thumb; ?>"></a>
                                </div>
                            </div>
                            <div class="item-desc">
                                <h2><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h2>
                                <h5><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></h5>
                                <p><?php echo get_the_content(); ?>...</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Blog List End -->
                    <!-- Pager -->
<!--
                    <div class="widget-pager">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </div>
-->
                    <!-- Pager End -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- Section Blog End -->
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>