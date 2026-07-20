<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<main id="content" class="g-main">

    <div class="g-container">

        <section class="g-hero" aria-labelledby="gesahan-hero-title">

            <div class="g-hero__eyebrow">
                <?php esc_html_e('Generation 2', 'gesahan-news-pro'); ?>
            </div>

            <h1 id="gesahan-hero-title" class="g-hero__title">
                <?php esc_html_e('Portal berita modern dengan fondasi premium.', 'gesahan-news-pro'); ?>
            </h1>

            <p class="g-hero__desc">
                <?php esc_html_e('Gesahan News Pro sedang dibangun ulang dengan arsitektur baru, desain editorial modern, dan pengalaman membaca yang lebih kuat.', 'gesahan-news-pro'); ?>
            </p>

        </section>

        <?php if (have_posts()) : ?>

            <section class="g-post-grid" aria-label="<?php esc_attr_e('Daftar berita', 'gesahan-news-pro'); ?>">

                <?php
                while (have_posts()) :
                    the_post();
                    ?>

                    <article <?php post_class('g-post-card'); ?>>

                        <?php if (has_post_thumbnail()) : ?>

                            <a class="g-post-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>

                        <?php endif; ?>

                        <div class="g-post-card__body">

                            <h2 class="g-post-card__title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="g-post-card__meta">
                                <?php echo esc_html(get_the_date()); ?>
                            </div>

                        </div>

                    </article>

                    <?php
                endwhile;
                ?>

            </section>

        <?php else : ?>

            <div class="g-empty">
                <?php esc_html_e('Belum ada berita yang diterbitkan.', 'gesahan-news-pro'); ?>
            </div>

        <?php endif; ?>

    </div>

</main>

<?php

get_footer();