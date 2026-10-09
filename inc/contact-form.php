<?php
/**
 * Contact form: validate, email the firm, redirect back with a status flag.
 *
 * A plain POST + redirect rather than AJAX, so it keeps working with
 * JavaScript disabled. No database storage for v1 - submissions are emails
 * only. Add a storage table if the client later wants a submissions log in
 * wp-admin.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handle the contact form submission.
 */
function dandt_handle_contact_form() {
    if ( ! isset( $_POST['dandt_contact_nonce'] ) || ! wp_verify_nonce( $_POST['dandt_contact_nonce'], 'dandt_contact' ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ?: home_url( '/contact/' ) ) );
        exit;
    }

    // Honeypot: real visitors never fill this hidden field in.
    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ?: home_url( '/contact/' ) ) );
        exit;
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

    $redirect = wp_get_referer() ?: home_url( '/contact/' );

    if ( '' === $name || ! is_email( $email ) || '' === $message ) {
        wp_safe_redirect( add_query_arg( 'contact', 'error', $redirect ) );
        exit;
    }

    $details = dandt_business_details();

    $body  = sprintf( "New enquiry from the website contact form.\n\n" );
    $body .= sprintf( "Name: %s\n", $name );
    $body .= sprintf( "Email: %s\n", $email );
    $body .= sprintf( "Phone: %s\n", $phone ?: '-' );
    $body .= sprintf( "\nMessage:\n%s\n", $message );

    $sent = wp_mail(
        $details['email'],
        sprintf( '[Website enquiry] %s', $name ),
        $body,
        array( 'Reply-To: ' . $name . ' <' . $email . '>' )
    );

    wp_safe_redirect( add_query_arg( 'contact', $sent ? 'success' : 'error', $redirect ) );
    exit;
}
add_action( 'admin_post_dandt_contact', 'dandt_handle_contact_form' );
add_action( 'admin_post_nopriv_dandt_contact', 'dandt_handle_contact_form' );
