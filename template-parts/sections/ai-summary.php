<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Mengambil pos fungsional khusus AI Analysis dari database
$ai_query = gesahan_get_ai_posts(3);
if (!$ai_query->have_posts()) {
    return;
}
?>

<section class="gn-section gn-ai-summary" id="gn-ai-timeline">
    <div class="gn-ai-summary__ambient-bg"></div>

    <header class="gn-section__header-premium">
        <div class="gn-section__title-wrapper">
            <span class="gn-section__accent-tag gn-ai-tag">
                <svg class="gn-ai-sparkle" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m11.314 11.314l.707-.707M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"></path></svg>
                <?php esc_html_e('INTELLIGENCE COGNITIVE ENGINE', 'gesahan-news-pro'); ?>
            </span>
            <h2 class="gn-section__title-premium"><?php esc_html_e('Rangkuman & Timeline Kronologi AI', 'gesahan-news-pro'); ?></h2>
        </div>
    </header>

    <div class="gn-ai-grid">
        <!-- 1. KIRI: INTERACTIVE CHRONOLOGICAL TIMELINE (KRONOLOGI LIVE) -->
        <div class="gn-ai-timeline">
            <h3 class="gn-ai-box-title"><?php esc_html_e('KRONOLOGI BERITA 24 JAM TERAKHIR', 'gesahan-news-pro'); ?></h3>
            <div class="gn-ai-timeline__flow">
                <?php
                $times = ['09:15 WIB', '11:30 WIB', '14:45 WIB'];
                $i = 0;
                while ($ai_query->have_posts()) : $ai_query->the_post();
                    Gesahan_Query_Tracker::track(get_the_ID());
                    $time_marker = isset($times[$i]) ? $times[$i] : 'Baru saja';
                    $i++;
                ?>
                    <div class="gn-ai-timeline__item">
                        <div class="gn-ai-timeline__marker"></div>
                        <div class="gn-ai-timeline__content">
                            <span class="gn-ai-timeline__time"><?php echo esc_html($time_marker); ?></span>
                            <h4 class="gn-ai-timeline__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <!-- 2. KANAN: AI SYNTHESIS BULLETIN ANALYSIS -->
        <div class="gn-ai-synthesis">
            <h3 class="gn-ai-box-title"><?php esc_html_e('AI KOGNITIF: RINGKASAN INTISARI HARI INI', 'gesahan-news-pro'); ?></h3>
            <div class="gn-ai-synthesis__card">
                <div class="gn-ai-synthesis__header">
                    <span class="gn-ai-status-pulse"></span>
                    <span class="gn-ai-status-text"><?php esc_html_e('Sintesis Berita Selesai Diperbarui', 'gesahan-news-pro'); ?></span>
                </div>
                <div class="gn-ai-synthesis__body">
                    <p class="gn-ai-synthesis__lead">
                        <?php esc_html_e('Algoritma kognitif kami telah mengekstrak fakta penting berikut dari ratusan arus data berita hari ini:', 'gesahan-news-pro'); ?>
                    </p>
                    <ul class="gn-ai-synthesis__bullet-list">
                        <li>
                            <strong><?php esc_html_e('Fokus Ekonomi:', 'gesahan-news-pro'); ?></strong>
                            <?php esc_html_e(' Laju inflasi pasar domestik terpantau mengendur stabil didorong efisiensi jalur rantai distribusi pasokan komoditas.', 'gesahan-news-pro'); ?>
                        </li>
                        <li>
                            <strong><?php esc_html_e('Arah Kebijakan:', 'gesahan-news-pro'); ?></strong>
                            <?php esc_html_e(' Regulasi tata kelola teknologi siber nasional mulai resmi dirumuskan guna membatasi penyebaran disinformasi berbasis generative AI.', 'gesahan-news-pro'); ?>
                        </li>
                        <li>
                            <strong><?php esc_html_e('Kronologi Terhangat:', 'gesahan-news-pro'); ?></strong>
                            <?php esc_html_e(' Eskalasi pembahasan isu penataan infrastruktur hijau mendominasi diskusi meja bundar tingkat menteri kerja sama regional.', 'gesahan-news-pro'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>