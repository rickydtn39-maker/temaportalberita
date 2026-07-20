<?php

if (!defined('ABSPATH')) {
    exit;
}

$popular = new WP_Query([
    'posts_per_page' => 6,
    'post_status' => 'publish'
]);
?>

<section class="popular-news">

    <div class="section-title">

        <span>POPULAR NEWS</span>

    </div>

    <div class="popular-grid">

        <?php while ($popular->have_posts()) : $popular->the_post(); ?>

            <article class="popular-item">

                <a href="<?php the_permalink(); ?>">

                    <?php if (has_post_thumbnail()) : ?>

                        <?php the_post_thumbnail('medium_large'); ?>

                    <?php endif; ?>

                    <h3>

                        <?php the_title(); ?>

                    </h3>

                </a>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php wp_reset_postdata(); ?>