<?php
/**
 * Fallback template, required by WordPress. Front page, pages and 404 are
 * all handled by their own templates; this only renders for post types this
 * theme does not otherwise have a template for.
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section">
    <div class="dandt-container">
        <?php if ( have_posts() ) : ?>
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article style="margin-bottom: 3rem;">
                    <h1 class="dandt-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="dandt-body" style="max-width: 70ch; margin-top: 1rem;"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="dandt-body"><?php esc_html_e( 'Nothing found.', 'dandt-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
