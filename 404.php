<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">
    <div class="gn-layout">

        <!-- Sisi Kiri: Informasi Kesalahan 404 -->
        <div class="gn-content">
            <div class="gn-post" style="text-align: center; padding: 64px 32px;">
                
                <span style="font-size: 6rem; font-weight: var(--gn-font-black); color: var(--gn-color-primary); line-height: 1; display: block; margin-bottom: 16px;">
                    404
                </span>

                <h1 style="font-size: 2rem; margin-bottom: 16px; color: var(--gn-color-title);">
                    <?php esc_html_e('Halaman Tidak Ditemukan', 'gesahan-news-pro'); ?>
                </h1>

                <p style="color: var(--gn-color-meta); max-width: 520px; margin-inline: auto; margin-bottom: 32px; font-size: 1.05rem;">
                    <?php esc_html_e('Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan. Gunakan kotak pencarian di bawah untuk menemukan topik yang Anda cari.', 'gesahan-news-pro'); ?>
                </p>

                <div style="max-width: 480px; margin-inline: auto; margin-bottom: 24px;">
                    <?php get_search_form(); ?>
                </div>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="gn-card__badge" style="display: inline-flex; align-items: center; padding: 10px 24px; border-radius: var(--gn-radius-sm); font-size: var(--gn-font-size-sm); float: none;">
                    <?php esc_html_e('Kembali ke Beranda', 'gesahan-news-pro'); ?>
                </a>

            </div>
        </div>

        <!-- Sisi Kanan: Rekomendasi Berita Populer -->
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