<?php
/**
 * Services page. WordPress auto-matches this to the page with slug "services"
 * via the template hierarchy - no manual template assignment needed.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Accounting services', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Compliance work and the everyday numbers, handled so you can focus on running your business.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section">
    <div class="dandt-container">
        <div class="dandt-services-grid" style="grid-template-columns: 1fr 1fr;">

            <article class="dandt-service-card dandt-reveal" id="company-accounts">
                <div class="dandt-service-icon"><?php dandt_icon( 'briefcase' ); ?></div>
                <h2 class="dandt-h3"><?php esc_html_e( 'Company Accounts', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Statutory accounts prepared from your records and filed with HMRC and Companies House on time, every time.', 'dandt-theme' ); ?></p>
                <ul class="dandt-feature-list">
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Annual accounts preparation and filing', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Corporation tax return (CT600)', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'A plain-English walkthrough of your figures', 'dandt-theme' ); ?></li>
                </ul>
            </article>

            <article class="dandt-service-card dandt-reveal" id="vat-returns">
                <div class="dandt-service-icon"><?php dandt_icon( 'receipt' ); ?></div>
                <h2 class="dandt-h3"><?php esc_html_e( 'VAT Returns', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Quarterly VAT returns prepared and submitted under Making Tax Digital, with the scheme that suits your business.', 'dandt-theme' ); ?></p>
                <ul class="dandt-feature-list">
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Making Tax Digital compliant submissions', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'VAT scheme and registration advice', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Deadline tracking, so nothing is late', 'dandt-theme' ); ?></li>
                </ul>
            </article>

            <article class="dandt-service-card dandt-reveal" id="payroll">
                <div class="dandt-service-icon"><?php dandt_icon( 'users' ); ?></div>
                <h2 class="dandt-h3"><?php esc_html_e( 'Payroll', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Payslips, PAYE and pension contributions run on schedule, whether you have one employee or twenty.', 'dandt-theme' ); ?></p>
                <ul class="dandt-feature-list">
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Payslips and PAYE submissions', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Auto-enrolment pension administration', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Starters, leavers and year-end handled', 'dandt-theme' ); ?></li>
                </ul>
            </article>

            <article class="dandt-service-card dandt-reveal" id="bookkeeping">
                <div class="dandt-service-icon"><?php dandt_icon( 'calculator' ); ?></div>
                <h2 class="dandt-h3"><?php esc_html_e( 'Bookkeeping', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Your day-to-day income and expenses kept current, so year-end accounts are a formality, not a scramble.', 'dandt-theme' ); ?></p>
                <ul class="dandt-feature-list">
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Regular reconciliation of your accounts', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Cloud accounting software setup and support', 'dandt-theme' ); ?></li>
                    <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Management figures when you need them', 'dandt-theme' ); ?></li>
                </ul>
            </article>

        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Not sure which service you need?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Tell us about your business and we will recommend where to start.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
