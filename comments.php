<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/*
 * Jika postingan dilindungi sandi, return lebih awal
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="gn-comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="gn-comments-title">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('1 Komentar pada "%1$s"', 'gesahan-news-pro'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count, 2: title. */
                    esc_html(_n('%1$s Komentar pada "%2$s"', '%1$s Komentar pada "%2$s"', (int)$comment_count, 'gesahan-news-pro')),
                    number_format_i18n($comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h3>

        <!-- Daftar Komentar -->
        <ol class="gn-comments-list">
            <?php
            wp_list_comments([
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ]);
            ?>
        </ol>

        <!-- Navigasi Komentar -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h4 class="screen-reader-text"><?php esc_html_e('Navigasi Komentar', 'gesahan-news-pro'); ?></h4>
                <div class="nav-links" style="display: flex; gap: var(--gn-space-3); margin-bottom: 24px;">
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Komentar Lama', 'gesahan-news-pro')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Komentar Baru &rarr;', 'gesahan-news-pro')); ?></div>
                </div>
            </nav>
        <?php endif; ?>

        <?php if (!comments_open()) : ?>
            <p class="gn-no-comments"><?php esc_html_e('Kolom komentar telah ditutup.', 'gesahan-news-pro'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    // Kustomisasi Form Komentar agar Mengikuti Standard UI Framework
    comment_form([
        'class_form'         => 'gn-comment-form',
        'title_reply_class'  => 'gn-reply-title',
        'submit_button'      => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
        'class_submit'       => 'gn-comment-submit-btn',
        'comment_field'      => '<div class="gn-comment-form-group"><label for="comment">' . esc_html__('Komentar', 'gesahan-news-pro') . ' *</label><textarea id="comment" name="comment" cols="45" rows="6" required></textarea></div>',
        'fields'             => [
            'author' => '<div class="gn-comment-fields-grid"><div class="gn-comment-form-group"><label for="author">' . esc_html__('Nama', 'gesahan-news-pro') . ' *</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" required /></div>',
            'email'  => '<div class="gn-comment-form-group"><label for="email">' . esc_html__('Email', 'gesahan-news-pro') . ' *</label><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" required /></div>',
            'url'    => '<div class="gn-comment-form-group"><label for="url">' . esc_html__('Website', 'gesahan-news-pro') . '</label><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div></div>',
        ],
    ]);
    ?>

</div>