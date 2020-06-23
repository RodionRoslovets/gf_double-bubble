<?php


add_action('init', 'villas_custom_init');
function villas_custom_init(){
    register_post_type('villas', array(
        'labels'             => array(
            'name'               => 'Villas', // Основное название типа записи
            'singular_name'      => 'Villa', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new villa',
            'edit_item'          => 'Edit villa',
            'new_item'           => 'New villa',
            'view_item'          => 'See villa',
            'search_items'       => 'Find villa',
            'not_found'          =>  'Villas not found',
            'not_found_in_trash' => 'Villas not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Villas'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest'       => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );
}

function shapeSpace_enable_gutenberg_villas_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('villas' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_villas_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_villas_type', 10, 2);