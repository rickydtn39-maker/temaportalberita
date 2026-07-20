<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Customizer Settings untuk Gesahan News Pro
 */
function gesahan_customize_register(WP_Customize_Manager $wp_customize): void
{
    // Panel Gesahan Theme Options
    $wp_customize->add_panel('gesahan_theme_options', [
        'title'       => __('Gesahan Theme Options', 'gesahan-news-pro'),
        'priority'    => 30,
        'description' => __('Atur fungsionalitas, skema warna, dan layout portal berita Anda.', 'gesahan-news-pro'),
    ]);

    // Section 1: Skema Warna & Brand
    $wp_customize->add_section('gesahan_colors_section', [
        'title'    => __('Skema Warna & Brand', 'gesahan-news-pro'),
        'panel'    => 'gesahan_theme_options',
        'priority' => 5,
    ]);

    // Custom Warna Primer
    $wp_customize->add_setting('gesahan_primary_color', [
        'default'           => '#d72638',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gesahan_primary_color', [
        'label'    => __('Warna Primer Portal', 'gesahan-news-pro'),
        'section'  => 'gesahan_colors_section',
        'settings' => 'gesahan_primary_color',
    ]));

    // Section 2: Slot Iklan / Ad Spaces (Dinamis & Opsional)
    $wp_customize->add_section('gesahan_ads_section', [
        'title'       => __('Slot Iklan (Ad Spaces)', 'gesahan-news-pro'),
        'panel'       => 'gesahan_theme_options',
        'priority'    => 8,
        'description' => __('Masukkan script iklan (Google AdSense, HTML Image Link, atau Iklan Banner) Anda di sini.', 'gesahan-news-pro'),
    ]);

    // Iklan Header
    $wp_customize->add_setting('gesahan_ad_header', [
        'default'           => '',
        'sanitize_callback' => 'gesahan_sanitize_ads_code',
    ]);

    $wp_customize->add_control('gesahan_ad_header', [
        'label'       => __('Iklan Header (Samping Logo - Rekomendasi 728x90)', 'gesahan-news-pro'),
        'description' => __('Kosongkan jika tidak ingin menampilkan iklan di samping logo.', 'gesahan-news-pro'),
        'section'     => 'gesahan_ads_section',
        'type'        => 'textarea',
    ]);

    // Iklan Banner Utama Homepage (Area Kotak Hijau Anda)
    $wp_customize->add_setting('gesahan_ad_homepage_banner', [
        'default'           => '',
        'sanitize_callback' => 'gesahan_sanitize_ads_code',
    ]);

    $wp_customize->add_control('gesahan_ad_homepage_banner', [
        'label'       => __('Iklan Banner Utama Homepage (Bawah Ticker - Rekomendasi 970x90 / 1200x90)', 'gesahan-news-pro'),
        'description' => __('Kosongkan jika tidak ingin menampilkan iklan besar di atas Hero.', 'gesahan-news-pro'),
        'section'     => 'gesahan_ads_section',
        'type'        => 'textarea',
    ]);

    // Section 3: Sosial Media & Kontak
    $wp_customize->add_section('gesahan_social_section', [
        'title'    => __('Sosial Media & Kontak', 'gesahan-news-pro'),
        'panel'    => 'gesahan_theme_options',
        'priority' => 10,
    ]);

    $socials = [
        'facebook'  => __('Facebook URL', 'gesahan-news-pro'),
        'twitter'   => __('Twitter / X URL', 'gesahan-news-pro'),
        'instagram' => __('Instagram URL', 'gesahan-news-pro'),
        'youtube'   => __('YouTube URL', 'gesahan-news-pro'),
    ];

    foreach ($socials as $key => $label) {
        $wp_customize->add_setting("gesahan_social_{$key}", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control("gesahan_social_{$key}", [
            'label'   => $label,
            'section' => 'gesahan_social_section',
            'type'    => 'url',
        ]);
    }

    // Section 4: Fitur Single Artikel
    $wp_customize->add_section('gesahan_single_settings', [
        'title'    => __('Fitur Single Artikel', 'gesahan-news-pro'),
        'panel'    => 'gesahan_theme_options',
        'priority' => 15,
    ]);

    // Toggle Reading Progress Bar
    $wp_customize->add_setting('gesahan_enable_progress_bar', [
        'default'           => '1',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gesahan_enable_progress_bar', [
        'label'    => __('Aktifkan Reading Progress Bar', 'gesahan-news-pro'),
        'section'  => 'gesahan_single_settings',
        'type'     => 'checkbox',
        'choices'  => [
            '1' => __('Aktif', 'gesahan-news-pro'),
        ],
    ]);

    // Toggle Share Buttons
    $wp_customize->add_setting('gesahan_enable_share_buttons', [
        'default'           => '1',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gesahan_enable_share_buttons', [
        'label'    => __('Aktifkan Social Share Buttons', 'gesahan-news-pro'),
        'section'  => 'gesahan_single_settings',
        'type'     => 'checkbox',
        'choices'  => [
            '1' => __('Aktif', 'gesahan-news-pro'),
        ],
    ]);

    // Section 5: Homepage Category Blocks
    $wp_customize->add_section('gesahan_homepage_categories', [
        'title'       => __('Homepage Category Blocks', 'gesahan-news-pro'),
        'panel'       => 'gesahan_theme_options',
        'priority'    => 20,
        'description' => __('Pilih kategori yang ingin ditampilkan pada modul homepage.', 'gesahan-news-pro'),
    ]);

    $categories     = get_categories(['hide_empty' => false]);
    $cat_options    = ['' => __('Pilih Kategori', 'gesahan-news-pro')];
    foreach ($categories as $cat) {
        $cat_options[$cat->term_id] = $cat->name;
    }

    // Kategori Pilihan 1
    $wp_customize->add_setting('gesahan_home_cat_1', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('gesahan_home_cat_1', [
        'label'   => __('Kategori Utama 1', 'gesahan-news-pro'),
        'section' => 'gesahan_homepage_categories',
        'type'    => 'select',
        'choices' => $cat_options,
    ]);

    // Kategori Pilihan 2
    $wp_customize->add_setting('gesahan_home_cat_2', [
        'default'           => '',
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('gesahan_home_cat_2', [
        'label'   => __('Kategori Utama 2', 'gesahan-news-pro'),
        'section' => 'gesahan_homepage_categories',
        'type'    => 'select',
        'choices' => $cat_options,
    ]);

    // Section 6: Footer Credit Settings
    $wp_customize->add_section('gesahan_footer_section', [
        'title'    => __('Pengaturan Footer', 'gesahan-news-pro'),
        'panel'    => 'gesahan_theme_options',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('gesahan_footer_copy', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gesahan_footer_copy', [
        'label'       => __('Teks Kustom Hak Cipta', 'gesahan-news-pro'),
        'description' => __('Biarkan kosong jika ingin menggunakan kredit default bawaan tema.', 'gesahan-news-pro'),
        'section'     => 'gesahan_footer_section',
        'type'        => 'text',
    ]);
}

add_action('customize_register', 'gesahan_customize_register');

/**
 * Sanitasi khusus untuk Script Iklan (Mengizinkan tag HTML, script Google AdSense, dll)
 */
function gesahan_sanitize_ads_code(string $value): string
{
    return $value; // Mengembalikan data mentah agar javascript/AdSense tag tidak terhapus
}

/**
 * Mencetak CSS Variabel Primer Kustom secara inline ke wp_head secara dinamis
 */
function gesahan_customizer_css(): void
{
    $primary_color = get_theme_mod('gesahan_primary_color', '#d72638');
    
    // Perhitungan warna hover secara otomatis (sedikit lebih gelap)
    $hex = str_replace('#', '', $primary_color);
    if (strlen($hex) === 6) {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $r = max(0, $r - 30);
        $g = max(0, $g - 30);
        $b = max(0, $b - 30);
        $primary_hover = sprintf('#%02x%02x%02x', $r, $g, $b);
    } else {
        $primary_hover = '#b91c2d';
    }

    echo "\n<style id='gesahan-customizer-inline-css'>\n";
    echo ":root {\n";
    echo "    --gn-color-primary: " . esc_attr($primary_color) . " !important;\n";
    echo "    --gn-color-primary-hover: " . esc_attr($primary_hover) . " !important;\n";
    echo "}\n";
    echo "</style>\n";
}

add_action('wp_head', 'gesahan_customizer_css');