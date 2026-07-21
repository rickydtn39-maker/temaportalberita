<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">
    <div class="gn-layout">

        <!-- Konten Utama: Daftar Arsip Post (Premium 2-Column Grid) -->
        <div class="gn-content">
            
            <header class="gn-section__header-premium">
                <div class="gn-section__title-wrapper">
                    <span class="gn-section__accent-tag"><?php esc_html_e('ARSIP BERITA', 'gesahan-news-pro'); ?></span>
                    <h1 class="gn-section__title-premium" style="font-size: var(--gn-font-size-2xl);">
                        <?php the_archive_title(); ?>
                    </h1>
                    <?php if (get_the_archive_description()) : ?>
                        <p class="gn-section__description-premium" style="color: var(--gn-color-meta); margin-top: var(--gn-space-2); font-size: var(--gn-font-size-sm); line-height: var(--gn-line-height-base);">
                            <?php the_archive_description(); ?>
                        </p>
                    <?php endif; ?>
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

                <!-- Navigasi Halaman Premium (Borderless & Spacious) -->
                <div class="gn-pagination" style="margin-top: var(--gn-space-8); display: flex; gap: var(--gn-space-2);">
                    <?php
                    echo paginate_links([
                        'prev_text' => '&larr; Prev',
                        'next_text' => 'Next &rarr;',
                    ]);
                    ?>
                </div>

            <?php else : ?>
                <p class="gn-empty"><?php esc_html_e('Belum ada artikel yang diterbitkan pada arsip ini.', 'gesahan-news-pro'); ?></p>
            <?php endif; ?>

        </div>

        <!-- Sidebar Modular Arsip -->
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