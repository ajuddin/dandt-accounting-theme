<?php
/**
 * Who We Help hub page. Lists the "location" post type (used for the five
 * audience pages: new businesses, sole traders, freelancers, limited
 * companies, small businesses with employees). Matched automatically to the
 * page with slug "who-we-help".
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$audiences = get_posts( array(
    'post_type'      => 'location',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
) );
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Who we help', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Accounting support shaped around the kind of business you run.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <?php if ( ! $audiences ) : ?>
            <p class="dandt-body"><?php esc_html_e( 'These pages are being added. Check back shortly, or get in touch directly.', 'dandt-theme' ); ?></p>
        <?php else : ?>
            <div class="dandt-services-grid" style="grid-template-columns: repeat(3, 1fr);">
                <?php foreach ( $audiences as $audience ) : ?>
                    <article class="dandt-service-card dandt-reveal">
                        <h2 class="dandt-h3"><a href="<?php echo esc_url( get_permalink( $audience ) ); ?>"><?php echo esc_html( get_the_title( $audience ) ); ?></a></h2>
                        <?php if ( $audience->post_excerpt ) : ?>
                            <p class="dandt-body"><?php echo esc_html( $audience->post_excerpt ); ?></p>
                        <?php endif; ?>
                        <a class="dandt-btn dandt-btn-outline" href="<?php echo esc_url( get_permalink( $audience ) ); ?>">
                            <?php esc_html_e( 'Learn More', 'dandt-theme' ); ?>
                            <?php dandt_icon( 'chevron-right' ); ?>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Don\'t see your situation listed?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'We work with all kinds of small businesses. Get in touch and tell us about yours.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
