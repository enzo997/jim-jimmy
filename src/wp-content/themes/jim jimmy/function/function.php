<?php
//===================== SET UP ACF CUSTOME POST TYPE======================//
function nt_create_post_type($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];

    register_post_type($post_type, array(
        'labels' => array(
            'name' => __($name),
            'singular_name' => __($single),
            'add_new' => __('Add New '.$single),
            'add_new_item' => __('Add New '.$single),
            'edit_item' => __('Edit '.$single),
            'new_item' => __('New '.$single),
            'all_items' => __('All '.$name),
            'view_item' => __('View '.$single),
            'search_items' => __('Search '.$name),
            'not_found' => __('Not Found '.$single),
            'not_found_in_trash' => __('Not Found '.$single.' In Trash'),
            'parent_item_colon' => '',
            'menu_name' => __($name)
        ),
        'public' => true,
        // 'menu_icon'   => 'dashicons-star-half',// Add icon for custom post type
        'menu_icon' => $icon,
        'exclude_from_search' => false,
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => array($post_type),
        'rewrite' => array('slug' => $slug),
        'supports' => array('title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'author')
    ));
}
function nt_create_taxonomy($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $taxonomy = $args['taxonomy'];

    $labels = array(
        'name' => __($name),
        'singular_name' => __($single),
        'search_items' => __('Search '.$name),
        'popular_items' => __('Popular '.$name),
        'all_items' => __('All '.$name),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit '.$single),
        'update_item' => __('Update '.$single),
        'add_new_item' => __('Add '.$single),
        'new_item_name' => __('New '.$single),
        'menu_name' => __($name),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    );
    register_taxonomy($taxonomy, $post_type, $args);
}
//=========== ADD Custom post type and taxaonomy ===========//
function create_new_custom_post_type_and_taxonomy(){
    //=== Add post type our marquess ===//
    $args = array(
        "post_type" => 'our-marquees',
        "name" => "Our Marquees",
        "single" => "Our Marquees",
        "slug" => "our-marquees",
        'menu_icon'   => 'dashicons-star-half'
    );
    nt_create_post_type($args);
    
    //=== Add post type Gallery ===//
    $args_1 = array(
        "post_type" => 'gallery',
        "name" => "Gallery",
        "single" => "Gallery",
        "slug" => "gallery",
        'menu_icon'   => 'dashicons-images-alt2'
    );
    nt_create_post_type($args_1);
    //=== Add taxaonomy Gallery ===//
    $args_1 = array(
        "post_type" => array('gallery'),
        "name" => "Categories Gallery",
        "single" => "categories-gallery",
        "slug" => "categories-gallery",
        "taxonomy" => "categories-gallery"
    );
    nt_create_taxonomy($args_1);
}
add_action('init', 'create_new_custom_post_type_and_taxonomy');

//=========== Add custom image size ===========//
add_filter('intermediate_image_sizes_advanced', 'hero_remove_default_image_sizes');
function hero_remove_default_image_sizes( $sizes) {
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	unset( $sizes['medium_large']);
	return $sizes;
}
add_action( 'after_setup_theme', 'pp_setup' );
function pp_setup() {
    load_theme_textdomain( 'pp' );
    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumb-featured', 300, 201, true);
    // add_image_size( 'thumb-530x369', 530, 369, true);
    // add_image_size( 'thumb-561x374', 561, 374, true);
    // add_image_size( 'thumb-400x268', 400, 268, true);
    add_image_size( 'thumb-636x424', 636, 424, true);
}
//=========== ADD Custom post type and taxaonomy ===========//

//=========== upload svg or svgz ===========//
function my_custom_mime_types( $mimes ) {
    
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

//=============== Add file post-thumbnails ===========//
add_theme_support( 'post-thumbnails' );

//===================get link by slug ================//
function get_hr_link($name){
    if($link = get_permalink( get_page_by_path( $name ) ))
        return $link;
    return '#';
}
//==================== Limit Character ==============//
function excerpt($content, $limit="50", $more='…') {
    $excerpt = explode(' ', $content, $limit);
    
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(' ',$excerpt).$more;
    } else {
        $excerpt = implode(' ',$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}









