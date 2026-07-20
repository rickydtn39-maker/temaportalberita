<?php

if (!defined('ABSPATH')) {
    exit;
}

$categories = get_categories([
    'hide_empty' => true,
    'number'     => 3
]);

foreach ($categories as $category) :

$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'cat'            => $category->term_id
]);

if (!$query->have_posts()) {
    continue;
}
?>

<section class="category-block">

    <div class="section-title">

        <span><?php echo esc_html($category->name); ?></span>

    </div>

    <div class="category-grid">

        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <article class="category-card">

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

<?php
wp_reset_postdata();
endforeach;