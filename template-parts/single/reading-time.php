<?php

if (!defined('ABSPATH')) {
    exit;
}

$content = get_post_field('post_content', get_the_ID());

$word_count = str_word_count(
    wp_strip_all_tags($content)
);

$reading_time = ceil($word_count / 200);

if ($reading_time < 1) {
    $reading_time = 1;
}
?>

<div class="reading-time">

    ⏱ <?php echo esc_html($reading_time); ?> menit baca

</div>