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

<?php wp_footer(); ?>
</body>
</html>
