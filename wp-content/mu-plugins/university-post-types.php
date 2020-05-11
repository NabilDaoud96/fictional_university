<?php
function university_post_types() {
    // Event Post Type
    register_post_type('event', array(
        'has_archive' => true,
        'public' => true,
        'menu_icon'   => 'dashicons-calendar',
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
        ),
        'rewrite' => array(
            'slug' => 'events',
        ),
        'supports' => array(
            'title', 'editor', 'excerpt'
        ),
    ));

    // Professor Post Type
    register_post_type('professor', array(
        'public' => true,
        'menu_icon'   => 'dashicons-welcome-learn-more',
        'labels' => array(
            'name' => 'Professors',
            'singular_name' => 'Professor',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professors',
        ),
        'supports' => array(
            'title', 'editor', 'thumbnail'
        ),

    ));

    // Program Post Type
    register_post_type('programme', array(
        'has_archive' => true,
        'public' => true,
        'menu_icon'   => 'dashicons-awards',
        'labels' => array(
            'name' => 'Programs',
            'singular_name' => 'Program',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
        ),
        'rewrite' => array(
            'slug' => 'programs',
        ),
        'supports' => array(
            'title', 'editor',
        ),
    ));
}
add_action('init','university_post_types');