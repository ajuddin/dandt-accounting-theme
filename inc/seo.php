<?php
/**
 * Expose Rank Math's SEO title/description meta fields to the REST API.
 *
 * Rank Math doesn't register these for REST access itself (they're built
 * for its own admin/Gutenberg sidebar UI, not programmatic access), but
 * register_post_meta() can expose an existing meta key for REST regardless
 * of which plugin originally defined it, as long as the key name matches
 * exactly what that plugin reads when rendering the actual meta tags. This
 * doesn't modify Rank Math itself - it just opens a REST door to the same
 * values its own UI already reads and writes.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register rank_math_title and rank_math_description for REST read/write
 * on every public content type this theme defines.
 */
function dandt_expose_seo_meta_to_rest() {
    $post_types = array( 'page', 'post', 'service', 'location' );

    foreach ( $post_types as $post_type ) {
        register_post_meta( $post_type, 'rank_math_title', array(
            'show_in_rest' => true,
            'single'       => true,
            'type'         => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        ) );
        register_post_meta( $post_type, 'rank_math_description', array(
            'show_in_rest' => true,
            'single'       => true,
            'type'         => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        ) );
    }
}
add_action( 'init', 'dandt_expose_seo_meta_to_rest' );
