<?php
function university_post_types() {
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
}
add_action('init','university_post_types');