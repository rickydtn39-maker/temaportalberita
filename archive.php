<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="site-main">

    <div class="container">

        <section class="archive-page">

            <h1 class="archive-title">

                <?php the_archive_title(); ?>

            </h1>

            <div class="archive-grid">

                <?php while (have_posts()) : the_post(); ?>

                    <article class="archive-card">

                        <a href="<?php the_permalink(); ?>">

                            <?php if (has_post_thumbnail()) : ?>

                                <?php the_post_thumbnail('medium_large'); ?>

                            <?php endif; ?>

                            <h2>

                                <?php the_title(); ?>

                            </h2>

                        </a>

                    </article>

                <?php endwhile; ?>

            </div>

        </section>

    </div>

</main>

<?php get_footer(); ?>