<?php

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="breadcrumb">

    <a href="<?php echo esc_url(home_url('/')); ?>">

        Home

    </a>

    <?php

    $cats = get_the_category();

    if (!empty($cats)) :
    ?>

        <span>/</span>

        <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>">

            <?php echo esc_html($cats[0]->name); ?>

        </a>

    <?php endif; ?>

    <span>/</span>

    <span class="current">

        <?php the_title(); ?>

    </span>

</div>