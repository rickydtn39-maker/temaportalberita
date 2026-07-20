<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

?>

<footer class="g-footer" role="contentinfo">
    <div class="g-container g-footer__inner">

        <div>
            &copy; <?php echo esc_html(wp_date('Y')); ?>
            <?php bloginfo('name'); ?>.
            <?php esc_html_e('All rights reserved.', 'gesahan-news-pro'); ?>
        </div>

        <div>
            <?php esc_html_e('Gesahan News Pro Generation 2', 'gesahan-news-pro'); ?>
        </div>

    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>