<?php
/**
 * Single "Who We Help" audience/location page. One template for all 5
 * entries - content is authored in the block editor.
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
