<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Mengambil 4 berita terpopuler untuk disajikan secara horizontal
$trending_query = gesahan_get_trending_posts(4);
if (!$trending_query->have_posts()) {
    return;
}
?>

<section class="gn-section gn-trending-strip-section">
    <header class="gn-section__header-premium">
        <div class="gn-section__title-wrapper">
            <span class="gn-section__accent-tag"><?php esc_html_e('LIVE', 'gesahan-news-pro'); ?></span>
            <h2 class="gn-section__title-premium"><?php esc_html_e('Sedang Hangat Dibicarakan', 'gesahan-news-pro'); ?></h2>
        </div>
    </header>

    <div class="gn-grid gn-grid-4 gn-trending-strip">
        <?php
        while ($trending_query->have_posts()) : $trending_query->the_post();
            // Lacak ID agar tidak duplikat di section bawahnya
            Gesahan_Query_Tracker::track(get_the_ID());
            $categories = get_the_category();
        ?>
            <article class="gn-card-trending-strip">
                <a class="gn-card-trending-strip__image-wrapper" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else : ?>
                        <div class="gn-card-trending-strip__placeholder">
                            <?php bloginfo('name'); ?>
                        </div>
                    <?php endif; ?>
                </a>
                
                <div class="gn-card-trending-strip__body">
                    <?php if (!empty($categories)) : ?>
                        <span class="gn-card-trending-strip__badge">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    <?php endif; ?>
                    <h3 class="gn-card-trending-strip__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <span class="gn-card-trending-strip__date"><?php echo esc_html(get_the_date()); ?></span>
                </div>
            </article>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>