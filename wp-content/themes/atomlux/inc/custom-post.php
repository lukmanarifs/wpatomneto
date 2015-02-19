<?php

add_action( 'init', 'register_atom_portfolio' );
add_action( 'init', 'register_atom_service' );
add_action( 'init', 'register_atom_pricing' );
add_action( 'init', 'register_atom_testimonial' );
add_action( 'init', 'register_atom_client' );
add_action( 'init', 'register_atom_gallery' );

/*
* Pricing
*/


function register_atom_pricing() {

    $labels = array( 
        'name' => __( 'Pricing Table', 'atom' ),
        'singular_name' => __( 'Pricing Table', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Pricing Table', 'atom' ),
        'edit_item' => __( 'Edit Pricing Table', 'atom' ),
        'new_item' => __( 'New Pricing Table', 'atom' ),
        'view_item' => __( 'View Pricing Table', 'atom' ),
        'search_items' => __( 'Search Pricing Table', 'atom' ),
        'not_found' => __( 'No pricing found', 'atom' ),
        'not_found_in_trash' => __( 'No pricing table found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Pricing Table:', 'atom' ),
        'menu_name' => __( 'Pricing Table', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'pricing', $args );
}
/*
* Service
*/


function register_atom_service() {

    $labels = array( 
        'name' => __( 'Service', 'atom' ),
        'singular_name' => __( 'Service', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Service', 'atom' ),
        'edit_item' => __( 'Edit Service', 'atom' ),
        'new_item' => __( 'New Service', 'atom' ),
        'view_item' => __( 'View Service', 'atom' ),
        'search_items' => __( 'Search Service', 'atom' ),
        'not_found' => __( 'No service found', 'atom' ),
        'not_found_in_trash' => __( 'No service found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Service:', 'atom' ),
        'menu_name' => __( 'Service', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail'),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'service', $args );
}

/*
* Portfolio
*/


function register_atom_portfolio() {

    $labels = array( 
        'name' => __( 'Portfolio', 'atom' ),
        'singular_name' => __( 'Portfolio', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Portfolio', 'atom' ),
        'edit_item' => __( 'Edit Portfolio', 'atom' ),
        'new_item' => __( 'New Portfolio', 'atom' ),
        'view_item' => __( 'View Portfolio', 'atom' ),
        'search_items' => __( 'Search Portfolio', 'atom' ),
        'not_found' => __( 'No portfolio found', 'atom' ),
        'not_found_in_trash' => __( 'No portfolio found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'atom' ),
        'menu_name' => __( 'Portfolio', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'thumbnail', 'post-formats' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'portfolio', $args );
}



/*
* Testimonial
*/

function register_atom_testimonial() {

    $labels = array( 
        'name' => __( 'Testimonial', 'atom' ),
        'singular_name' => __( 'Testimonial', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Testimonial', 'atom' ),
        'edit_item' => __( 'Edit Testimonial', 'atom' ),
        'new_item' => __( 'New Testimonial', 'atom' ),
        'view_item' => __( 'View Testimonial', 'atom' ),
        'search_items' => __( 'Search Testimonial', 'atom' ),
        'not_found' => __( 'No testimonial found', 'atom' ),
        'not_found_in_trash' => __( 'No testimonial found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Testimonial:', 'atom' ),
        'menu_name' => __( 'Testimonial', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'testimonial', $args );
}


/*
* CLIENT
*/

function register_atom_client() {

    $labels = array( 
        'name' => __( 'Client', 'atom' ),
        'singular_name' => __( 'Client', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Client', 'atom' ),
        'edit_item' => __( 'Edit Client', 'atom' ),
        'new_item' => __( 'New Client', 'atom' ),
        'view_item' => __( 'View Client', 'atom' ),
        'search_items' => __( 'Search Client', 'atom' ),
        'not_found' => __( 'No client found', 'atom' ),
        'not_found_in_trash' => __( 'No client found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Client:', 'atom' ),
        'menu_name' => __( 'Client', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title' , 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
	
    register_post_type( 'client', $args );	
	
}


/*
* GALLERY
*/



function register_atom_gallery() {

    $labels = array( 
        'name' => __( 'Gallery', 'atom' ),
        'singular_name' => __( 'Gallery', 'atom' ),
        'add_new' => __( 'Add New', 'atom' ),
        'add_new_item' => __( 'Add New Gallery', 'atom' ),
        'edit_item' => __( 'Edit Gallery', 'atom' ),
        'new_item' => __( 'New Gallery', 'atom' ),
        'view_item' => __( 'View Gallery', 'atom' ),
        'search_items' => __( 'Search Gallery', 'atom' ),
        'not_found' => __( 'No gallery found', 'atom' ),
        'not_found_in_trash' => __( 'No gallery found in Trash', 'atom' ),
        'parent_item_colon' => __( 'Parent Gallery:', 'atom' ),
        'menu_name' => __( 'Gallery', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title' , 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        "menu_position" => 35,
        
        'menu_icon' => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16',
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
	
    register_post_type( 'gallery', $args );	
	
	$labels = array( 
        'name' => __( 'Gallery Folder', 'atom' ),
        'singular_name' => __( 'Gallery Folder', 'atom' ),
        'search_items' => __( 'Search Gallery Folder', 'atom' ),
        'popular_items' => __( 'Popular Gallery Folder', 'atom' ),
        'all_items' => __( 'All Gallery Folder', 'atom' ),
        'parent_item' => __( 'Parent Gallery Folder', 'atom' ),
        'parent_item_colon' => __( 'Parent Gallery:', 'atom' ),
        'edit_item' => __( 'Edit Gallery', 'atom' ),
        'update_item' => __( 'Update Gallery', 'atom' ),
        'add_new_item' => __( 'Add New Gallery', 'atom' ),
        'new_item_name' => __( 'New Gallery Folder', 'atom' ),
        'separate_items_with_commas' => __( 'Separate gallery folder with commas', 'atom' ),
        'add_or_remove_items' => __( 'Add or remove Gallery Folder', 'atom' ),
        'choose_from_most_used' => __( 'Choose from most used Gallery Folder', 'atom' ),
        'menu_name' => __( 'Gallery Folder', 'atom' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'gallery-folder', array('gallery'), $args );
}
