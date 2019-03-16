<?php
/**
 * Epistol Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Epistol_Blog
 */

if (!function_exists('epiblog_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function epiblog_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Epistol Blog, use a find and replace
         * to change 'epiblog' to the name of your theme in all the template files.
         */
        load_theme_textdomain('epiblog', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'epiblog'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('epiblog_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'epiblog_setup');


class Nav_Footer_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {

        $output .= "<div class='navbar-dropdown'>";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $is_current_item = array_search('current-menu-item', $item->classes) != 0 ? ' active' : '';
        $liClasses = 'navbar-item ' . $is_current_item;
        $hasChildren = $args->walker->has_children;
        $liClasses .= $hasChildren ? " has-dropdown is-hoverable" : "";
        if ($hasChildren) {
            $output .= "<div class='" . $liClasses . "'>";
            $output .= "\n<a class='navbar-link' href='" . $item->url . "'>" . $item->title . "</a>";
        } else {
            $output .= "<a class='" . $liClasses . "' href='" . $item->url . "'>" . $item->title;
        }
        // Adds has_children class to the item so end_el can determine if the current element has children
        if ($hasChildren) {
            $item->classes[] = 'has_children';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (in_array("has_children", $item->classes)) {
            $output .= "</div>";
        }
        $output .= "</a>";
    }

    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "</div>";
    }

}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function epiblog_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('epiblog_content_width', 640);
}

add_action('after_setup_theme', 'epiblog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function epiblog_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'epiblog'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'epiblog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'epiblog_widgets_init');

function move_admin_bar()
{
    echo '
<style type="text/css">
body {margin-top: -28px;padding-bottom: 28px;}
body.admin-bar #wphead {padding-top: 0;}
body.admin-bar #footer {padding-bottom: 28px;}
#wpadminbar { top: auto !important;bottom: 0;}
#wpadminbar .quicklinks .menupop ul { bottom: 28px;}
</style>';
}

add_action('wp_head', 'move_admin_bar');

function get_scss_stylesheet_uri() {
    $stylesheet_dir_uri = get_stylesheet_directory_uri();
    $stylesheet_uri = $stylesheet_dir_uri . '/sass/style.css';
    /**
     * Filters the URI of the current theme stylesheet.
     *
     * @since 1.5.0
     *
     * @param string $stylesheet_uri     Stylesheet URI for the current theme/child theme.
     * @param string $stylesheet_dir_uri Stylesheet directory URI for the current theme/child theme.
     */
    return apply_filters( 'stylesheet_uri', $stylesheet_uri, $stylesheet_dir_uri );
}

/**
 * Enqueue scripts and styles.
 */
function epiblog_scripts()
{
    wp_enqueue_style('epiblog-style', get_scss_stylesheet_uri());

    wp_enqueue_script('epiblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('epiblog-footer', get_template_directory_uri() . '/js/footer-scripts.js', array(), '', true);

    wp_enqueue_script('epiblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'epiblog_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

function typed_init()
{
    echo "<script>
	 jQuery(document).ready(function($) {


	 });
     </script>";
}

add_action('wp_footer', 'typed_init');

// Remove WP Version From Styles
add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999);
// Remove WP Version From Scripts
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999);

// Function to remove version numbers
function sdt_remove_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}