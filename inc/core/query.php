<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Hero Posts
 */
function gesahan_get_hero_posts(int $limit = 5): WP_Query
{
    return new WP_Query([
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ]);
}

/**
 * Latest Posts
 */
function gesahan_get_latest_posts(int $limit = 6): WP_Query
{
    return new WP_Query([
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ]);
}

/**
 * Category Posts
 */
function gesahan_get_category_posts(int $category_id, int $limit = 6): WP_Query
{
    return new WP_Query([
        'post_type'           => 'post',
        'cat'                 => $category_id,
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ]);
}