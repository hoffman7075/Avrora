<?php get_header('inner'); ?>
<style>
    .widget-blog-list .blog-item .item-media .media-photo a {
        background-size: contain;
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
                <div class="col-md-8">
                    <!-- Blog List -->
                    <div class="widget-blog-list">
                       <?php
                            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                            $args = array(
                              'post_type'=> 'otzivi',
                              'order' => 'DESC',
                              'orderby' => 'post_date',
                              'posts_per_page' => 10,
                              'post_status' => 'publish',
                              'paged' => $paged
                            );
                        
                            $query = new WP_Query( $args );
                            while ( $query->have_posts() ) {
	                                $query->the_post();
                                    $permalink = get_the_permalink();
                                    $thumb = get_the_post_thumbnail_url($post->ID, array(600, 600), false, false);
                        ?>
                        <div class="blog-item">
                            <div class="item-media">
                                <div class="media-photo">
                                    <a href="#" data-background="<?php echo $thumb; ?>"></a>
                                </div>
                            </div>
                            <div class="item-desc">
                                <h2><a href="mailto:<?php echo get_field('link'); ?>"><?php echo get_the_title(); ?></a></h2>
                                <h5><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></h5>
                                <p><?php echo get_the_content(); ?>...</p>
                                <?php if (get_field('link')) { ?>
                                <a href="mailto:<?php echo get_field('link'); ?>"><?php echo get_field('link'); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    <?php the_posts_pagination(); ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                    <!-- Blog List End -->
                    <!-- Pager -->
                    
                    <!-- Pager End -->
                </div>
                <div class="col-md-4">
                    <div class="room-booking">
                        <h2>Оставь свой отзыв!</h2>
                        <div class="data-form">
                            <form id="new_post" name="new_post" action="/wp-content/themes/html5blank-stable/new_post.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="name" placeholder="ВАШЕ ИМЯ" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="link" placeholder="ВАШ E-MAIL" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea cols="6" rows="8" id="form-message" name="form-message" placeholder="ВАШ ОТЗЫВ" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="g-recaptcha" data-sitekey="6LfnniQUAAAAAMf0yevKjHfRdud3UupoQdiwogxZ"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn">ОТПРАВИТЬ</button>
                                    </div>
                                </div>
                                <!-- элемент для вывода ошибок -->
                                <div class="text-danger" id="recaptchaError"></div>
                                <input type="hidden" name="action" value="new_post" />
                                <?php wp_nonce_field( 'new-post' ); ?>
                            </form>
                            <div class="after-send">
                                Спасибо!<br>Ваш отзыв отправлен на модерацию
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Blog End -->
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>