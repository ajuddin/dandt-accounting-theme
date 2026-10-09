<?php
/**
 * Generic page template fallback, for any page without a dedicated
 * page-{slug}.php template.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section">
    <div class="dandt-container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <h1 class="dandt-h1"><?php the_title(); ?></h1>
            <div class="dandt-body" style="max-width: 70ch; margin-top: 1.5rem;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
