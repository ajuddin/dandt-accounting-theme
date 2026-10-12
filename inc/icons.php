<?php
/**
 * Inline SVG icons.
 *
 * Vendored from Tabler Icons (MIT licensed, https://tabler.io/icons) rather
 * than hand-drawn, with stroke-width standardised to 1.75 across the set.
 * No npm/build step in this theme, so the path data is copied in directly
 * instead of depending on an installed icon package.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Echo an inline SVG icon.
 *
 * @param string $name  Icon key, e.g. 'phone', 'map-pin'.
 * @param string $class Extra CSS class(es) for the <svg> element.
 */
function dandt_icon( $name, $class = '' ) {
    $paths = array(
        'phone'         => '<path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />',
        'mail'          => '<path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" /><path d="M3 7l9 6l9 -6" />',
        'map-pin'       => '<path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0" />',
        'clock'         => '<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" />',
        'menu'          => '<path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" />',
        'close'         => '<path d="M18 6l-12 12" /><path d="M6 6l12 12" />',
        'briefcase'     => '<path d="M3 9a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2l0 -9" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M12 12l0 .01" /><path d="M3 13a20 20 0 0 0 18 0" />',
        'calculator'    => '<path d="M4 5a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2l0 -14" /><path d="M8 8a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1l0 -1" /><path d="M8 14l0 .01" /><path d="M12 14l0 .01" /><path d="M16 14l0 .01" /><path d="M8 17l0 .01" /><path d="M12 17l0 .01" /><path d="M16 17l0 .01" />',
        'shield-check'  => '<path d="M11.46 20.846a12 12 0 0 1 -7.96 -14.846a12 12 0 0 0 8.5 -3a12 12 0 0 0 8.5 3a12 12 0 0 1 -.09 7.06" /><path d="M15 19l2 2l4 -4" />',
        'check'         => '<path d="M5 12l5 5l10 -10" />',
        'chevron-right' => '<path d="M9 6l6 6l-6 6" />',
        'building-bank' => '<path d="M3 21l18 0" /><path d="M3 10l18 0" /><path d="M5 6l7 -3l7 3" /><path d="M4 10l0 11" /><path d="M20 10l0 11" /><path d="M8 14l0 3" /><path d="M12 14l0 3" /><path d="M16 14l0 3" />',
        'receipt'       => '<path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" />',
        'users'         => '<path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />',
        'calendar'      => '<path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2l0 -12" /><path d="M16 3l0 4" /><path d="M8 3l0 4" /><path d="M4 11l16 0" /><path d="M8 15h2v2h-2l0 -2" />',
        'user'          => '<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />',
    );

    if ( ! isset( $paths[ $name ] ) ) {
        return;
    }

    /*
     * width/height here (not just viewBox) matter: without them, a bare
     * SVG has no intrinsic size, so inside any flex container that
     * stretches its items by default (align-items: stretch, with no
     * sizing CSS of its own - the "Learn More" button on the homepage's
     * featured Company Accounts card was exactly this case) the icon
     * balloons to fill the stretched box instead of staying icon-sized.
     * CSS elsewhere (e.g. .dandt-nav-call svg { width: 16px }) still wins
     * via specificity, so this is only the fallback for contexts with no
     * explicit sizing rule of their own.
     */
    echo '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $class ) . '" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . $paths[ $name ] // phpcs:ignore -- static vendored SVG markup, not user input.
        . '</svg>';
}

/**
 * A gradient brand panel with a large centred icon, standing in for a photo
 * where no real, verified photography exists yet.
 *
 * Deliberately not a stock photo: an earlier pass sourcing "relevant"
 * open-license images turned up results from the same uploader where one
 * file was mislabeled entirely (a filename claiming "bright office with
 * coffee" was actually a staged scene with handcuffs and a toy shopping
 * cart of cash) - not a risk worth taking on a client-facing site. This
 * draws only from the theme's own brand gradient and the already-vetted
 * icon set, so there's nothing left to verify.
 *
 * @param string $icon  Icon key from dandt_icon().
 * @param string $class Extra class(es) for the outer panel.
 */
function dandt_brand_panel( $icon, $class = '' ) {
    echo '<div class="dandt-brand-panel ' . esc_attr( $class ) . '">';
    echo '<span class="dandt-brand-panel-ring">';
    dandt_icon( $icon, 'dandt-brand-panel-icon' );
    echo '</span>';
    echo '</div>';
}

/**
 * Renders a photo if one exists for the given theme-relative path, falling
 * back to the icon brand panel otherwise - lets real photography roll out
 * service-by-service without every slug needing one on day one.
 *
 * @param string $icon       Icon key from dandt_icon(), used as the fallback.
 * @param string $photo_path Path under the theme root, e.g. '/assets/images/services/bookkeeping.webp'.
 * @param string $alt        Alt text for the photo.
 * @param string $class      Extra class(es) for the outer panel/image.
 */
function dandt_hero_media( $icon, $photo_path, $alt = '', $class = '' ) {
    if ( $photo_path && file_exists( get_theme_file_path( $photo_path ) ) ) {
        echo '<img src="' . esc_url( get_theme_file_uri( $photo_path ) ) . '" alt="' . esc_attr( $alt ) . '" loading="lazy" />';
        return;
    }
    dandt_brand_panel( $icon, $class );
}

/**
 * One icon per service, matching its actual subject rather than reusing a
 * generic mark everywhere. Shared between single-service.php (the hero
 * banner) and page-services.php (the hub grid), so a service's icon is the
 * same wherever it appears rather than being picked twice independently.
 *
 * @param string $slug Service post slug.
 * @return string Icon key from dandt_icon().
 */
function dandt_service_icon( $slug ) {
    $icons = array(
        'startup-accounting'           => 'building-bank',
        'new-business-starter'         => 'building-bank',
        'sole-trader-accounting'       => 'briefcase',
        'limited-company-accounting'   => 'shield-check',
        'self-assessment-tax-returns'  => 'receipt',
        'bookkeeping'                  => 'calculator',
        'corporation-tax'              => 'receipt',
        'year-end-accounts'            => 'briefcase',
        'vat-returns'                  => 'receipt',
        'payroll'                      => 'users',
        'company-formation'            => 'building-bank',
        'tax-planning'                 => 'calculator',
        'management-accounts'          => 'briefcase',
        'making-tax-digital'           => 'calculator',
        'switching-accountants'        => 'shield-check',
    );

    return $icons[ $slug ] ?? 'briefcase';
}

/**
 * One icon per Who We Help audience. Shared between single-location.php and
 * page-who-we-help.php for the same reason as dandt_service_icon() above.
 *
 * @param string $slug Location post slug.
 * @return string Icon key from dandt_icon().
 */
function dandt_location_icon( $slug ) {
    $icons = array(
        'startups-chelmsford'                   => 'building-bank',
        'sole-traders-chelmsford'                => 'briefcase',
        'limited-company-accountants-chelmsford' => 'shield-check',
        'freelancers-consultants'                => 'user',
        'small-businesses-essex'                 => 'users',
    );

    return $icons[ $slug ] ?? 'briefcase';
}
