<?php
/**
 * Colorskin functions and definitions
 *
 * @package Colorskin
 */

if ( ! function_exists( 'colorskin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function colorskin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on colorskin, use a find and replace
	 * to change 'colorskin' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colorskin', get_template_directory() . '/languages' );
    
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    // Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}
    
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
    add_image_size('colorskin-large-thumb', 830);
    add_image_size('colorskin-medium-thumb', 550, 400, true);
	add_image_size('colorskin-small-thumb', 230);
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'colorskin' ),
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
	add_theme_support( 'custom-background', apply_filters( 'colorskin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    // Set up the WordPress core custom logo feature.
    add_theme_support( 'custom-logo', apply_filters( 'colorskin_custom_logo_args', array(
        'height' => 66,
        'width' => 250,
        'flex-height' => true,
        'flex-width' => true,
    ) ) );

}
endif;
add_action( 'after_setup_theme', 'colorskin_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function colorskin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'colorskin' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'colorskin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    // First footer widget area.
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'colorskin' ),
        'id'            => 'footer-widget-1',
        'description'   => esc_html__( 'The first footer widget area', 'colorskin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    // Second Footer Widget Area.
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'colorskin' ),
        'id'            => 'footer-widget-2',
        'description'   => esc_html__( 'The second footer widget area', 'colorskin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    // Third Footer Widget Area.
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'colorskin' ),
        'id'            => 'footer-widget-3',
        'description'   => esc_html__( 'The third footer widget area', 'colorskin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    // Fourth Footer Widget Area.
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 4', 'colorskin' ),
        'id'            => 'footer-widget-4',
        'description'   => esc_html__( 'The fourth footer widget area', 'colorskin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
}
add_action( 'widgets_init', 'colorskin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function colorskin_scripts() {
    
    wp_register_style( 'google_fonts', '//fonts.googleapis.com/css?family=Lato' );
    
    wp_enqueue_style( 'colorskin-bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.css', array(), true );
    
	wp_enqueue_style( 'colorskin-style', get_stylesheet_uri() );
    
    if( get_theme_mod( 'colorskin_color_skin', 'default' ) == 'blue' ) {
        wp_enqueue_style( 'colorskin_blue_style', get_template_directory_uri() . '/css/blue.css' );
	}
    
    if( get_theme_mod( 'colorskin_color_skin', 'default' ) == 'red' ) {
		wp_enqueue_style( 'colorskin_red_style', get_template_directory_uri() . '/css/red.css' );
	}
    
    if( get_theme_mod( 'colorskin_color_skin', 'default' ) == 'green' ) {
		wp_enqueue_style( 'colorskin_green_style', get_template_directory_uri() . '/css/green.css' );
	}
    
    wp_enqueue_style( 'google_fonts' );
    
    wp_enqueue_style( 'colorskin-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
    
    wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array(), '20160809', false );
    
    wp_enqueue_script( 'colorskin-nav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'),'', true );
    
    wp_enqueue_script( 'colorskin-main', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true );
    
	wp_enqueue_script( 'colorskin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
        
	}
    
}
add_action( 'wp_enqueue_scripts', 'colorskin_scripts' );

/**
 * Sets the post excerpt length to 40 words.
 *
 * function tied to the excerpt_length filter hook.
 *
 * @uses filter excerpt_length
 */
function colorskin_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'colorskin_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function colorskin_continue_reading() {
	return ' ...';
}
add_filter( 'excerpt_more', 'colorskin_continue_reading' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( ! class_exists( 'wp_jetpack' )) {
    require get_template_directory() . '/inc/jetpack.php';
}