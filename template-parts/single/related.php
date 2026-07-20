<?php

if (!defined('ABSPATH')) {
    exit;
}

$categories = get_the_category();

if (empty($categories)) {
    return;
}

$related = new WP_Query([
    'posts_per_page' => 3,
    'post__not_in' => [get_the_ID()],
    'category__in' => [$categories[0]->term_id]
]);

if (!$related->have_posts()) {
    return;
}
?>

<div class="related-posts">

    <h3 class="related-title">

        Berita Terkait

    </h3>

    <div class="related-grid">

        <?php while ($related->have_posts()) : $related->the_post(); ?>

            <article class="related-item">

                <a href="<?php the_permalink(); ?>">

                    <?php the_post_thumbnail('medium'); ?>

                    <h4><?php the_title(); ?></h4>

                </a>

            </article>

        <?php endwhile; ?>

    </div>

</div>

<?php wp_reset_postdata(); ?>