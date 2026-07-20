<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_theme_settings($wp_customize)
{

    $wp_customize->add_section('gesahan_social', [
        'title' => 'Gesahan Social Media'
    ]);

    $socials = [
        'facebook',
        'instagram',
        'youtube',
        'twitter'
    ];

    foreach ($socials as $social) {

        $wp_customize->add_setting(
            'gesahan_' . $social,
            [
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            ]
        );

        $wp_customize->add_control(
            'gesahan_' . $social,
            [
                'label' => ucfirst($social) . ' URL',
                'section' => 'gesahan_social',
                'type' => 'url'
            ]
        );
    }
}

add_action('customize_register', 'gesahan_theme_settings');