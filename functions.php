<?php
/**
 * Wordify WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wordify_WP
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordify_wp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wordify WP, use a find and replace
		* to change 'wordify-wp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wordify-wp', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wordify-wp' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wordify_wp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'wp-block-styles' );
    add_theme_support('align-wide');
    add_theme_support( 'responsive-embeds' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( "align-wide" );

	add_image_size('wordify-blog-thumbnail', '350', '234', array('center', 'center'));
	add_image_size('wordify-blog-full-post', '730', '487', array('center', 'center'));
	add_image_size('wordify-blog-related-post', '350', '400', array('center', 'center'));
	add_image_size('wordify-blog-widget-recent-post-thumbmail', '90', '60', array('center', 'center'));
	add_image_size('wordify-blog-slider-images', '1100', '500', array('center', 'center'));
}
add_action( 'after_setup_theme', 'wordify_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordify_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordify_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordify_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordify_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordify-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordify-wp' ),
			'before_widget' => '<div id="%1$s" class="sidebar-box widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="heading widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'wordify-wp' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordify-wp' ),
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'wordify-wp' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'wordify-wp' ),
			'before_widget' => '<div id="%1$s" widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'wordify-wp' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'wordify-wp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'wordify_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordify_wp_scripts() {

	wp_enqueue_style('wordify-wp-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('wordify-wp-animate-style', get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style('wordify-wp-owl-carousel-min-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('wordify-wp-ionicons-style', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css');
	wp_enqueue_style('wordify-wp-fontawesome-style', get_template_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.min.css');
	wp_enqueue_style('wordify-wp-flaticon-style', get_template_directory_uri() . '/assets/fonts/flaticon/font/flaticon.css');
	wp_enqueue_style('wordify-wp-theme-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Inconsolata:400,700&display=swap');

	 wp_enqueue_style( 'wordify-wp-style', get_stylesheet_uri(), array(), _S_VERSION );
	 wp_style_add_data( 'wordify-wp-style', 'rtl', 'replace' );
	 wp_enqueue_style('wordify-wp-main-css', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_script("jquery");
	wp_enqueue_script('wordify-wp-bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wordify-wp-popper', get_template_directory_uri(). '/assets/js/popper.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wordify-wp-owl-carousel', get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wordify-wp-waypoints-min', get_template_directory_uri(). '/assets/js/jquery.waypoints.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wordify-wp-jquery-stellar-min', get_template_directory_uri(). '/assets/js/jquery.stellar.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'wordify-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wordify-wp-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordify_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

// Bootstrap Walker Menu
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Social Customizer
//require get_template_directory() . '/inc/customizer/social.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

