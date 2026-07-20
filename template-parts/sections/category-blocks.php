<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Ambil Kategori ID dari Customizer Settings
$cat_id_1 = get_theme_mod('gesahan_home_cat_1', 0);
$cat_id_2 = get_theme_mod('gesahan_home_cat_2', 0);

// Fallback otomatis jika admin belum menentukan kategori di Customizer
if (empty($cat_id_1) || empty($cat_id_2)) {
    $all_cats = get_categories(['hide_empty' => true]);
    if (count($all_cats) >= 2) {
        $cat_id_1 = $cat_id_1 ? $cat_id_1 : $all_cats[0]->term_id;
        $cat_id_2 = $cat_id_2 ? $cat_id_2 : $all_cats[1]->term_id;
    } else {
        return; 
    }
}

$categories_to_render = [
    (int)$cat_id_1,
    (int)$cat_id_2,
];
?>

<div class="gn-category-blocks">
    <div class="gn-grid gn-grid-2">

        <?php 
        foreach ($categories_to_render as $cat_id) : 
            $cat_data = get_category($cat_id);
            if (!$cat_data) {
                continue;
            }

            $query = gesahan_get_category_posts($cat_id, 4);
            if (!$query->have_posts()) {
                continue;
            }
        ?>
            
            <section class="gn-section gn-category-block">
                
                <header class="gn-section__header">
                    <div>
                        <h2 class="gn-section__title">
                            <?php echo esc_html($cat_data->name); ?>
                        </h2>
                    </div>
                    <div class="gn-section__action">
                        <a href="<?php echo esc_url(get_category_link($cat_id)); ?>">
                            <?php esc_html_e('Lihat Semua', 'gesahan-news-pro'); ?> →
                        </a>
                    </div>
                </header>

                <div class="gn-category-block__content">
                    
                    <!-- Post Utama (Besar) -->
                    <?php 
                    $query->the_post(); 
                    Gesahan_Query_Tracker::track(get_the_ID());
                    ?>
                    <article class="gn-card gn-category-block__main-card">
                        <a class="gn-card__image" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div class="gn-card__image-placeholder">
                                    <?php bloginfo('name'); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="gn-card__body">
                            <h3 class="gn-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <!-- NARASI BERITA UTAMA KATEGORI -->
                            <p class="gn-card__excerpt">
                                <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                            </p>

                            <div class="gn-card__meta">
                                <span><?php echo esc_html(get_the_date()); ?></span>
                                <span><?php the_author(); ?></span>
                            </div>
                        </div>
                    </article>

                    <!-- List Mini Post Samping/Bawah -->
                    <div class="gn-category-block__list">
                        <?php 
                        while ($query->have_posts()) : 
                            $query->the_post(); 
                            Gesahan_Query_Tracker::track(get_the_ID());
                        ?>
                            <article class="gn-card gn-category-block__mini-card">
                                <div class="gn-card__body">
                                    <h4 class="gn-card__title gn-line-clamp-2">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="gn-card__meta">
                                        <span><?php echo esc_html(get_the_date()); ?></span>
                                    </div>
                                </div>
                            </article>
                        <?php 
                        endwhile; 
                        wp_reset_postdata(); 
                        ?>
                    </div>

                </div>

            </section>

        <?php endforeach; ?>

    </div>
</div>