<?php
/**
 * Terms of Engagement page. Matched automatically to the
 * "terms-of-engagement" slug.
 *
 * DRAFT CONTENT - structural skeleton only. Terms of engagement for an
 * accountancy practice typically follow a professional body's standard
 * wording (e.g. ICAEW/ACCA/AAT template letters of engagement) and have
 * AML and liability implications. This is NOT that - it is a placeholder
 * shape. Do not publish without review by a qualified professional.
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
        <p class="dandt-lede" style="color:#b42318;"><?php esc_html_e( 'DRAFT - placeholder structure only. Accountancy engagement terms carry AML and liability implications and must be reviewed by a qualified professional before publishing.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container entry-content">
        <h2 class="wp-block-heading"><?php esc_html_e( 'Scope of services', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - the specific services covered by an engagement are confirmed in writing with each client; this section should summarise the general basis on which D&T Accounting takes on work.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Client responsibilities', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - e.g. providing accurate and timely information, retaining statutory records, responding to requests within agreed timeframes.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Fees and payment', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - fee basis, invoicing frequency, late payment terms.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Anti-money laundering', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - standard AML identification/verification requirements for new clients, as required of UK accountancy practices.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Liability', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - professional indemnity position and any limitation of liability. This clause in particular should not be published without professional/legal review.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Ending the engagement', 'dandt-theme' ); ?></h2>
        <p><?php esc_html_e( '[DRAFT - notice period and handover process if either party ends the relationship.]', 'dandt-theme' ); ?></p>

        <h2 class="wp-block-heading"><?php esc_html_e( 'Contact', 'dandt-theme' ); ?></h2>
        <p>
            <?php echo esc_html( $dandt['email'] ); ?><br>
            <?php echo esc_html( implode( ', ', $dandt['address_lines'] ) ); ?>
        </p>
    </div>
</section>

<?php get_footer(); ?>
