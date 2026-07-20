<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Mengambil tautan sosial media dari WordPress Customizer
$fb = get_theme_mod('gesahan_social_facebook', '');
$tw = get_theme_mod('gesahan_social_twitter', '');
$ig = get_theme_mod('gesahan_social_instagram', '');
$yt = get_theme_mod('gesahan_social_youtube', '');
?>

<div class="gn-topbar">
    <div class="gn-container">
        <div class="gn-topbar__inner">
            
            <div class="gn-topbar__left">
                <span class="gn-topbar__date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <?php echo esc_html(wp_date('l, d F Y')); ?>
                </span>
            </div>

            <div class="gn-topbar__right">
                <div class="gn-topbar__socials">
                    <?php if (!empty($fb)) : ?>
                        <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook">FB</a>
                    <?php endif; ?>
                    <?php if (!empty($tw)) : ?>
                        <a href="<?php echo esc_url($tw); ?>" target="_blank" rel="noopener" aria-label="Twitter / X">TW</a>
                    <?php endif; ?>
                    <?php if (!empty($ig)) : ?>
                        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" aria-label="Instagram">IG</a>
                    <?php endif; ?>
                    <?php if (!empty($yt)) : ?>
                        <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener" aria-label="YouTube">YT</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>