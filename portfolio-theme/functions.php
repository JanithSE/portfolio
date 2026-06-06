<?php
/**
 * Portfolio Theme Functions
 */

// Theme Setup
function portfolio_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'portfolio'),
    ));
}
add_action('after_setup_theme', 'portfolio_theme_setup');

// Enqueue scripts and styles
function portfolio_scripts() {
    wp_enqueue_style('portfolio-style', get_stylesheet_uri());
    wp_enqueue_style('portfolio-custom-style', get_template_directory_uri() . '/css/style.css', array('portfolio-style'), '3.0.0');
    wp_enqueue_script('portfolio-animations', get_template_directory_uri() . '/js/animations.js', array(), '3.1.0', true);
    wp_enqueue_script('portfolio-main-js', get_template_directory_uri() . '/js/main.js', array('portfolio-animations'), '3.1.0', true);
}
add_action('wp_enqueue_scripts', 'portfolio_scripts');

// Register widget areas
function portfolio_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'portfolio'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in your footer.', 'portfolio'),
        'before_widget' => '<div class="widget %1$s %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'portfolio_widgets_init');

// Custom excerpt length
function portfolio_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'portfolio_excerpt_length');

// Custom excerpt more
function portfolio_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'portfolio_excerpt_more');

/**
 * WhatsApp number: country code + number, no + or leading 0
 * Example Sri Lanka: 94771234567
 */
function portfolio_whatsapp_number() {
    return '94763251835';
}

function portfolio_whatsapp_url($message = '') {
    $number = preg_replace('/\D/', '', portfolio_whatsapp_number());
    $url = 'https://wa.me/' . $number;
    if ($message) {
        $url .= '?text=' . rawurlencode($message);
    }
    return $url;
}

function portfolio_whatsapp_icon($size = 24) {
    $size = (int) $size;
    return '<svg class="whatsapp-icon" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';
}
