<?php
/**
 * Site header: doctype, nav, LocalBusiness structured data.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

$dandt = dandt_business_details();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url( get_theme_file_uri( '/assets/favicon.svg' ) ); ?>" type="image/svg+xml">

    <?php
    /*
     * LocalBusiness structured data. Fills Google's knowledge panel with
     * accurate name/address/phone/hours - the single biggest local-SEO gap
     * found when auditing the previous site (it had no structured data at
     * all beyond a generic WebSite schema).
     */
    $schema = array(
        '@context'  => 'https://schema.org',
        '@type'     => 'AccountingService',
        'name'      => 'D&T Accounting',
        'url'       => home_url( '/' ),
        'telephone' => $dandt['phone_href'],
        'email'     => $dandt['email'],
        'image'     => get_theme_file_uri( '/assets/brand/logo.svg' ),
        'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => implode( ', ', $dandt['address_lines'] ),
            'addressLocality' => 'Chelmsford',
            'addressRegion'   => 'Essex',
            'addressCountry'  => 'GB',
        ),
        'areaServed'                => array( 'Essex, UK', 'England, UK' ),
        /* Derived directly from dandt_business_details()['hours'] - not a separate invented figure. */
        'openingHoursSpecification' => array(
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
            'opens'     => '09:00',
            'closes'    => '17:00',
        ),
    );
    ?>
    <script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'dandt-theme' ); ?></a>

<div class="dandt-brand-bar" aria-hidden="true"></div>

<header class="dandt-header" id="dandt-header">
    <div class="dandt-container dandt-header-inner">
        <a class="dandt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
            /*
             * The full production logo file bakes the icon, "D&T Accounting"
             * and the tagline into one wide raster image - sized for a
             * standalone lockup, not a compact header slot, which is why it
             * read small and the separately-added tagline text sat dangling
             * next to it with no visual relationship. Using just the cropped
             * icon mark (assets/brand/icon.png) here and setting the
             * wordmark as live text instead: it scales cleanly at any size,
             * sizes independently of the icon, and matches the site's own
             * type rather than whatever weight happened to be baked into
             * the image. The tagline moves to the footer instead of being
             * discarded - see footer.php.
             */
            ?>
            <img
                class="dandt-logo-icon"
                src="<?php echo esc_url( get_theme_file_uri( '/assets/brand/icon.png' ) ); ?>"
                alt=""
                width="270" height="240"
            >
            <span class="dandt-logo-word"><?php bloginfo( 'name' ); ?></span>
        </a>

        <nav class="dandt-nav" aria-label="<?php esc_attr_e( 'Primary', 'dandt-theme' ); ?>">
            <ul class="dandt-nav-links">
                <?php
                $nav_items = array(
                    'home'          => array( __( 'Home', 'dandt-theme' ), home_url( '/' ) ),
                    'services'      => array( __( 'Services', 'dandt-theme' ), home_url( '/services/' ) ),
                    'who-we-help'   => array( __( 'Who We Help', 'dandt-theme' ), home_url( '/who-we-help/' ) ),
                    'pricing'       => array( __( 'Pricing', 'dandt-theme' ), home_url( '/pricing/' ) ),
                    'resources'     => array( __( 'Resources', 'dandt-theme' ), home_url( '/resources/' ) ),
                    'about-us'      => array( __( 'About', 'dandt-theme' ), home_url( '/about-us/' ) ),
                );
                foreach ( $nav_items as $slug => $item ) :
                    $is_current = is_page( $slug ) || ( 'home' === $slug && is_front_page() )
                        || ( 'services' === $slug && ( is_singular( 'service' ) || is_post_type_archive( 'service' ) ) )
                        || ( 'who-we-help' === $slug && ( is_singular( 'location' ) || is_post_type_archive( 'location' ) ) )
                        || ( 'resources' === $slug && ( is_singular( 'post' ) || is_home() ) );
                    ?>
                    <li>
                        <a href="<?php echo esc_url( $item[1] ); ?>" <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                            <?php echo esc_html( $item[0] ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a class="dandt-nav-call" href="tel:<?php echo esc_attr( $dandt['phone_href'] ); ?>">
                <?php dandt_icon( 'phone' ); ?>
                <?php echo esc_html( $dandt['phone'] ); ?>
            </a>

            <a class="dandt-btn dandt-btn-primary dandt-nav-contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <?php esc_html_e( 'Contact', 'dandt-theme' ); ?>
            </a>

            <button class="dandt-nav-toggle" id="dandt-nav-toggle" aria-expanded="false" aria-controls="dandt-header">
                <span class="dandt-visually-hidden"><?php esc_html_e( 'Menu', 'dandt-theme' ); ?></span>
                <?php dandt_icon( 'menu', 'dandt-icon-open' ); ?>
                <?php dandt_icon( 'close', 'dandt-icon-close' ); ?>
            </button>
        </nav>
    </div>
</header>

<?php
/*
 * Sticky mobile CTA. Points at the consultation booking page rather than
 * general Contact - that's the single highest-value conversion action, and
 * mobile screen space is too scarce to spend on the lower-intent option.
 * Hidden on desktop (see .dandt-mobile-cta in style.css); sits above the
 * safe area on phones so it never covers content or gets clipped by the
 * home-indicator on iOS.
 */
?>
<a class="dandt-mobile-cta" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>">
    <?php dandt_icon( 'calendar' ); ?>
    <?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?>
</a>

<main id="main">
