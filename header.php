<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="g-site">

<a class="g-skip-link" href="#content">
    <?php esc_html_e('Lewati ke konten', 'gesahan-news-pro'); ?>
</a>

<header class="g-header" role="banner">
    <div class="g-container g-header__inner">

        <div class="g-brand">
            <?php if (has_custom_logo()) : ?>

                <?php the_custom_logo(); ?>

            <?php else : ?>

                <a class="g-brand__title" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>

                <div class="g-brand__tagline">
                    <?php bloginfo('description'); ?>
                </div>

            <?php endif; ?>
        </div>

        <div class="g-header__meta">
            <?php echo esc_html(wp_date('l, d F Y')); ?>
        </div>

    </div>
</header>

<nav class="g-nav" aria-label="<?php esc_attr_e('Navigasi utama', 'gesahan-news-pro'); ?>">
    <div class="g-container g-nav__inner">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'g-nav__menu',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]
            );
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Beranda', 'gesahan-news-pro') . '</a>';
            echo '<a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Atur Menu', 'gesahan-news-pro') . '</a>';
        }
        ?>
    </div>
</nav>