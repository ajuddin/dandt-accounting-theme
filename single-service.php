<?php
/**
 * Single service page. One template for all 14 service entries - content is
 * authored entirely in the block editor using the "D&T: Service Page
 * Template" pattern.
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
            <?php if ( has_excerpt() ) : ?>
                <p class="dandt-lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
            <?php endif; ?>
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
