<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_custom_logo()
{
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}

add_action('after_setup_theme', 'gesahan_custom_logo');