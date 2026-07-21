<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$terkini = gesahan_get_latest_posts(4);
$terpopuler = gesahan_get_trending_posts(4);
?>

<section class="gn-section gn-three-col">
    <div class="gn-grid gn-grid-3">
        
        <!-- KOLOM 1: TERKINI -->
        <div class="gn-three-col__box">
            <h3 class="gn-three-col__title"><?php esc_html_e('TERKINI', 'nusantara-one'); ?></h3>
            <div class="gn-three-col__list">
                <?php 
                if ($terkini->have_posts()) :
                    while ($terkini->have_posts()) : $terkini->the_post(); 
                    Gesahan_Query_Tracker::track(get_the_ID());
                    ?>
                        <article class="gn-three-col__item">
                            <h4 class="gn-three-col__item-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <span class="gn-three-col__item-time"><?php echo esc_html(get_the_date()); ?></span>
                        </article>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
        </div>

        <!-- KOLOM 2: TERPOPULER (Numbered List Style) -->
        <div class="gn-three-col__box">
            <h3 class="gn-three-col__title"><?php esc_html_e('TERPOPULER', 'nusantara-one'); ?></h3>
            <div class="gn-three-col__list gn-three-col__list--numbered">
                <?php 
                if ($terpopuler->have_posts()) :
                    while ($terpopuler->have_posts()) : $terpopuler->the_post(); 
                    ?>
                        <article class="gn-three-col__item">
                            <h4 class="gn-three-col__item-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </article>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
        </div>

        <!-- KOLOM 3: MARKET LIVE (Dinamis / Mockup Widget Premium) -->
        <div class="gn-three-col__box">
            <h3 class="gn-three-col__title"><?php esc_html_e('MARKET LIVE', 'nusantara-one'); ?></h3>
            <div class="gn-market-widget">
                <div class="gn-market-item">
                    <span><?php esc_html_e('IHSG (Indeks Saham)', 'nusantara-one'); ?></span>
                    <span class="gn-green">7,120.45 (+0.12%)</span>
                </div>
                <div class="gn-market-item">
                    <span><?php esc_html_e('USD / IDR', 'nusantara-one'); ?></span>
                    <span class="gn-red">15,640.00 (-0.05%)</span>
                </div>
                <div class="gn-market-item">
                    <span><?php esc_html_e('Emas Antam (gr)', 'nusantara-one'); ?></span>
                    <span class="gn-green">Rp 1.120.000 (+1.2%)</span>
                </div>
                <div class="gn-market-item">
                    <span><?php esc_html_e('Bitcoin (BTC)', 'nusantara-one'); ?></span>
                    <span class="gn-green">$ 64,500.00 (+2.4%)</span>
                </div>
            </div>
        </div>

    </div>
</section>