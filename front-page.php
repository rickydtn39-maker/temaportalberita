<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Mengambil data kode iklan dari Customizer
$homepage_ad = get_theme_mod('gesahan_ad_homepage_banner', '');

?>

<div class="gn-homepage-engine">

    <!-- SLOT IKLAN BANNER UTAMA HOMEPAGE (Dinamis, Opsional & Glassmorphism container) -->
    <?php if (!empty($homepage_ad)) : ?>
        <div class="gn-container">
            <div class="gn-home-ad-banner">
                <?php echo $homepage_ad; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="gn-container">
        <?php
        // 1. Hero Grid Module (Headline & Side list Terpopuler)
        get_template_part('template-parts/sections/hero');

        // 2. 🔥 Section Trending Strip (Priority 2 - Horizontal Clean Grid)
        get_template_part('template-parts/sections/trending');

        // 3. ⭐ Section Editor's Pick (Priority 2 - Premium Asymmetric Grid)
        get_template_part('template-parts/sections/editors-pick');

        // 4. Homepage Category Blocks (Kategori pilihan via Customizer)
        get_template_part('template-parts/sections/category-blocks');

        // 5. Premium Video Section Block (Modern overlay & Dark background)
        get_template_part('template-parts/sections/video');

        // 6. Latest News Module (Sleek List - Anti-Duplication)
        get_template_part('template-parts/sections/latest');

        // Tambahkan baris pemanggilan ini di front-page.php di mana saja Anda suka:
        get_template_part('template-parts/sections/ai-summary');

        // 7. Premium Newsletter subscription box (Linear Style)
        get_template_part('template-parts/sections/newsletter');
        ?>
    </div>

</div>

<?php

get_footer();