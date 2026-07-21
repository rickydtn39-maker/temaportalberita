<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="gn-section gn-newsletter-section">
    <div class="gn-newsletter-card">
        <div class="gn-newsletter-card__ambient-glow"></div>
        
        <div class="gn-newsletter-card__grid">
            <!-- Kolom Kiri: Copywriting & Value Proposition -->
            <div class="gn-newsletter-card__content">
                <span class="gn-newsletter-card__eyebrow">
                    <?php esc_html_e('KURASI EKSKLUSIF', 'gesahan-news-pro'); ?>
                </span>
                <h2 class="gn-newsletter-card__title">
                    <?php esc_html_e('Intelijen Berita di Kotak Masuk Anda', 'gesahan-news-pro'); ?>
                </h2>
                <p class="gn-newsletter-card__description">
                    <?php esc_html_e('Bergabunglah dengan para profesional yang memulai hari mereka dengan rangkuman analisis berita esensial nasional dan global. Dikirim setiap fajar secara gratis.', 'gesahan-news-pro'); ?>
                </p>
            </div>

            <!-- Kolom Kanan: Form Minimalis -->
            <div class="gn-newsletter-card__action-box">
                <form class="gn-newsletter-form" action="#" method="post" onsubmit="event.preventDefault(); alert('Terima kasih! Anda kini telah terdaftar dalam jaringan intelijen berita kami.');">
                    <div class="gn-newsletter-form__group">
                        <input class="gn-newsletter-form__input" type="email" placeholder="<?php esc_attr_e('Masukkan alamat email bisnis Anda...', 'gesahan-news-pro'); ?>" required aria-label="Alamat Email">
                        <button class="gn-newsletter-form__btn" type="submit">
                            <?php esc_html_e('Langganan', 'gesahan-news-pro'); ?>
                        </button>
                    </div>
                </form>
                <p class="gn-newsletter-form__note">
                    <?php esc_html_e('Kami menghargai privasi Anda sepenuhnya. Tanpa spam, batalkan langganan dengan sekali klik kapan saja.', 'gesahan-news-pro'); ?>
                </p>
            </div>
        </div>
    </div>
</section>