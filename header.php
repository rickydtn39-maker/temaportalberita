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
                document.write('<style>body{background-color:#090d16 !important; color:#cbd5e1 !important;}</style>');
            }
        })();
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Sinkronisasi instan state class dark-mode pada tag body setelah render dimulai -->
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

    <!-- TIER 1: TOP BAR (Utility & Social Area) -->
    <div class="gn-topbar">
        <div class="gn-container">
            <div class="gn-topbar__inner">
                
                <div class="gn-topbar__left">
                    <span class="gn-topbar__date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <?php echo esc_html(wp_date('l, d F Y')); ?>
                    </span>
                    <span class="gn-topbar__divider">|</span>
                    <span class="gn-topbar__trending-label"><?php esc_html_e('TRENDING:', 'gesahan-news-pro'); ?></span>
                    <div class="gn-topbar__trending-topics">
                        <?php
                        $tags = get_tags(['orderby' => 'count', 'order' => 'DESC', 'number' => 3]);
                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">#' . esc_html($tag->name) . '</a>';
                            }
                        } else {
                            echo '<span style="opacity:0.5;">#News #Technology #Lifestyle</span>';
                        }
                        ?>
                    </div>
                </div>

                <div class="gn-topbar__right">
                    <button class="gn-dark-mode-toggle" aria-label="Ganti Mode Tampilan" type="button">
                        <svg class="gn-sun-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                        <svg class="gn-moon-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

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
                            <?php echo $ad_header; // Render raw ad script/html ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </header>

    <!-- TIER 3: DEDICATED CATEGORY NAVIGATION BAR -->
    <nav class="gn-nav" id="gnNavBar">
        <div class="gn-container">
            <div class="gn-nav__inner">
                
                <button class="gn-menu-toggle" aria-label="Buka Menu" aria-expanded="false" type="button">
                    <svg class="gn-hamburger-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    <svg class="gn-close-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="gn-nav__home-icon" aria-label="Home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </a>

                <div class="gn-nav__categories-wrapper">
                    <ul class="gn-category-menu">
                        <?php
                        $categories = get_categories([
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'number'     => 8, 
                            'hide_empty' => true
                        ]);

                        $current_cat_id = 0;
                        if (is_category()) {
                            $current_cat_id = get_queried_object_id();
                        } elseif (is_single()) {
                            $post_cats = get_the_category();
                            if (!empty($post_cats)) {
                                $current_cat_id = $post_cats[0]->term_id;
                            }
                        }

                        if (!empty($categories)) :
                            foreach ($categories as $cat) :
                                $active_class = ($cat->term_id === $current_cat_id) ? 'gn-cat-item--active' : '';
                                ?>
                                <li class="gn-cat-item <?php echo esc_attr($active_class); ?>">
                                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                                        <?php echo esc_html($cat->name); ?>
                                    </a>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                    <div class="gn-nav__fade-overlay"></div>
                </div>

                <div class="gn-nav__right">
                    <button class="gn-search-trigger" aria-label="Buka Pencarian" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
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

    <!-- Fullscreen Search Overlay Modal -->
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