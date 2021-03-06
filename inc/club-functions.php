<?php

add_action('init', 'clubs_custom_init');
function clubs_custom_init(){
    register_post_type('clubs', array(
        'labels'             => array(
            'name'               => 'Clubs', // Основное название типа записи
            'singular_name'      => 'Club', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new club',
            'edit_item'          => 'Edit club',
            'new_item'           => 'New club',
            'view_item'          => 'See club',
            'search_items'       => 'Find club',
            'not_found'          => 'Clubs not found',
            'not_found_in_trash' => 'Clubs not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Clubs'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-palmtree',
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

function shapeSpace_enable_gutenberg_clubs_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('clubs' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_clubs_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_clubs_type', 10, 2);