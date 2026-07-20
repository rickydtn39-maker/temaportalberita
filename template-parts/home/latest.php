<?php

if (!defined('ABSPATH')) {
    exit;
}

$query = new WP_Query([
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'offset'         => 5
]);

if (!$query->have_posts()) {
    return;
}
?>

<section class="latest-news">

    <div class="section-title">

        BERITA TERBARU

    </div>

    <div class="latest-grid">

        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <article class="latest-item">

                <a href="<?php the_permalink(); ?>" class="latest-thumb">

                    <?php if (has_post_thumbnail()) : ?>

                        <?php the_post_thumbnail('medium_large'); ?>

                    <?php endif; ?>

                </a>

                <div class="latest-content">

                    <span class="latest-category">

                        <?php

                        $cats = get_the_category();

                        echo !empty($cats)
                            ? esc_html($cats[0]->name)
                            : 'NEWS';

                        ?>

                    </span>

                    <h3>

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>

                    </h3>

                    <p>

                        <?php echo wp_trim_words(get_the_excerpt(), 18); ?>

                    </p>

                    <div class="latest-meta">

                        <?php echo get_the_date('d M Y'); ?>

                    </div>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php wp_reset_postdata(); ?>