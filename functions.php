<?php
/**
 * Ruth Chafin Interior Design functions and definitions
 *
 * @author Jason Chafin
 * @link https://github.com/Herm71/rcid-underscores
 * @since 0.0.0
 *
 * @package Ruth_Chafin_Interior_Design
 */

 // Theme version
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

// Theme directory
define( 'RCID_DIR', dirname( __FILE__ ) );

if ( ! function_exists( 'ruth_chafin_interior_design_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ruth_chafin_interior_design_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ruth Chafin Interior Design, use a find and replace
		 * to change 'ruth-chafin-interior-design' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ruth-chafin-interior-design', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'ruth-chafin-interior-design' ),
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
		add_theme_support( 'custom-background', apply_filters( 'ruth_chafin_interior_design_custom_background_args', array(
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
			//'height'      => 250,
			'width'       => 350,
			'flex-width'  => false,
      'flex-height' => true,
      'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'ruth_chafin_interior_design_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ruth_chafin_interior_design_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ruth_chafin_interior_design_content_width', 640 );
}
add_action( 'after_setup_theme', 'ruth_chafin_interior_design_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ruth_chafin_interior_design_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ruth-chafin-interior-design' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ruth-chafin-interior-design' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ruth_chafin_interior_design_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ruth_chafin_interior_design_scripts() {
  wp_enqueue_style( 'ruth-chafin-interior-design-style', get_stylesheet_uri, array(), THEME_VERSION );
  
  wp_enqueue_style( 'ruth-chafin-interior-design-dist-style', get_template_directory_uri() . '/dist/css/bundle.css', array(), THEME_VERSION, 'all' );

	wp_enqueue_script( 'ruth-chafin-interior-design-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'ruth-chafin-interior-design-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
  
  wp_enqueue_script( 'ruth-chafin-interior-design-dist-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
  }
  
  //deregister WP jquery, register Google libraries
  if (is_admin()) {
    return; //Do not de-register in admin
} else {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1');
    wp_enqueue_script('jquery');
}
}
add_action( 'wp_enqueue_scripts', 'ruth_chafin_interior_design_scripts' );

/**
 * Enqueue ADMIN scripts and styles.
 */

add_action( 'admin_enqueue_scripts', 'ruth_chafin_interior_design__admin_scripts' );

function ruth_chafin_interior_design__admin_scripts() {
  wp_enqueue_style( 'ruth-chafin-interior-design-dist-style', get_template_directory_uri() . '/dist/css/admin.css', array(), '1.0.0', 'all' );
}

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

