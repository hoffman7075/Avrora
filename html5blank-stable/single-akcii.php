<?php get_header( 'inner' ); ?>

<!-- Site Main -->
<div class="site-main">
    <!-- Section Page Title -->
    <div class="section">
        <div class="widget-page-title">
            <div class="widget-background" data-background="/wp-content/themes/html5blank-stable/img/photo-gallery-1.jpg"></div>
            <div class="wrapper-inner">
                <!-- Title -->
                <h5>АКЦИЯ</h5>
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

    <!-- Section Blog Single -->
    <div class="section">
        <div class="wrapper-inner">
            <div class="row">
                <div class="col-md-9">
                    <!-- Blog Single -->
                    <div class="widget-blog-single">
                        <!-- Single Media -->
<!--
                        <div class="single-media">
                            <div class="media-photo">
                                <a href="assets/img/photo-blog-big-1.jpg" title="Post Title" class="popup-photo">
                                    <img src="assets/img/photo-blog-big-1.jpg" alt="Post Title">
                                </a>
                            </div>
                        </div>
-->
                        <!-- Single Media End -->
                        <!-- Single Detail -->
                        <div class="single-detail">
                            <div class="detail-head">
                                <i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?>
                            </div>
                            <div class="detail-content">
                                <p><?php echo get_the_content(); ?></p>
                            </div>
                        </div>
                        <!-- Single Detail End -->
                    </div>
                    <!-- Blog Single End -->
                </div>
                <div class="col-md-3">
                    <!-- Blog Sidebar -->
                    <div class="widget-blog-sidebar">
                        <!-- Sidebar Search -->
<!--
                        <div class="widget sidebar-search">
                            <h5>SEARCH</h5>
                            <form>
                                <input type="text" placeholder="ENTER KEYWORDS" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
-->
                        <!-- Sidebar Search End -->
                        <!-- Sidebar Categories -->
<!--
                        <div class="widget sidebar-categories">
                            <h5>CATEGORIES</h5>
                            <nav>
                                <ul>
                                    <li><a href="#">ACCOMONDATION</a></li>
                                    <li><a href="#">TRAVEL</a></li>
                                    <li><a href="#">SERVICES</a></li>
                                    <li><a href="#">EVENTS</a></li>
                                    <li><a href="#">ROOMS &amp; SUITES</a></li>
                                    <li><a href="#">SPA &amp; GYM</a></li>
                                    <li><a href="#">POOL &amp; SWIM</a></li>
                                </ul>
                            </nav>
                        </div>
-->
                        <!-- Sidebar Categories End -->
                        <!-- Sidebar Events -->
<!--
                        <div class="widget sidebar-events">
                            <h5>UPCOMING EVENTS</h5>
                            <ul>
                                <li><a href="#"><span><b>APRIL</b>25</span>Mothers Day Lunch at The Grandium</a></li>
                                <li><a href="#"><span><b>MARCH</b>17</span>New Year's Brunch at The Grandium</a></li>
                                <li><a href="#"><span><b>JANUARY</b>12</span>Family Christmas Lunch at The Grandium</a></li>
                            </ul>
                        </div>
-->
                        <!-- Sidebar Events End -->
                        <!-- Sidebar Recent -->
                        <div class="widget sidebar-recent">
                            <h5>ДРУГИЕ АКЦИИ</h5>
                            <ul>
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
                                <li><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?><span><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Sidebar Recent End -->
                        <!-- Sidebar Tags -->
<!--
                        <div class="widget sidebar-tags">
                            <h5>TAGS</h5>
                            <ul>
                                <li><a href="#">#TRAVEL</a></li>
                                <li><a href="#">#SERVICES</a></li>
                                <li><a href="#">#EVENTS</a></li>
                                <li><a href="#">#ROOMS</a></li>
                                <li><a href="#">#POOL</a></li>
                                <li><a href="#">#SPA</a></li>
                                <li><a href="#">#ACCOMONDATION</a></li>
                            </ul>
                        </div>
-->
                        <!-- Sidebar Tags End -->
                        <!-- Sidebar Archive -->
<!--
                        <div class="widget sidebar-archive">
                            <h5>BLOG ARCHIVE</h5>
                            <ul>
                                <li><a href="#">MARCH 2016</a></li>
                                <li><a href="#">FEBRUARY 2016</a></li>
                                <li><a href="#">JANUARY 2016</a></li>
                                <li><a href="#">DECEMBER 2015</a></li>
                                <li><a href="#">NOVEMBER 2015</a></li>
                                <li><a href="#">OCTOBER 2015</a></li>
                            </ul>
                        </div>
-->
                        <!-- Sidebar Archive End -->
                    </div>
                    <!-- Blog Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Section Blog Single End -->
</div>
<!-- Site Main End -->

<?php get_footer('inner'); ?>