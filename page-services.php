<?php
/**
 * Services hub page. Lists the "service" post type, grouped by the
 * service_group taxonomy, in the order set when the groups were seeded
 * (see inc/custom-post-types.php). Matched automatically to the page with
 * slug "services" by WordPress's template hierarchy.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$groups = get_terms( array(
    'taxonomy'   => 'service_group',
    'hide_empty' => false,
    'meta_key'   => 'dandt_order',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
) );
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Accounting services', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Compliance work and the everyday numbers, handled so you can focus on running your business.', 'dandt-theme' ); ?></p>
    </div>
</section>

<?php if ( is_wp_error( $groups ) || empty( $groups ) ) : ?>

    <section class="dandt-section-tight">
        <div class="dandt-container">
            <p class="dandt-body"><?php esc_html_e( 'Service pages are being added. Check back shortly, or get in touch directly.', 'dandt-theme' ); ?></p>
        </div>
    </section>

<?php else : ?>

    <?php foreach ( $groups as $group ) :
        $services = get_posts( array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'tax_query'      => array( array(
                'taxonomy' => 'service_group',
                'field'    => 'term_id',
                'terms'    => $group->term_id,
            ) ),
        ) );
        if ( ! $services ) {
            continue;
        }
        ?>
        <section class="dandt-section-tight">
            <div class="dandt-container">
                <h2 class="dandt-h2" style="margin-bottom: 1.5rem;"><?php echo esc_html( $group->name ); ?></h2>
                <div class="dandt-services-grid" style="grid-template-columns: repeat(3, 1fr);">
                    <?php foreach ( $services as $i => $service ) :
                        $is_featured = ( 0 === $i );
                        $grad_class  = 'dandt-card-media--grad-' . ( ( $i % 3 ) + 1 );
                        ?>
                        <article class="dandt-service-card dandt-service-card--media<?php echo $is_featured ? ' dandt-service-card--featured' : ''; ?> dandt-reveal">
                            <div class="dandt-card-media <?php echo esc_attr( $grad_class ); ?>">
                                <?php dandt_brand_panel( dandt_service_icon( $service->post_name ) ); ?>
                            </div>
                            <div class="dandt-card-content">
                                <h3 class="dandt-h3"><a class="dandt-service-card-title" href="<?php echo esc_url( get_permalink( $service ) ); ?>"><?php echo esc_html( get_the_title( $service ) ); ?></a></h3>
                                <?php if ( $service->post_excerpt ) : ?>
                                    <p class="dandt-body"><?php echo esc_html( $service->post_excerpt ); ?></p>
                                <?php endif; ?>
                                <span class="dandt-service-card-cta">
                                    <?php esc_html_e( 'Learn More', 'dandt-theme' ); ?>
                                    <?php dandt_icon( 'chevron-right' ); ?>
                                </span>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

<?php endif; ?>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <div class="dandt-cta-band dandt-reveal">
            <div>
                <h2 class="dandt-h2"><?php esc_html_e( 'Not sure which service you need?', 'dandt-theme' ); ?></h2>
                <p class="dandt-body"><?php esc_html_e( 'Tell us about your business and we will recommend where to start.', 'dandt-theme' ); ?></p>
            </div>
            <a class="dandt-btn dandt-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'dandt-theme' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
