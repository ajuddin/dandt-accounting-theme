<?php
/**
 * Site footer.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

$dandt = dandt_business_details();
?>
</main>

<footer class="dandt-footer">
    <div class="dandt-container">
        <div class="dandt-footer-grid">
            <div class="dandt-footer-col">
                <h3><?php bloginfo( 'name' ); ?></h3>
                <p class="dandt-footer-tagline"><?php esc_html_e( 'Your Partner in Progress', 'dandt-theme' ); ?></p>
                <p><?php esc_html_e( 'Chartered accountancy services for businesses across Essex and clients throughout England: company accounts, VAT, payroll, self-assessment and bookkeeping.', 'dandt-theme' ); ?></p>
            </div>

            <div class="dandt-footer-col">
                <h3><?php esc_html_e( 'Navigate', 'dandt-theme' ); ?></h3>
                <p><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'dandt-theme' ); ?></a></p>
                <p><a href="<?php echo esc_url( home_url( '/who-we-help/' ) ); ?>"><?php esc_html_e( 'Who We Help', 'dandt-theme' ); ?></a></p>
                <p><a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>"><?php esc_html_e( 'Pricing', 'dandt-theme' ); ?></a></p>
                <p><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'dandt-theme' ); ?></a></p>
                <p><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About', 'dandt-theme' ); ?></a></p>
            </div>

            <div class="dandt-footer-col">
                <h3><?php esc_html_e( 'Contact', 'dandt-theme' ); ?></h3>
                <p><a href="tel:<?php echo esc_attr( $dandt['phone_href'] ); ?>"><?php echo esc_html( $dandt['phone'] ); ?></a></p>
                <p><a href="mailto:<?php echo esc_attr( $dandt['email'] ); ?>"><?php echo esc_html( $dandt['email'] ); ?></a></p>
                <p><?php echo esc_html( implode( ', ', $dandt['address_lines'] ) ); ?></p>
            </div>

            <div class="dandt-footer-col">
                <h3><?php esc_html_e( 'Legal', 'dandt-theme' ); ?></h3>
                <p><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'dandt-theme' ); ?></a></p>
                <p><a href="<?php echo esc_url( home_url( '/terms-of-engagement/' ) ); ?>"><?php esc_html_e( 'Terms of Engagement', 'dandt-theme' ); ?></a></p>
            </div>
        </div>

        <div class="dandt-footer-bottom">
            <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'dandt-theme' ); ?></span>
            <span><?php echo esc_html( $dandt['hours'] ); ?></span>
        </div>
    </div>
</footer>

<?php
/*
 * Sitewide floating contact bar - fixed at the bottom of every page so
 * WhatsApp, the phone number and a consultation booking are all one tap
 * away regardless of what page a visitor lands on. Dismissible (state
 * kept in localStorage via main.js so a closed visitor doesn't see it pop
 * back up on the next page load or visit).
 */
?>
<div class="dandt-contact-bar" id="dandt-contact-bar">
    <button type="button" class="dandt-contact-bar-close" id="dandt-contact-bar-close" aria-label="<?php esc_attr_e( 'Hide this bar', 'dandt-theme' ); ?>">
        <?php dandt_icon( 'close', 'dandt-contact-bar-close-icon' ); ?>
    </button>
    <a class="dandt-contact-bar-whatsapp" href="https://wa.me/<?php echo esc_attr( ltrim( $dandt['phone_href'], '+' ) ); ?>" target="_blank" rel="noopener">
        <?php dandt_icon( 'whatsapp', 'dandt-contact-bar-whatsapp-icon' ); ?>
        <?php esc_html_e( 'Chat on WhatsApp', 'dandt-theme' ); ?>
    </a>
    <p class="dandt-contact-bar-call">
        <?php esc_html_e( 'Call us now:', 'dandt-theme' ); ?>
        <a href="tel:<?php echo esc_attr( $dandt['phone_href'] ); ?>"><?php echo esc_html( $dandt['phone'] ); ?></a>
    </p>
    <a class="dandt-btn dandt-btn-primary dandt-contact-bar-book" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>">
        <?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
