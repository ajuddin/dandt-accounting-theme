<?php
/**
 * Contact page. Matched automatically to the "contact" slug.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dandt  = dandt_business_details();
$status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Get in touch', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Tell us about your business and we will get back to you within one working day.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-contact-grid">

        <div class="dandt-contact-info">
            <div class="dandt-contact-item">
                <?php dandt_icon( 'phone' ); ?>
                <div>
                    <strong><?php esc_html_e( 'Phone', 'dandt-theme' ); ?></strong><br>
                    <a href="tel:<?php echo esc_attr( $dandt['phone_href'] ); ?>"><?php echo esc_html( $dandt['phone'] ); ?></a>
                </div>
            </div>
            <div class="dandt-contact-item">
                <?php dandt_icon( 'mail' ); ?>
                <div>
                    <strong><?php esc_html_e( 'Email', 'dandt-theme' ); ?></strong><br>
                    <a href="mailto:<?php echo esc_attr( $dandt['email'] ); ?>"><?php echo esc_html( $dandt['email'] ); ?></a>
                </div>
            </div>
            <div class="dandt-contact-item">
                <?php dandt_icon( 'map-pin' ); ?>
                <div>
                    <strong><?php esc_html_e( 'Address', 'dandt-theme' ); ?></strong><br>
                    <?php /* CONFIRM: the old site showed two different addresses on About vs Contact. This is the fuller one (with postcode); please verify before launch. */ ?>
                    <?php foreach ( $dandt['address_lines'] as $line ) : ?>
                        <?php echo esc_html( $line ); ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="dandt-contact-item">
                <?php dandt_icon( 'clock' ); ?>
                <div>
                    <strong><?php esc_html_e( 'Hours', 'dandt-theme' ); ?></strong><br>
                    <?php echo esc_html( $dandt['hours'] ); ?>
                </div>
            </div>
        </div>

        <div>
            <?php if ( 'success' === $status ) : ?>
                <p class="dandt-form-status is-success" role="status">
                    <?php esc_html_e( 'Thank you - your message has been sent. We will be in touch within one working day.', 'dandt-theme' ); ?>
                </p>
            <?php elseif ( 'error' === $status ) : ?>
                <p class="dandt-form-status is-error" role="alert">
                    <?php esc_html_e( 'Something went wrong sending your message. Please try again, or email us directly.', 'dandt-theme' ); ?>
                </p>
            <?php endif; ?>

            <form class="dandt-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <input type="hidden" name="action" value="dandt_contact">
                <?php wp_nonce_field( 'dandt_contact', 'dandt_contact_nonce' ); ?>
                <p class="dandt-honeypot" aria-hidden="true">
                    <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                </p>

                <div class="dandt-field">
                    <label for="dandt-name"><?php esc_html_e( 'Your name', 'dandt-theme' ); ?></label>
                    <input type="text" id="dandt-name" name="name" required autocomplete="name">
                </div>
                <div class="dandt-field">
                    <label for="dandt-email"><?php esc_html_e( 'Email address', 'dandt-theme' ); ?></label>
                    <input type="email" id="dandt-email" name="email" required autocomplete="email">
                </div>
                <div class="dandt-field">
                    <label for="dandt-phone"><?php esc_html_e( 'Phone number (optional)', 'dandt-theme' ); ?></label>
                    <input type="tel" id="dandt-phone" name="phone" autocomplete="tel">
                </div>
                <div class="dandt-field">
                    <label for="dandt-message"><?php esc_html_e( 'How can we help?', 'dandt-theme' ); ?></label>
                    <textarea id="dandt-message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="dandt-btn dandt-btn-primary"><?php esc_html_e( 'Send Message', 'dandt-theme' ); ?></button>
            </form>
        </div>

    </div>
</section>

<?php get_footer(); ?>
