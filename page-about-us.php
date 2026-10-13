<?php
/**
 * About page. Matched automatically to the "about-us" slug by WordPress's
 * template hierarchy - renamed from /about/ per the brief; see the 301 in
 * functions.php (dandt_legacy_redirects) for the old URL.
 *
 * Two accountant profiles below, sourced from each person's CV (high-level
 * experience only - not a full CV dump).
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'About D&T Accounting', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'A chartered accountancy firm based in Chelmsford, Essex - working with businesses across England.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <p class="dandt-body" style="max-width: 70ch;">
            <?php esc_html_e( 'We provide accounting services built around how small and growing businesses actually operate: clear communication, deadlines that are tracked rather than chased, and advice in plain language rather than jargon.', 'dandt-theme' ); ?>
        </p>
        <p class="dandt-body" style="max-width: 70ch; margin-top: 1rem;">
            <?php esc_html_e( 'We\'re a newer firm, and we think that\'s worth saying plainly rather than dressing up. It means every client gets direct attention rather than being passed down to whoever has capacity, and it means we\'re building our reputation on getting the basics right, not resting on one.', 'dandt-theme' ); ?>
        </p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-profile dandt-reveal">
            <div class="dandt-profile-photo">
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/team/tahmina-khatun.webp' ) ); ?>" alt="<?php esc_attr_e( 'Thamina Khatun', 'dandt-theme' ); ?>" loading="lazy">
            </div>
            <div class="dandt-profile-copy">
                <p class="dandt-profile-role"><?php esc_html_e( 'Senior Accountant', 'dandt-theme' ); ?></p>
                <h2 class="dandt-h2"><?php esc_html_e( 'Thamina Khatun', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Thamina is a fully ACCA-qualified accountant with over a decade of experience across private practice and in-house finance roles, including senior finance positions at Kent County Council and the NHS. She has prepared statutory accounts for limited companies, partnerships and sole traders under FRS 102 and FRS 105, managed VAT returns and bookkeeping, and liaised directly with HMRC on clients\' behalf. She works comfortably across Sage, Xero, QuickBooks and IRIS, and is fluent in English, Bangla and Hindi.', 'dandt-theme' ); ?></p>
                <p class="dandt-body">
                    <span class="dandt-credential-badge"><?php esc_html_e( 'ACCA', 'dandt-theme' ); ?></span>
                    <?php esc_html_e( 'Association of Chartered Certified Accountants - Fully Qualified, 2019', 'dandt-theme' ); ?>
                </p>
            </div>
        </div>

        <div class="dandt-profile dandt-reveal" style="margin-top: 2rem;">
            <div class="dandt-profile-photo">
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/team/dalia-hoque.webp' ) ); ?>" alt="<?php esc_attr_e( 'Dalia Hoque', 'dandt-theme' ); ?>" loading="lazy">
            </div>
            <div class="dandt-profile-copy">
                <p class="dandt-profile-role"><?php esc_html_e( 'Senior Accountant', 'dandt-theme' ); ?></p>
                <h2 class="dandt-h2"><?php esc_html_e( 'Dalia Hoque', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Dalia is a fully ACCA-qualified accountant whose career spans private practice, corporate finance and banking. Most recently, as a Financial Controller, she managed monthly financial reporting, balance sheet reconciliations and VAT compliance. Earlier in her career she prepared year-end and management accounts, corporation and personal tax returns, and client bookkeeping at a firm of chartered accountants, building on experience gained in accounts payable and capital markets.', 'dandt-theme' ); ?></p>
                <p class="dandt-body">
                    <span class="dandt-credential-badge"><?php esc_html_e( 'ACCA', 'dandt-theme' ); ?></span>
                    <?php esc_html_e( 'Association of Chartered Certified Accountants - Fully Qualified, 2016', 'dandt-theme' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-section-head dandt-reveal">
            <h2 class="dandt-h2"><?php esc_html_e( 'How we work', 'dandt-theme' ); ?></h2>
        </div>
        <ul class="dandt-feature-list" style="max-width: 60ch;">
            <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'You deal directly with the accountant managing your account.', 'dandt-theme' ); ?></li>
            <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Filing dates are tracked proactively, not chased at the last minute.', 'dandt-theme' ); ?></li>
            <li><?php dandt_icon( 'check' ); ?><?php esc_html_e( 'Advice is explained in plain English, not accountant jargon.', 'dandt-theme' ); ?></li>
        </ul>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Let\'s talk about your business', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Get in touch and we will get back to you as soon as we can.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php dandt_lets_chat_section(); ?>

<?php get_footer(); ?>
