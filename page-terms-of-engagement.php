<?php
/**
 * Terms of Engagement page. Matched automatically to the
 * "terms-of-engagement" slug.
 *
 * Standard-form engagement terms for a UK accountancy practice. The
 * Liability clause in particular is a common/reasonable pattern rather
 * than one tailored to this firm's specific PI insurance and risk
 * appetite - worth a periodic check against that, and against ACCA's own
 * model wording, rather than treating it as permanently fixed.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dandt = dandt_business_details();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Terms of Engagement', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'The general basis on which we take on and carry out work for clients.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container entry-content">
        <h2 class="wp-block-heading"><?php esc_html_e( 'Scope of services', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'The specific services we provide are agreed with you in writing before work begins, and may include any combination of annual accounts, tax returns, VAT, payroll, bookkeeping and related advisory work. These terms set out the general basis on which we take on and carry out that work; the specific scope, fees and timescales for your engagement are confirmed separately in your engagement letter.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Client responsibilities', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'To enable us to provide an accurate and timely service, you agree to: provide complete and accurate information and records when requested; respond to our requests within a reasonable timeframe; retain your own statutory records as required by law; and let us know promptly of any change that might affect the work we are doing for you.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Fees and payment', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'Fees are agreed in advance and set out in your engagement letter or quote, based on the scope and complexity of the work involved. Invoices are issued in line with the schedule agreed in your engagement letter, and are payable within 14 days of the invoice date. We reserve the right to charge interest on overdue invoices and to pause work until outstanding fees are settled.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Anti-money laundering', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'As a UK accountancy practice, we are required by the Money Laundering Regulations 2017 to verify the identity of new clients before we can act for them, and to carry out ongoing monitoring for the duration of the relationship. We may ask you for identification documents and other information as part of this process, and we are required by law to report certain matters to the relevant authorities where applicable, regardless of client confidentiality.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Liability', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'Our liability to you for losses arising from our provision of services is limited to the fees paid for the specific engagement giving rise to the claim, except where the law does not allow such a limit - for example, liability for death or personal injury caused by negligence, or for fraud. We are not liable for losses arising from inaccurate, incomplete or late information provided to us. Nothing in these terms limits or excludes our liability in any way that is not permitted by law.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Ending the engagement', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( 'Either party may end the engagement by giving at least 30 days\' written notice. If the engagement ends, we will provide a clear handover of your records and reasonable assistance to your next adviser, and will invoice for any work carried out up to the date the engagement ends.', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Contact', 'dandt-theme' ); ?></h2>
        <p>
            <?php echo esc_html( $dandt['email'] ); ?><br>
            <?php echo esc_html( implode( ', ', $dandt['address_lines'] ) ); ?>
        </p>
    </div>
</section>

<?php get_footer(); ?>
