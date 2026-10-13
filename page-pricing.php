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
    <div class="dandt-container">
        <div class="dandt-page-hero">
            <?php dandt_hero_media( 'calculator', '/assets/images/pricing-hero.webp', __( 'Pricing', 'dandt-theme' ) ); ?>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-section-head" style="margin-bottom: 1.5rem;">
            <h2 class="dandt-h2"><?php esc_html_e( 'Find your package', 'dandt-theme' ); ?></h2>
            <p class="dandt-lede"><?php esc_html_e( 'Answer a couple of quick questions and we\'ll point you to the services that fit your business - no sales call needed just to find out where to start.', 'dandt-theme' ); ?></p>
        </div>

        <div class="dandt-package-finder" data-package-finder>
            <div class="dandt-pf-step" data-pf-step="stage">
                <h3 class="dandt-pf-question"><?php esc_html_e( 'Where are you right now?', 'dandt-theme' ); ?></h3>
                <div class="dandt-pf-options">
                    <label class="dandt-pf-option"><input type="radio" name="pf-stage" value="starting"> <?php esc_html_e( 'Thinking about starting, or just started trading', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="radio" name="pf-stage" value="ongoing"> <?php esc_html_e( 'Already trading, need ongoing accounting support', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="radio" name="pf-stage" value="switching"> <?php esc_html_e( 'Looking to switch from my current accountant', 'dandt-theme' ); ?></label>
                </div>
            </div>

            <div class="dandt-pf-step" data-pf-step="structure" hidden>
                <h3 class="dandt-pf-question"><?php esc_html_e( 'What\'s your business structure?', 'dandt-theme' ); ?></h3>
                <div class="dandt-pf-options">
                    <label class="dandt-pf-option"><input type="radio" name="pf-structure" value="sole-trader"> <?php esc_html_e( 'Sole trader', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="radio" name="pf-structure" value="limited-company"> <?php esc_html_e( 'Limited company', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="radio" name="pf-structure" value="not-sure"> <?php esc_html_e( 'Not sure yet', 'dandt-theme' ); ?></label>
                </div>
            </div>

            <div class="dandt-pf-step" data-pf-step="extras" hidden>
                <h3 class="dandt-pf-question"><?php esc_html_e( 'Does any of this apply to you? (tick any)', 'dandt-theme' ); ?></h3>
                <div class="dandt-pf-options">
                    <label class="dandt-pf-option"><input type="checkbox" name="pf-extra" value="vat"> <?php esc_html_e( 'VAT registered, or close to the threshold', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="checkbox" name="pf-extra" value="payroll"> <?php esc_html_e( 'I have, or I\'m about to take on, employees', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="checkbox" name="pf-extra" value="management"> <?php esc_html_e( 'I want a regular view of profit and cash, not just year-end', 'dandt-theme' ); ?></label>
                    <label class="dandt-pf-option"><input type="checkbox" name="pf-extra" value="planning"> <?php esc_html_e( 'I want help planning ahead for tax, not just filing it', 'dandt-theme' ); ?></label>
                </div>
            </div>

            <div class="dandt-pf-results" data-pf-results hidden>
                <h3 class="dandt-pf-question"><?php esc_html_e( 'Based on your answers', 'dandt-theme' ); ?></h3>
                <div class="dandt-pf-results-grid" data-pf-results-grid></div>
                <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?></a>
            </div>
        </div>
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
