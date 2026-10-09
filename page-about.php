<?php
/**
 * About page. Matched automatically to the "about" slug by WordPress's
 * template hierarchy.
 *
 * The accountant profile below is a deliberate placeholder - real name,
 * role, bio and photo are still needed from the client (see the project
 * conversation: content and profile come once deployment is in place).
 * Duplicate the .dandt-profile block if there are two partners to feature
 * ("D" and "T").
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'About D&T Accounting', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'A chartered accountancy firm based in Chelmsford, working with businesses across Essex.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <p class="dandt-body" style="max-width: 70ch;">
            <?php esc_html_e( 'We provide accounting services built around how small and growing businesses actually operate: clear communication, deadlines that are tracked rather than chased, and advice in plain language rather than jargon.', 'dandt-theme' ); ?>
        </p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <?php /* TODO: real name, role, bio and photo. Duplicate this block for a second partner. */ ?>
        <div class="dandt-profile dandt-reveal">
            <div class="dandt-profile-photo">
                <img
                    src="https://picsum.photos/seed/dandt-accountant-profile/480/480"
                    alt="<?php esc_attr_e( '[Accountant name] - photo to be added', 'dandt-theme' ); ?>"
                    width="480" height="480" loading="lazy"
                >
            </div>
            <div class="dandt-profile-copy">
                <p class="dandt-profile-role"><?php esc_html_e( '[Role - e.g. Director, Chartered Accountant]', 'dandt-theme' ); ?></p>
                <h2 class="dandt-h2">[<?php esc_html_e( 'Accountant Name', 'dandt-theme' ); ?>]</h2>
                <p class="dandt-body"><?php esc_html_e( '[Bio to be added: background, qualifications, and the kind of clients they work with.]', 'dandt-theme' ); ?></p>
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
                <p class="dandt-body"><?php esc_html_e( 'Get in touch and we will get back to you within one working day.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
