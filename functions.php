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

define( 'DANDT_VERSION', '1.0.0' );

/**
 * Theme setup: menus, image sizes, title-tag support.
 */
function dandt_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

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
 * Require theme includes.
 */
require_once get_theme_file_path( '/inc/contact-form.php' );
require_once get_theme_file_path( '/inc/icons.php' );
