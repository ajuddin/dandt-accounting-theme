<?php
/**
 * Single blog post (Resources article). The closing CTA is part of each
 * article's own content (same dandt-cta-band pattern used on service
 * pages), not hardcoded here, since each article links to a different
 * specific service page - see the brief's content plan.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();
    ?>
    <section class="dandt-section-tight">
        <div class="dandt-container dandt-section-head">
            <h1 class="dandt-h1"><?php the_title(); ?></h1>
            <p class="dandt-post-meta">
                <?php echo esc_html( get_the_date() ); ?>
            </p>
        </div>
        <div class="dandt-container">
            <div class="dandt-page-hero">
                <?php
                dandt_hero_media(
                    'calendar',
                    '/assets/images/resources/' . get_post_field( 'post_name' ) . '.webp',
                    get_the_title()
                );
                ?>
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
