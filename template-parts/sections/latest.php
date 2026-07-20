<?php

declare(strict_types=1);

// Kueri otomatis mengecualikan artikel yang sudah tampil di Hero Section
$latest_posts = gesahan_get_latest_posts(6);
?>

<section class="gn-section gn-latest">

    <header class="gn-section__header">
        <div>
            <h2 class="gn-section__title">
                Berita Terbaru
            </h2>
            <p class="gn-section__description">
                Pantau terus informasi hangat terbaru kami setiap hari.
            </p>
        </div>
        <div class="gn-section__action">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
                Lihat Semua →
            </a>
        </div>
    </header>

    <div class="gn-grid gn-grid-3">

        <?php if ($latest_posts->have_posts()) : ?>

            <?php 
            while ($latest_posts->have_posts()) : 
                $latest_posts->the_post(); 
            ?>
                <article class="gn-card">

                    <a class="gn-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <div class="gn-card__image-placeholder">
                                <?php bloginfo('name'); ?>
                            </div>
                        <?php endif; ?>
                    </a>

                    <div class="gn-card__body">

                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <span class="gn-card__badge">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>

                        <h3 class="gn-card__title gn-line-clamp-2">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <!-- NARASI GRID TERBARU -->
                        <p class="gn-card__excerpt">
                            <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                        </p>

                        <div class="gn-card__meta">
                            <span><?php echo esc_html(get_the_date()); ?></span>
                            <span><?php the_author(); ?></span>
                        </div>

                    </div>

                </article>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
            ?>

        <?php else : ?>

            <p class="gn-empty">Belum ada artikel terbaru.</p>

        <?php endif; ?>

    </div>

</section>