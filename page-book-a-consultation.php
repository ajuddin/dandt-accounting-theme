<?php
/**
 * Book a Consultation page. Matched automatically to the
 * "book-a-consultation" slug.
 *
 * Deliberately separate from page-contact.php: the Calendly embed loads
 * immediately at the top as the page's one job, rather than sitting below a
 * general enquiry form where it competed for attention. Contact keeps the
 * enquiry form as its own, separate primary action - see the brief note
 * there for the reciprocal link back.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$calendly_url = 'https://calendly.com/dandtaccauk/30min';
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Book your free consultation', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'A free, no-obligation 30-minute call to talk through your business and what you need from an accountant. Pick a time below and it\'s confirmed straight away.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-booking-embed">
            <div
                class="calendly-inline-widget"
                data-url="<?php echo esc_url( $calendly_url ); ?>"
                style="min-width:320px;height:750px;"
            ></div>
            <script src="https://assets.calendly.com/assets/external/widget.js" async></script>
        </div>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-booking-alt dandt-reveal">
            <p class="dandt-body">
                <?php
                printf(
                    /* translators: %s: link to the Contact page */
                    esc_html__( 'Got a general question instead, or would rather email? %s', 'dandt-theme' ),
                    '<a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Visit our Contact page', 'dandt-theme' ) . '</a>'
                );
                ?>
            </p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
