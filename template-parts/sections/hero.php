<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Mengambil pos utama pilihan editor atau pos terpopuler / headline terbaru
$hero = gesahan_get_hero_posts(5);
if (!$hero->have_posts()) {
    return;
}
?>

<section class="gn-hero">
    <div class="gn-hero__grid">
        
        <!-- GRID KIRI: CINEMATIC BIG HEADLINE HERO -->
        <div class="gn-hero__main">
            <?php
            $hero->the_post();
            Gesahan_Query_Tracker::track(get_the_ID());
            
            $categories = get_the_category();
            $reading_time = gesahan_get_reading_time(get_the_content());
            ?>
            <article class="gn-card gn-card--cinematic">
                <div class="gn-card__image-container">
                    <a class="gn-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <div class="gn-card__image-placeholder">
                                <?php bloginfo('name'); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                    <!-- Gradient overlay dipasang via CSS di container ini -->
                    <div class="gn-card__cinematic-gradient"></div>
                </div>

                <div class="gn-card__cinematic-body">
                    <?php if (!empty($categories)) : ?>
                        <span class="gn-card__badge-premium">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    <?php endif; ?>

                    <h2 class="gn-card__title-premium">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <!-- Ringkasan Deskripsi 3 Baris -->
                    <p class="gn-card__excerpt-premium">
                        <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                    </p>

                    <div class="gn-card__meta-premium">
                        <span class="gn-author"><?php the_author(); ?></span>
                        <span class="gn-bullet">•</span>
                        <span class="gn-date"><?php echo esc_html(get_the_date()); ?></span>
                        <span class="gn-bullet">•</span>
                        <span class="gn-reading"><?php echo esc_html($reading_time); ?></span>
                        
                        <!-- Premium Share & Action Icons -->
                        <div class="gn-hero-actions">
                            <button class="gn-action-btn gn-share-btn--copy" data-url="<?php the_permalink(); ?>" aria-label="Salin Tautan">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- GRID KANAN: TRENDING/MOST READ POPULAR LIST -->
        <div class="gn-hero__list">
            <div class="gn-trending-header">
                <span class="gn-trending-icon">🔥</span>
                <h3 class="gn-trending-title"><?php esc_html_e('TERPOPULER', 'gesahan-news-pro'); ?></h3>
            </div>

            <div class="gn-trending-container">
                <?php
                // Query berita terpopuler (Trending 24 jam berbasis interaksi / modular)
                $trending = gesahan_get_trending_posts(4);
                $counter = 1;
                
                if ($trending->have_posts()) :
                    while ($trending->have_posts()) : $trending->the_post();
                        // Jangan duplikat dengan pos utama hero
                        Gesahan_Query_Tracker::track(get_the_ID());
                ?>
                    <article class="gn-trending-card">
                        <span class="gn-trending-counter"><?php echo sprintf('%02d', $counter++); ?></span>
                        <div class="gn-trending-card__content">
                            <?php
                            $t_cats = get_the_category();
                            if (!empty($t_cats)) :
                            ?>
                                <span class="gn-trending-card__category"><?php echo esc_html($t_cats[0]->name); ?></span>
                            <?php endif; ?>
                            <h4 class="gn-trending-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="gn-empty">' . esc_html__('Belum ada berita populer.', 'gesahan-news-pro') . '</p>';
                endif;
                ?>
            </div>
        </div>

    </div>
</section>