<?php
/**
 * nuevo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nuevo
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
function nuevo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on nuevo, use a find and replace
		* to change 'nuevo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nuevo', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'nuevo' ),
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
			'nuevo_custom_background_args',
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
add_action( 'after_setup_theme', 'nuevo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nuevo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nuevo_content_width', 640 );
}
add_action( 'after_setup_theme', 'nuevo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nuevo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nuevo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nuevo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nuevo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nuevo_scripts() {
	wp_enqueue_style( 'nuevo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nuevo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nuevo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nuevo_scripts' );

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

require get_template_directory() . '/assets/assets.php';
include get_template_directory() . '/modulos/modulo-testimonio/core-testimonio.php';
include get_template_directory() . '/modulos/modulo-empresas/core-empresa.php';

add_post_type_support( 'page', 'excerpt' );



/*funciones para li y etiqueta a del NAVBAR*/

add_filter ( 'nav_menu_css_class', 'agregar_clase_li', 10, 4 );

function agregar_clase_li ( $classes, $item, $args, $depth ){
  $classes[] = 'nav-item ';
  return $classes;
}

/*agregar clases de bootstrap al elemento A del NAVBAR */

add_filter('wp_nav_menu','agregar_clase_aitem');

function agregar_clase_aitem($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link logo-menu"', $ulclass);
}

function add_class_next_post_link($html){

    $html = str_replace('<a','<a class="next"',$html);

    return $html;

}

add_filter('next_post_link','add_class_next_post_link',10,1);

 

function add_class_previous_post_link($html){

    $html = str_replace('<a','<a class="prev"',$html);

    return $html;

}

add_filter('previous_post_link','add_class_previous_post_link',10,1);



/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


if ( ! file_exists( get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';
}

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );


/*clase al custom logo*/
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['class'] )  && 'custom-logo' === $attr['class'] )
        $attr['class'] = 'navbar-brand';

    return $attr;
} );

/**
 * Changes the class on the custom logo in the header.php
 */
function helpwp_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-brand', $html );
	return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);

function widget_footer() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Formulario footer', 'nuevo' ),
			'id'            => 'formulario_footer',
			'description'   => esc_html__( 'Formulario del footer', 'nuevo' ),
			'before_widget' => '<section id="%1$s" class="widget para %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Columna 1 footer', 'tema-para-alumnos-base' ),
			'id'            => 'columna_dos_footer',
			'description'   => esc_html__( 'Columna 1 del footer', 'tema-para-alumnos-base' ),
			'before_widget' => '<section id="%1$s" class="widget col-12 para %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Columna 2 footer', 'tema-para-alumnos-base' ),
			'id'            => 'columna_tres_footer',
			'description'   => esc_html__( 'Columna 2 del footer', 'tema-para-alumnos-base' ),
			'before_widget' => '<section id="%1$s" class="widget col-12 menu-central para %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Columna 3 footer', 'tema-para-alumnos-base' ),
			'id'            => 'columna_cuatro_footer',
			'description'   => esc_html__( 'Columna 3 del footer', 'tema-para-alumnos-base' ),
			'before_widget' => '<section id="%1$s" class="widget col-12 para %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'widget_footer');

function wpb_modify_jquery() {
	//check if front-end is being viewed
	if (!is_admin()) {
		// Remove default WordPress jQuery
        wp_deregister_script('jquery');
		// Register new jQuery script via Google Library	
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '3.6.0');
		// Enqueue the script 	
        wp_enqueue_script('jquery');
    }
}
// Execute the action when WordPress is initialized
add_action('init', 'wpb_modify_jquery');

/*Truncar cantidad de caracteres en el extracto*/
function nuevo_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'nuevo_custom_excerpt_length', 999 );

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );