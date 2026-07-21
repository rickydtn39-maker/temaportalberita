<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$footer_copy = get_theme_mod('gesahan_footer_copy', '');
?>

</main> <!-- Penutup .gn-main dari header.php -->

<footer class="gn-footer">
    <div class="gn-container">
        
        <!-- ROW 1: SITEMAP MASSAL (Apple/Linear Inspired Grid) -->
        <div class="gn-footer__sitemap">
            
            <!-- Kolom 1: Brand Info -->
            <div class="gn-footer__col gn-footer__col--brand">
                <a class="gn-footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <p class="gn-footer__about">
                    <?php bloginfo('description'); ?>. <?php esc_html_e('Platform portal berita independen dengan penyajian jurnalisme presisi tinggi, terkurasi oleh redaksi profesional dan didukung teknologi analisis intelijen kecerdasan buatan.', 'gesahan-news-pro'); ?>
                </p>
                <div class="gn-footer__socials">
                    <?php
                    $socials = ['facebook' => 'FB', 'twitter' => 'TW', 'instagram' => 'IG', 'youtube' => 'YT'];
                    foreach ($socials as $key => $label) :
                        $url = get_theme_mod("gesahan_social_{$key}", '');
                        if (!empty($url)) :
                    ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($label); ?>"><?php echo esc_html($label); ?></a>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Kategori Utama -->
            <div class="gn-footer__col">
                <h4 class="gn-footer__title"><?php esc_html_e('Kategori Utama', 'gesahan-news-pro'); ?></h4>
                <ul class="gn-footer__links">
                    <?php
                    $categories = get_categories(['number' => 5, 'orderby' => 'count', 'order' => 'DESC']);
                    foreach ($categories as $cat) :
                    ?>
                        <li><a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Kolom 3: Liputan Daerah -->
            <div class="gn-footer__col">
                <h4 class="gn-footer__title"><?php esc_html_e('Liputan Daerah', 'gesahan-news-pro'); ?></h4>
                <ul class="gn-footer__links">
                    <li><a href="<?php echo esc_url(add_query_arg('region', 'sumatera', home_url('/'))); ?>"><?php esc_html_e('Sumatera', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(add_query_arg('region', 'jawa', home_url('/'))); ?>"><?php esc_html_e('Jawa & Bali', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(add_query_arg('region', 'kalimantan', home_url('/'))); ?>"><?php esc_html_e('Kalimantan', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(add_query_arg('region', 'sulawesi', home_url('/'))); ?>"><?php esc_html_e('Sulawesi', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(add_query_arg('region', 'papua', home_url('/'))); ?>"><?php esc_html_e('Maluku & Papua', 'gesahan-news-pro'); ?></a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kecerdasan Buatan (AI) -->
            <div class="gn-footer__col">
                <h4 class="gn-footer__title"><?php esc_html_e('Modul AI', 'gesahan-news-pro'); ?></h4>
                <ul class="gn-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>#gn-ai-timeline"><?php esc_html_e('AI Ringkasan Berita', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>#gn-ai-timeline"><?php esc_html_e('AI Kronologi Interaktif', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="#" class="gn-search-trigger"><?php esc_html_e('AI Semantic Search', 'gesahan-news-pro'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Rekomendasi Prediktif', 'gesahan-news-pro'); ?></a></li>
                </ul>
            </div>

        </div>

        <!-- ROW 2: BOTTOM COPYRIGHT & LEGAL -->
        <div class="gn-footer__bottom">
            <div class="gn-footer__legal">
                <?php if (!empty($footer_copy)) : ?>
                    <p><?php echo esc_html($footer_copy); ?></p>
                <?php else : ?>
                    <p>
                        © <?php echo esc_html(wp_date('Y')); ?>
                        <strong><?php bloginfo('name'); ?></strong>.
                        <?php esc_html_e('Seluruh hak cipta dilindungi undang-undang.', 'gesahan-news-pro'); ?>
                    </p>
                <?php endif; ?>
            </div>
            
            <div class="gn-footer__legal-links">
                <a href="#"><?php esc_html_e('Pedoman Media Siber', 'gesahan-news-pro'); ?></a>
                <span class="gn-footer__legal-divider">|</span>
                <a href="#"><?php esc_html_e('Kebijakan Privasi', 'gesahan-news-pro'); ?></a>
                <span class="gn-footer__legal-divider">|</span>
                <a href="#"><?php esc_html_e('Redaksi & Kontak', 'gesahan-news-pro'); ?></a>
            </div>
        </div>

    </div>
</footer>

</div> <!-- Penutup .gn-site dari header.php -->

<?php wp_footer(); ?>

</body>
</html>