<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function gesahan_theme_setup()
{
    /**
     * Translation
     */
    load_theme_textdomain(
        'gesahan-news-pro',
        get_template_directory() . '/languages'
    );

    /**
     * Automatic Feed
     */
    add_theme_support('automatic-feed-links');

    /**
     * Title
     */
    add_theme_support('title-tag');

    /**
     * Featured Image
     */
    add_theme_support('post-thumbnails');

    /**
     * Custom Logo
     */
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    /**
     * HTML5
     */
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    /**
     * Gutenberg
     */
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    /**
     * Editor Style
     */
    add_theme_support('editor-styles');

    /**
     * Selective Refresh
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Navigation Menu
     */
    register_nav_menus([
        'primary' => __('Primary Menu', 'gesahan-news-pro'),
        'top'     => __('Top Menu', 'gesahan-news-pro'),
        'footer'  => __('Footer Menu', 'gesahan-news-pro'),
    ]);

    /**
     * Image Sizes
     */
    add_image_size('gesahan-hero', 900, 600, true);
    add_image_size('gesahan-featured', 600, 400, true);
    add_image_size('gesahan-thumbnail', 400, 280, true);
    add_image_size('gesahan-sidebar', 120, 120, true);
}

add_action('after_setup_theme', 'gesahan_theme_setup');