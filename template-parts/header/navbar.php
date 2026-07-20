<?php

if (!defined('ABSPATH')) {
    exit;
}
?>

<nav class="main-navbar">

    <div class="container">

        <?php

        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'main-menu'
        ]);

        ?>

    </div>

</nav>