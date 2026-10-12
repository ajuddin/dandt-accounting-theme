<?php
/**
 * Single service page. One template for all service entries - content is
 * authored entirely in the block editor using the "D&T: Service Page
 * Template" pattern (see inc/block-patterns.php), which fixes the same six
 * section headings (The problem / What's included / Who it's for / How it
 * works / Pricing / FAQs) across every entry - the jump nav below is
 * hardcoded against that fixed shape rather than built generically, since
 * nothing in this theme produces any other shape.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

/*
 * One icon per service, matching its actual subject rather than reusing a
 * generic mark everywhere - same brand-panel treatment as the homepage, so
 * the two don't look like unrelated design systems.
 */
$service_hero_icons = array(
    'startup-accounting'         => 'building-bank',
    'new-business-starter'       => 'building-bank',
    'sole-trader-accounting'     => 'briefcase',
    'limited-company-accounting' => 'shield-check',
    'self-assessment-tax-returns' => 'receipt',
    'bookkeeping'                => 'calculator',
    'corporation-tax'            => 'receipt',
    'year-end-accounts'          => 'briefcase',
    'vat-returns'                => 'receipt',
    'payroll'                    => 'users',
    'company-formation'          => 'building-bank',
    'tax-planning'               => 'calculator',
    'management-accounts'        => 'briefcase',
    'making-tax-digital'         => 'calculator',
    'switching-accountants'      => 'shield-check',
);

while ( have_posts() ) :
    the_post();
    $hero_icon = $service_hero_icons[ get_post_field( 'post_name' ) ] ?? 'briefcase';
    ?>
    <section class="dandt-section-tight">
        <div class="dandt-container dandt-service-hero">
            <div class="dandt-service-hero-copy">
                <h1 class="dandt-h1"><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?>
                    <p class="dandt-lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <?php endif; ?>
                <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/book-a-consultation/' ) ); ?>">
                    <?php esc_html_e( 'Book a Consultation', 'dandt-theme' ); ?>
                </a>
            </div>
            <div class="dandt-service-hero-media">
                <?php dandt_brand_panel( $hero_icon ); ?>
            </div>
        </div>
    </section>

    <?php
    /*
     * Jump nav: these pages run long (seven sections), so a quick way to
     * skip to Pricing or FAQs is a real navigation aid, not decoration.
     * Heading ids are assigned client-side in main.js by slugifying each
     * .entry-content h2's own text, matched against these same fixed
     * section titles.
     */
    ?>
    <nav class="dandt-service-jump" aria-label="<?php esc_attr_e( 'Jump to a section', 'dandt-theme' ); ?>">
        <div class="dandt-container dandt-service-jump-row">
            <a href="#the-problem"><?php esc_html_e( 'The problem', 'dandt-theme' ); ?></a>
            <a href="#whats-included"><?php esc_html_e( "What's included", 'dandt-theme' ); ?></a>
            <a href="#who-its-for"><?php esc_html_e( "Who it's for", 'dandt-theme' ); ?></a>
            <a href="#how-it-works"><?php esc_html_e( 'How it works', 'dandt-theme' ); ?></a>
            <a href="#pricing"><?php esc_html_e( 'Pricing', 'dandt-theme' ); ?></a>
            <a href="#faqs"><?php esc_html_e( 'FAQs', 'dandt-theme' ); ?></a>
        </div>
    </nav>

    <section class="dandt-section-tight">
        <div class="dandt-container entry-content">
            <?php the_content(); ?>
        </div>
    </section>
    <?php
endwhile;

get_footer();
