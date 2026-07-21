<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Inline Script untuk mengaktifkan Dark Mode instan guna mencegah "Layar Putih Sekilas" -->
    <script>
        (function() {
            const state = localStorage.getItem('gn-dark-mode');
            if (state === 'enabled' || (!state && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('gn-dark-mode-applied');
                document.write('<style>body{background-color:#030508 !important;color:#cbd5e1 !important;}</style>');
            }
        })();
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script>
    if (document.documentElement.classList.contains('gn-dark-mode-applied')) {
        document.body.classList.add('gn-dark-mode');
    }
</script>
<?php wp_body_open(); ?>

<!-- Link Aksesibilitas (Skip Link untuk pembaca layar/screen-readers) -->
<a class="gn-skip-link" href="#gn-main-content">
    <?php esc_html_e('Lompat ke Konten Utama', 'gesahan-news-pro'); ?>
</a>

<div class="gn-site">
    <!-- TIER 1: TOP BAR (Utility & Trending Area) -->
    <?php get_template_part('template-parts/header/top-bar'); ?>

    <!-- TIER 2: BRAND HEADER AREA -->
    <header class="gn-header">
        <div class="gn-container">
            <div class="gn-header__inner">
                <div class="gn-header__brand-box">
                    <a class="gn-logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    <p class="gn-header__tagline"><?php bloginfo('description'); ?></p>
                </div>
                
                <!-- Kolom Iklan Header Dinamis & Opsional -->
                <?php 
                $ad_header = get_theme_mod('gesahan_ad_header', '');
                if (!empty($ad_header)) : 
                ?>
                    <div class="gn-header__ad-space gn-hide-mobile">
                        <div class="gn-ad-container">
                            <?php echo $ad_header; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- TIER 3: DEDICATED NAVIGATION BAR WITH MEGA MENU -->
    <nav class="gn-nav" id="gnNavBar">
        <div class="gn-container">
            <div class="gn-nav__inner">
                
                <button class="gn-menu-toggle" aria-label="Buka Menu" aria-expanded="false" type="button">
                    <svg class="gn-hamburger-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    <svg class="gn-close-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="gn-nav__home-icon" aria-label="Home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </a>

                <div class="gn-nav__categories-wrapper">
                    <ul class="gn-category-menu">
                        <!-- Item Kategori Standar -->
                        <?php
                        $categories = get_categories([
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'number' => 6, 
                            'hide_empty' => true
                        ]);
                        if (!empty($categories)) :
                            foreach ($categories as $cat) :
                        ?>
                            <li class="gn-cat-item">
                                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                                    <?php echo esc_html($cat->name); ?>
                                </a>
                            </li>
                        <?php
                            endforeach;
                        endif;
                        ?>

                        <!-- TRIGGER MEGA MENU DAERAH (Visual DNA) -->
                        <li class="gn-cat-item gn-has-mega">
                            <a href="#" class="gn-mega-trigger">
                                <?php esc_html_e('Daerah', 'gesahan-news-pro'); ?>
                                <svg class="gn-chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </a>
                            
                            <!-- MEGA MENU DROPDOWN PANEL -->
                            <div class="gn-mega-menu">
                                <div class="gn-mega-grid">
                                    <div class="gn-mega-column">
                                        <h4 class="gn-mega-title"><?php esc_html_e('SUMATERA', 'gesahan-news-pro'); ?></h4>
                                        <ul class="gn-mega-list">
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'aceh', home_url('/'))); ?>">Aceh</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'sumut', home_url('/'))); ?>">Sumatera Utara</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'sumbar', home_url('/'))); ?>">Sumatera Barat</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'riau', home_url('/'))); ?>">Riau</a></li>
                                        </ul>
                                    </div>
                                    <div class="gn-mega-column">
                                        <h4 class="gn-mega-title"><?php esc_html_e('JAWA', 'gesahan-news-pro'); ?></h4>
                                        <ul class="gn-mega-list">
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'jakarta', home_url('/'))); ?>">DKI Jakarta</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'jabar', home_url('/'))); ?>">Jawa Barat</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'jateng', home_url('/'))); ?>">Jawa Tengah</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'jatim', home_url('/'))); ?>">Jawa Timur</a></li>
                                        </ul>
                                    </div>
                                    <div class="gn-mega-column">
                                        <h4 class="gn-mega-title"><?php esc_html_e('KALIMANTAN', 'gesahan-news-pro'); ?></h4>
                                        <ul class="gn-mega-list">
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'kalbar', home_url('/'))); ?>">Kalbar</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'kalsel', home_url('/'))); ?>">Kalsel</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'kaltim', home_url('/'))); ?>">Kaltim</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'kalut', home_url('/'))); ?>">Kaltara</a></li>
                                        </ul>
                                    </div>
                                    <div class="gn-mega-column">
                                        <h4 class="gn-mega-title"><?php esc_html_e('SULAWESI & PAPUA', 'gesahan-news-pro'); ?></h4>
                                        <ul class="gn-mega-list">
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'sulsel', home_url('/'))); ?>">Sulawesi Selatan</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'sulut', home_url('/'))); ?>">Sulawesi Utara</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'papua', home_url('/'))); ?>">Papua</a></li>
                                            <li><a href="<?php echo esc_url(add_query_arg('region', 'papua-barat', home_url('/'))); ?>">Papua Barat</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="gn-nav__right">
                    <button class="gn-search-trigger" aria-label="Buka Pencarian" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <!-- Slide-Out Mobile Navigation Drawer -->
    <div class="gn-mobile-drawer" aria-hidden="true">
        <div class="gn-mobile-drawer__overlay"></div>
        <div class="gn-mobile-drawer__content">
            <div class="gn-mobile-drawer__header">
                <span class="gn-mobile-drawer__title"><?php bloginfo('name'); ?></span>
                <button class="gn-mobile-drawer__close" aria-label="Tutup Menu" type="button">&times;</button>
            </div>
            <div class="gn-mobile-drawer__body">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'gn-mobile-menu',
                        'depth'          => 1,
                    ]);
                } else {
                    echo '<ul class="gn-mobile-menu">';
                    wp_list_categories([
                        'title_li' => '',
                        'number'   => 12
                    ]);
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Fullscreen Search Overlay Modal (Priority 8 - Blur & Fullscreen) -->
    <div class="gn-search-modal" aria-hidden="true">
        <div class="gn-search-modal__overlay"></div>
        <div class="gn-search-modal__container">
            <button class="gn-search-modal__close" aria-label="Tutup Pencarian" type="button">&times;</button>
            <div class="gn-search-modal__box">
                <p class="gn-search-modal__hint"><?php esc_html_e('Cari Berita di Portal Ini:', 'gesahan-news-pro'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <?php 
    // Render Breaking News Ticker
    get_template_part('template-parts/header/breaking-news'); 
    ?>

    <main class="gn-main" id="gn-main-content">