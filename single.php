<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Mengambil konfigurasi toggle dari customizer
$show_progress_bar  = get_theme_mod('gesahan_enable_progress_bar', '1') === '1';
$show_share_buttons = get_theme_mod('gesahan_enable_share_buttons', '1') === '1';

?>

<!-- Reading Progress Bar (Mendeteksi scroll membaca artikel) -->
<?php if ($show_progress_bar) : ?>
    <div class="gn-progress-container">
        <div id="gnReadingBar" class="gn-progress-bar"></div>
    </div>
<?php endif; ?>

<div class="gn-container">
    <div class="gn-layout">
        
        <!-- Sisi Kiri: Artikel Utama (Content First) -->
        <div class="gn-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article class="gn-post">
                        
                        <div class="gn-post__header">
                            <?php gesahan_breadcrumbs(); ?>
                            
                            <span class="gn-reading-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <?php echo esc_html(gesahan_get_reading_time(get_the_content())); ?>
                            </span>
                        </div>

                        <h1 class="gn-post__title">
                            <?php the_title(); ?>
                        </h1>

                        <div class="gn-post__meta">
                            <div class="gn-post__author">
                                <?php echo get_avatar(get_the_author_meta('ID'), 44); ?>
                                <div class="gn-post__author-info">
                                    <span class="gn-post__author-name"><?php the_author_posts_link(); ?></span>
                                    <span class="gn-post__date"><?php echo esc_html(get_the_date()); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Modul Premium Social Share Buttons Atas -->
                        <?php if ($show_share_buttons) : ?>
                            <div class="gn-share-buttons">
                                <span class="gn-share-buttons__label"><?php esc_html_e('BAGIKAN:', 'gesahan-news-pro'); ?></span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>" class="gn-share-btn gn-share-btn--facebook" target="_blank" rel="noopener">
                                    FB
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" class="gn-share-btn gn-share-btn--twitter" target="_blank" rel="noopener">
                                    TW
                                </a>
                                <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_permalink()); ?>" class="gn-share-btn gn-share-btn--whatsapp" target="_blank" rel="noopener">
                                    WA
                                </a>
                                <button class="gn-share-btn gn-share-btn--copy" data-url="<?php echo esc_url(get_permalink()); ?>" aria-label="Salin Tautan">
                                    Link
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if (has_post_thumbnail()) : ?>
                            <figure class="gn-post__featured">
                                <?php the_post_thumbnail('large'); ?>
                                <?php if (get_the_post_thumbnail_caption()) : ?>
                                    <figcaption class="gn-post__caption">
                                        <?php the_post_thumbnail_caption(); ?>
                                    </figcaption>
                                <?php endif; ?>
                            </figure>
                        <?php endif; ?>

                        <div class="gn-post__entry">
                            <?php the_content(); ?>
                        </div>

                        <?php 
                        $tags_list = get_the_tag_list('', ' ');
                        if ($tags_list) : 
                        ?>
                            <div class="gn-post__tags">
                                <span class="gn-post__tags-label"><?php esc_html_e('TAGS:', 'gesahan-news-pro'); ?></span>
                                <?php echo wp_kses_post($tags_list); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Premium Author Box -->
                        <div class="gn-author-box">
                            <div class="gn-author-box__avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                            </div>
                            <div class="gn-author-box__content">
                                <h3 class="gn-author-box__name">
                                    <?php the_author_posts_link(); ?>
                                </h3>
                                <p class="gn-author-box__bio">
                                    <?php 
                                    $author_desc = get_the_author_meta('description');
                                    echo !empty($author_desc) ? esc_html($author_desc) : esc_html__('Penulis aktif yang membagikan konten berkualitas di portal berita ini.', 'gesahan-news-pro');
                                    ?>
                                </p>
                            </div>
                        </div>

                        <!-- Related Posts Grid -->
                        <?php
                        $related = gesahan_get_related_posts(get_the_ID(), 3);
                        if ($related->have_posts()) :
                        ?>
                            <div class="gn-related">
                                <h3 class="gn-related__title"><?php esc_html_e('Berita Terkait', 'gesahan-news-pro'); ?></h3>
                                <div class="gn-grid gn-grid-3">
                                    <?php 
                                    while ($related->have_posts()) : 
                                        $related->the_post(); 
                                    ?>
                                        <article class="gn-card">
                                            <a class="gn-card__image" href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium'); ?>
                                                <?php endif; ?>
                                            </a>
                                            <div class="gn-card__body">
                                                <h4 class="gn-card__title gn-line-clamp-2">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                        </article>
                                    <?php 
                                    endwhile; 
                                    wp_reset_postdata(); 
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Comments Section -->
                        <?php 
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                        ?>

                    </article>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <!-- Sisi Kanan: Sidebar Modular -->
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