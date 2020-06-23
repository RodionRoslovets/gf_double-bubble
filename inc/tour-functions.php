<?php

add_action('init', 'tours_custom_init');
function tours_custom_init(){
    register_post_type('tours', array(
        'labels'             => array(
            'name'               => 'Tours', // Основное название типа записи
            'singular_name'      => 'Tour', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new tour',
            'edit_item'          => 'Edit tour',
            'new_item'           => 'New tour',
            'view_item'          => 'See tour',
            'search_items'       => 'Find tour',
            'not_found'          => 'Tours not found',
            'not_found_in_trash' => 'Tours not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Tours'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-location-alt',
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

function shapeSpace_enable_gutenberg_tours_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('clubs' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_tours_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_tours_type', 10, 2);