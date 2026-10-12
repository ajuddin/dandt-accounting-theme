<?php
/**
 * Single "Who We Help" audience page. One template for all 5 entries -
 * content is authored in the block editor. Same hero-banner treatment as
 * single-service.php for visual consistency across the two CPTs, but no
 * jump nav - these pages don't follow a fixed multi-section template the
 * way service pages do, so a hardcoded anchor list doesn't apply here.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();
    $hero_icon = dandt_location_icon( get_post_field( 'post_name' ) );
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

    <section class="dandt-section-tight">
        <div class="dandt-container entry-content">
            <?php the_content(); ?>
        </div>
    </section>
    <?php
endwhile;

get_footer();
