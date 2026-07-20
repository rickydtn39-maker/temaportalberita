<?php
if (!defined('ABSPATH')) {
    exit;
}

$args = [
    'posts_per_page'      => 10,
    'ignore_sticky_posts' => true,
    'post_status'         => 'publish'
];

$breaking = new WP_Query($args);

if (!$breaking->have_posts()) {
    return;
}
?>

<section class="breaking-news">

    <div class="container">

        <div class="breaking-wrapper">

            <div class="breaking-label">

                <span class="breaking-dot"></span>

                BREAKING NEWS

            </div>

            <div class="breaking-slider">

                <button class="breaking-btn prev" type="button">

                    &#10094;

                </button>

                <div class="breaking-track">

                    <?php
                    $i = 0;

                    while ($breaking->have_posts()) :
                        $breaking->the_post();
                    ?>

                        <article class="breaking-item <?php echo $i === 0 ? 'active' : ''; ?>">

                            <a href="<?php the_permalink(); ?>">

                                <span class="breaking-time">

                                    <?php echo get_the_date('H:i'); ?>

                                </span>

                                <span class="breaking-title">

                                    <?php the_title(); ?>

                                </span>

                            </a>

                        </article>

                    <?php
                        $i++;
                    endwhile;

                    wp_reset_postdata();
                    ?>

                </div>

                <button class="breaking-btn pause" type="button">

                    ❚❚

                </button>

                <button class="breaking-btn next" type="button">

                    &#10095;

                </button>

            </div>

        </div>

    </div>

</section>