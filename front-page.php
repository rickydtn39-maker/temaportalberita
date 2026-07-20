<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Mengambil data kode iklan dari Customizer
$homepage_ad = get_theme_mod('gesahan_ad_homepage_banner', '');

?>

<div class="gn-container">

    <!-- SLOT IKLAN BANNER UTAMA HOMEPAGE (Dinamis & Opsional - Area Kotak Hijau) -->
    <?php if (!empty($homepage_ad)) : ?>
        <div class="gn-home-ad-banner">
            <?php echo $homepage_ad; // Render script iklan, link html atau banner kustom ?>
        </div>
    <?php endif; ?>

    <?php
    // 1. Hero Grid Module (Headline & Side list)
    get_template_part('template-parts/sections/hero');

    // 2. Homepage Category Blocks (Kategori pilihan via Customizer)
    get_template_part('template-parts/sections/category-blocks');

    // 3. Premium Video Section Block
    get_template_part('template-parts/sections/video');

    // 4. Latest News Module
    get_template_part('template-parts/sections/latest');

    // 5. Premium Newsletter subscription box
    get_template_part('template-parts/sections/newsletter');
    ?>

</div>

<?php

get_footer();