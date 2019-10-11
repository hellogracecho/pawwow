<?php
/**
 * Paw Wow functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Paw_Wow
 */

if ( ! function_exists( 'pawwow_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pawwow_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Paw Wow, use a find and replace
		 * to change 'pawwow' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pawwow', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'pawwow' ),
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
		add_theme_support( 'custom-background', apply_filters( 'pawwow_custom_background_args', array(
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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pawwow' ),
			'footer-company-info' => esc_html__('Footer Company Info', 'pawwow'),
			'footer-contact' => esc_html__('Footer Contact', 'pawwow'),
			'footer-sitemap' => esc_html__('Footer Sitemap', 'pawwow'),
		) );
	
	}
endif;
add_action( 'after_setup_theme', 'pawwow_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pawwow_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pawwow_content_width', 640 );
}
add_action( 'after_setup_theme', 'pawwow_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pawwow_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pawwow' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pawwow' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pawwow_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pawwow_scripts() {
	wp_enqueue_style( 'pawwow-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pawwow-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pawwow-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// ***************************************
	//**  Enqueue Slick Slider only on Home page
	// ***************************************
	if ( is_front_page() ) {

		// ** Load slick.min js
		wp_enqueue_script(
			'pjt-slickslider',
			get_template_directory_uri() . '/js/slick.min.js',
			array('jquery'),
			'20191010',
			true
		);

		// ** Load slick setting
		wp_enqueue_script(
			'pjt-slickslider-settings',
			get_template_directory_uri() . '/js/slick-settings.js',
			array('jquery', 'pjt-slickslider'),
			'20191010',
			true
		);

		// ** Load css
		wp_enqueue_style(
			'pjt-slicktheme',
			get_template_directory_uri() . '/css/slick-theme.css'	
		);
		wp_enqueue_style(
			'pjt-slick',
			get_template_directory_uri() . '/css/slick.css'
		);
	}


	// ****************************************
	// ** Scroll To Top ** with Loading CSS
	// ****************************************
	wp_enqueue_style(
		'scroll-to-top',
		get_template_directory_uri() . '/css/scroll-to-top.css'	
	);
	wp_enqueue_script( 
		'scroll-to-top', 
		get_template_directory_uri() . '/js/scroll-to-top.js', 
		array( 'jquery' ), 
		'20191010',
		true 
	);


	// ****************************************
	// ** Scroll Reveal Animation ** 
	// ****************************************
	wp_enqueue_script('scroll-reveal', "https://unpkg.com/scrollreveal/dist/scrollreveal.min.js");
	wp_enqueue_script('scroll-reveal-script', get_template_directory_uri() .'/js/scroll-reveal.js',	array( 'jquery' ), 
	'20191010',
	true );

}
add_action( 'wp_enqueue_scripts', 'pawwow_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

 
// Register CPTs and Taxonommies
require get_template_directory() . '/inc/register-cpt-tax.php';

//  Remove Regular Post
function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove');  

// Remove Block Editor Filters
function ms_post_filter( $use_block_editor, $post ) {
	if ( 13 === $post->ID | 29 === $post->ID ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'ms_post_filter', 10, 2 );

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
	global $post;
	$text = get_field('description'); 
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 40; // words count
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}