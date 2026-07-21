<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$video_query = gesahan_get_video_posts(3);
if (!$video_query->have_posts()) {
    return;
}
?>

<div class="gn-video-hub-wrap">
    <section class="gn-section gn-video-section">
        <header class="gn-section__header-premium">
            <div class="gn-section__title-wrapper">
                <span class="gn-section__accent-tag"><?php esc_html_e('AUDIO VISUAL', 'gesahan-news-pro'); ?></span>
                <h2 class="gn-section__title-premium" style="color: #ffffff;"><?php esc_html_e('Galeri Liputan Video', 'gesahan-news-pro'); ?></h2>
            </div>
            <div class="gn-section__action-premium">
                <?php
                $video_cat = get_category_by_slug('video');
                $video_link = $video_cat ? get_category_link($video_cat->term_id) : home_url('/');
                ?>
                <a href="<?php echo esc_url($video_link); ?>" style="color: rgba(255, 255, 255, 0.6); hover:color: #ffffff;">
                    <?php esc_html_e('Lihat Semua Video', 'gesahan-news-pro'); ?> →
                </a>
            </div>
        </header>

        <div class="gn-grid gn-grid-3">
            <?php 
            while ($video_query->have_posts()) : 
                $video_query->the_post(); 
                // Video post sengaja dilewati dari tracker duplikasi agar fleksibel dibaca kembali
            ?>
                <article class="gn-card gn-video-card">
                    <div class="gn-video-card__thumb-container">
                        <a class="gn-video-card__thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div class="gn-card__image-placeholder">
                                    <?php bloginfo('name'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Premium Centered Glassmorphism Play Button Overlay -->
                            <div class="gn-video-card__play-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg>
                            </div>
                        </a>
                    </div>
                    
                    <div class="gn-video-card__body">
                        <h3 class="gn-video-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="gn-video-card__meta">
                            <span><?php echo esc_html(get_the_date()); ?></span>
                        </div>
                    </div>
                </article>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
            ?>
        </div>
    </section>
</div>