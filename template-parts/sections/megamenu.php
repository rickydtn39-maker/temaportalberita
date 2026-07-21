<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- 1. MEGA MENU DAERAH SEO-FIRST -->
<div class="gn-megamenu gn-megamenu--daerah" aria-hidden="true" id="gnMegaDaerah">
    <div class="gn-megamenu__overlay"></div>
    <div class="gn-megamenu__content">
        <div class="gn-container">
            <div class="gn-megamenu__title-strip">
                <h3><?php esc_html_e('DAERAH', 'nusantara-one'); ?></h3>
                <span><?php esc_html_e('Navigasi Berita Berdasarkan Wilayah Terstruktur SEO', 'nusantara-one'); ?></span>
            </div>
            
            <div class="gn-megamenu__grid gn-megamenu__grid--daerah">
                
                <!-- Sumatera Group -->
                <div class="gn-megamenu__col">
                    <h4 class="gn-megamenu__sub-title"><a href="<?php echo esc_url(home_url('/daerah/sumatera/')); ?>"><?php esc_html_e('SUMATERA', 'nusantara-one'); ?></a></h4>
                    <ul class="gn-megamenu__list">
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/aceh/')); ?>"><?php esc_html_e('Aceh', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/sumatera-utara/')); ?>"><?php esc_html_e('Sumatera Utara', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/sumatera-barat/')); ?>"><?php esc_html_e('Sumatera Barat', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/riau/')); ?>"><?php esc_html_e('Riau', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/kepulauan-riau/')); ?>"><?php esc_html_e('Kepulauan Riau', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/jambi/')); ?>"><?php esc_html_e('Jambi', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/bengkulu/')); ?>"><?php esc_html_e('Bengkulu', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/sumatera-selatan/')); ?>" style="color: var(--gn-color-primary); font-weight:var(--gn-font-bold);"><?php esc_html_e('Sumatera Selatan', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/bangka-belitung/')); ?>"><?php esc_html_e('Bangka Belitung', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/sumatera/lampung/')); ?>"><?php esc_html_e('Lampung', 'nusantara-one'); ?></a></li>
                    </ul>
                </div>

                <!-- Jawa Group -->
                <div class="gn-megamenu__col">
                    <h4 class="gn-megamenu__sub-title"><a href="<?php echo esc_url(home_url('/daerah/jawa/')); ?>"><?php esc_html_e('JAWA', 'nusantara-one'); ?></a></h4>
                    <ul class="gn-megamenu__list">
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/banten/')); ?>"><?php esc_html_e('Banten', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/dki-jakarta/')); ?>"><?php esc_html_e('DKI Jakarta', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/jawa-barat/')); ?>"><?php esc_html_e('Jawa Barat', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/jawa-tengah/')); ?>"><?php esc_html_e('Jawa Tengah', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/di-yogyakarta/')); ?>"><?php esc_html_e('DI Yogyakarta', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/jawa/jawa-timur/')); ?>"><?php esc_html_e('Jawa Timur', 'nusantara-one'); ?></a></li>
                    </ul>
                </div>

                <!-- Kalimantan Group -->
                <div class="gn-megamenu__col">
                    <h4 class="gn-megamenu__sub-title"><a href="<?php echo esc_url(home_url('/daerah/kalimantan/')); ?>"><?php esc_html_e('KALIMANTAN', 'nusantara-one'); ?></a></h4>
                    <ul class="gn-megamenu__list">
                        <li><a href="<?php echo esc_url(home_url('/daerah/kalimantan/kalimantan-barat/')); ?>"><?php esc_html_e('Kalimantan Barat', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/kalimantan/kalimantan-tengah/')); ?>"><?php esc_html_e('Kalimantan Tengah', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/kalimantan/kalimantan-selatan/')); ?>"><?php esc_html_e('Kalimantan Selatan', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/kalimantan/kalimantan-timur/')); ?>"><?php esc_html_e('Kalimantan Timur', 'nusantara-one'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/daerah/kalimantan/kalimantan-utara/')); ?>"><?php esc_html_e('Kalimantan Utara', 'nusantara-one'); ?></a></li>
                    </ul>
                </div>

                <!-- Sulawesi Group -->
                <div class="gn-megamenu__col">
                    <h4 class="gn-megamenu__sub-title"><a href="<?php echo esc_url(home_url('/daerah/sulawesi/')); ?>"><?php esc_html_e('SULAWESI', 'nusantara-one'); ?></a></h4>
                    <ul class="gn-megamenu__list">
                        <li><a href="#"><?php esc_html_e('Sulawesi Utara', 'nusantara-one'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Sulawesi Tengah', 'nusantara-one'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Sulawesi Selatan', 'nusantara-one'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Sulawesi Tenggara', 'nusantara-one'); ?></a></li>
                    </ul>
                </div>

                <!-- Timur Group -->
                <div class="gn-megamenu__col">
                    <h4 class="gn-megamenu__sub-title"><?php esc_html_e('BALI & TIMUR', 'nusantara-one'); ?></h4>
                    <ul class="gn-megamenu__list">
                        <li><a href="#"><?php esc_html_e('Bali', 'nusantara-one'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Nusa Tenggara', 'nusantara-one'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('Maluku & Papua', 'nusantara-one'); ?></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 2. DROPDOWN VIDEO -->
<div class="gn-dropdown-panel" aria-hidden="true" id="gnDropVideo">
    <div class="gn-container">
        <ul class="gn-dropdown-list">
            <li><a href="#">🎬 <?php esc_html_e('Video News', 'nusantara-one'); ?></a></li>
            <li><a href="#">📱 <?php esc_html_e('Short Video', 'nusantara-one'); ?></a></li>
            <li><a href="#">🔴 <?php esc_html_e('Live Streaming', 'nusantara-one'); ?></a></li>
            <li><a href="#">🎙️ <?php esc_html_e('Podcast', 'nusantara-one'); ?></a></li>
        </ul>
    </div>
</div>

<!-- 3. DROPDOWN LIVE -->
<div class="gn-dropdown-panel" aria-hidden="true" id="gnDropLive">
    <div class="gn-container">
        <ul class="gn-dropdown-list">
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Banjir', 'nusantara-one'); ?></a></li>
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Pemilu', 'nusantara-one'); ?></a></li>
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Konferensi Pers', 'nusantara-one'); ?></a></li>
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Sidang', 'nusantara-one'); ?></a></li>
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Demo', 'nusantara-one'); ?></a></li>
            <li><a href="#"><span class="gn-live-dot"></span> <?php esc_html_e('Bencana', 'nusantara-one'); ?></a></li>
        </ul>
    </div>
</div>

<!-- 4. DROPDOWN AI -->
<div class="gn-dropdown-panel" aria-hidden="true" id="gnDropAi">
    <div class="gn-container">
        <ul class="gn-dropdown-list">
            <li><a href="#">🤖 <?php esc_html_e('AI Summary', 'nusantara-one'); ?></a></li>
            <li><a href="#">🔍 <?php esc_html_e('AI Fact Check', 'nusantara-one'); ?></a></li>
            <li><a href="#">✨ <?php esc_html_e('AI Recommendation', 'nusantara-one'); ?></a></li>
            <li><a href="#">🧠 <?php esc_html_e('AI Search', 'nusantara-one'); ?></a></li>
        </ul>
    </div>
</div>