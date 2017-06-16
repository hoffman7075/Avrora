<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'left-header-menu' => __('Левое меню', 'html5blank'), // Main Navigation
        'right-header-menu' => __('Правое меню', 'html5blank'), // Sidebar Navigation
    ));
}
//Под меню. Очень нужно
add_filter('wp_nav_menu_objects', 'css_for_nav_parrent');
function css_for_nav_parrent( $items ){
    foreach( $items as $item ){
        if( __nav_hasSub( $item->ID, $items ) )
            $item->classes[] = 'sub'; // все элементы поля "classes" меню, будут совмещены и выведены в атрибут class HTML тега <li>
    }

    return $items;
}
function __nav_hasSub( $item_id, $items ){
    foreach( $items as $item ){
        if( $item->menu_item_parent && $item->menu_item_parent == $item_id )
            return true;
    }

    return false;
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_room'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_uslugi'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_akcii'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_otzivi');
//add_action('init', 'create_post_type_holl');
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // gAdd our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.
add_shortcode('room', 'romm'); // Place [html5_shortcode_demo_2] in Pages, Posts now.
add_shortcode('akcii', 'akcii'); 
//add_shortcode('holl', 'holl'); 

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
function create_post_type_otzivi()
{
    register_taxonomy_for_object_type('category', 'otzivi'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'otzivi');
    register_post_type('otzivi', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Отзывы', 'otzivi'), // Rename these to suit
            'singular_name' => __('Отзывы', 'otzivi'),
            'add_new' => __('Новый', 'otzivi'),
            'add_new_item' => __('Добавить отзыв', 'otzivi'),
            'edit' => __('Редактировать', 'otzivi'),
            'edit_item' => __('Редактировать отзыв', 'otzivi'),
            'new_item' => __('Новый отзыв', 'otzivi'),
            'view' => __('Просмотр', 'otzivi'),
            'view_item' => __('Просмотр отзыва', 'otzivi'),
            'search_items' => __('Поиск отзывов', 'otzivi'),
            'not_found' => __('Отзывы не найдены', 'otzivi'),
            'not_found_in_trash' => __('Отзывы не найдены в корзине', 'otzivi')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ), // Add Category and Post Tags support
        'menu_icon' => 'dashicons-format-status'
    ));
}

function create_post_type_room()
{
    register_taxonomy_for_object_type('category', 'room'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'room');
    register_post_type('room', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Банкет-холл', 'room'), // Rename these to suit
            'singular_name' => __('Зал', 'room'),
            'add_new' => __('Новый', 'room'),
            'add_new_item' => __('Добавить зал', 'room'),
            'edit' => __('Редактировать', 'room'),
            'edit_item' => __('Редактировать зал', 'room'),
            'new_item' => __('Новый зал', 'room'),
            'view' => __('Просмотр', 'room'),
            'view_item' => __('Просмотр зала', 'room'),
            'search_items' => __('Поиск залов', 'room'),
            'not_found' => __('Залы не найдены', 'room'),
            'not_found_in_trash' => __('Залы не найдены в корзине', 'room')
        ),
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ), // Add Category and Post Tags support
        'menu_icon' => 'dashicons-admin-home'
    ));
}

function create_post_type_uslugi()
{
    register_taxonomy_for_object_type('category', 'uslugi'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'uslugi');
    register_post_type('uslugi', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Услуги', 'uslugi'), // Rename these to suit
            'singular_name' => __('Услуги', 'uslugi'),
            'add_new' => __('Новая', 'uslugi'),
            'add_new_item' => __('Добавить услугу', 'uslugi'),
            'edit' => __('Редактировать', 'uslugi'),
            'edit_item' => __('Редактировать услугу', 'uslugi'),
            'new_item' => __('Новая услуга', 'uslugi'),
            'view' => __('Просмотр', 'uslugi'),
            'view_item' => __('Просмотр услуги', 'uslugi'),
            'search_items' => __('Поиск залов', 'uslugi'),
            'not_found' => __('Услуги не найдены', 'uslugi'),
            'not_found_in_trash' => __('Услуги не найдены в корзине', 'uslugi')
        ),
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ), // Add Category and Post Tags support
        'menu_icon' => 'dashicons-admin-home'
    ));
}

//function create_post_type_holl()
//{
//    register_taxonomy_for_object_type('category', 'holl'); // Register Taxonomies for Category
//    register_taxonomy_for_object_type('post_tag', 'holl');
//    register_post_type('holl', // Register Custom Post Type
//        array(
//        'labels' => array(
//            'name' => __('Банкетные залы', 'holl'), // Rename these to suit
//            'singular_name' => __('Банкетный зал', 'holl'),
//            'add_new' => __('Добавить зал', 'holl'),
//            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'holl'),
//            'edit' => __('Edit', 'holl'),
//            'edit_item' => __('Edit HTML5 Blank Custom Post', 'holl'),
//            'new_item' => __('New HTML5 Blank Custom Post', 'holl'),
//            'view' => __('View HTML5 Blank Custom Post', 'holl'),
//            'view_item' => __('View HTML5 Blank Custom Post', 'holl'),
//            'search_items' => __('Search HTML5 Blank Custom Post', 'holl'),
//            'not_found' => __('No HTML5 Blank Custom Posts found', 'holl'),
//            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'holl')
//        ),
//        'public' => true,
//        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//        'has_archive' => true,
//        'supports' => array(
//            'title',
//            'editor',
//            'excerpt',
//            'thumbnail',
//            'page-attributes'
//        ), // Go to Dashboard Custom HTML5 Blank post for supports
//        'can_export' => true, // Allows export in Tools > Export
//        'taxonomies' => array(
//            'post_tag',
//            'category'
//        ) // Add Category and Post Tags support
//    ));
//}

function create_post_type_akcii()
{
    register_taxonomy_for_object_type('category', 'akcii'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'akcii');
    register_post_type('akcii', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Акции', 'akcii'), // Rename these to suit
            'singular_name' => __('Акции', 'akcii'),
            'add_new' => __('Новый', 'akcii'),
            'add_new_item' => __('Добавить акцию', 'akcii'),
            'edit' => __('Редактировать', 'akcii'),
            'edit_item' => __('Редактировать акцию', 'akcii'),
            'new_item' => __('Новая акция', 'akcii'),
            'view' => __('Просмотр', 'akcii'),
            'view_item' => __('Просмотр акции', 'akcii'),
            'search_items' => __('Поиск акции', 'akcii'),
            'not_found' => __('Акции не найдены', 'akcii'),
            'not_found_in_trash' => __('Акции не найдены в корзине', 'akcii')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ), // Add Category and Post Tags support
        'menu_icon' => 'dashicons-tickets'
    ));
}

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5()
// {
//     register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'html5-blank');
//     register_post_type('html5-blank', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//             'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//             'add_new' => __('Add New', 'html5blank'),
//             'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//             'edit' => __('Edit', 'html5blank'),
//             'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//             'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//             'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//             'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//             'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
	Add Theme Options
\*------------------------------------*/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
 
function theme_options_init(){
    register_setting( 'html5blank_options', 'html5blank_theme_options');
}
 
function theme_options_add_page() {
    add_menu_page( __( 'Настройки Темы', 'html5blank' ), __( 'Настройки Темы', 'html5blank' ), 'manage_categories', 'theme_options', 'theme_options_do_page' );
}
function theme_options_do_page() { global $select_options; if ( ! isset(            $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
?>
 
<div class="wrap">
    <?php screen_icon(); echo "<h2>". __( 'Настройки Темы', 'html5blank' ) . "</h2>"; ?>
    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
    <div id="message" class="updated">
        <p><strong><?php _e( 'Настройки сохранены', 'html5blank' ); ?></strong></p>
    </div>
    <?php endif; ?>
</div>
 
<form method="post" action="options.php">
    <?php settings_fields( 'html5blank_options' ); ?>
    <?php $options = get_option( 'html5blank_theme_options' ); ?>
    <table width="600" border="0">
        <tr>
            <td>VK:</td>
            <td><input type="text" name="html5blank_theme_options[vk]" id="html5blank_theme_options[vk]" value="<?php echo $options[vk];?>" /></td>
        </tr>
        <tr>
            <td>Facebook:</td>
            <td><input type="text" name="html5blank_theme_options[fb]" id="html5blank_theme_options[fb]" value="<?php echo $options[fb];?>" /></td>
        </tr>
        <tr>
            <td>Instagram:</td>
            <td><input type="text" name="html5blank_theme_options[inst]" id="html5blank_theme_options[inst]" value="<?php echo $options[inst];?>" /></td>
        </tr>
        <tr>
            <td>OK:</td>
            <td><input type="text" name="html5blank_theme_options[ok]" id="html5blank_theme_options[ok]" value="<?php echo $options[ok];?>" /></td>
        </tr>
        <tr>
            <td>Twitter:</td>
            <td><input type="text" name="html5blank_theme_options[twitter]" id="html5blank_theme_options[twitter]" value="<?php echo $options[twitter];?>" /></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="html5blank_theme_options[email]" id="html5blank_theme_options[email]" value="<?php echo $options[email];?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><?php submit_button(); ?></td>
        </tr>
    </table>
</form>

<?php
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['room'] = 'Залы'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<ul>'; // открывающий тег обертки
  $wrap_after = '</ul><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = ''; // разделитель между "крошками"
  $sep_before = ''; // тег перед разделителем
  $sep_after = ''; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<li>'; // тег перед текущей "крошкой"
  $after = '</li>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<li>';
  $link_after = '</li>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '';
  $link_in_after = '';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()