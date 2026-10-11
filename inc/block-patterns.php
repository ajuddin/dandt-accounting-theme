<?php
/**
 * Reusable block patterns for service/location pages.
 *
 * Native Gutenberg patterns rather than GenerateBlocks or Elementor: core
 * blocks only (Group, Heading, Paragraph, List, Buttons, Details), styled to
 * match the theme via the block-editor-content rules in style.css. An editor
 * inserts "D&T: Service Page Template" when creating a new service entry and
 * fills in the seven required sections; "D&T: FAQ Item" and "D&T: Pricing
 * Card" are inserted individually, repeated as needed.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

function dandt_register_block_patterns() {
    register_block_pattern_category( 'dandt', array(
        'label' => __( 'D&T Accounting', 'dandt-theme' ),
    ) );

    register_block_pattern( 'dandt/cta-band', array(
        'title'       => __( 'D&T: CTA Band', 'dandt-theme' ),
        'description' => __( 'A dark call-to-action band with a heading, a line of body text and one button. Used as the "clear next step" closing section on every service page.', 'dandt-theme' ),
        'categories'  => array( 'dandt' ),
        'content'     =>
            '<!-- wp:group {"className":"dandt-cta-band","layout":{"type":"constrained"}} -->' .
            '<div class="wp-block-group dandt-cta-band">' .
                '<!-- wp:group {"layout":{"type":"constrained"}} -->' .
                '<div class="wp-block-group">' .
                    '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'Ready to talk?', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
                    '<!-- wp:paragraph --><p>' . esc_html__( 'Tell us about your business and we will get back to you within one working day.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .
                '</div>' .
                '<!-- /wp:group -->' .
                '<!-- wp:buttons -->' .
                '<div class="wp-block-buttons">' .
                    '<!-- wp:button {"url":"/contact/"} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">' . esc_html__( 'Get in Touch', 'dandt-theme' ) . '</a></div><!-- /wp:button -->' .
                '</div>' .
                '<!-- /wp:buttons -->' .
            '</div>' .
            '<!-- /wp:group -->',
    ) );

    register_block_pattern( 'dandt/faq-item', array(
        'title'       => __( 'D&T: FAQ Item', 'dandt-theme' ),
        'description' => __( 'One question-and-answer pair using the native Details block - an accordion with no JavaScript. Insert one per question.', 'dandt-theme' ),
        'categories'  => array( 'dandt' ),
        'content'     =>
            '<!-- wp:details -->' .
            '<details class="wp-block-details"><summary>' . esc_html__( 'Question goes here?', 'dandt-theme' ) . '</summary>' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'Answer goes here.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .
            '</details>' .
            '<!-- /wp:details -->',
    ) );

    register_block_pattern( 'dandt/pricing-card', array(
        'title'       => __( 'D&T: Pricing Card', 'dandt-theme' ),
        'description' => __( 'One package: name, price line, a feature list and an enquiry button. Repeat per package on the Pricing page.', 'dandt-theme' ),
        'categories'  => array( 'dandt' ),
        'content'     =>
            '<!-- wp:group {"className":"dandt-service-card","layout":{"type":"constrained"}} -->' .
            '<div class="wp-block-group dandt-service-card">' .
                '<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__( 'Package name', 'dandt-theme' ) . '</h3><!-- /wp:heading -->' .
                '<!-- wp:paragraph {"className":"dandt-price-tag"} --><p class="dandt-price-tag">' . esc_html__( 'from £X per month', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .
                '<!-- wp:list --><ul class="wp-block-list">' .
                    '<!-- wp:list-item --><li>' . esc_html__( 'What\'s included...', 'dandt-theme' ) . '</li><!-- /wp:list-item -->' .
                '</ul><!-- /wp:list -->' .
                '<!-- wp:buttons -->' .
                '<div class="wp-block-buttons">' .
                    '<!-- wp:button {"url":"/contact/"} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">' . esc_html__( 'Get in Touch', 'dandt-theme' ) . '</a></div><!-- /wp:button -->' .
                '</div>' .
                '<!-- /wp:buttons -->' .
            '</div>' .
            '<!-- /wp:group -->',
    ) );

    register_block_pattern( 'dandt/service-page-template', array(
        'title'       => __( 'D&T: Service Page Template', 'dandt-theme' ),
        'description' => __( 'The required seven-section shape for every service page. Insert this once when creating a new service entry, then fill in each section.', 'dandt-theme' ),
        'categories'  => array( 'dandt' ),
        'content'     =>
            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'The problem', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'Describe the client\'s problem in plain English - what\'s frustrating or confusing them right now.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .

            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'What\'s included', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:list --><ul class="wp-block-list"><!-- wp:list-item --><li>' . esc_html__( 'Concrete deliverable, not a vague promise.', 'dandt-theme' ) . '</li><!-- /wp:list-item --></ul><!-- /wp:list -->' .

            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'Who it\'s for', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'Describe the type of business or person this service suits.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .

            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'How it works', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'What information is needed, the process, what D&T does at each step.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .

            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'Pricing', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'How the quote is calculated, and what\'s excluded.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .

            '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'FAQs', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
            '<!-- wp:details -->' .
            '<details class="wp-block-details"><summary>' . esc_html__( 'Question real clients actually ask?', 'dandt-theme' ) . '</summary>' .
            '<!-- wp:paragraph --><p>' . esc_html__( 'Answer.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .
            '</details>' .
            '<!-- /wp:details -->' .

            '<!-- wp:group {"className":"dandt-cta-band","layout":{"type":"constrained"}} -->' .
            '<div class="wp-block-group dandt-cta-band">' .
                '<!-- wp:group {"layout":{"type":"constrained"}} -->' .
                '<div class="wp-block-group">' .
                    '<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">' . esc_html__( 'Next step', 'dandt-theme' ) . '</h2><!-- /wp:heading -->' .
                    '<!-- wp:paragraph --><p>' . esc_html__( 'Tell us about your business and we will get back to you within one working day.', 'dandt-theme' ) . '</p><!-- /wp:paragraph -->' .
                '</div>' .
                '<!-- /wp:group -->' .
                '<!-- wp:buttons -->' .
                '<div class="wp-block-buttons">' .
                    '<!-- wp:button {"url":"/contact/"} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">' . esc_html__( 'Get in Touch', 'dandt-theme' ) . '</a></div><!-- /wp:button -->' .
                '</div>' .
                '<!-- /wp:buttons -->' .
            '</div>' .
            '<!-- /wp:group -->',
    ) );
}
add_action( 'init', 'dandt_register_block_patterns' );
