<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('NUSANTARA_ONE_VERSION', '2.0.0-enterprise');

/*
|--------------------------------------------------------------------------
| Core Requirements
|--------------------------------------------------------------------------
*/
require_once get_template_directory() . '/inc/core/query.php';
require_once get_template_directory() . '/inc/core/customizer.php';
require_once get_template_directory() . '/inc/core/seo.php';

/*
|--------------------------------------------------------------------------
| Theme Setup
|--------------------------------------------------------------------------
*/
function nusantara_one_setup(): void
{
    load_theme_textdomain('nusantara-one', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('post-formats', ['video', 'audio', 'quote', 'gallery']);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ]);

    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('Nusantara Main Menu', 'nusantara-one'),
        'footer'  => __('Nusantara Footer Menu', 'nusantara-one'),
    ]);
}
add_action('after_setup_theme', 'nusantara_one_setup');

/*
|--------------------------------------------------------------------------
| Register Sidebar Area (WordPress Standards)
|--------------------------------------------------------------------------
*/
function nusantara_one_widgets_init(): void
{
    register_sidebar([
        'name'          => __('Nusantara Main Sidebar', 'nusantara-one'),
        'id'            => 'main-sidebar',
        'description'   => __('Sidebar dinamis untuk mengontrol widget komersial.', 'nusantara-one'),
        'before_widget' => '<div id="%1$s" class="gn-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="gn-widget__title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'nusantara_one_widgets_init');

/*
|--------------------------------------------------------------------------
| Fonts & Assets Loading (Including Satoshi & Inter Fonts)
|--------------------------------------------------------------------------
*/
function nusantara_one_enqueue_assets(): void
{
    // Load Satoshi & Clash Display (Font Premium dari CDN)
    wp_enqueue_style('nusantara-premium-fonts', 'https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,400&f[]=clash-display@700,600,500&display=swap', [], null);

    // Load Stylesheet Utama
    wp_enqueue_style(
        'nusantara-one-framework',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        filemtime(get_template_directory() . '/assets/css/app.css')
    );

    // Load JavaScript Utama
    wp_enqueue_script(
        'nusantara-one-app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        [],
        filemtime(get_template_directory() . '/assets/js/app.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'nusantara_one_enqueue_assets');