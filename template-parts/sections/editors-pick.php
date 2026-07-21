<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$editors_query = gesahan_get_editors_choice_posts(4);
if (!$editors_query->have_posts()) {
    return;
}
?>

<section class="gn-section gn-editors-pick">
    <header class="gn-section__header-premium">
        <div class="gn-section__title-wrapper">
            <span class="gn-section__accent-tag"><?php esc_html_e('PILIHAN', 'gesahan-news-pro'); ?></span>
            <h2 class="gn-section__title-premium"><?php esc_html_e('Rekomendasi Utama Redaksi', 'gesahan-news-pro'); ?></h2>
        </div>
    </header>

    <div class="gn-editors-grid">
        <!-- 1. SISI KIRI: POS UTAMA PILIHAN REDAKSI (CINEMATIC CARD) -->
        <div class="gn-editors-main">
            <?php 
            $editors_query->the_post();
            Gesahan_Query_Tracker::track(get_the_ID());
            $categories = get_the_category();
            ?>
            <article class="gn-card gn-editors-large-card">
                <a class="gn-editors-large-card__image" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <div class="gn-card__image-placeholder"><?php bloginfo('name'); ?></div>
                    <?php endif; ?>
                </a>
                <div class="gn-editors-large-card__body">
                    <?php if (!empty($categories)) : ?>
                        <span class="gn-editors-large-card__badge"><?php echo esc_html($categories[0]->name); ?></span>
                    <?php endif; ?>
                    <h3 class="gn-editors-large-card__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="gn-editors-large-card__excerpt">
                        <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                    </p>
                    <div class="gn-editors-large-card__meta">
                        <span><?php the_author(); ?></span>
                        <span>•</span>
                        <span><?php echo esc_html(get_the_date()); ?></span>
                    </div>
                </div>
            </article>
        </div>

        <!-- 2. SISI KANAN: 3 ARTIKEL LIST MINIMALIS BERNAFAS -->
        <div class="gn-editors-sub-list">
            <?php
            while ($editors_query->have_posts()) : $editors_query->the_post();
                Gesahan_Query_Tracker::track(get_the_ID());
                $sub_cats = get_the_category();
            ?>
                <article class="gn-editors-sub-card">
                    <div class="gn-editors-sub-card__body">
                        <?php if (!empty($sub_cats)) : ?>
                            <span class="gn-editors-sub-card__badge"><?php echo esc_html($sub_cats[0]->name); ?></span>
                        <?php endif; ?>
                        <h4 class="gn-editors-sub-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <span class="gn-editors-sub-card__date"><?php echo esc_html(get_the_date()); ?></span>
                    </div>
                    <a class="gn-editors-sub-card__image" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php endif; ?>
                    </a>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>