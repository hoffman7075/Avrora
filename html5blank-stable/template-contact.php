<?php /* Template Name: Страница контактов */
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
                <h1><?php echo get_the_title(); ?></h1>
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

    <!-- Section Contact -->
    <div class="section">
        <div class="wrapper-inner">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Contact Info -->
                    <div class="widget-contact-info">
                        <ul>
                            <li>
                                <h5>РАЗВЛЕКАТЕЛЬНЫЙ КОМПЛЕКС АВРОРА</h5>
                                <ul>
                                    <li style="background-image: url(<?php echo get_template_directory_uri() ?>/img/location.png);"><?php echo get_field('address'); ?></li>
                                    <li style="background-image: url(<?php echo get_template_directory_uri() ?>/img/phone.png);"><?php echo get_field('telephone-1'); ?></li>
                                    <li style="background-image: url(<?php echo get_template_directory_uri() ?>/img/phone.png);"><?php echo get_field('telephone-2'); ?></li>
                                    <?php if (get_field('telephone-3')) { ?>
                                    <li style="background-image: url(<?php echo get_template_directory_uri() ?>/img/phone.png);"><?php echo get_field('telephone-3'); ?></li>
                                    <?php } ?>
                                    <li style="background-image: url(<?php echo get_template_directory_uri() ?>/img/email.png);"><a href="mailto:<?php echo get_field('e-mail'); ?>"><?php echo get_field('e-mail'); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Contact Info End -->
                </div>
                <div class="col-lg-6">
                    <!-- Contact Form -->
                    <div class="widget-contact-form">
                        <h5>СВЯЖИТЕСЬ С НАМИ</h5>
                        <p>Мы очень хотим услышать вас; пожалуйста, введите свои контактные данные и один из наших сотрудников свяжется с вами.</p>
                        <div class="data-form">
                            <form id="contact-form" action="<?php echo get_template_directory_uri() ?>/mail.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="form-name" name="name" placeholder="ВАШЕ ИМЯ">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="form-surname" name="surname" placeholder="ВАША ФАМИЛИЯ">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="form-email" name="email" placeholder="ВАШ EMAIL АДРЕС">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="form-phone" name="telephone" placeholder="ВАШ ТЕЛЕФОН" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea cols="6" rows="8" id="form-message" name="message" placeholder="ВАШЕ СООБЩЕНИЕ" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="note">* Пожалуйста, заполните все обязательные поля</p>
                                    </div>
                                    <div class="col-md-6 align-right">
                                        <input type="submit" value="ОТПРАВИТЬ" class="btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Section Contact End -->

    <!-- Section Map -->
    <div class="section">
        <div class="wrapper-full">
            <div class="widget-google-map">
                <!-- Google Map Title -->
                <div class="map-title">
                    <i class="fa fa-map-marker"></i>
                    <h5>КАРТА</h5>
                </div>
                <!-- Google Map Title End -->
                <!-- Google Map -->
                <div class="map-google" id="map"></div>
                <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                <script type="text/javascript">
                    ymaps.ready(init);
                    var myMap,
                        myPlacemark;

                    function init(){
                        myMap = new ymaps.Map("map", {
                            center: [55.131244, 61.434372],
                            zoom: 17
                        });

                        myPlacemark = new ymaps.Placemark([55.131244, 61.434372], {
                            hintContent: 'Аврорра',
                            balloonContent: 'ул. Дзержинского, д. 93'
                        });
                        
                        myMap.behaviors.disable('scrollZoom')

                        myMap.geoObjects.add(myPlacemark);
                    }
                </script>
                <!-- Google Map End -->
            </div>
        </div>
    </div>
    <!-- Section Map End -->
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>