<?php

add_action('init', 'news_custom_init');
function news_custom_init(){
    register_post_type('news', array(
        'labels'             => array(
            'name'               => 'News', // Основное название типа записи
            'singular_name'      => 'News', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new news',
            'edit_item'          => 'Edit news',
            'new_item'           => 'New news',
            'view_item'          => 'See news',
            'search_items'       => 'Find news',
            'not_found'          => 'News not found',
            'not_found_in_trash' => 'News not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'News'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-welcome-write-blog',
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

function shapeSpace_enable_gutenberg_news_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('news' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_news_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_news_type', 10, 2);