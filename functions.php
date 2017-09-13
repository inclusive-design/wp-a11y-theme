<?php
/**
 * a11y functions and definitions
 * @package a11y
 */

if ( ! function_exists( 'a11y_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function a11y_setup() {

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
        'menu-1' => esc_html__( 'Primary', 'a11y' ),
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
}
endif;
add_action( 'after_setup_theme', 'a11y_setup' );

/**
 * Register sidebar widget.
 */
function a11y_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'a11y' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'a11y' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'a11y_widgets_init' );

/**
 * Enqueue styles.
 */
function a11y_styles() {
    wp_enqueue_style( 'a11y-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'a11y_styles' );

/**
 * Add the admin page for the theme.
 */
require get_template_directory() . '/inc/theme-admin.php';
