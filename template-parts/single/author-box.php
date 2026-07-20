<?php

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="author-box">

    <div class="author-avatar">

        <?php echo get_avatar(get_the_author_meta('ID'), 90); ?>

    </div>

    <div class="author-info">

        <h3>

            <?php the_author(); ?>

        </h3>

        <p>

            <?php the_author_meta('description'); ?>

        </p>

    </div>

</div>