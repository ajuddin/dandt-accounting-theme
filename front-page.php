<?php
/**
 * Home page.
 *
 * Testimonials: a placeholder slot, not an omission - the brief specifically
 * wants one marked as pending rather than left out, unlike the previous
 * site's unedited "John Smith" template quote, which is why this used to be
 * dropped instead. Styled with a dashed border so it reads as unfinished,
 * not as a real quote.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-hero">
    <div class="dandt-container dandt-hero-grid">
        <div class="dandt-hero-copy">
            <p class="dandt-hero-eyebrow"><?php esc_html_e( 'Your Partner in Progress', 'dandt-theme' ); ?></p>
            <h1 class="dandt-h1"><?php esc_html_e( 'Accounting support for businesses just getting started.', 'dandt-theme' ); ?></h1>
            <p class="dandt-lede"><?php esc_html_e( 'Company accounts, VAT, payroll and bookkeeping for sole traders, startups and small businesses - based in Essex, working with clients across England, handled by a chartered accountant who answers the phone.', 'dandt-theme' ); ?></p>
            <div class="dandt-hero-ctas">
                <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?></a>
                <a class="dandt-btn dandt-btn-outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'View Our Services', 'dandt-theme' ); ?></a>
            </div>
        </div>
        <div class="dandt-hero-media">
            <img
                src="<?php echo esc_url( get_theme_file_uri( '/assets/images/home-hero.webp' ) ); ?>"
                alt="<?php esc_attr_e( 'Working on a laptop at a tidy desk with a notebook and coffee', 'dandt-theme' ); ?>"
                width="1000" height="1250" loading="eager"
            >
        </div>
    </div>
</section>

<div class="dandt-trust">
    <div class="dandt-container dandt-trust-row">
        <span class="dandt-trust-item"><?php dandt_icon( 'shield-check' ); ?><?php esc_html_e( 'Chartered Accountants', 'dandt-theme' ); ?></span>
        <span class="dandt-trust-item"><?php dandt_icon( 'map-pin' ); ?><?php esc_html_e( 'Chelmsford-based, UK-wide service', 'dandt-theme' ); ?></span>
        <span class="dandt-trust-item"><?php dandt_icon( 'phone' ); ?><?php esc_html_e( 'Direct access to your accountant', 'dandt-theme' ); ?></span>
        <span class="dandt-trust-item"><?php dandt_icon( 'clock' ); ?><?php esc_html_e( 'Monday to Friday, 9am - 5pm', 'dandt-theme' ); ?></span>
    </div>
</div>

<section class="dandt-section">
    <div class="dandt-container">
        <div class="dandt-section-head dandt-reveal">
            <h2 class="dandt-h2"><?php esc_html_e( 'Accounting services for your business', 'dandt-theme' ); ?></h2>
            <p class="dandt-body"><?php esc_html_e( 'Core compliance work and the day-to-day numbers, covered.', 'dandt-theme' ); ?></p>
        </div>

        <div class="dandt-services-grid">
            <article class="dandt-service-card is-featured dandt-reveal">
                <div>
                    <div class="dandt-service-icon"><?php dandt_icon( 'briefcase' ); ?></div>
                    <h3 class="dandt-h3"><?php esc_html_e( 'Company Accounts', 'dandt-theme' ); ?></h3>
                    <p class="dandt-body"><?php esc_html_e( 'Annual accounts prepared and filed on time, with figures you actually understand when we walk you through them.', 'dandt-theme' ); ?></p>
                </div>
                <a class="dandt-btn dandt-btn-outline" href="<?php echo esc_url( home_url( '/services/#company-accounts' ) ); ?>">
                    <?php esc_html_e( 'Learn More', 'dandt-theme' ); ?>
                    <?php dandt_icon( 'chevron-right' ); ?>
                </a>
            </article>

            <article class="dandt-service-card dandt-reveal">
                <div class="dandt-service-icon"><?php dandt_icon( 'receipt' ); ?></div>
                <h3 class="dandt-h3"><?php esc_html_e( 'VAT Returns', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'Quarterly returns filed correctly and on time, with Making Tax Digital handled for you.', 'dandt-theme' ); ?></p>
            </article>

            <article class="dandt-service-card dandt-reveal">
                <div class="dandt-service-icon"><?php dandt_icon( 'users' ); ?></div>
                <h3 class="dandt-h3"><?php esc_html_e( 'Payroll', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'Your team paid accurately and on schedule, with PAYE and pension contributions sorted.', 'dandt-theme' ); ?></p>
            </article>

            <article class="dandt-service-card dandt-reveal">
                <div class="dandt-service-icon"><?php dandt_icon( 'calculator' ); ?></div>
                <h3 class="dandt-h3"><?php esc_html_e( 'Bookkeeping', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'Day-to-day records kept current, so year-end is a formality rather than a scramble.', 'dandt-theme' ); ?></p>
            </article>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-teaser dandt-reveal">
            <div class="dandt-service-icon" style="width:56px;height:56px;flex-shrink:0;">
                <?php dandt_icon( 'building-bank' ); ?>
            </div>
            <div class="dandt-teaser-copy">
                <p class="dandt-teaser-eyebrow"><?php esc_html_e( 'Starting a business?', 'dandt-theme' ); ?></p>
                <h2 class="dandt-h2"><?php esc_html_e( 'The D&T New Business Starter', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'A first-year package built for sole traders and small limited companies: structure guidance, HMRC registrations, bookkeeping setup and a clear view of what you\'ll owe and when.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/services/new-business-starter/' ) ); ?>">
                <?php esc_html_e( 'Learn More', 'dandt-theme' ); ?>
                <?php dandt_icon( 'chevron-right' ); ?>
            </a>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-section-head dandt-reveal">
            <h2 class="dandt-h2"><?php esc_html_e( 'How it works', 'dandt-theme' ); ?></h2>
        </div>
        <div class="dandt-steps">
            <div class="dandt-step dandt-reveal">
                <span class="dandt-step-num">1</span>
                <h3 class="dandt-h3"><?php esc_html_e( 'Talk', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'A free consultation to understand your business and what you actually need from an accountant.', 'dandt-theme' ); ?></p>
            </div>
            <div class="dandt-step dandt-reveal">
                <span class="dandt-step-num">2</span>
                <h3 class="dandt-h3"><?php esc_html_e( 'Set up', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'We get your accounting set up properly from day one - the right structure, the right registrations, the right records.', 'dandt-theme' ); ?></p>
            </div>
            <div class="dandt-step dandt-reveal">
                <span class="dandt-step-num">3</span>
                <h3 class="dandt-h3"><?php esc_html_e( 'Stay on track', 'dandt-theme' ); ?></h3>
                <p class="dandt-body"><?php esc_html_e( 'Ongoing support that keeps deadlines ahead of you, not behind you.', 'dandt-theme' ); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-feature-row dandt-reveal">
            <div class="dandt-feature-media">
                <img
                    src="<?php echo esc_url( get_theme_file_uri( '/assets/images/feature-direct-contact.webp' ) ); ?>"
                    alt="<?php esc_attr_e( 'Taking a business support call on a mobile phone', 'dandt-theme' ); ?>"
                    width="715" height="531" loading="lazy"
                >
            </div>
            <div class="dandt-feature-copy">
                <h2 class="dandt-h2"><?php esc_html_e( 'One point of contact, not a call queue', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'When you call, you speak with the accountant who actually manages your accounts, and gets things explained in plain English, not accountant jargon.', 'dandt-theme' ); ?></p>
            </div>
        </div>

        <div class="dandt-feature-row is-reversed dandt-reveal">
            <div class="dandt-feature-media">
                <img
                    src="<?php echo esc_url( get_theme_file_uri( '/assets/images/feature-deadlines.webp' ) ); ?>"
                    alt="<?php esc_attr_e( 'A desk planner marked with filing deadlines and a reminder note', 'dandt-theme' ); ?>"
                    width="715" height="539" loading="lazy"
                >
            </div>
            <div class="dandt-feature-copy">
                <h2 class="dandt-h2"><?php esc_html_e( 'Deadlines handled before they are urgent', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Every client gets a deadline calendar built from their own filing obligations, not a generic checklist - so a date shows up on our side with enough notice to act on, not a last-minute phone call.', 'dandt-theme' ); ?></p>
                <ul class="dandt-feature-list">
                    <li><?php dandt_icon( 'check' ); ?> <span><strong><?php esc_html_e( 'VAT returns', 'dandt-theme' ); ?></strong> &mdash; <?php esc_html_e( 'due one month and seven days after each quarter ends.', 'dandt-theme' ); ?></span></li>
                    <li><?php dandt_icon( 'check' ); ?> <span><strong><?php esc_html_e( 'Self Assessment', 'dandt-theme' ); ?></strong> &mdash; <?php esc_html_e( 'online returns due by 31 January.', 'dandt-theme' ); ?></span></li>
                    <li><?php dandt_icon( 'check' ); ?> <span><strong><?php esc_html_e( 'Company accounts &amp; Corporation Tax', 'dandt-theme' ); ?></strong> &mdash; <?php esc_html_e( 'accounts filed with Companies House nine months after your year end; Corporation Tax due nine months and a day after.', 'dandt-theme' ); ?></span></li>
                    <li><?php dandt_icon( 'check' ); ?> <span><strong><?php esc_html_e( 'Payroll', 'dandt-theme' ); ?></strong> &mdash; <?php esc_html_e( 'PAYE reported to HMRC on or before every payday.', 'dandt-theme' ); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <?php /* TODO: replace with a real client testimonial, with permission, once the firm has one to share. */ ?>
        <div class="dandt-testimonial-placeholder dandt-reveal">
            <p><?php esc_html_e( 'A client testimonial will go here once we have one to share.', 'dandt-theme' ); ?></p>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Ready to simplify your accounts?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Book a free, no-obligation consultation and tell us a little about your business.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
