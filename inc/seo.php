<?php
/**
 * Expose Rank Math's SEO title/description meta fields to the REST API.
 *
 * Rank Math doesn't register these for REST access itself (they're built
 * for its own admin/Gutenberg sidebar UI, not programmatic access), but
 * register_post_meta() can expose an existing meta key for REST regardless
 * of which plugin originally defined it, as long as the key name matches
 * exactly what that plugin reads when rendering the actual meta tags. This
 * doesn't modify Rank Math itself - it just opens a REST door to the same
 * values its own UI already reads and writes.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register rank_math_title and rank_math_description for REST read/write
 * on every public content type this theme defines.
 */
function dandt_expose_seo_meta_to_rest() {
    $post_types = array( 'page', 'post', 'service', 'location' );

    foreach ( $post_types as $post_type ) {
        register_post_meta( $post_type, 'rank_math_title', array(
            'show_in_rest' => true,
            'single'       => true,
            'type'         => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        ) );
        register_post_meta( $post_type, 'rank_math_description', array(
            'show_in_rest' => true,
            'single'       => true,
            'type'         => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            },
        ) );
    }
}
add_action( 'init', 'dandt_expose_seo_meta_to_rest' );

/**
 * Pull question/answer pairs out of a service page's own FAQ blocks, for
 * FAQPage schema. Every FAQ on every service page is authored as the same
 * <details><summary> block (see /tmp/dandt_phase2/build_pages.py's faq()
 * helper) - that fixed shape is what makes parsing raw post_content safe
 * here, rather than something that would break on arbitrary editor input.
 *
 * @param string $content Raw post_content.
 * @return array<int,array{question:string,answer:string}>
 */
function dandt_extract_faqs( $content ) {
    $faqs = array();

    if ( ! preg_match_all( '/<details[^>]*>\s*<summary>(.*?)<\/summary>(.*?)<\/details>/is', $content, $matches, PREG_SET_ORDER ) ) {
        return $faqs;
    }

    foreach ( $matches as $match ) {
        $question = wp_strip_all_tags( $match[1] );
        $answer   = wp_strip_all_tags( $match[2] );
        if ( $question && $answer ) {
            $faqs[] = array(
                'question' => $question,
                'answer'   => $answer,
            );
        }
    }

    return $faqs;
}

/**
 * Build the Service (+ FAQPage, where a page has FAQs) schema for a single
 * service page. Returns a list of JSON-LD blocks rather than one @graph so
 * each can be printed in its own <script> tag.
 *
 * @param WP_Post $post
 * @return array<int,array<string,mixed>>
 */
function dandt_service_schema( $post ) {
    $blocks   = array();
    $blocks[] = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => get_the_title( $post ),
        'description' => get_the_excerpt( $post ),
        'url'         => get_permalink( $post ),
        'provider'    => array(
            '@type' => 'AccountingService',
            'name'  => 'D&T Accounting',
            'url'   => home_url( '/' ),
        ),
        'areaServed'  => 'Essex, UK',
    );

    $faqs = dandt_extract_faqs( $post->post_content );
    if ( $faqs ) {
        $blocks[] = array(
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(
                function ( $faq ) {
                    return array(
                        '@type'          => 'Question',
                        'name'           => $faq['question'],
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text'  => $faq['answer'],
                        ),
                    );
                },
                $faqs
            ),
        );
    }

    return $blocks;
}
