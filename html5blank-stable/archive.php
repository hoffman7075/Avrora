<?php get_header( 'inner' ); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1></h1>
			<div class="bigger">
			<?php
					$args = array(
					  'post_type'=> 'akcii',
					  'category' => '',
					  'posts_per_page' => -1,
					  'offset'=> 0,
					  'post_status' => 'publish'
					);

					$akcii = get_posts($args);
					$i = 1;
					foreach ($akcii as $post) { 
						setup_postdata($post); 
			          	$permalink = get_the_permalink();
			          	$thumb = get_the_post_thumbnail_url($post->ID, array(384, 384), false, false);
			          	if($i % 2 == 0) {
						?>
						
							<div class="inners">
		                        <div class="item-inner">
		                            <div class="item-photo float" data-background="<?php echo $thumb; ?>"></div>
		                            <div class="item-desc">
		                                <h3><?php echo get_the_title(); ?></h3>
		                                <p><?php echo get_the_content(); ?></p>
		                                <a href="<?php echo $permalink; ?>" class="btn-link">Читать далее</a>
		                            </div>
			                    </div>
			                </div>
						<?php } else { ?>
							<div class="inners">
		                        <div class="item-inner">
		                        <div class="item-desc">
		                                <h3><?php echo get_the_title(); ?></h3>
		                                <p><?php echo get_the_content(); ?></p>
		                                <a href="<?php echo $permalink; ?>" class="btn-link">Читать далее</a>
		                            </div>
		                            <div class="item-photo float" data-background="<?php echo $thumb; ?>"></div>
			                    </div>
			                </div>
						<?php } $i++; ?>
	                    
		            
					<?php } ?>
			</div>
			<?php wp_reset_postdata(); ?>



		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


