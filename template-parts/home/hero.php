<?php

if (!defined('ABSPATH')) {
    exit;
}

$hero = new WP_Query([
    'posts_per_page' => 5,
    'post_status'    => 'publish'
]);

if (!$hero->have_posts()) {
    return;
}
?>

<section class="hero-news">

    <?php
    $hero->the_post();
    ?>

    <div class="hero-main">

        <a href="<?php the_permalink(); ?>">

            <?php if (has_post_thumbnail()) : ?>

                <?php the_post_thumbnail('full'); ?>

            <?php endif; ?>

            <div class="hero-overlay">

                <span class="hero-category">

                    <?php

                    $cats = get_the_category();

                    echo !empty($cats)
                        ? esc_html($cats[0]->name)
                        : 'NEWS';

                    ?>

                </span>

                <h2>

                    <?php the_title(); ?>

                </h2>

                <p>

                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>

                </p>

            </div>

        </a>

    </div>

    <aside class="hero-side">

        <div class="hero-side-title">

            🔥 Trending

        </div>

        <?php

        $rank = 1;

        while ($hero->have_posts()) :

            $hero->the_post();

        ?>

            <article class="hero-side-item">

                <?php if (has_post_thumbnail()) : ?>

                    <a href="<?php the_permalink(); ?>">

                        <?php the_post_thumbnail('medium'); ?>

                    </a>

                <?php endif; ?>

                <div class="hero-side-content">

                    <h3>

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>

                    </h3>

                    <span class="hero-side-meta">

                        <?php echo get_the_date('H:i'); ?> WIB

                    </span>

                </div>

            </article>

        <?php

            $rank++;

        endwhile;

        ?>

    </aside>

</section>

<?php wp_reset_postdata(); ?>