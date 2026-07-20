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

<section class="gn-section gn-video-section">
    
    <header class="gn-section__header">
        <div>
            <h2 class="gn-section__title">
                <?php esc_html_e('Galeri Video', 'gesahan-news-pro'); ?>
            </h2>
            <p class="gn-section__description">
                <?php esc_html_e('Saksikan liputan berita terbaru kami lewat tayangan audio visual.', 'gesahan-news-pro'); ?>
            </p>
        </div>
        <div class="gn-section__action">
            <?php
            $video_cat = get_category_by_slug('video');
            $video_link = $video_cat ? get_category_link($video_cat->term_id) : home_url('/');
            ?>
            <a href="<?php echo esc_url($video_link); ?>">
                <?php esc_html_e('Lihat Semua Video', 'gesahan-news-pro'); ?> &rarr;
            </a>
        </div>
    </header>

    <div class="gn-grid gn-grid-3">
        <?php 
        while ($video_query->have_posts()) : 
            $video_query->the_post(); 
            // Pos video tidak ditrack di tracker utama agar pembaca tetap dapat menemukannya di list artikel text biasa jika diperlukan
        ?>
            <article class="gn-card gn-video-card">
                
                <a class="gn-card__image gn-video-card__thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <div class="gn-card__image-placeholder">
                            <?php bloginfo('name'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Ikon Tombol Putar (Play Button Overlay) -->
                    <div class="gn-video-card__play-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg>
                    </div>
                </a>

                <div class="gn-card__body">
                    <h3 class="gn-card__title gn-line-clamp-2">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="gn-card__meta">
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span><?php the_author(); ?></span>
                    </div>
                </div>

            </article>
        <?php 
        endwhile; 
        wp_reset_postdata(); 
        ?>
    </div>

</section>