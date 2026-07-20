<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :

    the_post();
?>

<main class="site-main">

    <div class="container">

        <article class="single-post">

            <h1 class="single-title">

                <?php the_title(); ?>

            </h1>

            <div class="single-content">

                <?php the_content(); ?>

            </div>

        </article>

    </div>

</main>

<?php

endwhile;

get_footer();