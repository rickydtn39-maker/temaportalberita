<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="gn-site">

<header class="gn-header">

    <div class="gn-container">

        <div class="gn-header__inner">

            <a class="gn-logo" href="<?php echo esc_url(home_url('/')); ?>">

                <?php bloginfo('name'); ?>

            </a>

            <div class="gn-header__right">

                <?php echo esc_html(wp_date('l, d F Y')); ?>

            </div>

        </div>

    </div>

</header>

<main class="gn-main">