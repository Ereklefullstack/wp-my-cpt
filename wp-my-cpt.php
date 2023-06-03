<?php
/*
Plugin Name: Simple Custom Post Type
Description: A simple plugin to create a custom post type and a custom taxonomy for it.
Version: 1.0
Author: Your Name
*/

// Register Custom Post Type
function simple_custom_post_type() {
    $labels = array(
        'name' => _x('Custom Posts', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Custom Post', 'Post Type Singular Name', 'text_domain'),
    );

    $args = array(
        'label' => __('Custom Post', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    register_post_type('custom_post', $args);
}

add_action('init', 'simple_custom_post_type', 0);

// Register Custom Taxonomy
function simple_custom_taxonomy() {
    $labels = array(
        'name' => _x('Custom Categories', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Custom Category', 'Taxonomy Singular Name', 'text_domain'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('custom_category', array('custom_post'), $args);
}

add_action('init', 'simple_custom_taxonomy', 0);
