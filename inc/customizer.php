<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_customize_register($wp_customize)
{

    $wp_customize->add_section('gesahan_theme_options', [
        'title'    => 'Gesahan Theme Options',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('gesahan_footer_text', [
        'default'           => 'Portal Berita Digital Cepat dan Terpercaya',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gesahan_footer_text', [
        'label'   => 'Footer Text',
        'section' => 'gesahan_theme_options',
        'type'    => 'text',
    ]);
}

add_action('customize_register', 'gesahan_customize_register');