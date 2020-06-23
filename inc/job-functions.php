<?php

add_action('init', 'jobs_custom_init');
function jobs_custom_init(){
    register_post_type('jobs', array(
        'labels'             => array(
            'name'               => 'Job', // Основное название типа записи
            'singular_name'      => 'Job', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new job',
            'edit_item'          => 'Edit job',
            'new_item'           => 'New job',
            'view_item'          => 'See job',
            'search_items'       => 'Find job',
            'not_found'          => 'Job not found',
            'not_found_in_trash' => 'Job not found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Job'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-admin-site-alt',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'delete_with_user'   => true,
        'supports'           => array('title','editor','thumbnail','excerpt','comments','custom-fields'),
    ) );
}

function shapeSpace_enable_gutenberg_jobs_type($can_edit, $post) {

    if (empty($post->ID)) return $can_edit;

    if ('club' === $post_type) return true;

    return $can_edit;

}

// Enable Gutenberg for WP < 5.0 beta
add_filter('gutenberg_can_edit_post_type', 'shapeSpace_enable_gutenberg_jobs_type', 10, 2);

// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post_type', 'shapeSpace_enable_gutenberg_jobs_type', 10, 2);