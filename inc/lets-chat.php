<?php
/**
 * "Let's Chat" contact-channels section - shared between the About page and
 * Contact page rather than duplicated markup, modelled on the four-column
 * "Let's chat" section on Crunch's About page.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Echo the Email / Book a Call / Phone / WhatsApp section.
 */
function dandt_lets_chat_section() {
    $dandt           = dandt_business_details();
    $whatsapp_number = ltrim( $dandt['phone_href'], '+' );
    ?>
    <section class="dandt-section-tight">
        <div class="dandt-container">
            <div class="dandt-chat-band dandt-reveal">
                <p class="dandt-hero-eyebrow"><?php esc_html_e( 'Connected', 'dandt-theme' ); ?></p>
                <h2 class="dandt-h2"><?php esc_html_e( "Let's Chat", 'dandt-theme' ); ?></h2>
                <div class="dandt-chat-grid">

                    <div class="dandt-chat-col">
                        <?php dandt_icon( 'mail', 'dandt-chat-icon' ); ?>
                        <h3 class="dandt-h3"><?php esc_html_e( 'Email', 'dandt-theme' ); ?></h3>
                        <p class="dandt-body"><?php esc_html_e( 'Send us an email and we will get back to you as soon as we can.', 'dandt-theme' ); ?></p>
                        <a href="mailto:<?php echo esc_attr( $dandt['email'] ); ?>"><?php echo esc_html( $dandt['email'] ); ?></a>
                    </div>

                    <div class="dandt-chat-col">
                        <?php dandt_icon( 'calendar', 'dandt-chat-icon' ); ?>
                        <h3 class="dandt-h3"><?php esc_html_e( 'Book a Call', 'dandt-theme' ); ?></h3>
                        <p class="dandt-body"><?php esc_html_e( 'Book a free, no-obligation consultation to talk through what your business needs.', 'dandt-theme' ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?></a>
                    </div>

                    <div class="dandt-chat-col">
                        <?php dandt_icon( 'phone', 'dandt-chat-icon' ); ?>
                        <h3 class="dandt-h3"><?php esc_html_e( 'Phone', 'dandt-theme' ); ?></h3>
                        <p class="dandt-body">
                            <?php
                            echo esc_html(
                                sprintf(
                                    /* translators: %s: business hours, e.g. "9:00am - 5:00pm, Monday to Friday" */
                                    __( "We're available %s.", 'dandt-theme' ),
                                    $dandt['hours']
                                )
                            );
                            ?>
                        </p>
                        <a href="tel:<?php echo esc_attr( $dandt['phone_href'] ); ?>"><?php echo esc_html( $dandt['phone'] ); ?></a>
                    </div>

                    <div class="dandt-chat-col">
                        <?php dandt_icon( 'whatsapp', 'dandt-chat-icon' ); ?>
                        <h3 class="dandt-h3"><?php esc_html_e( 'WhatsApp', 'dandt-theme' ); ?></h3>
                        <p class="dandt-body"><?php esc_html_e( 'Message us directly on WhatsApp for a quick reply during office hours.', 'dandt-theme' ); ?></p>
                        <a href="https://wa.me/<?php echo esc_attr( $whatsapp_number ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Chat on WhatsApp', 'dandt-theme' ); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php
}
