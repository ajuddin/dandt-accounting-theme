<?php
/**
 * 404 template.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-404 dandt-container">
    <p class="dandt-profile-role"><?php esc_html_e( '404', 'dandt-theme' ); ?></p>
    <h1 class="dandt-h1"><?php esc_html_e( 'Page not found', 'dandt-theme' ); ?></h1>
    <p class="dandt-body" style="margin-left: auto; margin-right: auto;"><?php esc_html_e( 'The page you are looking for does not exist. It may have moved.', 'dandt-theme' ); ?></p>
    <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'dandt-theme' ); ?></a>
</section>

<?php get_footer(); ?>
