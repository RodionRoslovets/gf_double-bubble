<?php

add_action('init', 'restaurants_custom_init');
function restaurants_custom_init(){
    register_post_type('restaurants', array(
        'labels'             => array(
            'name'               => 'Restaurants', // Основное название типа записи
            'singular_name'      => 'Restaurant', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new restaurant',
            'edit_item'          => 'Edit restaurant',
            'new_item'           => 'New restaurant',
            'view_item'          => 'See restaurant',
            'search_items'       => 'Find restaurant',
            'not_found'          => 'Restaurants not found',
            'not_found_in_trash' => 'Restaurants not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Restaurants'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-store',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'delete_with_user'   => true,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );
}

function shapeSpace_enable_gutenberg_restaurants_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('clubs' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_restaurants_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_restaurants_type', 10, 2);