<?php
/**
 * Custom post types for repeating page structures.
 *
 * Service and location pages all follow the same shape (see the single
 * templates and the block patterns in inc/block-patterns.php), so each is a
 * post type with one shared template rather than N hand-written PHP files.
 * Content lives entirely in the block editor (the_content()) so the client
 * can edit and add entries without touching code - no custom fields, no ACF
 * dependency.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the "service" post type (14 service pages, URLs /services/{slug}/).
 */
function dandt_register_service_type() {
    register_post_type( 'service', array(
        'labels' => array(
            'name'          => __( 'Services', 'dandt-theme' ),
            'singular_name' => __( 'Service', 'dandt-theme' ),
            'add_new_item'  => __( 'Add New Service', 'dandt-theme' ),
            'edit_item'     => __( 'Edit Service', 'dandt-theme' ),
        ),
        'public'       => true,
        'show_in_rest' => true,
        'has_archive'  => false,
        'rewrite'      => array( 'slug' => 'services', 'with_front' => false ),
        'menu_icon'    => 'dashicons-briefcase',
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'template'     => array(
            array( 'core/paragraph', array( 'placeholder' => __( 'The client\'s problem, in plain English...', 'dandt-theme' ) ) ),
        ),
    ) );
}
add_action( 'init', 'dandt_register_service_type' );

/**
 * Register the "location" post type (5 Who We Help landing pages, URLs
 * /who-we-help/{slug}/).
 */
function dandt_register_location_type() {
    register_post_type( 'location', array(
        'labels' => array(
            'name'          => __( 'Who We Help', 'dandt-theme' ),
            'singular_name' => __( 'Audience', 'dandt-theme' ),
            'add_new_item'  => __( 'Add New Audience Page', 'dandt-theme' ),
            'edit_item'     => __( 'Edit Audience Page', 'dandt-theme' ),
        ),
        'public'       => true,
        'show_in_rest' => true,
        'has_archive'  => false,
        'rewrite'      => array( 'slug' => 'who-we-help', 'with_front' => false ),
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
    ) );
}
add_action( 'init', 'dandt_register_location_type' );
