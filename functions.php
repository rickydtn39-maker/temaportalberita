<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('GESAHAN_FRAMEWORK_VERSION', '2.0.0-alpha.2');

function gesahan_setup(): void
{
    load_theme_textdomain(
        'gesahan-news-pro',
        get_template_directory() . '/languages'
    );

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('automatic-feed-links');

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

    register_nav_menus(
        [
            'primary' => __('Primary Menu', 'gesahan-news-pro'),
            'footer'  => __('Footer Menu', 'gesahan-news-pro'),
        ]
    );
}

add_action('after_setup_theme', 'gesahan_setup');

function gesahan_enqueue_assets(): void
{
    wp_enqueue_style(
        'gesahan-framework',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        filemtime(get_template_directory() . '/assets/css/app.css')
    );
}

add_action('wp_enqueue_scripts', 'gesahan_enqueue_assets');