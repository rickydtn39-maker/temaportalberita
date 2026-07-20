<?php

if (!defined('ABSPATH')) {
    exit;
}

function gesahan_register_menus()
{

    register_nav_menus([

        'primary' => __('Primary Menu', 'gesahan'),

        'footer' => __('Footer Menu', 'gesahan'),

    ]);
}

add_action('after_setup_theme', 'gesahan_register_menus');