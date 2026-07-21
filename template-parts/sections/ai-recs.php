<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$recs = nusantara_get_ai_recommendations(5);

if (!$recs->have_posts()) {
    return;
}
?>

<section class="gn-section gn-ai-recs">
    <div class="gn-ai-recs__card">
        
        <div class="gn-ai-recs__header">
            <span class="gn-ai-recs__icon">🤖</span>
            <div>
                <h2 class="gn-ai-recs__title"><?php esc_html_e('AI Rekomendasi Untuk Anda', 'nusantara-one'); ?></h2>
                <p class="gn-ai-recs__desc"><?php esc_html_e('Rekomendasi berita yang disesuaikan secara real-time berdasarkan minat baca Anda.', 'nusantara-one'); ?></p>
            </div>
        </div>

        <div class="gn-ai-recs__list">
            <?php while ($recs->have_posts()) : $recs->the_post(); ?>
                <article class="gn-ai-recs__item">
                    <a class="gn-ai-recs__item-image" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail'); endif; ?>
                    </a>
                    <div class="gn-ai-recs__item-body">
                        <h3 class="gn-ai-recs__item-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <span class="gn-ai-recs__item-match">99% Match</span>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>
</section>