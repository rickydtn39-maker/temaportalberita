<?php

if (!defined('ABSPATH')) {
    exit;
}

$prev_post = get_previous_post();
$next_post = get_next_post();

if (!$prev_post && !$next_post) {
    return;
}
?>

<div class="post-navigation">

    <?php if ($prev_post) : ?>

        <a class="post-nav-item prev-post" href="<?php echo get_permalink($prev_post->ID); ?>">

            <span class="nav-label">

                ← Berita Sebelumnya

            </span>

            <h4>

                <?php echo esc_html($prev_post->post_title); ?>

            </h4>

        </a>

    <?php endif; ?>

    <?php if ($next_post) : ?>

        <a class="post-nav-item next-post" href="<?php echo get_permalink($next_post->ID); ?>">

            <span class="nav-label">

                Berita Berikutnya →

            </span>

            <h4>

                <?php echo esc_html($next_post->post_title); ?>

            </h4>

        </a>

    <?php endif; ?>

</div>