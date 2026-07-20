<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">
    <div class="gn-layout">

        <!-- Konten Utama: Daftar Arsip Post -->
        <div class="gn-content">
            
            <header class="gn-section__header">
                <div>
                    <h1 class="gn-section__title" style="font-size: 2.2rem;">
                        <?php the_archive_title(); ?>
                    </h1>
                    <?php if (get_the_archive_description()) : ?>
                        <div class="gn-section__description">
                            <?php the_archive_description(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (have_posts()) : ?>
                
                <div class="gn-grid gn-grid-2">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article class="gn-card">
                            <a class="gn-card__image" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <div class="gn-card__image-placeholder">
                                        <?php bloginfo('name'); ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                            <div class="gn-card__body">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                ?>
                                    <span class="gn-card__badge">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                <?php endif; ?>

                                <h2 class="gn-card__title gn-line-clamp-2">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <!-- NARASI BERITA HALAMAN ARSIP -->
                                <p class="gn-card__excerpt">
                                    <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                                </p>

                                <div class="gn-card__meta">
                                    <span><?php echo esc_html(get_the_date()); ?></span>
                                    <span><?php the_author(); ?></span>
                                </div>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>

                <!-- Navigasi Halaman Premium -->
                <div class="gn-pagination" style="margin-top: 48px; display: flex; gap: var(--gn-space-2);">
                    <?php
                    echo paginate_links([
                        'prev_text' => '&larr; Prev',
                        'next_text' => 'Next &rarr;',
                    ]);
                    ?>
                </div>

            <?php else : ?>
                <p class="gn-empty">Belum ada artikel yang diterbitkan pada arsip ini.</p>
            <?php endif; ?>

        </div>

        <!-- Sidebar Modular Arsip -->
        <aside class="gn-sidebar">
            <div class="gn-widget">
                <h3 class="gn-widget__title">Terpopuler</h3>
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
                        echo '<p class="gn-empty">Belum ada berita terpopuler.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </aside>

    </div>
</div>

<?php

get_footer();