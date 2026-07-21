<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Gesahan_Query_Tracker
 * Melacak ID artikel yang sudah ditampilkan di halaman utama untuk menghindari duplikasi konten.
 */
final class Gesahan_Query_Tracker 
{
    private static array $rendered_ids = [];

    public static function track(int $post_id): void 
    {
        if (!in_array($post_id, self::$rendered_ids, true)) {
            self::$rendered_ids[] = $post_id;
        }
    }

    public static function get_excluded(): array 
    {
        return self::$rendered_ids;
    }

    public static function reset(): void
    {
        self::$rendered_ids = [];
    }
}

/**
 * Hero Posts Query
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
 * Latest Posts Query (Aman dari duplikasi menggunakan Tracker)
 */
function gesahan_get_latest_posts(int $limit = 6): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Category Posts Query (Aman dari duplikasi menggunakan Tracker)
 */
function gesahan_get_category_posts(int $category_id, int $limit = 6): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'cat'                 => $category_id,
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Trending / Popular Posts (Berdasarkan interaksi jumlah komentar, aman dari duplikasi)
 */
function gesahan_get_trending_posts(int $limit = 5): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'orderby'             => 'comment_count',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Editor's Choice Posts Query (Mengambil pos dari tag 'editors-choice' atau kategori terpilih)
 */
function gesahan_get_editors_choice_posts(int $limit = 4): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $tag = get_term_by('slug', 'editors-choice', 'post_tag');
    if ($tag) {
        $args['tag_id'] = $tag->term_id;
    } else {
        $args['meta_key'] = '_gesahan_editors_choice';
        $args['meta_value'] = '1';
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        unset($args['tag_id'], $args['meta_key'], $args['meta_value']);
        $args['post__not_in'] = $exclude;
        $query = new WP_Query($args);
    }

    return $query;
}

/**
 * Photo Story Posts Query (Mengambil pos format Image atau kategori 'photo-story')
 */
function gesahan_get_photo_story_posts(int $limit = 4): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $category = get_category_by_slug('photo-story');
    if ($category) {
        $args['cat'] = $category->term_id;
    } else {
        $args['tax_query'] = [
            [
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => ['post-format-image', 'post-format-gallery'],
            ]
        ];
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Infografik Posts Query (Kategori 'infografik' atau tag 'infografik')
 */
function gesahan_get_infographic_posts(int $limit = 3): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $category = get_category_by_slug('infografik');
    if ($category) {
        $args['cat'] = $category->term_id;
    } else {
        $args['tag'] = 'infografik';
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Opini Posts Query (Kategori 'opini' atau tag 'opini')
 */
function gesahan_get_opinion_posts(int $limit = 3): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $category = get_category_by_slug('opini');
    if ($category) {
        $args['cat'] = $category->term_id;
    } else {
        $args['tag'] = 'opini';
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Live Update Posts Query (Kategori 'live-update' atau tag 'live')
 */
function gesahan_get_live_posts(int $limit = 4): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $category = get_category_by_slug('live-update');
    if ($category) {
        $args['cat'] = $category->term_id;
    } else {
        $args['tag'] = 'live';
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * AI-Generated Summary/Analysis Posts Query
 */
function gesahan_get_ai_posts(int $limit = 3): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $category = get_category_by_slug('ai');
    if ($category) {
        $args['cat'] = $category->term_id;
    } else {
        $args['s'] = 'AI';
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Video Posts Query (Mengambil pos format Video atau Kategori khusus Video)
 */
function gesahan_get_video_posts(int $limit = 3): WP_Query
{
    $args = [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ];

    $video_cat = get_category_by_slug('video');
    if ($video_cat) {
        $args['cat'] = $video_cat->term_id;
    } else {
        $args['tax_query'] = [
            [
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => ['post-format-video'],
            ]
        ];
    }

    $exclude = Gesahan_Query_Tracker::get_excluded();
    if (!empty($exclude)) {
        $args['post__not_in'] = $exclude;
    }

    return new WP_Query($args);
}

/**
 * Related Posts (Mengambil artikel dari kategori yang sama, aman dari artikel aktif)
 */
function gesahan_get_related_posts(int $post_id, int $limit = 3): WP_Query
{
    $categories = wp_get_post_categories($post_id);

    if (empty($categories)) {
        return new WP_Query();
    }

    return new WP_Query([
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $limit,
        'category__in'        => $categories,
        'post__not_in'        => [$post_id],
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
    ]);
}

/**
 * Breaking News Query (Mengambil artikel terbaru)
 */
function gesahan_get_breaking_news(int $limit = 5): WP_Query
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
 * Menghitung estimasi waktu membaca artikel secara akurat
 */
function gesahan_get_reading_time(string $content): string
{
    $words_per_minute = 200;
    $clean_content = strip_shortcodes(strip_tags($content));
    $word_count = str_word_count($clean_content);
    $reading_time = ceil($word_count / $words_per_minute);
    
    return sprintf(
        esc_html(_n('%d menit baca', '%d menit baca', (int)$reading_time, 'gesahan-news-pro')),
        $reading_time
    );
}

/**
 * Breadcrumb Generator SEO Friendly
 */
function gesahan_breadcrumbs(): void
{
    if (is_front_page() || is_home()) {
        return;
    }

    echo '<nav class="gn-breadcrumb" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Beranda', 'gesahan-news-pro') . '</a>';
    echo '<span class="gn-breadcrumb__separator">/</span>';

    if (is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
            echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
            echo '<span class="gn-breadcrumb__separator">/</span>';
        }
        echo '<span class="gn-breadcrumb__current">' . esc_html(get_the_title()) . '</span>';
    } elseif (is_category()) {
        echo '<span class="gn-breadcrumb__current">' . esc_html(single_cat_title('', false)) . '</span>';
    } elseif (is_tag()) {
        echo '<span class="gn-breadcrumb__current">' . esc_html(single_tag_title('', false)) . '</span>';
    } elseif (is_search()) {
        echo '<span class="gn-breadcrumb__current">' . sprintf(esc_html__('Hasil Pencarian: "%s"', 'gesahan-news-pro'), get_search_query()) . '</span>';
    }

    echo '</nav>';
}