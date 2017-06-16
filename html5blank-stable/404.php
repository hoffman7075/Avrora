<?php get_header( 'inner' ); ?>
    <style>
        .site-header .header-bottom .header-nav ul li a {
            color: #fff;
        }
    </style>
	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<h1>Страница не найдена</h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Вернуться на главную?', 'html5blank' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer('inner'); ?>