<?php
/**
 * Privacy Policy page. Matched automatically to the "privacy-policy" slug.
 *
 * UK GDPR-shaped (lawful basis, data retention, rights, contact for data
 * requests), using standard retention periods for a UK accountancy
 * practice (HMRC/Companies Act record-keeping, MLR 2017 for AML records).
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dandt = dandt_business_details();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Privacy Policy', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'How we collect, use and protect your personal data.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container entry-content">
        <h2 class="wp-block-heading"><?php esc_html_e( 'Who we are', 'dandt-theme' ); ?></h2>
        <p><?php echo esc_html( sprintf(
            /* translators: %s: firm name */
            __( '%s ("we", "us") is a chartered accountancy firm based in Chelmsford, Essex. This policy explains what personal data we collect, why, and what rights you have over it.', 'dandt-theme' ),
            'D&T Accounting'
        ) ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'What we collect', 'dandt-theme' ); ?></h2>
        <ul class="wp-block-list">
            <li><?php esc_html_e( 'Contact details you give us via the website forms (name, email, phone, business type).', 'dandt-theme' ); ?></li>
            <li><?php esc_html_e( 'Financial and business information you provide once engaged as a client, as required to provide accounting services.', 'dandt-theme' ); ?></li>
            <li><?php esc_html_e( 'Basic website usage data (see Cookies below).', 'dandt-theme' ); ?></li>
        </ul>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Why we collect it (lawful basis)', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'We rely on different lawful bases depending on the activity: performance of a contract, when we are providing the accounting services you have engaged us for; legitimate interests, for responding to enquiries made through this website and for the day-to-day administration of our practice; and legal obligation, where we are required to collect or retain information under UK tax, companies, or anti-money laundering law.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'How long we keep it', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'We keep client records for as long as the engagement continues, and for at least 6 years afterwards in line with HMRC and Companies Act record-keeping requirements. Where we hold identification documents for anti-money laundering purposes, these are retained for 5 years from the end of the business relationship, in line with the Money Laundering Regulations 2017. Enquiry details submitted through this website that do not lead to an engagement are kept for no longer than 12 months.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Cookies', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'This site uses a cookie consent tool to ask permission before any non-essential cookie is set. See the cookie banner for the current list of categories in use.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Your rights', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'Under UK GDPR you have the right to access, correct, or ask us to delete your personal data, and to object to or restrict certain processing. Contact us using the details below to exercise any of these rights.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Contact', 'dandt-theme' ); ?></h2>
        <p>
            <?php echo esc_html( $dandt['email'] ); ?><br>
            <?php echo esc_html( implode( ', ', $dandt['address_lines'] ) ); ?>
        </p>
    </div>
</section>

<?php get_footer(); ?>
