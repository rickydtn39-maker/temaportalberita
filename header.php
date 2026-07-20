<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="site-loader">

    <div class="loader-spinner"></div>

</div>

<div class="topbar">

    <div class="container topbar-inner">

        <div class="topbar-left">

            <span>

                <?php echo date_i18n('l, d F Y'); ?>

            </span>

        </div>

        <div class="topbar-right">

            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Youtube</a>
            <a href="#">X</a>

        </div>

    </div>

</div>

<header class="site-header">

    <div class="container">

        <div class="header-inner">

            <div class="logo">

                <?php

                if (has_custom_logo()) {

                    the_custom_logo();

                } else {
                ?>

                    <a href="<?php echo esc_url(home_url('/')); ?>">

                        <h1>GESAHAN</h1>

                        <span>NEWS PRO</span>

                    </a>

                <?php } ?>

            </div>

            <button class="mobile-menu-toggle">

                ☰

            </button>

            <nav class="main-nav">

                <?php

                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'menu'
                ]);

                ?>

            </nav>

            <?php get_template_part('template-parts/header/search-button'); ?>

        </div>

    </div>

</header>

<?php get_template_part('template-parts/header/navbar'); ?>