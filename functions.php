<?php
/**
 * double functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package double
 */

if ( ! function_exists( 'double_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function double_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on double, use a find and replace
         * to change 'double' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'double', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'double' ),
            'header_menu_left' => esc_html__('Header left menu', 'double'),
            'header_menu_right' => esc_html__('Header right menu', 'double'),
            'footer_menu_1' => esc_html__('Footer menu 1', 'double'),
            'footer_menu_2' => esc_html__('Footer menu 2', 'double'),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'double_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'double_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function double_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'double_content_width', 640 );
}
add_action( 'after_setup_theme', 'double_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function double_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'double' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'double' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'double_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function double_scripts() {

    wp_enqueue_style( 'double-lightslider', get_template_directory_uri() . '/assets/libs/lightslider-master/dist/css/lightslider.min.css');

    wp_enqueue_style( 'double-pannellum', 'https://cdn.pannellum.org/2.4/pannellum.css');

    wp_enqueue_style( 'double-jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');

    wp_enqueue_style( 'double-main', get_template_directory_uri() . '/assets/css/styles.min.css');

    wp_enqueue_style( 'double-style', get_stylesheet_uri() );

    wp_deregister_script( 'jquery-core' );
    wp_deregister_script('jquery');
    wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.4.1.min.js', false, null, true);
    wp_register_script( 'jquery', false, array('jquery-core'), null, true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'double-lightslider', get_template_directory_uri() . '/assets/libs/lightslider-master/dist/js/lightslider.min.js', array('jquery'), '', true );

    wp_enqueue_script( 'double-pannellum', 'https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js', array('jquery'), '', false );

    wp_enqueue_script( 'double-jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '', true );

    wp_enqueue_script( 'double-custom', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '', true );

    wp_enqueue_script( 'double-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'double-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'commentjs', get_stylesheet_directory_uri() . '/js/comments.js', array('jquery'), null );

    wp_enqueue_script( 'owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'double_scripts' );


add_filter( 'excerpt_length', function(){
    return 10;
} );

add_filter('excerpt_more', function($more) {
    return '...';
});

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function my_admin_logo() {
    echo '
    <style type="text/css">
        #header-logo { background:url(' . get_template_directory_uri() . '/assets/img/logo/logo.png) no-repeat 0 0 !important; }
    </style>';
}
add_action('admin_head', 'my_admin_logo');

function my_login_logo(){
    echo '
   <style type="text/css">
        #login h1 a { background: url('. get_template_directory_uri() . '/assets/img/logo/logo.png) no-repeat 0 0 !important; }
    </style>';
}
add_action('login_head', 'my_login_logo');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/classes/Header_Menu_Left.php';
require get_template_directory() . '/classes/Header_Menu_Right.php';
require get_template_directory() . '/classes/Footer_Menu_1.php';
require get_template_directory() . '/classes/Footer_Menu_2.php';
/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/Double_Walker_Comment.php';

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/club-functions.php';
require get_template_directory() . '/inc/event-functions.php';
require get_template_directory() . '/inc/villa-functions.php';
require get_template_directory() . '/inc/restaurant-functions.php';
require get_template_directory() . '/inc/tour-functions.php';
require get_template_directory() . '/inc/filter-villas.php';
require get_template_directory() . '/inc/filter-events.php';
require get_template_directory() . '/inc/filter-restaurants.php';
require get_template_directory() . '/inc/filter-clubs.php';
require get_template_directory() . '/inc/filter-tours.php';
require get_template_directory() . '/inc/news-functions.php';
require get_template_directory() . '/inc/rent-transport-functions.php';
require get_template_directory() . '/inc/job-functions.php';
require get_template_directory() . '/inc/wc_price_filter.php';
require get_template_directory() . '/inc/switch_comment_category.php';


require get_template_directory() . '/inc/rating.php';
require get_template_directory() . '/inc/ajax-comments.php';


require_once get_template_directory() . '/inc/custom_user.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * change defaults breadcrumbs for woocommerce
 */

add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumbs' );
function wcc_change_breadcrumbs( $defaults ) {
    $defaults['delimiter'] = '';
    $defaults['wrap_before'] = '<nav class="nav-breadcrumb"><ol class="breadcrumb">';
    $defaults['wrap_after'] = '</ol></nav>';
	return $defaults;
}

remove_action( 'woocommerce_before_shop_loop', 'double_woocommerce_product_columns_wrapper', 40 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//Получение минимальной и максимальной цены товара

function wpp_get_extremes_price_in_product_cat( $term_id ) {
    
    global $wpdb;
    // старый запрос, не работает корректно, числа сравниваются как строки
    // $sql = "SELECT  MIN( meta_value  ) as min_price , MAX( meta_value  ) as max_price FROM {$wpdb->posts} INNER JOIN {$wpdb->term_relationships} ON ({$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id) INNER JOIN {$wpdb->postmeta} ON ({$wpdb->posts}.ID = {$wpdb->postmeta}.post_id) WHERE ( {$wpdb->term_relationships}.term_taxonomy_id IN (%d) ) AND {$wpdb->posts}.post_type = 'product' AND {$wpdb->posts}.post_status = 'publish' AND {$wpdb->postmeta}.meta_key = '_price' ";
    $sql = "SELECT meta_value FROM {$wpdb->posts} INNER JOIN {$wpdb->postmeta} ON ({$wpdb->posts}.ID = {$wpdb->postmeta}.post_id) WHERE {$wpdb->posts}.post_type = 'product' AND {$wpdb->posts}.post_status = 'publish' AND {$wpdb->postmeta}.meta_key = '_price' ";
    
    $result = $wpdb->get_results( $wpdb->prepare( $sql, $term_id ) );

    $nums = array();

    foreach($result as $price_item){
        $nums[] = (float)$price_item->meta_value;
    }

    $prices = array(
        'min_price' => min($nums),
        'max_price' => max($nums),
    );
    
    return $prices;
    
  }

function gf_get_min_max_by_type($post_type, $field_name){
    global $wpdb;
    $sql = "SELECT meta_value FROM {$wpdb->posts} INNER JOIN {$wpdb->postmeta} ON ({$wpdb->posts}.ID = {$wpdb->postmeta}.post_id) WHERE {$wpdb->posts}.post_type = '{$post_type}' AND {$wpdb->posts}.post_status = 'publish' AND {$wpdb->postmeta}.meta_key = '{$field_name}'";
    $result = $wpdb->get_results( $wpdb->prepare($sql));

    $nums = array();

    foreach($result as $price_item){
        $nums[] = (float)$price_item->meta_value;
    }

    $prices = array(
        'min_price' => min($nums),
        'max_price' => max($nums),
    );

    return $prices;
}