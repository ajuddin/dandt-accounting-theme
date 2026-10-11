<?php
/**
 * Pricing hub page.
 *
 * Uses the transparent "what affects your quote" approach rather than
 * published "from £X" figures - those are still pending (the real prices
 * live in a leaflet on the firm's Facebook page, which isn't fetchable
 * without an authenticated session; ask the firm to forward it directly).
 * Once real figures are confirmed, the "D&T: Pricing Card" block pattern
 * (inc/block-patterns.php) is built for exactly this page.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$factors = array(
    array( __( 'Business structure', 'dandt-theme' ), __( 'Sole trader, limited company and partnership accounts each take a different amount of work to prepare and file.', 'dandt-theme' ) ),
    array( __( 'Turnover and transaction volume', 'dandt-theme' ), __( 'More transactions to reconcile each month means more bookkeeping time.', 'dandt-theme' ) ),
    array( __( 'VAT registration', 'dandt-theme' ), __( 'VAT-registered businesses need quarterly returns on top of annual accounts.', 'dandt-theme' ) ),
    array( __( 'Payroll headcount', 'dandt-theme' ), __( 'Payroll pricing scales with the number of employees and how often they\'re paid.', 'dandt-theme' ) ),
    array( __( 'How organised your records are', 'dandt-theme' ), __( 'Clean, up-to-date records cost less to work with than a shoebox of receipts.', 'dandt-theme' ) ),
);
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Pricing', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Every business is different, so we quote based on what your business actually needs rather than a one-size-fits-all price list.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <h2 class="dandt-h2" style="margin-bottom: 1.5rem;"><?php esc_html_e( 'What affects your quote', 'dandt-theme' ); ?></h2>
        <div class="dandt-services-grid" style="grid-template-columns: repeat(3, 1fr);">
            <?php foreach ( $factors as $factor ) : ?>
                <article class="dandt-service-card dandt-reveal">
                    <h3 class="dandt-h3"><?php echo esc_html( $factor[0] ); ?></h3>
                    <p class="dandt-body"><?php echo esc_html( $factor[1] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <h2 class="dandt-h2" style="margin-bottom: 1rem;"><?php esc_html_e( 'What we charge for, and what we don\'t', 'dandt-theme' ); ?></h2>
        <p class="dandt-body" style="max-width: 70ch;"><?php esc_html_e( 'Your quote covers everything agreed upfront. It doesn\'t include work outside that scope - HMRC enquiries, for example, or cleaning up more than a year of unreconciled records - but we\'ll always tell you before any extra cost, not after.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Get a quote for your business', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Tell us about your business and we\'ll come back with a clear, no-obligation quote.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
