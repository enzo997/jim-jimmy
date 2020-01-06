<?php
define('THEME_URI', get_template_directory_uri());
define('DF_IMAGE', THEME_URI. '/assets/images/default');
define('TP_PART', THEME_URI. '/template-part');
define('THEME_PATH', get_template_directory());
define('THEME_DIR', get_template_directory());
include TEMPLATEPATH .'/function/function.php';
include TEMPLATEPATH .'/function/action-hook.php';
include TEMPLATEPATH .'/function/hook-function.php';

// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-field';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-field';
    return $paths;
}

// ADD CSS AND JS
function jimjimmy_style() {
	$date = date('l jS \of F Y h:i:s A');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('slick', THEME_URI. '/assets/css/slick.css');
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome5', THEME_URI. '/assets/fonts/fontawesome/css/all.css');

    // Add CSS Animation
    wp_enqueue_style('animate', THEME_URI.'/assets/css/animate.css?'.$date);

    // Add CSS 
    wp_enqueue_style('main', THEME_URI.'/assets/css/main.css?'.$date);
    wp_enqueue_style('main-WP', THEME_URI.'/assets/css/main-WP.css?'.$date);

    // Add JS
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.js', '','' , true);
    wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.1.0.js', '','' , true);
    wp_enqueue_script( 'bootstrap', THEME_URI. '/assets/js/bootstrap.min.js', '','' , true);
    wp_enqueue_script( 'slick', THEME_URI. '/assets/js/slick.min.js', '','' , true);
    wp_enqueue_script( 'animation', THEME_URI. '/assets/js/WOW.js', '','' , true);
    wp_enqueue_script( 'ajax', THEME_URI. '/assets/js/ajax.js?'.$date, '','' , true);
    wp_enqueue_script( 'main', THEME_URI. '/assets/js/main.js?'.$date, '','' , true);

    wp_localize_script('ajax', 'ajax_var', array('url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'jimjimmy_style' );

// Menu
register_nav_menus(
    array(
        'main_menu'  => __( 'Main Menu' ),
    )
);
//acf_add_options_page('Theme Options');
if( function_exists('acf_add_options_page') ) {
    $parent = acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'Theme Option',
        'parent_slug'   => '',
        'redirect'      => false,
        'position'      => false,
        'icon_url'      => false,
    ));
}
// remove  remove_post_type_support editor and add plugin classic Editor
add_action( 'init', function() {
	remove_post_type_support( 'page', 'editor' );	
    // remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'gallery', 'editor' );
}, 99);


