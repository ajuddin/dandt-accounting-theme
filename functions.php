<?php
/**
 * D&T Accounting theme bootstrap.
 *
 * Classic WordPress theme, no build step. Styles and scripts are enqueued
 * directly from style.css / assets/js.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/*
 * Bump this on every commit that touches style.css or assets/js/main.js.
 * It's the cache-busting query string on the enqueued URL - leaving it
 * unchanged means visitors' browsers keep serving their own locally
 * cached copy indefinitely, even after the server-side file changes.
 * (This is exactly what caused the broken giant-logo render reported
 * after the header rework - four CSS-touching commits shipped after the
 * version was last bumped.)
 */
define( 'DANDT_VERSION', '1.13.0' );

/**
 * Theme setup: menus, image sizes, title-tag support.
 */
function dandt_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    /*
     * Service/location pages and blog posts are authored entirely in the
     * block editor (see inc/custom-post-types.php), so the editor needs to
     * preview what the front end actually looks like. Reusing style.css
     * keeps one source of truth instead of a parallel editor stylesheet.
     */
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );
    add_theme_support( 'wp-block-styles' );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'dandt-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'dandt_setup' );

/**
 * Enqueue the theme stylesheet and the single shared script.
 */
function dandt_enqueue_assets() {
    wp_enqueue_style( 'dandt-style', get_stylesheet_uri(), array(), DANDT_VERSION );
    wp_enqueue_script( 'dandt-main', get_theme_file_uri( '/assets/js/main.js' ), array(), DANDT_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'dandt_enqueue_assets' );

/**
 * The firm's core contact details, used sitewide (header, footer, contact
 * page, structured data). Single source so they can never drift apart again
 * the way the old site's About and Contact pages disagreed on the address.
 *
 * NOTE: the address below is carried over from the live site's Contact page
 * as the more complete of the two addresses it showed. CONFIRM this before
 * launch and update here only.
 *
 * @return array{phone:string,phone_href:string,email:string,address_lines:string[],hours:string}
 */
function dandt_business_details() {
    return array(
        'phone'         => '+44 (0) 7894 471378',
        'phone_href'    => '+447894471378',
        'email'         => 'info@dandtaccounting.co.uk',
        'address_lines' => array(
            'Hamptons Sports and Leisure',
            'Tydemans, Great Baddow',
            'Chelmsford CM2 9FH',
        ),
        'hours'         => '9:00am - 5:00pm, Monday to Friday',
    );
}

/**
 * Flush rewrite rules once whenever a post type's URL structure changes.
 * Without this, new post types 404 until something triggers a flush -
 * normally a manual theme deactivate/reactivate, which this avoids.
 */
function dandt_maybe_flush_rewrites() {
    if ( get_option( 'dandt_rewrite_version' ) !== DANDT_VERSION ) {
        flush_rewrite_rules();
        update_option( 'dandt_rewrite_version', DANDT_VERSION, false );
    }
}
add_action( 'init', 'dandt_maybe_flush_rewrites', 20 );

/**
 * 301 redirects for retired URLs. Add an entry here whenever a page's slug
 * changes rather than letting the old URL quietly 404 - each key is a path
 * relative to the site root, trailing slash included.
 *
 * @return array<string,string>
 */
function dandt_legacy_redirects() {
    return array(
        '/about/' => '/about-us/',
    );
}

/**
 * Issue the 301s listed above.
 */
function dandt_handle_legacy_redirects() {
    $path = untrailingslashit( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ) ) . '/';
    $map  = dandt_legacy_redirects();

    if ( isset( $map[ $path ] ) ) {
        wp_safe_redirect( home_url( $map[ $path ] ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'dandt_handle_legacy_redirects' );

/**
 * Require theme includes.
 */
require_once get_theme_file_path( '/inc/contact-form.php' );
require_once get_theme_file_path( '/inc/icons.php' );
require_once get_theme_file_path( '/inc/custom-post-types.php' );
require_once get_theme_file_path( '/inc/block-patterns.php' );
require_once get_theme_file_path( '/inc/seo.php' );
require_once get_theme_file_path( '/inc/lets-chat.php' );
require_once get_theme_file_path( '/inc/testimonials.php' );
