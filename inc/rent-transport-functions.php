<?php

add_action('init', 'rent_transport_custom_init');
function rent_transport_custom_init(){
    register_post_type('rent-transport', array(
        'labels'             => array(
            'name'               => 'Rent transport', // Основное название типа записи
            'singular_name'      => 'Rent transport', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new rent transport',
            'edit_item'          => 'Edit rent transport',
            'new_item'           => 'New rent transport',
            'view_item'          => 'See rent transport',
            'search_items'       => 'Find rent transport',
            'not_found'          => 'Rent transport not found',
            'not_found_in_trash' => 'Rent transport not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Rent transport'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-admin-network',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'delete_with_user'   => true,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
        'taxonomies'  => array( 'category' ),
    ) );
}

function shapeSpace_enable_gutenberg_rent_transport_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('rent_transport' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_rent_transport_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_rent_transport_type', 10, 2);