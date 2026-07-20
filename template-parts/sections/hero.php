<?php

$hero = gesahan_get_hero_posts(5);

if (!$hero->have_posts()) {
    return;
}
?>

<section class="gn-hero">

    <div class="gn-hero__grid">

        <div class="gn-hero__main">

            <?php
            $hero->the_post();
            ?>

            <article class="gn-card">

                <a class="gn-card__image" href="<?php the_permalink(); ?>">

                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    ?>

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

                    <div class="gn-card__meta">

                        <span><?php echo esc_html(get_the_date()); ?></span>

                        <span><?php the_author(); ?></span>

                    </div>

                </div>

            </article>

        </div>

        <div class="gn-hero__list">

            <?php
            while ($hero->have_posts()) :
                $hero->the_post();
            ?>

                <article class="gn-card">

                    <div class="gn-card__body">

                        <?php
                        $categories = get_the_category();

                        if (!empty($categories)) :
                        ?>

                            <span class="gn-card__badge">

                                <?php echo esc_html($categories[0]->name); ?>

                            </span>

                        <?php endif; ?>

                        <h3 class="gn-card__title">

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h3>

                    </div>

                </article>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </div>

</section>