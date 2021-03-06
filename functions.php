<?php
/**
 * Theme designfly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package designfly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'designfly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function designfly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on designfly, use a find and replace
		 * to change 'designfly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'designfly', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'designfly' ),
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
				'designfly_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
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
endif;
add_action( 'after_setup_theme', 'designfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designfly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'designfly_content_width', 640 );
}
add_action( 'after_setup_theme', 'designfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function designfly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'designfly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'designfly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'designfly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function designfly_scripts() {
	wp_enqueue_style( 'designfly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'designflytheme-custom-style', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );
	wp_enqueue_style( 'designflytheme-custom-style-responsive', get_template_directory_uri() . '/css/responsive.css', array(), _S_VERSION );
	wp_style_add_data( 'designfly-style', 'rtl', 'replace' );

	wp_enqueue_script( 'designfly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'designfly_scripts' );

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

/**
*   Portfolio custom widget.
*/
require get_template_directory() . '/inc/class-portfolio-widget.php';
add_action(
	'widgets_init',
	function() {
		register_widget( 'Designfly_Portfolio_Widget' );
	}
);

/**
*   Related Posts custom widget.
*/
require get_template_directory() . '/inc/class-related-posts-widget.php';
add_action(
	'widgets_init',
	function() {
		register_widget( 'Designfly_Related_Posts_Widget' );
	}
);

/**
*   Related Posts custom widget.
*/
require get_template_directory() . '/inc/class-popular-posts-widget.php';
add_action(
	'widgets_init',
	function() {
		register_widget( 'Designfly_Popular_Posts_Widget' );
	}
);

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Creating custom post type
 */
function designfly_portfolio() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'portfolio' ),
		'add_new_item'       => __( 'Add New Portfolio' ),
		'edit_item'          => __( 'Edit Portfolio' ),
		'new_item'           => __( 'New Portfolio' ),
		'all_items'          => __( 'All Portfolio' ),
		'view_item'          => __( 'View Portfolio' ),
		'search_items'       => __( 'Search Portfolio' ),
		'not_found'          => __( 'No Portfolio found' ),
		'not_found_in_trash' => __( 'No Portfolio found in the Trash' ),
		'menu_name'          => 'Portfolio',
	);
	$args   = array(
		'labels'        => $labels,
		'description'   => 'Holds our Portfolio specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		'taxonomies'    => array( 'category', 'post_tag' ),
	);
	register_post_type( 'df-portfolio', $args );
}
add_action( 'init', 'designfly_portfolio' );
