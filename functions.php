<?php
if (!defined('ABSPATH')) exit;

// Theme Setup
function cmpa_setup() {
    load_theme_textdomain('cmpa', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 90,
        'width'       => 90,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('custom-header');
    add_theme_support('custom-background');

    register_nav_menus(array(
        'primary' => __('Menu Principal', 'cmpa'),
    ));
}
add_action('after_setup_theme', 'cmpa_setup');

// Include required files
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/text-to-speech.php';

// Widgets
function cmpa_widgets_init() {
    // ... (previous widget registrations remain unchanged)
}
add_action('widgets_init', 'cmpa_widgets_init');