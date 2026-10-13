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
        <p class="dandt-lede"><?php esc_html_e( 'Tell us about your business and we will get back to you as soon as we can.', 'dandt-theme' ); ?></p>
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
                    <?php esc_html_e( 'Thank you - your message has been sent. We will be in touch as soon as we can.', 'dandt-theme' ); ?>
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
                    <label for="dandt-trading-status"><?php esc_html_e( 'Trading status', 'dandt-theme' ); ?></label>
                    <select id="dandt-trading-status" name="trading_status">
                        <option value=""><?php esc_html_e( 'Select...', 'dandt-theme' ); ?></option>
                        <option value="not-yet-trading"><?php esc_html_e( 'Not yet trading', 'dandt-theme' ); ?></option>
                        <option value="sole-trader"><?php esc_html_e( 'Sole trader', 'dandt-theme' ); ?></option>
                        <option value="limited-company"><?php esc_html_e( 'Limited company', 'dandt-theme' ); ?></option>
                        <option value="partnership"><?php esc_html_e( 'Partnership', 'dandt-theme' ); ?></option>
                    </select>
                </div>
                <div class="dandt-field">
                    <label for="dandt-turnover"><?php esc_html_e( 'Approximate annual turnover', 'dandt-theme' ); ?></label>
                    <select id="dandt-turnover" name="turnover_band">
                        <option value=""><?php esc_html_e( 'Select...', 'dandt-theme' ); ?></option>
                        <option value="under-20k"><?php esc_html_e( 'Under £20,000', 'dandt-theme' ); ?></option>
                        <option value="20k-50k"><?php esc_html_e( '£20,000 - £50,000', 'dandt-theme' ); ?></option>
                        <option value="50k-90k"><?php esc_html_e( '£50,000 - £90,000', 'dandt-theme' ); ?></option>
                        <option value="over-90k"><?php esc_html_e( 'Over £90,000 (VAT threshold)', 'dandt-theme' ); ?></option>
                        <option value="not-sure"><?php esc_html_e( 'Not sure yet', 'dandt-theme' ); ?></option>
                    </select>
                </div>
                <div class="dandt-field">
                    <label for="dandt-contact-method"><?php esc_html_e( 'Preferred contact method', 'dandt-theme' ); ?></label>
                    <select id="dandt-contact-method" name="contact_method">
                        <option value="either"><?php esc_html_e( 'Either', 'dandt-theme' ); ?></option>
                        <option value="phone"><?php esc_html_e( 'Phone', 'dandt-theme' ); ?></option>
                        <option value="email"><?php esc_html_e( 'Email', 'dandt-theme' ); ?></option>
                    </select>
                </div>
                <div class="dandt-field">
                    <label for="dandt-message"><?php esc_html_e( 'Services needed / how can we help?', 'dandt-theme' ); ?></label>
                    <textarea id="dandt-message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="dandt-btn dandt-btn-primary"><?php esc_html_e( 'Send Message', 'dandt-theme' ); ?></button>

                <p class="dandt-body" style="font-size: 0.85rem;">
                    <?php esc_html_e( 'What happens next: your enquiry reaches us directly - not a call centre - and we read every one. We\'ll come back to you with either a few follow-up questions or a quote, by whichever contact method you prefer above.', 'dandt-theme' ); ?>
                </p>
            </form>
        </div>

    </div>
</section>

<?php dandt_lets_chat_section(); ?>

<?php
/*
 * Deliberately a nudge, not a second Calendly embed: booking a consultation
 * is its own distinct action (see page-book-a-consultation.php), kept apart
 * from this page's enquiry form so the two don't compete for attention.
 */
?>
<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Prefer to book a call directly?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Pick a time that works for you and it\'s confirmed straight away - no back-and-forth over email.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
