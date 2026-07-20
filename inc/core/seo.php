<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Otomatisasi JSON-LD Schema Markup untuk Artikel & Portal Berita (Google Rich Snippets Ready)
 */
function gesahan_inject_json_ld_schema(): void
{
    if (is_front_page() || is_home()) {
        // Schema untuk Website Utama
        $schema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'WebSite',
            'name'            => get_bloginfo('name'),
            'description'     => get_bloginfo('description'),
            'url'             => esc_url(home_url('/')),
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => esc_url(home_url('/?s={search_term_string}')),
                'query-input' => 'required name=search_term_string'
            ]
        ];
    } elseif (is_single()) {
        // Schema untuk Artikel Berita Tunggal
        global $post;
        if (!$post) {
            return;
        }

        $author_id   = $post->post_author;
        $publisher_logo = get_theme_mod('custom_logo');
        $logo_url    = '';

        if ($publisher_logo) {
            $logo_data = wp_get_attachment_image_src($publisher_logo, 'full');
            if ($logo_data) {
                $logo_url = $logo_data[0];
            }
        }

        $schema = [
            '@context'         => 'https://schema.org',
            '@type'            => 'NewsArticle',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => esc_url(get_permalink($post->ID))
            ],
            'headline'         => esc_html(get_the_title($post->ID)),
            'image'            => [
                esc_url(get_the_post_thumbnail_url($post->ID, 'large'))
            ],
            'datePublished'    => esc_html(get_the_date('c', $post->ID)),
            'dateModified'     => esc_html(get_the_modified_date('c', $post->ID)),
            'author'           => [
                '@type' => 'Person',
                'name'  => esc_html(get_the_author_meta('display_name', $author_id)),
                'url'   => esc_url(get_author_posts_url($author_id))
            ],
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => esc_html(get_bloginfo('name')),
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => !empty($logo_url) ? esc_url($logo_url) : esc_url(get_site_icon_url())
                ]
            ],
            'description'      => esc_html(wp_strip_all_tags(get_the_excerpt($post->ID)))
        ];
    } else {
        return;
    }

    echo "\n" . '<!-- Gesahan News Schema Engine -->' . "\n";
    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . "\n";
    echo '</script>' . "\n";
}

add_action('wp_head', 'gesahan_inject_json_ld_schema');