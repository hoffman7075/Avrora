<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- Basic Page Head -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Favicons -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/img/icons/favicon.png">

		<!-- Css -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/magnific.popup.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/font.awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/responsive.css">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">    
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css"> 
        <script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
        <?php #wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
	<div class="site-header header-over">
		<div class="header-bottom">
        <div class="wrapper">
            <div class="header-logo">
                <a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="The Grandium Hotel"></a>
            </div>
            <div class="header-nav">
            <?php wp_nav_menu(array('menu' => "Левое меню" , 'menu_class' => 'nav-left') ); ?>
                <?php wp_nav_menu(array('menu' => "Правое меню" , 'menu_class' => 'nav-right') ); ?>
            </div>
            <div class="header-toggle">
                <i class="fa fa-bars"></i>
                <span>Меню</span>
            </div>
        </div>
    </div>
	</div>
	
			<!-- /header -->
    <!-- Site Loading -->
    <div class="site-loading">
        <img src="<?php echo get_template_directory_uri() ?>/img/loading.gif" alt="Loading">
    </div>
    <!-- Site Loading End -->

    <!-- Site Back Top -->
    <div class="site-backtop" title="Back to top">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Site Back Top End -->
    
   <div class="leftblock">
       <a href="/kontaktyi"><img src="<?php echo get_template_directory_uri() ?>/img/email.png" alt=""></a>
       <a href="#pozvonim"><img src="<?php echo get_template_directory_uri() ?>/img/phone.png" alt=""></a>
   </div>