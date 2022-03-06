<?php
/**
 * Ellie Moatt functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ellie_Moatt
 */

if ( ! defined( 'ELLIE_MOATT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ELLIE_MOATT_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elliemoatt_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ellie Moatt, use a find and replace
		* to change 'elliemoatt' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'elliemoatt', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'elliemoatt' ),
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
}
add_action( 'after_setup_theme', 'elliemoatt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elliemoatt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elliemoatt_content_width', 640 );
}
add_action( 'after_setup_theme', 'elliemoatt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elliemoatt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elliemoatt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'elliemoatt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'elliemoatt' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'elliemoatt' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'elliemoatt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elliemoatt_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'elliemoatt-styles', get_template_directory_uri() . '/dist/style.css', array(), _S_VERSION );
	wp_enqueue_script( 'elliemoatt-scripts', get_template_directory_uri() . '/dist/app.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_style( 'elliemoatt-styles', get_template_directory_uri() . '/style.css', array(), ELLIE_MOATT_VERSION );
	wp_enqueue_script( 'elliemoatt-scripts', get_template_directory_uri() . '/app.js', array( 'jquery' ), ELLIE_MOATT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elliemoatt_scripts' );

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
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Redirect service post type single.
 */
function elliemoatt_redirect() {
if ( is_singular( 'elliemoatt_service' ) ||
	 is_singular( 'post' ) ||
	 is_author() ||
	 is_category() ||
	 is_tag()
	) {
		wp_safe_redirect( home_url(), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'elliemoatt_redirect_service' );

/**
 * Disable search functionality.
 */
function elliemoatt_disable_search( $query, $error = true ) {
	if ( is_search() ) {
		$query->is_search = false;   
		$query->query_vars['s'] = false;
		$query->query['s'] = false;

		if ( $error ) {
			$query->is_404 = true;
		}
	}
}
add_action( 'parse_query', 'elliemoatt_disable_search' ); 

/**
 * Add ellipses to end of post excerpt.
 */
function elliemoatt_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'elliemoatt_excerpt_more' );
