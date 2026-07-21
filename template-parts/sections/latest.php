<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$latest_posts = gesahan_get_latest_posts(6);
?>

<section class="gn-section gn-latest">
    <header class="gn-section__header-premium">
        <div class="gn-section__title-wrapper">
            <span class="gn-section__accent-tag"><?php esc_html_e('BERKALA', 'gesahan-news-pro'); ?></span>
            <h2 class="gn-section__title-premium"><?php esc_html_e('Kabar Informasi Terbaru', 'gesahan-news-pro'); ?></h2>
        </div>
        <div class="gn-section__action-premium">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
                <?php esc_html_e('Lihat Semua Berita', 'gesahan-news-pro'); ?> →
            </a>
        </div>
    </header>

    <div class="gn-grid gn-grid-3">
        <?php if ($latest_posts->have_posts()) : ?>
            <?php 
            while ($latest_posts->have_posts()) : 
                $latest_posts->the_post(); 
                // Track ID agar aman dari duplikasi di arsip/widget bawah jika ada
                Gesahan_Query_Tracker::track(get_the_ID());
                $categories = get_the_category();
            ?>
                <article class="gn-card gn-latest-card">
                    <a class="gn-card__image-wrapper" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <div class="gn-card__image-placeholder">
                                <?php bloginfo('name'); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                    <div class="gn-card__body-premium">
                        <?php if (!empty($categories)) : ?>
                            <span class="gn-card__badge-premium-inline">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>
                        <h3 class="gn-card__title-premium">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="gn-card__excerpt-premium">
                            <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                        </p>
                        <div class="gn-card__meta-premium">
                            <span class="gn-author"><?php the_author(); ?></span>
                            <span class="gn-bullet">•</span>
                            <span class="gn-date"><?php echo esc_html(get_the_date()); ?></span>
                        </div>
                    </div>
                </article>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
            ?>
        <?php else : ?>
            <p class="gn-empty"><?php esc_html_e('Belum ada artikel terbaru.', 'gesahan-news-pro'); ?></p>
        <?php endif; ?>
    </div>
</section>