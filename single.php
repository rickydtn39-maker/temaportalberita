<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

if (have_posts()) :

    while (have_posts()) :

        the_post();
?>

<main class="site-main">

    <div class="container single-layout">

        <article class="single-post">

            <?php get_template_part('template-parts/single/breadcrumb'); ?>

            <div class="single-category">

                <?php

                $cats = get_the_category();

                if (!empty($cats)) {
                    echo esc_html($cats[0]->name);
                }

                ?>

            </div>

            <h1 class="single-title">

                <?php the_title(); ?>

            </h1>

            <div class="single-meta">

                <span>

                    <?php echo get_the_date(); ?>

                </span>

                <span>

                    <?php the_author(); ?>

                </span>

                <?php get_template_part('template-parts/single/reading-time'); ?>

            </div>

            <?php if (has_post_thumbnail()) : ?>

                <div class="single-thumbnail">

                    <?php the_post_thumbnail('full'); ?>

                </div>

            <?php endif; ?>

            <div class="single-content">

                <?php the_content(); ?>

            </div>

            <?php get_template_part('template-parts/single/share'); ?>

            <?php get_template_part('template-parts/single/navigation'); ?>

            <?php get_template_part('template-parts/single/author-box'); ?>

            <?php get_template_part('template-parts/single/related'); ?>

        </article>

        <aside class="homepage-sidebar">

            <?php get_template_part('template-parts/sidebar/trending'); ?>

        </aside>

    </div>

</main>

<?php

    endwhile;

endif;

get_footer();