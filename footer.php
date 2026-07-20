<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer class="site-footer">

    <div class="container">

        <div class="footer-top">

            <div class="footer-brand">

                <h2>GESAHAN NEWS</h2>

                <p>

                    <?php echo esc_html(
                        get_theme_mod(
                            'gesahan_footer_text',
                            'Portal berita digital cepat dan terpercaya'
                        )
                    ); ?>

                </p>

                <div class="footer-social">

                    <?php if (get_theme_mod('gesahan_facebook')) : ?>

                        <a href="<?php echo esc_url(get_theme_mod('gesahan_facebook')); ?>">

                            Facebook

                        </a>

                    <?php endif; ?>

                    <?php if (get_theme_mod('gesahan_instagram')) : ?>

                        <a href="<?php echo esc_url(get_theme_mod('gesahan_instagram')); ?>">

                            Instagram

                        </a>

                    <?php endif; ?>

                    <?php if (get_theme_mod('gesahan_youtube')) : ?>

                        <a href="<?php echo esc_url(get_theme_mod('gesahan_youtube')); ?>">

                            Youtube

                        </a>

                    <?php endif; ?>

                    <?php if (get_theme_mod('gesahan_twitter')) : ?>

                        <a href="<?php echo esc_url(get_theme_mod('gesahan_twitter')); ?>">

                            X

                        </a>

                    <?php endif; ?>

                </div>

            </div>

            <div class="footer-links">

                <h3>Footer Menu</h3>

                <?php

                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => false
                ]);

                ?>

            </div>

            <div class="footer-links">

                <h3>Kategori</h3>

                <ul>

                    <?php

                    $cats = get_categories([
                        'number' => 5
                    ]);

                    foreach ($cats as $cat) :
                    ?>

                        <li>

                            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">

                                <?php echo esc_html($cat->name); ?>

                            </a>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

            <div class="footer-links">

                <?php get_template_part('template-parts/footer/footer-newsletter'); ?>

            </div>

        </div>

        <div class="footer-bottom">

            © <?php echo date('Y'); ?>

            Gesahan News Pro

        </div>

    </div>

</footer>
<button class="back-to-top">

    ↑

</button>
<?php wp_footer(); ?>

</body>
</html>