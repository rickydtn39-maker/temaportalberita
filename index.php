<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">

    <section style="padding:64px 0;">

        <h1 style="margin-bottom:40px;">
            Generation 2
        </h1>

        <div class="gn-grid gn-grid-3">

            <?php
            if (have_posts()) :

                while (have_posts()) :
                    the_post();
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

                    <?php

                endwhile;

            else :
            ?>

                <p>Belum ada artikel.</p>

            <?php endif; ?>

        </div>

    </section>

</div>

<?php

get_footer();