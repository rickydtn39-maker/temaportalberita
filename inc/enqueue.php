<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_enqueue_assets()
{
    $theme = get_template_directory();
    $uri   = get_template_directory_uri();

    wp_enqueue_style(
        'gesahan-style',
        get_stylesheet_uri(),
        [],
        filemtime($theme . '/style.css')
    );

    wp_enqueue_style(
        'gesahan-main',
        $uri . '/assets/css/main.css',
        [],
        filemtime($theme . '/assets/css/main.css')
    );

    wp_enqueue_style(
        'gesahan-header',
        $uri . '/assets/css/header.css',
        [],
        filemtime($theme . '/assets/css/header.css')
    );

    wp_enqueue_style(
        'gesahan-hero',
        $uri . '/assets/css/hero.css',
        [],
        filemtime($theme . '/assets/css/hero.css')
    );

    wp_enqueue_style(
        'gesahan-news',
        $uri . '/assets/css/news.css',
        [],
        filemtime($theme . '/assets/css/news.css')
    );

    wp_enqueue_style(
        'gesahan-sidebar',
        $uri . '/assets/css/sidebar.css',
        [],
        filemtime($theme . '/assets/css/sidebar.css')
    );

    wp_enqueue_style(
        'gesahan-footer',
        $uri . '/assets/css/footer.css',
        [],
        filemtime($theme . '/assets/css/footer.css')
    );

    wp_enqueue_style(
        'gesahan-responsive',
        $uri . '/assets/css/responsive.css',
        [],
        filemtime($theme . '/assets/css/responsive.css')
    );

    wp_enqueue_script(
        'gesahan-menu',
        $uri . '/assets/js/menu.js',
        [],
        filemtime($theme . '/assets/js/menu.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-slider',
        $uri . '/assets/js/slider.js',
        [],
        filemtime($theme . '/assets/js/slider.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-ticker',
        $uri . '/assets/js/ticker.js',
        [],
        filemtime($theme . '/assets/js/ticker.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-sticky',
        $uri . '/assets/js/sticky-header.js',
        [],
        filemtime($theme . '/assets/js/sticky-header.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-mobile',
        $uri . '/assets/js/mobile-menu.js',
        [],
        filemtime($theme . '/assets/js/mobile-menu.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-loader',
        $uri . '/assets/js/loader.js',
        [],
        filemtime($theme . '/assets/js/loader.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-backtotop',
        $uri . '/assets/js/back-to-top.js',
        [],
        filemtime($theme . '/assets/js/back-to-top.js'),
        true
    );

    wp_enqueue_script(
        'gesahan-main-js',
        $uri . '/assets/js/main.js',
        [],
        filemtime($theme . '/assets/js/main.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'gesahan_enqueue_assets');