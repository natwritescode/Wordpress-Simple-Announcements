<?php

/**
 * Load the stylesheets for the parent theme and the custom styles for
 * announcements
 */
function nwc_simple_announcements_enqueue_styles() {
    
    /**
     * Load the parent theme first
     */
    wp_enqueue_style('parent-style',
            get_template_directory_uri() . '/style.css');
    
    /**
     * Load the child theme (styles for the simple announcement post type)
     */
    wp_enqueue_style('child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array('parent-style'));
}

/**
 * Tell Wordpress to run above function when it's loading scripts
 */
add_action('wp_enqueue_scripts', 'nwc_simple_announcements_enqueue_styles');

/**
 * Add a megaphone dashicon to the front of the announcement's title
 */
function nwc_simple_announcements_add_megaphone($title, $id = null) {
    
    /**
     * Make sure this only applies to announcement post types
     */
    if (get_post_type($id) === 'announcement') {
        
        /**
         * Prepend the megaphone dashicon to the title
         */
        $filtered_title = '<span class="dashicons dashicons-megaphone announcement-dashicons"></span>' . $title;
        
        /**
         * Return the modified title
         */
        return $filtered_title;
    }
    
    /**
     * Do nothing with the title if it's not an announcement
     */
    else {
        return $title;
    }
    
}

/**
 * Add the announcement post type to the front page post query
 */
function nwc_simple_announcements_add_to_home($query) {
    
    /**
     * Make sure we're looking at the default front page
     */
    if ($query->is_home() && $query->is_main_query()) {
        
        /**
         * Only add announcements if the plugin is enabled and the post type
         * exists
         */
        if (post_type_exists('announcement')) {
        
            /**
            * Show posts and announcements
            */
            $query->set('post_type', array('post', 'announcement'));

            /**
             * Add a megaphone dashicon to the announcement title when it's
             * viewed from the front page
             */
            add_filter('the_title', 'nwc_simple_announcements_add_megaphone');
        }
    }
}

/**
 * Run the above function before querying posts for the front page
 */
add_action('pre_get_posts', 'nwc_simple_announcements_add_to_home');

