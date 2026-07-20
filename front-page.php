<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<div class="gn-container">

    <?php
    get_template_part('template-parts/sections/hero');

    get_template_part('template-parts/sections/latest');
    ?>

</div>

<?php

get_footer();