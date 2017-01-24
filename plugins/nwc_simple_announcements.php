<?php

/**
* Plugin Name: Simple Announcements
* Description: Creates simple announcements for your blog. Uses a Twenty Sixteen child theme.
* Version:     0.1
* Author:      Natalie Mueller
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
**/

/**
 * Create and label the announcement custom post type
 */
function nwc_create_simple_announcements() {
    
    /**
     * Set the singular form for the announcement post type
     */
    $singular = 'Announcement';
    
    /**
     * Set the plural form for the announcement post type
     */
    $plural = 'Announcements';
    
    /**
     * Populate the arguments array so that our announcement post type will
     * show up properly
     */
    $args = array(
        'labels' => array(
            'name' => $plural,
            'singular_name' => $singular,
            'add_new_item' => 'Add New ' . $singular,
            'new_item' => 'New ' . $singular,
            'view_item' => 'View ' . $singular,
            'view_items' => 'View ' . $plural,
            'search_items' => 'Search ' . $plural,
            'not_found' => 'No ' . $plural . ' Found',
            'not_found_in_trash' => 'No ' . $plural . ' Found in Trash',
            'all_items' => 'All ' . $plural,
            'archives' => $plural . ' Archive',
            'attributes' => $singular . ' Attributes',
            'insert_into_item' => 'Insert Into ' . $singular,
            'uploaded_to_this_item' => 'Uploaded to this ' . $singular,
            'filter_items_list' => 'Filter ' . $plural . ' List',
            'items_list_navigation' => $plural . ' List Navigation',
            'items_list' => $plural . ' List',
        ),
        'description' => 'A simple announcement to draw the reader\'s attention',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
            'title', 'editor', 'comments',
        ),
    );
    
    /**
     * Register the custom post type to our wordpress install using the above
     * information
     */
    register_post_type('announcement', $args);
}

/**
 * Tell wordpress to run the above function on initialization
 */
add_action('init', 'nwc_create_simple_announcements');


/**
 * Removing the custom post type is not necessary because deactivating the
 * plugin does this for us
 */
//function nwc_remove_simple_announcements() {
//    unregister_post_type('announcement');
//}
//
//register_deactivation_hook(__FILE__, 'nwc_remove_simple_announcements');