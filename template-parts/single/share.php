<?php

if (!defined('ABSPATH')) {
    exit;
}

$url   = urlencode(get_permalink());
$title = urlencode(get_the_title());
?>

<div class="share-box">

    <h3>Bagikan Berita</h3>

    <div class="share-buttons">

        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>">
            Facebook
        </a>

        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>">
            X
        </a>

        <a target="_blank" href="https://wa.me/?text=<?php echo $title . '%20' . $url; ?>">
            WhatsApp
        </a>

        <a target="_blank" href="https://t.me/share/url?url=<?php echo $url; ?>&text=<?php echo $title; ?>">
            Telegram
        </a>

    </div>

</div>