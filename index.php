<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="site-main">

    <div class="container">

        <?php get_template_part('template-parts/home/breaking'); ?>

        <?php get_template_part('template-parts/home/hero'); ?>

        <div class="homepage-grid">

            <div class="homepage-content">

                <?php get_template_part('template-parts/home/editor-picks'); ?>

                <?php get_template_part('template-parts/home/popular'); ?>

                <?php get_template_part('template-parts/home/editors-choice'); ?>

                <?php get_template_part('template-parts/home/category-block'); ?>

                <?php get_template_part('template-parts/home/latest'); ?>

            </div>

            <aside class="homepage-sidebar">

                <?php get_template_part('template-parts/sidebar/trending'); ?>

            </aside>

        </div>

    </div>

</main>

<?php get_footer(); ?>