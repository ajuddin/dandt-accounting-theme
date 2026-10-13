<?php
/**
 * Google Reviews testimonials section (homepage) - genuine reviews only.
 *
 * No Google Places API key or review-management plugin is configured yet,
 * so dandt_google_reviews() stays empty and the section shows an honest
 * "pending" panel (same dashed-border treatment the old single-quote
 * placeholder used) with a working link straight to the firm's real Google
 * listing, rather than fabricated star ratings or quotes. Once reviews are
 * sourced - by pasting genuine quotes into the array below, or wiring up
 * the Places API - that's the only change needed for the real three-card
 * grid to render; nothing else in this file or front-page.php changes.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * The firm's Google Business Profile permalink, built from the CID
 * ("ludocid") supplied directly by the client rather than scraped or
 * guessed - the second hex pair in a Google search result's listing
 * fragment (…#lrd=0x...:0xCID,…), converted to decimal. Stable regardless
 * of how the listing is found again later.
 *
 * @return string
 */
function dandt_google_maps_url() {
    return 'https://www.google.com/maps?cid=16329307658655072501';
}

/**
 * Genuine Google reviews to feature, newest/best first - empty until real
 * reviews are sourced (see file header). Each entry: name, rating (1-5),
 * text, date (human string, e.g. "March 2026"), and optionally a url deep
 * link to that specific review on Google, if available.
 *
 * @return array<int,array{name:string,rating:int,text:string,date?:string,url?:string}>
 */
function dandt_google_reviews() {
    return array();
}

/**
 * Verified aggregate rating/count, or null if not yet confirmed from a
 * real source - null means "omit from the page", never a guessed figure.
 *
 * @return array{rating:float,count:int}|null
 */
function dandt_google_rating_summary() {
    return null;
}

/**
 * Render a 1-5 star rating as accessible inline SVG stars.
 *
 * @param int $rating 1-5.
 */
function dandt_render_stars( $rating ) {
    $rating = max( 1, min( 5, (int) round( $rating ) ) );
    $star   = '<svg class="dandt-star%s" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.5l2.9 6.3 6.9.7-5.2 4.7 1.5 6.8-6.1-3.6-6.1 3.6 1.5-6.8-5.2-4.7 6.9-.7z" /></svg>';

    echo '<span class="dandt-stars" role="img" aria-label="'
        . esc_attr(
            sprintf(
                /* translators: %d: star rating out of 5 */
                __( '%d out of 5 stars', 'dandt-theme' ),
                $rating
            )
        )
        . '">';
    for ( $i = 1; $i <= 5; $i++ ) {
        printf( $star, $i <= $rating ? ' is-filled' : '' ); // phpcs:ignore -- static markup, not user input.
    }
    echo '</span>';
}

/**
 * Small multi-colour Google "G" mark, used only for attribution ("genuine
 * Google review" / "posted on Google") rather than as decoration.
 *
 * @param string $class Extra class(es) for the <svg>.
 */
function dandt_google_g_icon( $class = '' ) {
    echo '<svg class="' . esc_attr( $class ) . '" viewBox="0 0 48 48" aria-hidden="true">'
        . '<path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"/>'
        . '<path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"/>'
        . '<path fill="#FBBC05" d="M11.69 28.18A13.98 13.98 0 0 1 10.9 24c0-1.45.25-2.86.69-4.18v-5.7H4.34A21.99 21.99 0 0 0 2 24c0 3.55.85 6.91 2.34 9.88z"/>'
        . '<path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"/>'
        . '</svg>';
}
