<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="gn-section gn-newsletter-section">
    <div class="gn-newsletter-card">
        
        <div class="gn-newsletter-card__content">
            <span class="gn-newsletter-card__eyebrow"><?php esc_html_e('DAPATKAN UPDATE BERITA', 'gesahan-news-pro'); ?></span>
            <h2 class="gn-newsletter-card__title">
                <?php esc_html_e('Langganan Newsletter Kami', 'gesahan-news-pro'); ?>
            </h2>
            <p class="gn-newsletter-card__description">
                <?php esc_html_e('Dapatkan kurasi rangkuman berita terpopuler nasional dan internasional langsung ke kotak masuk email Anda setiap pagi gratis.', 'gesahan-news-pro'); ?>
            </p>
        </div>

        <div class="gn-newsletter-card__form-wrapper">
            <!-- Form semantic murni, kompatibel dengan Mailchimp, Mailpoet, atau API customizer -->
            <form class="gn-newsletter-form" action="#" method="post" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
                <input class="gn-newsletter-form__input" type="email" placeholder="<?php esc_attr_e('Masukkan alamat email Anda...', 'gesahan-news-pro'); ?>" required aria-label="Alamat Email">
                <button class="gn-newsletter-form__btn" type="submit">
                    <?php esc_html_e('Langganan', 'gesahan-news-pro'); ?>
                </button>
            </form>
            <p class="gn-newsletter-form__note">
                <?php esc_html_e('Kami menghargai privasi Anda. Tidak ada spam, batalkan langganan kapan saja.', 'gesahan-news-pro'); ?>
            </p>
        </div>

    </div>
</section>