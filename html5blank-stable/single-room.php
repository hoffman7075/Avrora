<?php get_header('inner'); ?>

<!-- Site Main -->
<div class="site-main">
    <!-- Section Page Title -->
    <div class="section">
        <div class="widget-page-title">
            <div class="widget-background" data-background="<?php echo get_template_directory_uri() ?>/img/photo-gallery-1.jpg"></div>
            <div class="wrapper-inner">
                <!-- Title -->
                <h5>АВРОРА</h5>
                <h1><?php echo get_the_title(); ?></h1>
                <?php echo get_field('smalltext'); ?>
                <!-- Title End -->
                <!-- Breadcrumb -->
                <div class="widget-breadcrumb">
                   <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </div>
                <!-- Breadcrumb End -->
            </div>
        </div>
    </div>
    <!-- Section Page Title End -->

    <!-- Section Rooms Detail -->
    <div class="section">
        <div class="wrapper-inner">
            <div class="widget-rooms-detail">
                <div class="widget-inner">
                    <div class="row">
                        <div class="col-md-8">
                            <?php $images = get_field('gallery-room');
                            if( $images ): ?>
                            <!-- Room Slider -->
                            <div class="room-slider">
                                <?php if( get_field('price') ){ ?>
                                    <div class="room-price">от <?php echo get_field('price') ?> руб./чел</div>
                                <?php } ?>
                                <div class="owl-carousel owl-theme owl-type1">
                                        <?php foreach( $images as $image ): ?>
                                            <a href="<?php echo $image['url']; ?>" data-src="<?php echo $image['sizes']['large']; ?>" title="<?php echo $image['alt']; ?>" class="popup-gallery owl-lazy"></a>
                                        <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Room Slider End -->
                            <!-- Room Thumbnails -->
                            <div class="room-thumbnails">
                                <div class="owl-carousel">
                                   <?php 
                                    $images = get_field('gallery-room');
                                    if( $images ): ?>
                                        <?php foreach( $images as $image ): ?>
                                            <a class="owl-lazy" href="#" data-src="<?php echo $image['sizes']['large']; ?>" title="Single Room"></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Room Thumbnails End -->
                            <?php endif; ?>
                            <!-- Room Description -->
                            <?php if( get_field('fulltext') ): ?>
                                <div class="room-desc">
                                    <h5>Описание</h5>
                                    <?php echo get_field('fulltext'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Room Description End -->
                        </div>
                        <div class="col-md-4">
                            <!-- Room Booking -->
                            <div class="room-booking">
                                <h5>БРОНИРОВАНИЕ</h5>
                                <h2>Забронируй сейчас!</h2>
                                <div class="data-form">
                                    <form id="room-form" action="<?php echo get_template_directory_uri() ?>/mail.php">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="name" placeholder="Ваше имя">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="telephone" placeholder="Ваш телефон" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="fa fa-calendar-plus-o"></i>
                                                <input type="text" name="checkin" placeholder="Дата" class="datepicker" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="room">
                                                <button type="submit" class="btn">ЗАБРОНИРОВАТЬ</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="after-send">
                                        Спасибо!<br>Наш менеджер свяжется с вами в ближайшее время
                                    </div>
                                </div>
                            </div>
                            <!-- Room Booking End -->
                            <!-- Room Features -->
                            <?php
                                    if( have_rows('privileges') ): ?>
                                    <div class="room-features">
                                        <h2>Особенности</h2>
                                        <ul>

                                                <?php while ( have_rows('privileges') ) : the_row(); ?>
                                                    <li><i class="fa fa-check"></i> <?php the_sub_field('privilege'); ?></li>
                                                <?php endwhile; ?>
                                        </ul>
                                    </div>
                            <?php else :
                                // no rows found
                            endif; ?>
                            <!-- Room Features End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Rooms Detail End -->
</div>
<!-- Site Main End -->

<script>
    $('input[type=hidden]').val($('body').find('h1').text());
</script>
<?php get_footer('inner'); ?>
