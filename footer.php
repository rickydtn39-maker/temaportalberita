<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$footer_copy = get_theme_mod('gesahan_footer_copy', '');
?>

</main>

<footer class="gn-footer">
    <div class="gn-container">
        
        <?php if (!empty($footer_copy)) : ?>
            <p><?php echo esc_html($footer_copy); ?></p>
        <?php else : ?>
            <p>
                © <?php echo esc_html(wp_date('Y')); ?>
                <?php bloginfo('name'); ?>.
                <?php esc_html_e('All Rights Reserved.', 'gesahan-news-pro'); ?>
            </p>
        <?php endif; ?>

    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>