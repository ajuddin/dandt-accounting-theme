<?php
/**
 * Home page.
 *
 * No testimonials section here by design: the previous site's "John Smith"
 * quote was an unedited template placeholder, not a real client testimonial.
 * Add a real one (with permission) when the client has one - see the note
 * at the bottom of this file for where it would go.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-hero">
    <div class="dandt-container dandt-hero-grid">
        <div class="dandt-hero-copy">
            <h1 class="dandt-h1"><?php esc_html_e( 'Chartered accounting support you can rely on.', 'dandt-theme' ); ?></h1>
            <p class="dandt-lede"><?php esc_html_e( 'Company accounts, VAT, payroll and bookkeeping for Essex businesses, handled by a chartered accountant who answers the phone.', 'dandt-theme' ); ?></p>
            <div class="dandt-hero-ctas">
                <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
                <a class="dandt-btn dandt-btn-outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'View Our Services', 'dandt-theme' ); ?></a>
            </div>
        </div>
        <div class="dandt-hero-media">
            <?php /* TODO: replace with a real photo of the office or the accountant at work. */ ?>
            <img
                src="https://picsum.photos/seed/dandt-accounting-office/900/1125"
                alt="<?php esc_attr_e( 'D&T Accounting office in Chelmsford, Essex', 'dandt-theme' ); ?>"
                width="900" height="1125" loading="eager"
            >
        </div>
    </div>
</section>

<div class="dandt-trust">
    <div class="dandt-container dandt-trust-row">
        <span class="dandt-trust-item"><?php dandt_icon( 'shield-check' ); ?><?php esc_html_e( 'Chartered Accountants', 'dandt-theme' ); ?></span>
        <span class="dandt-trust-item"><?php dandt_icon( 'map-pin' ); ?><?php esc_html_e( 'Based in Chelmsford, Essex', 'dandt-theme' ); ?></span>
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
        <div class="dandt-feature-row dandt-reveal">
            <div class="dandt-feature-media">
                <img
                    src="https://picsum.photos/seed/dandt-accountant-call/800/600"
                    alt="<?php esc_attr_e( 'An accountant on a phone call with a client', 'dandt-theme' ); ?>"
                    width="800" height="600" loading="lazy"
                >
            </div>
            <div class="dandt-feature-copy">
                <h2 class="dandt-h2"><?php esc_html_e( 'One point of contact, not a call queue', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'When you call, you speak with the accountant who actually manages your accounts. No case numbers, no being passed between departments.', 'dandt-theme' ); ?></p>
            </div>
        </div>

        <div class="dandt-feature-row is-reversed dandt-reveal">
            <div class="dandt-feature-media">
                <img
                    src="https://picsum.photos/seed/dandt-deadline-calendar/800/600"
                    alt="<?php esc_attr_e( 'A desk calendar used to track filing deadlines', 'dandt-theme' ); ?>"
                    width="800" height="600" loading="lazy"
                >
            </div>
            <div class="dandt-feature-copy">
                <h2 class="dandt-h2"><?php esc_html_e( 'Deadlines handled before they are urgent', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'VAT, payroll and filing dates are tracked for you, so a deadline never becomes a last-minute phone call.', 'dandt-theme' ); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Ready to simplify your accounts?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Tell us a little about your business and we will get back to you as soon as we can.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
