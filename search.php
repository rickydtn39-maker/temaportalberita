<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">
    <div class="gn-layout">

        <!-- Konten Utama: Daftar Hasil Pencarian (Clean 2-Column Grid) -->
        <div class="gn-content">
            
            <header class="gn-section__header-premium">
                <div class="gn-section__title-wrapper">
                    <span class="gn-section__accent-tag"><?php esc_html_e('HASIL PENCARIAN', 'gesahan-news-pro'); ?></span>
                    <h1 class="gn-section__title-premium" style="font-size: var(--gn-font-size-2xl);">
                        <?php 
                        printf(
                            esc_html__('Kata Kunci: "%s"', 'gesahan-news-pro'),
                            get_search_query()
                        ); 
                        ?>
                    </h1>
                    <p class="gn-section__description-premium" style="color: var(--gn-color-meta); margin-top: var(--gn-space-1); font-size: var(--gn-font-size-sm);">
                        <?php 
                        global $wp_query;
                        printf(
                            esc_html__('Ditemukan %d artikel yang relevan dengan kueri pencarian Anda.', 'gesahan-news-pro'),
                            $wp_query->found_posts
                        );
                        ?>
                    </p>
                </div>
            </header>

            <?php if (have_posts()) : ?>
                
                <div class="gn-grid gn-grid-2">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php 
                        $categories = get_the_category();
                        ?>
                        <article class="gn-card">
                            <a class="gn-card__image-wrapper" href="<?php the_permalink(); ?>">
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

                                <h2 class="gn-card__title-premium">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

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
                    <?php endwhile; ?>
                </div>

                <!-- Navigasi Halaman -->
                <div class="gn-pagination" style="margin-top: var(--gn-space-8); display: flex; gap: var(--gn-space-2);">
                    <?php
                    echo paginate_links([
                        'prev_text' => '&larr; Prev',
                        'next_text' => 'Next &rarr;',
                    ]);
                    ?>
                </div>

            <?php else : ?>
                <div class="gn-empty-search" style="text-align: center; padding: var(--gn-space-8) var(--gn-space-4); background: var(--gn-color-surface); border-radius: var(--gn-radius-lg); box-shadow: var(--gn-shadow-md);">
                    <h3 style="font-size: var(--gn-font-size-lg); margin-bottom: var(--gn-space-3);"><?php esc_html_e('Maaf, tidak ada artikel yang cocok.', 'gesahan-news-pro'); ?></h3>
                    <p style="color: var(--gn-color-meta); max-width: 480px; margin: 0 auto var(--gn-space-5); line-height: 1.6;">
                        <?php esc_html_e('Kueri kata kunci Anda tidak menemukan kecocokan di database intelijen berita kami. Silakan coba mencari dengan kata kunci fungsional lainnya di bawah ini.', 'gesahan-news-pro'); ?>
                    </p>
                    <div style="max-width: 480px; margin: 0 auto;">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <!-- Sidebar Modular Pencarian -->
        <aside class="gn-sidebar">
            <div class="gn-widget">
                <h3 class="gn-widget__title"><?php esc_html_e('Terpopuler', 'gesahan-news-pro'); ?></h3>
                <div class="gn-widget__list">
                    <?php
                    $trending = gesahan_get_trending_posts(5);
                    if ($trending->have_posts()) :
                        while ($trending->have_posts()) : $trending->the_post();
                    ?>
                        <article class="gn-widget__card">
                            <h4 class="gn-widget__card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="gn-empty">' . esc_html__('Belum ada berita terpopuler.', 'gesahan-news-pro') . '</p>';
                    endif;
                    ?>
                </div>
            </div>
        </aside>

    </div>
</div>

<?php

get_footer();