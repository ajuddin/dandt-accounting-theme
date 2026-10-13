<?php
/**
 * Blog index (the "Resources" page, set as page_for_posts in Reading
 * settings - see functions.php for why that's needed rather than just
 * creating a page-resources.php template: WordPress always renders the
 * designated posts page through home.php, ignoring any page template
 * assigned to it).
 *
 * @package dandt-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="dandt-section-tight">
    <div class="dandt-container dandt-section-head">
        <h1 class="dandt-h1"><?php esc_html_e( 'Resources', 'dandt-theme' ); ?></h1>
        <p class="dandt-lede"><?php esc_html_e( 'Plain-English guides to starting and running a small business - the questions people actually ask before they ask an accountant.', 'dandt-theme' ); ?></p>
    </div>
</section>

<section class="dandt-section-tight">
    <div class="dandt-container">
        <?php if ( have_posts() ) : ?>
            <div class="dandt-services-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="dandt-service-card dandt-service-card--link dandt-reveal">
                        <h2 class="dandt-h3"><a class="dandt-service-card-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="dandt-body"><?php echo esc_html( get_the_excerpt() ); ?></p>
                        <span class="dandt-service-card-cta">
                            <?php esc_html_e( 'Read More', 'dandt-theme' ); ?>
                            <?php dandt_icon( 'chevron-right' ); ?>
                        </span>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p class="dandt-body"><?php esc_html_e( 'Articles are being added. Check back shortly.', 'dandt-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
