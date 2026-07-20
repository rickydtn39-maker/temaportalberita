<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$breaking_query = gesahan_get_breaking_news(5);

if (!$breaking_query->have_posts()) {
    return;
}
?>

<div class="gn-ticker">
    <div class="gn-container">
        <div class="gn-ticker__inner">
            
            <div class="gn-ticker__label">
                <span class="gn-ticker__pulse"></span>
                <?php esc_html_e('BREAKING NEWS', 'gesahan-news-pro'); ?>
            </div>

            <div class="gn-ticker__slider">
                <div class="gn-ticker__track">
                    <?php 
                    while ($breaking_query->have_posts()) : 
                        $breaking_query->the_post(); 
                    ?>
                        <div class="gn-ticker__item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>