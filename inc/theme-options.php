<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_theme_setup_extra()
{
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
}

add_action('after_setup_theme', 'gesahan_theme_setup_extra');