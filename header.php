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
        'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => implode( ', ', $dandt['address_lines'] ),
            'addressLocality' => 'Chelmsford',
            'addressRegion'   => 'Essex',
            'addressCountry'  => 'GB',
        ),
        'areaServed' => 'Essex, UK',
    );
    ?>
    <script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'dandt-theme' ); ?></a>

<header class="dandt-header" id="dandt-header">
    <div class="dandt-container dandt-header-inner">
        <a class="dandt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php /* The actual production logo file, copied as-is rather than recreated. */ ?>
            <img
                class="dandt-logo-img"
                src="<?php echo esc_url( get_theme_file_uri( '/assets/brand/logo.svg' ) ); ?>"
                alt="<?php bloginfo( 'name' ); ?>"
                width="188" height="53"
            >
        </a>

        <nav class="dandt-nav" aria-label="<?php esc_attr_e( 'Primary', 'dandt-theme' ); ?>">
            <ul class="dandt-nav-links">
                <?php
                $nav_items = array(
                    'home'     => array( __( 'Home', 'dandt-theme' ), home_url( '/' ) ),
                    'services' => array( __( 'Services', 'dandt-theme' ), home_url( '/services/' ) ),
                    'about'    => array( __( 'About', 'dandt-theme' ), home_url( '/about/' ) ),
                    'contact'  => array( __( 'Contact', 'dandt-theme' ), home_url( '/contact/' ) ),
                );
                foreach ( $nav_items as $slug => $item ) :
                    $is_current = is_page( $slug ) || ( 'home' === $slug && is_front_page() );
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

            <button class="dandt-nav-toggle" id="dandt-nav-toggle" aria-expanded="false" aria-controls="dandt-header">
                <span class="dandt-visually-hidden"><?php esc_html_e( 'Menu', 'dandt-theme' ); ?></span>
                <?php dandt_icon( 'menu', 'dandt-icon-open' ); ?>
                <?php dandt_icon( 'close', 'dandt-icon-close' ); ?>
            </button>
        </nav>
    </div>
</header>

<main id="main">
