<?php
/*
Plugin Name: DGTheme KC Extensions
Plugin URI: http://dgtheme.com/shortcodes
Description: DGTheme KC Extensions is a plugin that adds several useful shortcodes to KingComposer Page Builder.
Version: 1.0
Author: DGTheme
Author URI: https://themeforest.net/user/dgtheme
*/

// DEFINE PATHS
define( 'DGTKCE_PATH', plugin_dir_path( __FILE__ ) );
define( 'DGTKCE_URL', plugin_dir_url( __FILE__ ) );

// REGISTER SCRIPTS
function dgtkce_register_admin_scripts() {

    wp_register_script('backend-scripts', DGTKCE_URL . 'assets/js/backend-scripts.js', array( 'jquery' ), '', true);

    wp_enqueue_script('backend-scripts');

}
add_action( 'admin_enqueue_scripts', 'dgtkce_register_admin_scripts' );

function dgtkce_register_admin_styles() {

    wp_register_style( 'admin', DGTKCE_URL . 'assets/css/admin.css', array(), '', 'all' );

    wp_enqueue_style('admin');

}
if ( is_admin() ) {

    add_action( 'admin_print_styles', 'dgtkce_register_admin_styles' );
}

function dgtkce_register_scripts() {

    wp_register_script('fractionslider', DGTKCE_URL . 'assets/js/fractionslider.js', array( 'jquery' ), '', true);
    wp_register_script('frontend-scripts', DGTKCE_URL . 'assets/js/frontend-scripts.js', array( 'jquery' ), '', true);

    wp_enqueue_script('fractionslider');
    wp_enqueue_script('frontend-scripts');

}
add_action('wp_enqueue_scripts', 'dgtkce_register_scripts');

// REGISTER STYLES
function dgtkce_register_styles() {

    wp_register_style( 'dgtkce-style', DGTKCE_URL . 'assets/css/style.css', array(), '', 'all' );
    wp_register_style( 'fractionslider', DGTKCE_URL . 'assets/css/fractionslider.css', array(), '', 'all' );
    wp_register_style( 'testyle', false);

    wp_enqueue_style( 'dgtkce-style');
    wp_enqueue_style( 'fractionslider');
    wp_enqueue_style( 'testyle');

}
add_action('wp_enqueue_scripts', 'dgtkce_register_styles');

// INCLUDE FILES
require_once DGTKCE_PATH . 'include/dgtkce_render_css.php';

require_once DGTKCE_PATH . 'shortcodes/dgtkce_slider.php';
require_once DGTKCE_PATH . 'shortcodes/dgtkce_slide.php';
require_once DGTKCE_PATH . 'shortcodes/dgtkce_slide_title.php';
require_once DGTKCE_PATH . 'shortcodes/dgtkce_slide_description.php';
require_once DGTKCE_PATH . 'shortcodes/dgtkce_slide_button.php';
require_once DGTKCE_PATH . 'shortcodes/dgtkce_section_shapes.php';

require_once DGTKCE_PATH . 'maps/dgtkce_slider.php';
require_once DGTKCE_PATH . 'maps/dgtkce_slide.php';
require_once DGTKCE_PATH . 'maps/dgtkce_slide_title.php';
require_once DGTKCE_PATH . 'maps/dgtkce_slide_description.php';
require_once DGTKCE_PATH . 'maps/dgtkce_slide_button.php';
require_once DGTKCE_PATH . 'maps/dgtkce_section_shapes.php';

?>