<?php

if (!defined('ABSPATH')) {
    exit;
}

$query = new WP_Query([
    'posts_per_page' => 3,
    'offset'         => 12
]);

if (!$query->have_posts()) {
    return;
}
?>

<section class="editor-choice">

    <div class="section-title">

        <span>EDITOR'S CHOICE</span>

    </div>

    <div class="choice-grid">

        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <article class="choice-card">

                <a href="<?php the_permalink(); ?>">

                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php endif; ?>

                    <h3><?php the_title(); ?></h3>

                </a>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php wp_reset_postdata(); ?>