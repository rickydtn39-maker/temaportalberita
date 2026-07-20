<?php

declare(strict_types=1);

$hero = gesahan_get_hero_posts(5);

if (!$hero->have_posts()) {
    return;
}
?>

<section class="gn-hero">
    <div class="gn-hero__grid">

        <!-- Grid Kiri: Artikel Utama (Besar) -->
        <div class="gn-hero__main">
            <?php
            $hero->the_post();
            // Melacak ID agar tidak muncul ganda di bawah
            Gesahan_Query_Tracker::track(get_the_ID());
            ?>

            <article class="gn-card">
                <a class="gn-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
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

                    <h2 class="gn-card__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <!-- Narasi Ringkasan Berita Utama (Kiri) -->
                    <p class="gn-card__excerpt">
                        <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                    </p>

                    <div class="gn-card__meta">
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span><?php the_author(); ?></span>
                    </div>
                </div>
            </article>
        </div>

        <!-- Grid Kanan: Daftar Headline Tambahan (Diberi Narasi Pendek agar Mengisi Ruang Kosong) -->
        <div class="gn-hero__list">
            <?php
            while ($hero->have_posts()) :
                $hero->the_post();
                // Melacak ID agar tidak muncul ganda di bawah
                Gesahan_Query_Tracker::track(get_the_ID());
            ?>
                <article class="gn-card gn-hero-side-card">
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

                        <!-- KUTIPAN NARASI SINGKAT UNTUK MENGISI RUANG KOSONG -->
                        <p class="gn-card__excerpt gn-hero-side-excerpt">
                            <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                        </p>

                        <!-- METADATA UNTUK MEMPERCANTIK STRUKTUR BAWAH KARTU -->
                        <div class="gn-hero-side-meta">
                            <span><?php echo esc_html(get_the_date()); ?></span>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>
</section>