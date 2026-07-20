<?php

if (!defined('ABSPATH')) {
    exit;
}

$query = new WP_Query([
    'posts_per_page' => 5,
    'post_status'    => 'publish'
]);

if (!$query->have_posts()) {
    return;
}
?>

<div class="sidebar-widget trending-widget">

    <div class="sidebar-title">

        🔥 TRENDING

    </div>

    <div class="trending-list">

        <?php

        $no = 1;

        while ($query->have_posts()) :

            $query->the_post();

        ?>

            <article class="trending-item">

                <div class="trending-number">

                    <?php echo $no; ?>

                </div>

                <div class="trending-content">

                    <?php if (has_post_thumbnail()) : ?>

                        <a href="<?php the_permalink(); ?>" class="trending-thumb">

                            <?php the_post_thumbnail('thumbnail'); ?>

                        </a>

                    <?php endif; ?>

                    <div class="trending-text">

                        <h4>

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h4>

                        <span class="trending-time">

                            <?php echo get_the_date('H:i'); ?> WIB

                        </span>

                    </div>

                </div>

            </article>

        <?php

            $no++;

        endwhile;

        ?>

    </div>

</div>

<?php get_template_part('template-parts/sidebar/ads'); ?>

<?php wp_reset_postdata(); ?>