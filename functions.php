<?php
/**
 * JDI functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JDI
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
function jdi_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on JDI, use a find and replace
		* to change 'jdi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'jdi', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'jdi' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

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
add_action( 'after_setup_theme', 'jdi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jdi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jdi_content_width', 640 );
}
add_action( 'after_setup_theme', 'jdi_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function jdi_scripts() {
	wp_enqueue_style( 'jdi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'jdi-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array( 'jdi-style' ), '11' );
	wp_style_add_data( 'jdi-style', 'rtl', 'replace' );


	wp_enqueue_script( 'jdi-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true );
	wp_enqueue_script( 'jdi-theme', get_template_directory_uri() . '/js/theme.js', array( 'jdi-swiper' ), _S_VERSION, true );
	wp_enqueue_script( 'jdi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'jdi_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Disable features.
 */
require get_template_directory() . '/inc/disable-features.php';

/**
 * Post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Check required plugins.
 */
require get_template_directory() . '/inc/required-plugins.php';

/**
 * ACF Fields.
 */
require get_template_directory() . '/inc/acf-fields.php';

/**
 * ACF Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Contact form
 */
require get_template_directory() . '/inc/cform.php';
