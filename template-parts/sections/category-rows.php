<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Render Blok: NASIONAL, DAERAH, VIDEO, INFOGRAFIK
$nasional_cat = get_category_by_slug('nasional');
$daerah_cat   = get_category_by_slug('daerah');
?>

<!-- ROW 1: NASIONAL -->
<?php if ($nasional_cat) : $nasional_query = gesahan_get_category_posts($nasional_cat->term_id, 4); ?>
<section class="gn-section gn-category-row">
    <header class="gn-section__header">
        <h2 class="gn-section__title"><?php echo esc_html($nasional_cat->name); ?></h2>
    </header>
    <div class="gn-grid gn-grid-4">
        <?php while ($nasional_query->have_posts()) : $nasional_query->the_post(); Gesahan_Query_Tracker::track(get_the_ID()); ?>
            <article class="gn-card">
                <a class="gn-card__image" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); endif; ?>
                </a>
                <div class="gn-card__body">
                    <h3 class="gn-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="gn-card__excerpt"><?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?></p>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>

<!-- ROW 2: DAERAH / SUMSEL -->
<?php if ($daerah_cat) : $daerah_query = gesahan_get_category_posts($daerah_cat->term_id, 4); ?>
<section class="gn-section gn-category-row">
    <header class="gn-section__header">
        <h2 class="gn-section__title"><?php echo esc_html($daerah_cat->name); ?></h2>
    </header>
    <div class="gn-grid gn-grid-4">
        <?php while ($daerah_query->have_posts()) : $daerah_query->the_post(); Gesahan_Query_Tracker::track(get_the_ID()); ?>
            <article class="gn-card">
                <a class="gn-card__image" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); endif; ?>
                </a>
                <div class="gn-card__body">
                    <h3 class="gn-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="gn-card__excerpt"><?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?></p>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>

<!-- ROW 3: VIDEO TERBARU -->
<?php $videos = gesahan_get_video_posts(4); if ($videos->have_posts()) : ?>
<section class="gn-section gn-category-row">
    <header class="gn-section__header">
        <h2 class="gn-section__title"><?php esc_html_e('VIDEO TERBARU', 'nusantara-one'); ?></h2>
    </header>
    <div class="gn-grid gn-grid-4">
        <?php while ($videos->have_posts()) : $videos->the_post(); ?>
            <article class="gn-card gn-video-card">
                <a class="gn-card__image gn-video-card__thumb" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('medium'); endif; ?>
                    <div class="gn-video-card__play-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg>
                    </div>
                </a>
                <div class="gn-card__body">
                    <h3 class="gn-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>

<!-- ROW 4: INFOGRAFIK -->
<?php $infographics = nusantara_get_infographic_posts(4); if ($infographics->have_posts()) : ?>
<section class="gn-section gn-category-row">
    <header class="gn-section__header">
        <h2 class="gn-section__title"><?php esc_html_e('INFOGRAFIK', 'nusantara-one'); ?></h2>
    </header>
    <div class="gn-grid gn-grid-4">
        <?php while ($infographics->have_posts()) : $infographics->the_post(); ?>
            <article class="gn-card gn-infographic-card">
                <a class="gn-card__image" href="<?php the_permalink(); ?>" style="aspect-ratio: 4/5;">
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); endif; ?>
                </a>
                <div class="gn-card__body">
                    <h3 class="gn-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>