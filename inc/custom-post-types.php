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
        /*
         * 'custom-fields' is what actually makes WordPress register a
         * generic REST `meta` field for this post type - without it,
         * register_post_meta() entries (inc/seo.php's Rank Math fields)
         * never appear in the REST schema at all, regardless of how
         * they're registered. page/post get this for free from core;
         * custom post types don't unless asked for explicitly.
         */
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
        'template'     => array(
            array( 'core/paragraph', array( 'placeholder' => __( 'The client\'s problem, in plain English...', 'dandt-theme' ) ) ),
        ),
    ) );
}
add_action( 'init', 'dandt_register_service_type' );

/**
 * Group services into the five categories the Services hub page lists under
 * (Accounting & Tax Returns, Bookkeeping & VAT, Payroll, Company Formation &
 * Startup Support, Business Advice & Financial Planning). A plain taxonomy
 * rather than a hardcoded grouping, so which services sit under which
 * heading is an editorial choice made in wp-admin, not a code change.
 */
function dandt_register_service_group_taxonomy() {
    register_taxonomy( 'service_group', 'service', array(
        'labels' => array(
            'name'          => __( 'Service Groups', 'dandt-theme' ),
            'singular_name' => __( 'Service Group', 'dandt-theme' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    ) );
}
add_action( 'init', 'dandt_register_service_group_taxonomy' );

/**
 * Seed the five service group terms once, in the brief's stated order.
 * Re-running is harmless: term_exists() skips anything already there.
 */
function dandt_seed_service_groups() {
    if ( get_option( 'dandt_service_groups_seeded' ) ) {
        return;
    }
    $groups = array(
        __( 'Accounting & Tax Returns', 'dandt-theme' ),
        __( 'Bookkeeping & VAT', 'dandt-theme' ),
        __( 'Payroll', 'dandt-theme' ),
        __( 'Company Formation & Startup Support', 'dandt-theme' ),
        __( 'Business Advice & Financial Planning', 'dandt-theme' ),
    );
    foreach ( $groups as $order => $name ) {
        if ( ! term_exists( $name, 'service_group' ) ) {
            $result = wp_insert_term( $name, 'service_group' );
            if ( ! is_wp_error( $result ) ) {
                update_term_meta( $result['term_id'], 'dandt_order', $order );
            }
        }
    }
    update_option( 'dandt_service_groups_seeded', true, false );
}
add_action( 'init', 'dandt_seed_service_groups', 21 );

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
        /*
         * 'custom-fields' is what actually makes WordPress register a
         * generic REST `meta` field for this post type - without it,
         * register_post_meta() entries (inc/seo.php's Rank Math fields)
         * never appear in the REST schema at all, regardless of how
         * they're registered. page/post get this for free from core;
         * custom post types don't unless asked for explicitly.
         */
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
    ) );
}
add_action( 'init', 'dandt_register_location_type' );
