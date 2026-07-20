<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">
    <div class="gn-layout gn-layout--single-column">
        
        <!-- Sisi Tengah: Konten Utama Halaman Statis -->
        <div class="gn-content">
            
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article class="gn-post gn-page-wrapper">
                        
                        <div class="gn-post__header">
                            <?php gesahan_breadcrumbs(); ?>
                        </div>

                        <h1 class="gn-post__title">
                            <?php the_title(); ?>
                        </h1>

                        <?php if (has_post_thumbnail()) : ?>
                            <figure class="gn-post__featured">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                        <?php endif; ?>

                        <div class="gn-post__entry">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Menampilkan navigasi jika konten dibagi menjadi beberapa halaman (pagination dalam konten)
                        wp_link_pages([
                            'before' => '<div class="page-links">' . esc_html__('Halaman:', 'gesahan-news-pro'),
                            'after'  => '</div>',
                        ]);
                        ?>

                    </article>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>

    </div>
</div>

<?php

get_footer();