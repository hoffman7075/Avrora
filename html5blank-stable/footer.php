<!-- footer -->
<footer>
<div class="site-footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h5>ССЫЛКИ НА СОЦ. СЕТИ</h5>
                    <h6>Подпишитесь на новости</h6>
                    <div class="widget-social-icons">
                        <ul>
                            <li><a href="<?php echo $options[fb]; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $options[vk]; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $options[ok]; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $options[twitter]; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>E-MAIL РАССЫЛКА</h5>
                    <h6>Подпишись на почтовую рассылку</h6>
                    <div class="widget-newsletter">
                        <form>
                            <input type="text" placeholder="Введите ваш e-mail" required>
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="wrapper">
            <div class="footer-nav">
            <div class="site-header header-over">
				<div class="header-bottom">
		        		<div class="wrapper">
			            <div class="header-logo">
			                <a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/logo2.png" alt="The Grandium Hotel"></a>
			            </div>
			            <div class="header-nav">
			            <?php wp_nav_menu(array('menu' => "Левое меню" , 'menu_class' => 'nav-left') ); ?>
			                <?php wp_nav_menu(array('menu' => "Правое меню" , 'menu_class' => 'nav-right') ); ?>
			            </div>
			            <div class="header-toggle">
			                <i class="fa fa-bars"></i>
			            </div>
		        	</div>
			    </div>
            </div>
            </div>
            <div class="developer">Разработка сайта: <a href="http://start-go.pro" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/logo-bel-sin.png" alt=""></a></div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</div>


			

			</footer>
			<!-- /footer -->
		<!-- /wrapper -->

		<?php wp_footer(); ?>


	</body>
	
	<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>	
    <script src="<?php echo get_template_directory_uri() ?>/js/magnific.popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/jquery.lazy.min.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/scripts.js"></script>
	<script></script>
	<script crossorigin="anonymous" async type="text/javascript" src="//api.pozvonim.com/widget/callback/v3/2779dd696fc83be12a1771e9e0d34d9c/connect" id="check-code-pozvonim" charset="UTF-8"></script>
</html>
