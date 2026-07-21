<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('GESAHAN_FRAMEWORK_VERSION', '2.0.0-alpha.3');

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

function gesahan_setup(): void
{
    load_theme_textdomain(
        'gesahan-news-pro',
        get_template_directory() . '/languages'
    );

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        ]
    );

    add_theme_support(
        'custom-logo',
        [
            'height'      => 120,
            'width'       => 420,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );

    register_nav_menus([
        'primary' => __('Primary Menu', 'gesahan-news-pro'),
        'footer'  => __('Footer Menu', 'gesahan-news-pro'),
    ]);
}

add_action('after_setup_theme', 'gesahan_setup');

/*
|--------------------------------------------------------------------------
| Assets Enqueue (CSS & JS)
|--------------------------------------------------------------------------
*/

function gesahan_enqueue_assets(): void
{
    // Load Stylesheet Utama
    wp_enqueue_style(
        'gesahan-framework',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        filemtime(get_template_directory() . '/assets/css/app.css')
    );

    // Load JavaScript Utama
    wp_enqueue_script(
        'gesahan-app-js',
        get_template_directory_uri() . '/assets/js/app.js',
        [],
        filemtime(get_template_directory() . '/assets/js/app.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'gesahan_enqueue_assets');