<?php
/**
 * Maxon functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Maxon
 * @since Maxon 1.0
 */

/**
 * Maxon only works in WordPress 4.4 or later.
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own maxon_setup() function to override in a child theme.
 *
 * @since maxon 1.0
 */
 /*-----------------------------------------------------
 * Define Default Constants
 *----------------------------------------------------*/
define( 'MAXON_THEME_DIR', get_template_directory() );
define( 'MAXON_THEME_URI', get_template_directory_uri() );
define( 'MAXON_THEME_SUB_DIR', MAXON_THEME_DIR.'/inc/' );
define( 'MAXON_CSS', MAXON_THEME_URI.'/assets/css/' );
define( 'MAXON_JS', MAXON_THEME_URI.'/assets/js/' );

/*-----------------------------------------------------
 * Load Require File
 *----------------------------------------------------*/
require_once MAXON_THEME_SUB_DIR.'maxon-function.php';
require_once MAXON_THEME_SUB_DIR.'maxon-customizer.php';
require_once MAXON_THEME_SUB_DIR.'class-wp-bootstrap-navwalker.php';

/*-----------------------------------------------------
 * Maxon Theme Setup
 *----------------------------------------------------*/
if( ! function_exists( 'maxon_setup' )):
    function maxon_setup(){
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on maxon, use a find and replace
		 * to change 'maxon' to the name of your theme in all the template files
		 */
		// * Load Language File *//
        load_theme_textdomain('maxon', get_template_directory() . '/languages');

        //add_theme_support('menus');
        add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		//*set image size *//
		add_image_size('maxon_blog_post_thumb',350,233,true);
		add_image_size('maxon_el_blog_post_thumb',310,276,true);

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );

        /*
		 * Set the default content width.
		 */
		$GLOBALS['content_width'] = 750;



        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

        // Register nav menu locations.
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary Menu', 'maxon'),
		) );

        /*
		 * Switch default core markup for search form, comment form, comments etc.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
		) );

        /*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

        // Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action ('after_setup_theme', 'maxon_setup');


/*-----------------------------------------------------
 * Load  Style And Script
 *----------------------------------------------------*/
function maxon_enqueue_styles_scripts(){
    //add stylesheet
    wp_enqueue_style('maxon',get_stylesheet_uri());
    wp_enqueue_style('bootstrap', MAXON_CSS . 'bootstrap.min.css', array());
    wp_enqueue_style('owl-carousel', MAXON_CSS . 'owl.carousel.min.css', array());
    wp_enqueue_style('themify-icons', MAXON_CSS . 'themify-icons.css', array());
    wp_enqueue_style('maxon-custom', MAXON_CSS . 'custom.css', array());
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,700', array());
    wp_enqueue_style('maxon-main-style', MAXON_CSS . 'main.css', array());
    //add script
	wp_enqueue_script('bootstrap', MAXON_JS . 'bootstrap.min.js',array('jquery'),false,true);
	wp_enqueue_script('owl-carousel', MAXON_JS . 'owl.carousel.min.js',array('jquery'),false,true);
    wp_enqueue_script('onscreeen', MAXON_JS . 'onscreeen.js',array('jquery'),false,true);
    wp_enqueue_script('maxon-custom', MAXON_JS . 'maxon.js',array('jquery'),false,true);
    //reply comments
  	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
  		wp_enqueue_script( 'comment-reply' );
  	}
}
add_action('wp_enqueue_scripts', 'maxon_enqueue_styles_scripts');

/*-----------------------------------------------------
 * Register Widget
 *----------------------------------------------------*/
function maxon_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Widget', 'maxon' ),
        'id'            => 'main-sidebar',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on Sidebar.', 'maxon' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    
}
add_action( 'widgets_init', 'maxon_widgets_init' );





